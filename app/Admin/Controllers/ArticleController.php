<?php

namespace App\Admin\Controllers;
use App\Admin\Actions\Post\Restore;
use App\Admin\Extensions\ArticleExport;
use App\Models\Article;
use App\Models\Classify;
use App\Models\Label;
use Carbon\Carbon;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;

class ArticleController extends BaseController
{

    protected function title()
    {
        return trans('admin.article');
    }

    /**
     * 列表
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        $grid = new Grid(new Article());
        $ClassifyModel = new Classify();
        $labelModel = new Label();
        $label_list = $labelModel->getLabel();
        $class_list = $ClassifyModel->getClassList();

        $grid->column('id', __('ID'));
        $grid->column('title', __('文章标题'))->expand(function ($model) {

            $comments = $model->comments()->orderBy('created_at','desc')->take(10)->get()->map(function ($comment) {
                return $comment->only(['article_id', 'reply_id', 'first_reply_id', 'comment','created_at']);
            });

            return new Table(['ID', '内容', '发布时间'], $comments->toArray());
        });
        $grid->column('describe', __('描述'));
        $grid->column('classify.name', __('分类名称'));
        $grid->column('labels', __('标签'))->display(function ($label) {
            $label_str = '';
            foreach ($label as $key => $value){
                $label_str .= "<span class='label label-warning'>{$value['label_name']}</span>";
            }

            return $label_str;

        });

//        $grid->column('content', __('内容'));
        $grid->column('publish', __('发布时间'));
        $grid->column('sort', __('排序'));
        $grid->column('display', __('是否展示'))->switch(Article::DISPLAY);
        $grid->column('created_at', __('创建时间'))->display(function ($updated_at){
            return Carbon::parse($updated_at)->toDateTimeString();
        });
        $grid->column('updated_at', __('更新时间'))->display(function ($updated_at){
            return Carbon::parse($updated_at)->toDateTimeString();
        });


        $grid->filter(function(Grid\Filter $filter)use($class_list,$label_list){

            // 在这里添加字段过滤器
            $filter->like('title', '文章标题');
            $filter->equal('classify_id', '分类')->select($class_list);
            $filter->between('publish', '发布时间')->date();

            $filter->where(function ($query)use($label_list) {
                switch ($this->input) {
                    case 'yes':
                        // custom complex query if the 'yes' option is selected
                        $query->has('somerelationship');
                        break;
                    case 'no':
                        $query->doesntHave('somerelationship');
                        break;
                }
            }, '标签', 'label_id')->checkbox($label_list);

            // 范围过滤器，调用模型的`onlyTrashed`方法，查询出被软删除的数据。
            $filter->scope('trashed', '回收站')->onlyTrashed();
        });

        $grid->model()->orderBy('sort','asc');


        $grid->actions(function (Grid\Displayers\Actions $actions) {


            if (\request('_scope_') == 'trashed') {
                $actions->add(new Restore());
                $actions->disableDelete();

                $actions->disableEdit();

                $actions->disableView();
            }
        });

//        $grid->export(function (Grid\Exporters\CsvExporter $export) {
//
//            $export->filename('文章');
//
//            $export->originalValue(['title','content']);
//
//        });
        $grid->exporter(new ArticleExport());


//        $grid->batchActions(function (Grid\Tools\BatchActions $batch) {
//            $batch->disable(true);
//        });



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

        $form = new Form(new Article());

        $classifyModel = new Classify();
        $labelModel = new Label();
        $class_select = $classifyModel->getClassList();
        $label_select = $labelModel->getLabel();

        $form->display('id', __('ID'));
        $form->text('title', __('文章标题'))->required();
        $form->textarea('describe', __('描述'))->required();
        $form->editor('content', __('内容'))->required();
        $form->select('classify_id', __('分类名称'))->options($class_select)->required();
        $form->checkbox('labels', __('标签名称'))->options($label_select);

        $form->date('publish', __('发布时间'))->required();
        $form->number('sort', __('排序'))->required();
        $form->switch('display', __('是否展示'))->states([
            'on'  => ['value' => 1, 'text' => '打开', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => '关闭', 'color' => 'danger'],
        ])->required();


        return $form;

    }

    public function detail($id)
    {
        $show = new Show(Article::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('title', __('文章标题'));
        $show->field('describe', __('描述'));
        $show->field('classify.name', __('分类名称'));
        $show->field('labels', __('标签'))->unescape()->as(function ($label) {
            $label_str = '';
            foreach ($label as $key => $value){
                $label_str .= "<span class='label label-warning'>{$value['label_name']}</span>";
            }
            return $label_str;

        });

        $show->field('content', __('内容'))->unescape();
        $show->field('publish', __('发布时间'));
        $show->field('sort', __('排序'));
        $show->field('display', __('是否展示'))->unescape()->as(function ($display) {
            return $display == 1?"<span class='label label-success'>是</span>":"<span class='label label-warning'>否</span>";
        });
        $show->field('created_at', __('创建时间'))->display(function ($updated_at){
            return Carbon::parse($updated_at)->toDateTimeString();
        });
        $show->field('updated_at', __('更新时间'))->display(function ($updated_at){
            return Carbon::parse($updated_at)->toDateTimeString();
        });


        return $show;
    }


}
