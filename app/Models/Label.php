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

}
