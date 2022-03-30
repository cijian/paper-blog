<?php

namespace App\Http\Controllers;

use App\Models\Animation\Cate;
use App\Models\Animation\Pic;

class IndexController extends Controller
{

    public function index()
    {

        $data['cate'] = Cate::query()->where('name','<>','首页')->select(['name','rname','action'])
            ->orderBy('sort','asc')->get();
        $data['pic'] = Pic::query()->select(['title','pic','link'])->where('display',1)->get();



        return view('animation.index.index',$data);

    }
}
