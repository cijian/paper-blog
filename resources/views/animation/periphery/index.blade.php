@extends('animation.common.layout')


@section('js')
    @parent
    <script type="text/javascript" src="{{ asset('public/js/ajpage.js') }}"></script>
    <script type="text/javascript">
        var fl= {{ $select }};
        var s = "{{ $keyword }}";
        $(function(){
            $(".zb_show a").live('click',function(){
                var name = $(this).attr("name");
                if(name){
                    location.href="{{ route('periphery') }}"+"/show?id="+name;
                }
            });
        });
    </script>
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

                @include('animation.periphery.search')
            </div>
        </div>

    </div>

    <div id="c_main">
        <div class="zb_head">
            <ul class="zb_u">
                <li class="{{ $select == 0?'liy':'lic' }}"><a href="{{ route('periphery') }}">全部</a></li>
                @foreach ($attr as $key => $value)

                    <li class="{{$select == $value->id?'liy':'lic'}}">
                        <a href="{{ route('periphery',['fl'=>$value->id]) }}" >
                            {{ $value->name }}
                        </a>
                    </li>

                @endforeach
                <!--<li class="liy"><a href="#">粘土</a></li><li class="liy"><a href="#">娃娃</a></li><li class="liy"><a href="#">美图</a></li><li class="liy"><a href="#">抱枕</a></li><li class="liy"><a href="#">图书</a></li><li class="liy"><a href="#">其他</a></li>-->
            </ul>
        </div>
        <div class="zb_big" url="{{ route('periphery.ajax') }}" rootpath="{{ url('/') }}">

        </div>

        <div class="quotes"></div>
    </div>


@endsection
