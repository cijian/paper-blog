<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ArticleLabel extends Model
{
    protected $table ='article_label';
    public $timestamps = false;
    protected $fillable = [
        'article_id',
        'label_id',
    ];

}
