<?php

namespace App\Models\Animation;

use Illuminate\Database\Eloquent\Model;

class FanShu extends Model
{
    protected $connection = 'dm_mysql';

    public $timestamps = false;

    protected $table ='fanshu';

    protected $fillable = [
        'fid',
        'number',
        'link',

    ];




}
