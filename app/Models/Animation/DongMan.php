<?php

namespace App\Models\Animation;

use Illuminate\Database\Eloquent\Model;

class DongMan extends Model
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

    protected $table ='dongman';

    protected $fillable = [
        'fanname',
        'fanimage',
        'fanjishu',
        'fanshow',
        'fantime',
        'fantype',
        'fdays',
        'display',
    ];


    public function fanShuMax()
    {
        return $this->hasOne(Fanshu::class,'fid','id')->orderBy('number','desc')->oldest('number');

    }

    public function fanShu()
    {
        return $this->hasMany(Fanshu::class,'fid','id')->orderBy('number','asc');

    }


    public function fanType()
    {
        return $this->hasOne(FanType::class,'id','fantype');

    }

}
