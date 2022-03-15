<?php

namespace App\Admin\Controllers;
use Encore\Admin\Table;

class ClassifyController extends BaseController
{

    public function index(Content $content)
    {
        $table = new Table(new Post);

        $table->column('id', 'id')->sortable();
        $table->column('title');
        $table->column('content');

        $table->column('comments', '评论数')->display(function ($comments) {
            $count = count($comments);
            return "<span class='label label-warning'>{$count}</span>";
        });

        return $table;
    }



}
