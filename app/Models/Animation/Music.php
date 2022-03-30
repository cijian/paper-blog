<?php

namespace App\Models\Animation;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $connection = 'dm_mysql';

    public $timestamps = false;

    protected $table ='music';

    protected $fillable = [
        'title' ,
        'link' ,
        'mx' ,
        'content' ,
        'stime' ,
        'type' ,

    ];


    public function MType()
    {
        return $this->hasOne(MType::class,'id','type');
    }

}
