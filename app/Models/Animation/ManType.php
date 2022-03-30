<?php

namespace App\Models\Animation;

use Illuminate\Database\Eloquent\Model;

class ManType extends Model
{
    protected $connection = 'dm_mysql';

    public $timestamps = false;

    protected $table ='mantype';

    protected $fillable = [
        'anname',

    ];


    public function manHua()
    {
        return $this->hasMany(ManHua::class,'type','id');

    }

}
