<?php

namespace App\Models;


class Classify extends Base
{

    const DISPLAY = [
        0 => '否',
        1 => '是',
    ];

    protected $table ='classify';
    protected $fillable = [
        'name',
        'sort',
        'display',
    ];


}
