@extends('animation.common.layout')


@section('js')
    @parent
    <script type="text/javascript" src="{{ asset('public/js/ajshowfan.js') }}"></script>
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
        <!--  新番表-->
        <div id="fanbiao">
            <div class="b-head">
                <ul class="clfix">
{{--                               <li class="on" day="0"><a href="#"><span>星期日</span></a></li>--}}
{{--                                <li class="" day="1"><a href="#"><span>星期一</span></a></li>--}}
{{--                                <li class="" day="2"><a href="#"><span>星期二</span></a></li>--}}
{{--                                <li class="" day="3"><a href="#"><span>星期三</span></a></li>--}}
{{--                                <li class="" day="4"><a href="#"><span>星期四</span></a></li>--}}
{{--                                <li class="" day="5"><a href="#"><span>星期五</span></a></li>--}}
{{--                                <li class="" day="6"><a href="#"><span>星期六</span></a></li>--}}
                </ul>
            </div>
            <div class="b-body">
                <ul class="showfan" data_root="{{ url('/') }}"  url="{{ route('animations.show') }}" data_url = {{ route('animations.detail') }}>


                </ul>
            </div>
        </div>

        <!--长篇连载区-->
        <div id="lianzai">
            <div class="lz_head">经典长篇连载</div>
            <div class="lz_m">
                @foreach($animation as $key => $value)
                    <div class="lz_ml">
                        <div class="lz_i">
                            <a href="{{ route('animations.detail',['id'=>$value->id]) }}">
                                <img src="{{ url('upload/xinfan/'.$value->fanimage) }}" />
                            </a>
                        </div>
                        <a class="lz_tile" href="{{ route('animations.detail',['id'=>$value->id]) }}">{{ $value->fanname }}</a>
                        <span>{{ $value->fanjishu }}话</span>
                    </div>
                @endforeach
            </div>

        </div>



        <!--     季度番介绍列表-->
        <div class="cl_b"> 季度番介绍列表 </div>
        <ul class="fanbiao_u">
            @foreach($data as $key => $value)
                <li class="poi">
                    <div class="p_i">
                        <a title="" href="{{ route('animations.info',['id'=>$value->id]) }}">
                            <img src="{{ asset('upload/fan/'.$value->fimage) }}">
                            <div class="mazhi">
                                 <span class="bg">
                                      <span class="s01">{{ $value->futitle }}</span>
                                      <span class="mask"></span>
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="jshao">
                        <h2><a href="{{ route('animations.info',['id'=>$value->id]) }}"> {{ $value->title }}</a></h2>
                        <div class="js_fjy">{{ $value->fany }}{{ $value->fantype['fantype']??'' }}</div>
                        <div class="js_t">时间:{{ date('Y-m-d H:i:s',$value->ftime) }}</div>
                        <div class="js_cot">{{ $value->fcontent }}</div>
                    </div>
                </li>

            @endforeach




        </ul>
        <div class="n_npage">{!! $data->links() !!} </div>
        <!--季度番上层遮罩-->
        <script type="text/javascript">
            pic_animate(".fanbiao_u",".bg",120,200);
            function pic_animate(classname,targetname,top1,top2){
                $('\"'+classname+'\" li a').mouseenter(function() {
                    $(this).find(targetname).animate({top: top1},400);
                }).mouseleave(function() {
                    $(this).find(targetname).animate({top: top2},400);
                });

            }


        </script>
    </div>

@endsection
