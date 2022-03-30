<?php

namespace App\Models\Animation;

use Illuminate\Database\Eloquent\Model;

class ManHua extends Model
{
    const FAN_DAY = [
       0 => '日',
       1 => '一',
       2 => '二',
       3 => '三',
       4 => '四',
       5 => '五',
       6 => '六',
    ];

    protected $connection = 'dm_mysql';

    public $timestamps = false;

    protected $table ='manhua';

    protected $fillable = [
        'animation',
        'animage',
        'createtime',
        'newstime',
        'display',
        'type',
    ];



    public function manNumber()
    {
        return $this->hasOne(ManNumber::class,'nid','id');

    }


    public function manType()
    {
        return $this->hasOne(ManType::class,'id','type');

    }

}
