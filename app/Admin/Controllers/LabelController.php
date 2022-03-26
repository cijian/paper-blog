<?php

namespace App\Admin\Controllers;
use App\Models\Classify;
use App\Models\Label;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class LabelController extends BaseController
{
    protected function title()
    {
        return trans('admin.label');
    }
    /**
     * 列表
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        $grid = new Grid(new Label());

        $grid->column('id', __('ID'));
        $grid->column('label_name', __('标签名称'))->editable();
        $grid->column('sort', __('排序'))->editable();
        $grid->column('display', __('是否展示'))->switch(Label::DISPLAY);


        $grid->filter(function(Grid\Filter $filter){

            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            // 在这里添加字段过滤器
            $filter->like('label_name', '标签名称');

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
            ->title('标签管理')
            ->description('标签列表')
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
