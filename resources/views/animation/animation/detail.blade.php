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
        <div class="n_han"><div class="n_ty">{{ $animation->fanType['fantype'] }}</div>{{ $animation->fanname }}</div>
        <div class="n_t">发布时间：{{ $animation->fantime }}</div><div class="mzbf">每周星期{{ $animation->fan_day }}播放</div>
        <div class="n_c">{!! $animation->fanshow !!}</div>
        <div class="n_lb">
            <div class="n_lie">
                <div class="n_lt">BT列表</div>
            </div>
            <div class="n_lblink">
                <ul class="an_fshow">
                    @foreach($animation->fanShu as $key => $value)
                        <li>
                            <span>第{{ $value->number }}话</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            磁力链接：<a href="{$fs.link}">{{ $value->link }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <a class="n_bb" href="{{ route('animations') }}"><img src="{{ asset('public/img/back.png') }}" alt="返回" style="width: 100px; height: 80px;"/></a>
    </div>

@endsection
