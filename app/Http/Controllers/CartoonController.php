<?php

namespace App\Http\Controllers;

use App\Models\Animation\ManHua;
use App\Models\Animation\ManType;
use Illuminate\Http\Request;

class CartoonController extends Controller
{

    private $data = [
        'now' => 4,
    ];


    public function index(Request $request)
    {
        $keyword = $request->input('s');
        session(['mh'=> $keyword]);

        $cartoon = ManType::query()
            ->get()->each(function ($item){

                $data = ManHua::query()->select(['id','animation','animage','newstime','type'])
                        ->where('type',$item->id)
                        ->where('display',1)
                        ->orderBy('newstime','desc')
                        ->with(['manNumber'=>function($query){
                            $query->select(['id','newsname','newsnumber','allnumber','nid']);
                        }])->limit(8)->get()->toArray();
                $item['manHua'] = $data;

            });
        $new_create = ManHua::query()->select(['id','animation','animage','newstime'])
            ->with(['manType','manNumber'=>function($query){
                $query->select(['id','newsname','newsnumber','allnumber','nid']);
            }])
            ->limit(14)
            ->get();

        $this->data['cartoon'] = $cartoon;
        $this->data['new'] = $new_create;

        return view('animation.cartoon.index',$this->data);
    }




    public function ajaxManHua(Request $request){

        $mh = $request->input('mh');

        $pageSize = 16;

        $list = ManHua::query()->select(['id','animation','animage','newstime'])
            ->when(!empty($mh),function ($query)use($mh){
                $query->where('animation','like', "%{$mh}%");
            })
            ->with(['manType','manNumber'=>function($query){
                $query->select(['id','newsname','newsnumber','allnumber','nid']);
            }])
            ->paginate($pageSize);

        return response($list);
    }


}
