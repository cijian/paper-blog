<?php

namespace App\Models;


class Classify extends Base
{

    protected $table ='classify';
    protected $fillable = [
        'name',
        'sort',
        'display',
    ];


}
