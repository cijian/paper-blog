<?php

namespace App\Models;


class LeaveMessage extends Base
{
    protected $table ='leave_message';
    protected $fillable = [
        'article_id',
        'reply_id',
        'first_reply_id',
        'comment',
    ];

}
