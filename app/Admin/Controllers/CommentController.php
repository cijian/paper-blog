<?php

namespace App\Admin\Controllers;
use App\Models\Article;
use App\Models\LeaveMessage;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Show;
use Encore\Admin\Tree;
use Encore\Admin\Widgets\Box;
use Illuminate\Http\Request;
use Encore\Admin\Form;

class CommentController extends BaseController
{

    protected function title()
    {
        return trans('admin.comment');
    }


    /**
     * @param Content $content
     * @param Request $request
     * @return Content
     */
    public function index(Content $content)
    {
        $request = Request();
        $article_id = $request->input('article_id');
        return $content
            ->title(trans('admin.comment'))
            ->description(trans('admin.comment'))
            ->row($this->article($article_id)->render())
            ->row(function (Row $row)use($article_id){
                $row->column(6, $this->treeView($article_id)->render());

                $row->column(6, function (Column $column)use($article_id) {
                    $form = new \Encore\Admin\Widgets\Form();
                    $form->action(admin_url('comment'));

                    $form->select('reply_id', __('评论回复'))->options(LeaveMessage::selectOptions(function($query)use($article_id){
                        return $query->where('article_id',$article_id);
                    }));
                    $form->hidden('article_id')->default($article_id);
                    $form->textarea('comment', __('评论'))->required();

//                    $form->hidden('_token')->default(csrf_token());

                    $column->append((new Box(trans('admin.new'), $form))->style('success'));
                });
            });
    }


    /**
     * @param $id
     * @return Show
     */
    public function article($id)
    {
        $show = new Show(Article::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('title', __('文章标题'));
//        $show->field('describe', __('描述'));
        $show->field('classify.name', __('分类名称'));
        $show->field('labels', __('标签'))->unescape()->as(function ($label) {
            $label_str = '';
            foreach ($label as $key => $value){
                $label_str .= "<span class='label label-warning'>{$value['label_name']}</span>";
            }
            return $label_str;

        });

//        $show->field('content', __('内容'))->unescape();
        $show->field('publish', __('发布时间'));
//        $show->field('sort', __('排序'));
//        $show->field('display', __('是否展示'))->unescape()->as(function ($display) {
//            return $display == 1?"<span class='label label-success'>是</span>":"<span class='label label-warning'>否</span>";
//        });
//        $show->field('created_at', __('创建时间'))->as(function ($updated_at){
//            return Carbon::parse($updated_at)->toDateTimeString();
//        });
//        $show->field('updated_at', __('更新时间'))->as(function ($updated_at){
//            return Carbon::parse($updated_at)->toDateTimeString();
//        });

        $show->panel()
            ->tools(function ($tools) {
                $tools->disableEdit();
                $tools->disableList();
                $tools->disableDelete();
            });

        return $show;
    }



    public function form()
    {

        $form = new Form(new LeaveMessage());

        $form->select('reply_id', __('回复'))->options(LeaveMessage::selectOptions());
        $form->hidden('article_id');
        $form->hidden('first_reply_id');
        $form->textarea('comment', __('评论'))->required();

        $form->saving(function (Form $form) {
            $leave_message = LeaveMessage::query()->find($form->reply_id);
            if($leave_message){
                $form->first_reply_id = $leave_message->first_reply_id == 0?$leave_message->id:$leave_message->first_reply_id;
            }else{
                $form->first_reply_id = 0;
            }

        });

        $form->saved(function (Form $form) {

            // 跳转页面
            return redirect(route('admin.comment.index').'?article_id='.$form->model()->article_id);

        });

        return $form;

    }



    /**
     * @param $article_id
     * @return Tree
     */
    protected function treeView($article_id)
    {
        $menuModel = new LeaveMessage();

        $tree = new Tree($menuModel);

        $tree->disableCreate();
        $tree->disableSave();

        $tree->query(function ($model)use($article_id) {
            return $model->where('article_id', $article_id);
        });

        $tree->branch(function ($branch) {
            $payload = "<strong>{$branch['comment']}</strong>";

            return $payload;
        });

        return $tree;
    }
}
