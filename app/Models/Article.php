<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Article extends Base
{

    const DISPLAY = [
        1 => '是',
        0 => '否',
    ];

    protected $table ='article';

    protected $fillable = [
        'classify_id',
        'title',
        'describe',
        'content',
        'publish',
        'sort',
        'display',
    ];


    protected $casts = [
        'created_at'   => 'date:Y-m-d H:i:s',
    ];

    public function classify()
    {
        return $this->hasOne(Classify::class,'id','classify_id');
    }


    /**
     * 标签关联关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function labels()
    {
        return $this->belongsToMany(Label::class, ArticleLabel::class,'article_id','label_id');
    }


    /**
     * 留言关联关系
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(LeaveMessage::class,'article_id','id');
    }

}
