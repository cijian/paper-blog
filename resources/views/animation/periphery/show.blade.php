@extends('animation.common.layout')


@section('js')
    @parent

@endsection
@section('content')

    <!--右上导航栏-->
    <!--右上导航栏-->
    <div id="r_head">
        <div class="r_h_img"> <img src="{{ asset('public/image/nav_fan2.png') }}" />
            <div class="r_h_s" style="color: #ffffff">动漫周边</div>
        </div>
        <div class="nav">
            <div style="position: relative;" class="cover-page-wrapper cover-page-wrapper2 clearfix">
                @include('animation.common.cate')
                @include('animation.periphery.search')
            </div>
        </div>

    </div>
    <div id="c_main">
            <div class="n_h"><div class="n_ty">{{ $periphery['cate']->name }}</div>{{ $periphery->title }}<</div>
            <div class="n_t"> {{ date('Y-m-d H:i:s',$periphery->createtime) }}</div>
            <div class="n_zy">
                摘要： @foreach($periphery['attr'] as $k => $v)
                    <a href="#" style="color: {{ $v->color }}">{{ $v->name }}</a>/
                @endforeach
            </div>
            <div class="n_c">{!! $periphery->content !!}</div>

        <a class="n_bb" href="{{ route('periphery') }}"><img src="{{ asset('public/img/back.png') }}" alt="返回" style="width: 100px; height: 80px;"/></a>
    </div>

@endsection
