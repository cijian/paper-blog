<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\RowAction;

class Comment extends RowAction
{
    public $name = '查看评论';

    /**
     * @return  string
     */
    public function href()
    {
        return route('admin.comment.index').'?article_id='.$this->getKey();
    }

}