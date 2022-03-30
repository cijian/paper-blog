<?php

namespace App\Http\Controllers;

use App\Models\Animation\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{

    private $data = [
        'now' => 6,
    ];

    public $page_size = 20;


    public function index(Request $request)
    {
        $s = $request->input('s');
        $type = $request->input('type');
        $order = $request->input('order');

        $sort = [
          1 => 'stime',
          2 => 'type',
          3 => 'title',
          4 => 'mx',
        ];

        $music = Music::query()->with('MType')
        ->when(!empty($s),function($query)use ($s){
            $query->where('title','like',"%{$s}%");
        })
        ->when(!empty($type),function($query)use ($type){
            $query->where('type',$type);
        });
        if(isset($sort[$order])){
            $music = $music->orderBy($sort[$order]);
        }

        $this->data['music'] = $music->paginate($this->page_size);
        $this->data['type'] = $type;
        $this->data['order'] = $order;

        return view('animation.music.index',$this->data);
    }







    public function show(Request $request){

        $id = $request->input('id');
        if(empty($id)) {
            return redirect(route('music'));
        }

        $this->data['music'] = Music::query()->with(['MType'])->find($id);

        return view('animation.music.show', $this->data);
    }




}
