<?php

namespace App\Models\Animation;

use Illuminate\Database\Eloquent\Model;

class FanType extends Model
{
    protected $connection = 'dm_mysql';

    public $timestamps = false;

    protected $table ='fantype';

    protected $fillable = [
        'fantype',

    ];




}
