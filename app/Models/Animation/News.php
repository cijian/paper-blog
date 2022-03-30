<?php

namespace App\Models\Animation;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $connection = 'dm_mysql';

    public $timestamps = false;

    protected $table ='news';

    protected $fillable = [
        'title',
        'timage',
        'content',
        'edittime',
        'createtime',
        'cid',
        'del',
        'display',
    ];

    public function attr()
    {
        return $this->belongsToMany(Attr::class, NewAttr::class,'nid','aid');

    }


    public function cate()
    {
        return $this->hasOne(Cate::class,'id','cid');

    }

}
