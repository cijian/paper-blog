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


}
