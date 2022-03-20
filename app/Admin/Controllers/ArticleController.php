<?php

namespace App\Admin\Controllers;
use App\Models\Article;
use App\Models\Classify;
use App\Models\Label;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class ArticleController extends BaseController
{

    /**
     * 列表
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        $grid = new Grid(new Article());

        $classify = Classify::query()->where()->pluck('name','id');

        $grid->column('id', __('ID'));
        $grid->column('classify.name', __('分类名称'));
        $grid->column('labels', __('标签名称'))->display(function ($label) {
            $label_str = '';
            foreach ($label as $key => $value){
                $label_str .= "<span class='label label-warning'>{$value->name}</span>";
            }

        });;

        $grid->column('title', __('标签名称'))->editable();
        $grid->column('describe', __('排序'))->editable();
//        $grid->column('content', __('内容'));
        $grid->column('publish', __('发布时间'));
        $grid->column('sort', __('是否展示'));
        $grid->column('display', __('是否展示'));


        $grid->filter(function($filter){

            // 在这里添加字段过滤器
            $filter->like('name', 'name');

        });

        $grid->quickCreate(function (Grid\Tools\QuickCreate $create) {
            $create->text('label_name', '名称');
            $create->integer('sort', '排序');
            $create->select('display', '是否展示')->options(Classify::DISPLAY)->default(1);
        });

        $grid->actions(function (Grid\Displayers\Actions $actions) {

            // 去掉删除
//            $actions->disableDelete();

            // 去掉编辑
            $actions->disableEdit();

            // 去掉查看
            $actions->disableView();


        });


        $grid->disableExport();
        $grid->disableCreateButton();

        return $content
            ->title('分类')
            ->description('分类列表')
            ->body($grid);

    }


    /**
     * 新增表单
     * @return Form
     */
    public function form()
    {

        $form = new Form(new Label());

        $form->display('label_name', __('标签名称'));
        $form->display('sort', __('排序'));
        $form->display('display', __('是否展示'));

        return $form;

    }


}
