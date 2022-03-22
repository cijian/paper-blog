<?php

namespace App\Models;


class Label extends Base
{
    protected $table ='label';

    const DISPLAY = [
        1 => '是',
        0 => '否',
    ];


    protected $fillable = [
        'label_name',
        'sort',
        'display',
    ];


    public function scopeDisplay($query,$display = 1)
    {
        return $query->where('display',$display);
    }


    public function getLabel()
    {
        return self::query()->display()->pluck('label_name','id');
    }


}
