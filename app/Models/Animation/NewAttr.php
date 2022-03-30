<?php

namespace App\Models\Animation;

use Illuminate\Database\Eloquent\Model;

class NewAttr extends Model
{
    protected $connection = 'dm_mysql';

    public $timestamps = false;

    protected $table ='new_attr';

    protected $fillable = [
        'nid',
        'aid',
    ];




}
