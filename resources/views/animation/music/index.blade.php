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
        <table class="tab_t">
            <tr>
                <th width="130px;" style="text-align: center"><a href="{{ route('music',['order'=>'1']) }}">发布日期</a></th>
                <th width="80px;" style="text-align: center"><a href="{{ route('music',['order'=>'2']) }}">分类</a></th>
                <th width="600px;" style="text-align: center"><a href="{{ route('music',['order'=>'3']) }}">标题</a></th>
                <th width="38px;" style="text-align: center">磁链</th>
                <th width="78px;" style="text-align: center"><a href="{{ route('music',['order'=>'4']) }}">大小</a></th>
            </tr>
            @foreach($music as $key => $value)
                <tr>
                    <td>{{ date('Y-m-d H:i:s',$value->stime) }}</td>
                    <td><a href="{{ route('music',['type'=>$value->type]) }}">{{ $value['MType']->name }}</a></td>
                    <td><a href="{{ route('music.show',['id'=>$value->id]) }}">{{ $value->title }}</a></td>
                    <td><a href="{{ $value->link }}">下载</a></td>
                    <td>{{ $value->mx/1024>=1?number_format(($value->mx/1024),2).'GB':$value->mx.'MB' }}</td>
                </tr>
            @endforeach
        </table>
        <div class="r_mpage">{!! $music->withQueryString()->links() !!}</div>
    </div>
    <div id="foot"></div>



@endsection
