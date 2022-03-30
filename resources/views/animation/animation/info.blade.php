@extends('animation.common.layout')


@section('js')
    @parent

@endsection
@section('content')

    <!--右上导航栏-->
    <div id="r_head">
        <div class="r_h_img"> <img src="{{asset('public/image/nav_fan3.png')}}" />
            <div class="r_h_s" style="color: #ffffff;">新番资讯</div>
        </div>
        <div class="nav">
            <div style="position: relative;" class="cover-page-wrapper cover-page-wrapper2 clearfix">
                @include('animation.common.cate')
            </div>
        </div>

    </div>


    <div id="c_main">
        <div class="n_han"><div class="n_ty">新番资讯</div>{{$fan_show->title}}</div>
        <div class="n_t">发布时间：{{ date('Y-m-d H:i:s',$fan_show->ftime) }}</div><div class="mzbf">{{ $fan_show->futitle }}</div>
        <div class="n_c">{{ $fan_show->fcontent }}</div>
        <div class="flb_h">&nbsp;&nbsp;&nbsp;&nbsp;{{$fan_show->fany}}年{{$fan_show->fant_ype['type']??''}}</div>
        <div class="flb_bg">
            @foreach($animation as $key => $value)
                <div id="flb_bl">
                    <div  id="flb_img">
                        <a href="{{ route('animation.detail',['id'=>$value['id']]) }}">
                            <img src="{{ asset('upload/xinfan/'.$value->fanimage) }}" alt=""/>
                        </a>
                    </div>
                    <div id="flb_fcon">
                        <div id="flb_ftitle"><a href="{{ route('animations.detail',['id'=>$value['id']]) }}">{{$value->fanname}}</a></div>
                        <div id="flb_fjishu">预计集数:{{$value->fanjishu}}</div>
                        <div id="flb_fc">{!! strip_tags($value->fanshow,'') !!}</div>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="n_bb" href="{{ route('animations') }}"><img src="{{ asset('public/img/back.png') }}" alt="返回" style="width: 100px; height: 80px;"/></a>
    </div>

@endsection
