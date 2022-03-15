<?php

namespace App\Models;


class Label extends Base
{
    protected $table ='classify';
    protected $fillable = [
        'label_name',
        'sort',
        'display',
    ];

}
