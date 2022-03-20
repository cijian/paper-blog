<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Article extends Base
{
    protected $table ='classify';

    protected $fillable = [
        'classify_id',
        'title',
        'describe',
        'content',
        'publish',
        'sort',
        'display',
    ];


    public function classify()
    {
        return $this->hasOne(Classify::class,'id','classify_id');
    }


    public function labels()
    {
        return $this->belongsToMany(Label::class, ArticleLabel::class,'article_id','label_id');
    }

}
