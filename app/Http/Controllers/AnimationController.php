<?php

namespace App\Http\Controllers;

use App\Models\Animation\DongMan;
use App\Models\Animation\FanShow;
use Illuminate\Http\Request;

class AnimationController extends Controller
{

    private $data = [
        'now' => 3,
    ];


    public function index(Request $request)
    {

        $this->data['data'] = FanShow::query()->orderBy('ftime','desc')->paginate(1);
        $this->data['animation'] = DongMan::query()->where('fany',0)->where('fantype',5)
            ->limit(6)->get();

        return view('animation.animation.index',$this->data);
    }




    public function info(Request $request)
    {
        $id = $request->input('id');
        if(empty($id)){
            return redirect(route('animations'));
        }

        $fan_show = FanShow::query()->with(['fanType'])->find($id);
        if(empty($fan_show)){
            return redirect(route('animations'));
        }

        $animation = DongMan::query()
            ->select(['id','fanname','fanimage','fanjishu','fanshow'])
            ->where('fantype',$fan_show->fanj)
            ->where('fany',$fan_show->fany)
            ->get();

        $this->data['animation'] = $animation;
        $this->data['fan_show'] = $fan_show;

        return view('animation.animation.info',$this->data);
    }


    public  function  detail(Request $request){

        $id = $request->input('id');
        if(empty($id)){
            return redirect(route('animations'));
        }

        $animation = DongMan::query()->select(['id','fanname','fanjishu','fanshow','fantime','fantype','fdays'])
            ->with(['fanType','fanShu'])
            ->find($id);

        if(empty($animation)){
            return redirect(route('animations'));
        }
        $animation->fan_day = DongMan::FAN_DAY[$animation->fdays]??'';


        $this->data['animation'] = $animation;

        return view('animation.animation.detail',$this->data);

    }



    public function show(Request $request){
        $day = (int)$request->input('day');

        $data = DongMan::query()
            ->select(['id','fanname','fanimage'])
            ->with(['fanShuMax'=>function($query){
            return $query;
        }])->where('display',1)
            ->where('fdays',$day)->get();


        return response($data);

    }


}
