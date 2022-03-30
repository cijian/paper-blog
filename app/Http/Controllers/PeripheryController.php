<?php

namespace App\Http\Controllers;

use App\Models\Animation\Attr;
use App\Models\Animation\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeripheryController extends Controller
{

    private $data = [
        'now' => 5,
    ];


    public function index(Request $request)
    {
        $this->data['keyword'] = $request->input('s');
        $this->data['select'] = (int)$request->input('fl');
        $this->data['attr'] = Attr::query()->where('zid',1)->get();


        return view('animation.periphery.index',$this->data);
    }




    public function ajax(Request $request){

        $t = intval($request->input('fl'));
        $s = $request->input('s');
        $pageSize = 9;

        $new = News::query()->select([
            'id',
            'title',
            'timage',
            'edittime',
            DB::raw("FROM_UNIXTIME(createtime, '%Y-%m-%d') as createtime"),
            'cid',
            'del',
            'display',
        ])
            ->when(!empty($s),function ($query)use($s){
            $query->where('title','like','%'.$s.'%');
        })
            ->when(!empty($t),function ($query)use($t){
            $query->whereHas('attr',function ($query)use($t){
                $query->where('aid',$t);
            });
        })
            ->orderBy('createtime','desc')
            ->paginate($pageSize);

        return response($new);
    }




    public function show(Request $request){
        $id = $request->input('id');
        if(empty($id)) {
            return redirect(route('periphery'));
        }

        $this->data['periphery'] = News::query()->with(['cate','attr'])->find($id);

        return view('animation.periphery.show', $this->data);
    }




}
