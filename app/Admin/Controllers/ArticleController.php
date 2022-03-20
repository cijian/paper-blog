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


        $grid->column('id', __('ID'));
        $grid->column('title', __('文章标题'))->editable();
        $grid->column('describe', __('描述'));
        $grid->column('classify.name', __('分类名称'));
        $grid->column('labels', __('标签'))->display(function ($label) {
            $label_str = '';
            foreach ($label as $key => $value){
                $label_str .= "<span class='label label-warning'>{$value->name}</span>";
            }

        });

//        $grid->column('content', __('内容'));
        $grid->column('publish', __('发布时间'));
        $grid->column('sort', __('是否展示'));
        $grid->column('display', __('是否展示'));
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('更新时间'));


        $grid->filter(function(Grid\Filter $filter){

            // 在这里添加字段过滤器
            $filter->like('title', '文章标题');

        });


        $grid->actions(function (Grid\Displayers\Actions $actions) {

            // 去掉删除
//            $actions->disableDelete();

            // 去掉编辑
//            $actions->disableEdit();

            // 去掉查看
//            $actions->disableView();

        });


        return $content
            ->title('文章')
            ->description('文章列表')
            ->body($grid);

    }


    /**
     * @param Classify $classifyModel
     * @return Form
     */
    public function form()
    {

        $form = new Form(new Label());

        $classifyModel = new Classify();
        $class_select = $classifyModel->getClassList();

        $form->display('id', __('ID'));
        $form->text('title', __('文章标题'));
        $form->textarea('describe', __('描述'));
        $form->editor('content', __('内容'));
        $form->select('classify_id', __('分类名称'))->options($class_select);
        $form->select('labels', __('标签名称'))->options($class_select);

        $form->date('publish', __('发布时间'));
        $form->number('sort', __('排序'));
        $form->switch('display', __('是否展示'))->states([
            'on'  => ['value' => 1, 'text' => '打开', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => '关闭', 'color' => 'danger'],
        ]);


        return $form;

    }


}
