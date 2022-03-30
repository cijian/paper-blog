@extends('animation.common.layout')


@section('js')
    @parent
@endsection
@section('content')

    <!--右上导航栏-->
    <div id="r_head">
        <div class="r_h_img"> <img src="{{ asset('public/image/nav_fan2.png') }}" />
            <div class="r_h_s" style="color: #ffffff">动漫周边</div>
        </div>
        <div class="nav">
            <div style="position: relative;" class="cover-page-wrapper cover-page-wrapper2 clearfix">
                @include('animation.common.cate')

                @include('animation.music.search')
            </div>
        </div>

    </div>
    <div id="c_main">
            <div class="n_h"><div class="n_ty">{{ $music['MType']->name }}</div>{{ $music->title }}</div>
            <div class="n_t">发布时间：{{ date('Y-m-d H:i:s',$music->stime) }}</div>
            <div style="font-size:20px;width:92%;margin-left: 4%; margin-top:20px; float:left;height:40px;">
                内容：</div>
            <div class="n_c">{!! $music->content !!}</div>
            <div class="n_lb">
                <div class="n_lie">
                    <div class="n_lt">BT列表</div>
                </div>
                <div class="n_lblink">
                    <a href="{{ $music->link }}">{{ $music->link }}</a>&nbsp;&nbsp;&nbsp;&nbsp;大小：{{ $music->mx/1024>=1?number_format(($music->mx/1024),2).'GB':$music->mx.'MB' }}
                </div>
            </div>
        <a class="n_bb" href="{{ route('music') }}"><img src="{{asset('public/img/back.png')}}" alt="返回" style="width: 100px; height: 80px;"/></a>
    </div>
    <div id="foot"></div>



@endsection
