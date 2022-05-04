<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Label;
use App\Models\LeaveMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{

    /**
     * 主页查询
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = trim($request->input('keyword'));
        $label_id = (int)$request->input('label_id');
        $classify_id = (int)$request->input('classify_id');


        $model = Article::query()->when($keyword,function($query)use($keyword){
            $query->where('title','like',"%$keyword%");
        })->when($classify_id,function($query)use($classify_id){
            $query->where('classify_id',$classify_id);
        })->with(['labels']);

        if($label_id){
            $model = $model->whereHas('labels',function($query)use($label_id){
                $query->where('id',$label_id);
            });
        }

        $data =  $model->paginate(4);

        return response($data);

    }


    public function labels()
    {
        $data = Label::query()->where('display',1)->get();

        return response($data);
    }



    /**
     * 详情
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function detail(Request $request)
    {
        $id = (int)$request->input('id');
        if($id <= 0){
            return response([],302);
        }

        $detail = Article::query()->with(['labels','comments'])->find($id);

        return response($detail);

    }


    public function comment(Request $request)
    {

        $validatedData = Validator::make($request->all(), [
            'article_id' => 'required|integer',
//            'reply_id' => 'required',
//            'first_reply_id' => 'required',
            'comment' => 'required',
        ],[
            'article_id.required' => 'article_id格式错误',
            'article_id.integer' => 'article_id格式错误',
            'first_reply_id.required' => 'first_reply_id格式错误',
            'comment.required' => '内容格式错误',
        ]);

        if ($validatedData->fails()) {
            return response($validatedData->errors()->first(),500);
        }

        $param['article_id'] = $request->input('article_id');
        $param['comment'] = $request->input('comment');
        $param['first_reply_id'] = 0;
        $param['reply_id'] = 0;

        $result = LeaveMessage::query()->create($param);

        if($result){
            return response(['code'=>200]);
        }

        return response(['code'=>0,'msg'=>'添加留言失败']);
    }

}
