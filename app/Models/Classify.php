<?php

namespace App\Models;


class Classify extends Base
{

    const DISPLAY = [
        1 => '是',
        0 => '否',
    ];

    protected $table ='classify';
    protected $fillable = [
        'name',
        'sort',
        'display',
    ];

    public function scopeDisplay($query,$display = 1)
    {
        return $query->where('display',$display);
    }


    public function getClassList()
    {
        return self::query()->display()->pluck('name','id');
    }


}
