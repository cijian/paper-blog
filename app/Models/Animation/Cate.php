<?php

namespace App\Models\Animation;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected $connection = 'dm_mysql';

    public $timestamps = false;

    protected $table ='cate';

    protected $fillable = [
        'name',
        'rname',
        'action',
        'pid',
        'sort',
        'display',
    ];




}
