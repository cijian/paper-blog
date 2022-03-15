<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Base
{
    protected $table ='classify';
    protected $fillable = [
        'name',
        'sort',
        'display',
    ];

}
