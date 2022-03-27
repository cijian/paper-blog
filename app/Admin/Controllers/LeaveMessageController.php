<?php

namespace App\Admin\Controllers;
use App\Admin\Actions\Post\Restore;
use App\Models\Article;
use App\Models\LeaveMessage;
use Carbon\Carbon;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class LeaveMessageController extends BaseController
{

    protected function title()
    {
        return trans('admin.leave_message');
    }

    /**
     * 列表
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        $grid = new Grid(new LeaveMessage());


        $grid->column('id', __('ID'));
        $grid->column('article.title', __('文章标题'))->link(function($row){
            return route('admin.comment.index').'?'.http_build_query(['article_id'=>$row->article_id]);
        },'_self');

        $grid->column('comment', __('评论'));
        $grid->column('created_at', __('创建时间'))->display(function ($updated_at){
            return Carbon::parse($updated_at)->toDateTimeString();
        });
        $grid->column('updated_at', __('更新时间'))->display(function ($updated_at){
            return Carbon::parse($updated_at)->toDateTimeString();
        });


        $grid->filter(function(Grid\Filter $filter){

            // 在这里添加字段过滤器
            $filter->like('title', '文章标题');
            $filter->between('publish', '发布时间')->date();


            // 范围过滤器，调用模型的`onlyTrashed`方法，查询出被软删除的数据。
            $filter->scope('trashed', '回收站')->onlyTrashed();
        });

        $grid->model()->orderBy('article_id','asc')->orderBy('created_at','desc');


        $grid->actions(function (Grid\Displayers\Actions $actions) {


            if (\request('_scope_') == 'trashed') {
                $actions->add(new Restore());
                $actions->disableDelete();

                $actions->disableEdit();

                $actions->disableView();
            }
        });

        $grid->disableExport();



        return $content
            ->title('留言信息')
            ->description('列表')
            ->body($grid);

    }


    public function form()
    {

        $form = new Form(new LeaveMessage());
        $article = Article::query()->pluck('title','id')->toArray();

        $form->display('id', __('ID'));
        $form->select('article_id', __('文章标题'))->options($article)->required();
        $form->textarea('comment', __('评论'))->required();

        return $form;

    }




    public function detail($id)
    {
        $show = new Show(LeaveMessage::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('article.title', __('文章标题'));
        $show->field('article.describe', __('描述'));
        $show->field('article.classify', __('分类名称'))->as(function ($classify){
            return $classify->name??'';
        });;
        $show->field('article.labels', __('标签'))->unescape()->as(function ($label) {
            $label_str = '';
            foreach ($label as $key => $value){
                $label_str .= "<span class='label label-warning'>{$value['label_name']}</span>";
            }
            return $label_str;

        });

        $show->field('article.content', __('内容'))->unescape();
        $show->field('article.publish', __('发布时间'));
        $show->field('article.sort', __('排序'));
        $show->field('commnet', __('评论'));

        $show->field('created_at', __('创建时间'))->as(function ($updated_at){
            return Carbon::parse($updated_at)->toDateTimeString();
        });
        $show->field('updated_at', __('更新时间'))->as(function ($updated_at){
            return Carbon::parse($updated_at)->toDateTimeString();
        });


        return $show;
    }






}
