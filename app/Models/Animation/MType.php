<?php

namespace App\Models\Animation;

use Illuminate\Database\Eloquent\Model;

class MType extends Model
{
    protected $connection = 'dm_mysql';

    public $timestamps = false;

    protected $table ='mtype';

    protected $fillable = [
        'name',

    ];


}
