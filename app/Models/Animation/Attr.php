<?php

namespace App\Models\Animation;

use Illuminate\Database\Eloquent\Model;

class Attr extends Model
{
    protected $connection = 'dm_mysql';

    public $timestamps = false;

    protected $table ='attr';

    protected $fillable = [
        'name',
        'color',
        'zid',
        'edittime',
        'createtime',
        'cid',
        'del',
        'display',

    ];




}
