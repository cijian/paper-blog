<?php

namespace App\Http\Controllers;

use App\Models\Animation\News;
use Illuminate\Http\Request;

class NewController extends Controller
{

    private $data = [
        'now' => 2,
    ];


    public function index(Request $request)
    {
        $keyword = $request->input('s');

        $this->data['head'] = News::query()->where('display',1)->select(['id','title','timage'])->get();
        $this->data['data'] = News::query()->where(function ($query)use($keyword){
            if(!empty($keyword)){
                $query->orWhere('title','like',"%{$keyword}%")->orWhere('content','like',"%{$keyword}%");
            }
        })
            ->where('cid',2)->where('display',0)
            ->with(['attr'])
            ->orderBy('createtime','desc')->paginate($this->page_size);

        return view('animation.news.index',$this->data);
    }




    public function detail(Request $request)
    {
        $id = (int)$request->input('id','');
        if (empty($id)) {
            return redirect(route('animation.index'));
        }

        $this->data['data'] = News::query()->with(['attr','cate'])->find($id);
        if(empty($this->data['data'])){
            return redirect(route('animation.index'));
        }

        return view('animation.news.detail',$this->data);
    }


}
