@extends('animation.common.layout')


@section('js')
    @parent
@endsection
@section('content')

    <!--右上导航栏-->
    <div id="r_head">
        <div class="r_h_img"> <img src="{{asset('public/image/nav_fan4.png')}}" />
            <div class="r_h_s">新闻资讯</div>
        </div>
        <div class="nav">
            <div style="position: relative;" class="cover-page-wrapper cover-page-wrapper2 clearfix">
                @include('animation.common.cate')
                @include('animation.news.search')

            </div>
        </div>

    </div>

    <div id="c_main">
        <div class="n_h"><div class="n_ty">{{ $data->cate['name']??'' }}</div>{{ $data->title }}</div>
        <div class="n_t"> 发布时间：{{ date('Y-m-d H:i:s', $data->createtime) }}</div>
        <div class="n_zy">
            摘要：@foreach($data['attr'] as $key => $value)
                <a href="#" style="color: {{ $value->color }}">{{ $value->name }}</a>/
            @endforeach
        </div>
        <div class="n_c">{!! $data->content  !!}</div>

        <a class="n_bb" href="{{route('news')}}"><img src="{{asset('public/img/back.png')}}" alt="返回" style="width: 100px; height: 80px;"/></a>
    </div>

@endsection

