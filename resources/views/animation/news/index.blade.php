@extends('animation.common.layout')


@section('js')
    @parent
    <script src="{{asset('public/js/jquery.cxscroll.js')}}"></script>
    <script type="text/javascript">

        $(document).ready(function(){
            $(".new_li").mouseenter(function() {
                $(this).css("margin-left","50px");
            }).mouseleave(function() {
                $(this).css("margin-left","20px");
            });

        });


    </script>
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

            <div class="wrap">
                <div id="pic_list_1" class="scroll_horizontal">
                    <div class="box">
                        <ul class="list">
                            @foreach ($head as $key => $value)
                                <li><a href="{{ route('news.detail',['id'=>$value->id]) }}"><img src="{{ url('upload/news/'.$value->timage) }}" >
                                        <div class="list_n">{{ $value->title }}</div></a></li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="plus"></div>
                    <div class="minus"></div>
                </div>
                <script type="text/javascript">
                    $("#pic_list_1").cxScroll({direction:"right",speed:500,time:1000,plus:true,minus:true});
                </script>
            </div>

            <div class="cl_b"> 最新资讯</div>

            @foreach($data as $k => $v)
                <div class="zuixin" >
                    <div class="new_li">
                        <div class="new_img">
                            <a href="{{ route('news.detail',['id'=>$v->id]) }}"><img src="{{ url('upload/news/'.$v->timage) }}" /></a>
                        </div>
                        <div class="new_til">
                            <a href="{{ route('news.detail',['id'=>$v->id]) }}"> {{ $v->title }}</a>
                        </div>
                        <div class="new_t">
                            {{ date('Y-m-d H:i:s',$v->createtime) }}
                        </div>
                        <div class="new_shu">
                            摘要：
                            @foreach($v['attr'] as $kk => $vv)
                                <a href="{{ route('news',['aid'=>$vv->id]) }}">
                                    <span style="color: {{ $vv->color }}">{{$vv->name}}</span>
                                </a>/
                            @endforeach
                        </div>
                        <div class="new_con">{!! mb_substr(strip_tags($v->content),0,60,'utf-8')."..." !!}</div>
                        <div class="new_c">
                            <a class="ck" href="{{ route('news.detail',['id'=>$v->id]) }}"> 查看详情</a>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="n_npage">
                {!! $data->links() !!}
            </div>
        </div>

@endsection
