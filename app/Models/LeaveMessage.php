<?php

namespace App\Models;


use Encore\Admin\Traits\ModelTree;

class LeaveMessage extends Base
{
    use ModelTree;

    protected $table ='leave_message';
    protected $fillable = [
        'article_id',
        'reply_id',
        'first_reply_id',
        'comment',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('reply_id');
        $this->setOrderColumn('created_at');
        $this->setTitleColumn('comment');
    }


    public function article()
    {
        return $this->hasOne(Article::class,'id','article_id');
    }

}
