<?php

namespace App\Models\Animation;

use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
    protected $connection = 'dm_mysql';

    public $timestamps = false;

    protected $table ='pic';

    protected $fillable = [
        'title' ,
        'pic' ,
        'link' ,
        'display' ,
    ];




}
