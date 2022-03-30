<html>
<head>
    @include('animation.common.head')
    @yield('js')
</head>
<body id="zhuye">
<div id="page">
    <!--左边定位栏-->
@include('animation.common.left')
<!--右上导航栏-->
    @yield('content')
</div>
</body>
</html>