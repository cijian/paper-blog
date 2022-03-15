<?php

namespace App\Models;


class ArticleLabel extends Base
{
    protected $table ='article_label';
    protected $fillable = [
        'article_id',
        'label_id',
    ];

}
