<?php

namespace App\Models\Animation;

use Illuminate\Database\Eloquent\Model;

class ManNumber extends Model
{
    protected $connection = 'dm_mysql';

    public $timestamps = false;

    protected $table ='mannumber';

    protected $fillable = [
        'nid',
        'newsname',
        'newsnumber',
        'allnumber',
    ];




}
