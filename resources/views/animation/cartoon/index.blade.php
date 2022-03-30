@extends('animation.common.layout')


@section('js')
    @parent
    <script type="text/javascript" src="{{ asset('public/js/ajmh.js') }}"></script>
    <script type="text/javascript">
        var mh="{{ session('mh') }}";
    </script>
@endsection
@section('content')

    <!--右上导航栏-->
    <div id="r_head">
        <div class="r_h_img"> <img src="{{ asset('public/image/nav_fan1.png') }}" />
            <div class="r_h_s">日本漫画</div>
        </div>
        <div class="nav">
            <div style="position: relative;" class="cover-page-wrapper cover-page-wrapper2 clearfix">
                @include('animation.common.cate')
                <div class="nav_s">
                </div>
                <form method="GET" action="{{ route('cartoon') }}">
                    <input class="field" name="s" id="s" placeholder="漫画搜索" type="text">
                    <input class="submit" id="searchsubmit" value="搜索" type="submit">
                </form>
            </div>
        </div>

    </div>
    <div id="c_main">
        <div class="cm_m">
            <div class="cm_uh">
                <ul>
                    @foreach($cartoon  as $key => $value)
                        <li @if($key == 0)class="aon" @endif onmouseover="changeTab(3,{{$key}})">{{ $value->anname }}漫画</li>
                    @endforeach
                </ul>
            </div>
            <div class="cm_sli">
                @foreach($cartoon  as $key => $value)
                    <ul @if($key == 0)  style="display: block;" @else style="display: none;" @endif>
                        @foreach($value['manHua']  as $k => $v)
                        <li>
                            <a href="{{ $v['man_number']['allnumber'] }}"><img src="{{ url('upload/man/'.$v['animage']) }}"></a>
                            <div>
                                <a class="cm_al" href="{{ $v['man_number']['allnumber'] }}">{{ $v['animation'] }}</a>
                                [<a class="cm_al1" href="{{ $v['man_number']['newsnumber'] }}">第{{ $v['man_number']['newsname'] }}话</a>]
                            </div>
                        </li>
                        @endforeach
                    </ul>
                @endforeach

            </div>

        </div>
        <div class="cm_l">
            <div class="cm_lhe">
                最新更新
            </div>
            <ul>
                @foreach($new  as $key => $value)
                    <li>
                        <a href="{{ $value['manNumber']->allnumber}}">{{ $value->animation }}</a>
                        [<a href="{{ $value['manNumber']->newsnumber }}">第{{ $value['manNumber']->newsname }}话</a>]
                        <div class="cm_l_t">{{ date('Y-m-d',$value->newstime )}}</div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="cm_b">
            <div class="cm_mh">
                <ul class="cm_smh" url="{{ route('cartoon.ajax') }}" datapath="{{ url('/') }}">

                </ul>
                <div class="quotes"></div>
            </div>
        </div>

    </div>

@endsection
