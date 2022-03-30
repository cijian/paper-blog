<?php

namespace App\Models\Animation;

use Illuminate\Database\Eloquent\Model;

class FanShow extends Model
{
    protected $connection = 'dm_mysql';

    public $timestamps = false;

    protected $table ='fanshow';

    protected $fillable = [
        'title',
        'futitle',
        'fcontent',
        'fimage',
        'ftime',
        'fanj',
        'fany',
        'display',

    ];


    public function fanType()
    {
        return $this->hasOne(FanType::class,'id','fanj');

    }



}
