<div id="l_m">
    <div id="zhuan">
        <img id="zhuanimg" src="{{asset('public/image/logo.png')}}">
        <span>分享动漫的快乐</span>
    </div>
    <div class="l_link">
        <p id="p_img1">
            <img class="" src="{{asset('public/image/aniang.png')}}" id="aniang2" usemap="#map1">
            <map name="map1">
                <area id="aniang" shape="poly" coords="82,0,163,48,163,141,82,186,2,141,2,48" href="http://www.acfun.tv/" target="_blank">
            </map>
        </p>
        <p id="p_img2">
            <img class="" src="{{asset('public/image/bniang.png')}}" id="bniang2" usemap="#map2">
            <map name="map2">
                <area id="bniang" shape="poly" coords="82,0,163,48,163,141,82,186,2,141,2,48" href="http://www.bilibili.com/" target="_blank">
            </map>
        </p>
        <p id="p_img3">
            <img class="" src="{{asset('public/image/pniang.png')}}" id="pniang2" usemap="#map3">
            <map name="map3">
                <area id="pniang" shape="poly" coords="82,0,163,48,163,141,82,186,2,141,2,48" href="http://www.pixiv.net" target="_blank">
            </map>
        </p>

    </div>
    <div id="foot">design by Joseph</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        // 左栏六菱形hover事件
        $('area').hover(function() {
                var name=$(this).parent().prev().attr('id');
                $(this).parent().prev().attr('src','{{asset('public/image')}}/'+name+'.png' ).addClass('transform_rotate');
            },

            function() {
                var namec=$(this).attr('id');
                $(this).parent().prev().attr('src','{{asset('public/image')}}/'+namec+'.png').removeClass('transform_rotate');
            });
    });
    var y,ny=0,rotYINT;
    function rotateXDIV()
    {
        y=document.getElementById("zhuanimg");
        clearInterval(rotYINT);
        rotYINT=setInterval("startXRotate()",3);
    }

    function startXRotate()
    {
        ny=ny+1;
        y.style.transform="rotateY(" + ny + "deg)";
        y.style.webkitTransform="rotateY(" + ny + "deg)";
        y.style.OTransform="rotateY(" + ny + "deg)";
        y.style.MozTransform="rotateY(" + ny + "deg)";
        if ( ny>=720)
        {
            clearInterval(rotYINT);
            if (ny>=360){ny=0}
        }
    }
    window.setInterval("rotateXDIV()",5000);
</script>