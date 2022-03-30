<!doctype html>
<html lang="en">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>动漫主题网站</title>
    <link type="text/css" href="{{asset('public/css/army.css')}}" id="changeable_stylesheet" rel="stylesheet">
    <script type="text/javascript" src="{{asset('public/js/jquery.js')}}"></script>
    <script>window.jQuery || document.write('&lt;script type="text/javascript" src="{{asset('public/js/jquery.min.js')}}"&gt;&lt;\/script&gt;')</script>
    <script type="text/javascript" src="{{asset('public/js/jquery.easing.js')}}"></script>
    <script type="text/javascript">
        var show_slider2_grid = 'true';
        var show_slider_title = 'true';
        var slider_autoslide = '3000';
    </script>
    <script type="text/javascript" src="{{asset('public/js/slider-1.js')}}"></script>
</head>
<body id="bod">
    <div id="thead">
        <div id="logo"><a href="/"><img src="{{asset('public/image/logo.png')}}"></a></div>
                    <div class="bd">
                        <ul class="pic-list02">
                            @foreach ($cate as $c)
                            <li class="p01"><a href="{{ $c->action }}"><span class="h_bgs">{{ $c->name }}</span><br/>
                                <span class="h_bgs1">{{ $c->rname }}</span>
                                <span class="bg"> <span class="mask"></span></span></a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

        <script type="text/javascript">
    pic_animate(".pic-list02",".bg",0,-135);
            function pic_animate(classname,targetname,top1,top2){
                $('\"'+classname+'\" li').mouseenter(function() {
                    $(this).find(targetname).animate({top: top1},400);
                }).mouseleave(function() {
                    $(this).find(targetname).animate({top: top2},400);
                });

            }
        </script>
    </div>
  <div id="sbig">
      <div id="snsilder">

          <div id="slider_wrapper">
              <div id="slider-1">
                  <div id="slider-content">
                      <div style="left:0px;top:0px; width:157px; height:157px;" id="slider_0_0" class="cube">
                          <div style="display: block; top: 0px; left: 0px; width:  px; height: 156px; opacity: 0; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: 0px 0px; " class="inner_a"></div>
                          <div style="top: 0px; left: 0px; opacity: 1; width: 156px; height: 156px; display: block; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: 0px 0px; " class="inner_b"></div>
                      </div>
                      <div style="left:157px;top:0px; width:157px; height:157px;" id="slider_1_0" class="cube">
                          <div style="display: block; top: 0px; left: 0px; width: 156px; height: 156px; opacity: 0; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -157px 0px; " class="inner_a"></div>
                          <div style="top: 0px; left: 0px; opacity: 1; width: 156px; height: 156px; display: block; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -157px 0px; " class="inner_b"></div>
                      </div>
                      <div style="left:314px;top:0px; width:157px; height:157px;" id="slider_2_0" class="cube">
                          <div style="display: block; top: 0px; left: 0px; width: 156px; height: 156px; opacity: 0; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -314px 0px; " class="inner_a"></div>
                          <div style="top: 0px; left: 0px; opacity: 1; width: 156px; height: 156px; display: block; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -314px 0px; " class="inner_b"></div>
                      </div>
                      <div style="left:471px;top:0px; width:157px; height:157px;" id="slider_3_0" class="cube">
                          <div style="display: block; top: 0px; left: 0px; width: 156px; height: 156px; opacity: 0; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -471px 0px; " class="inner_a"></div>
                          <div style="top: 0px; left: 0px; opacity: 1; width: 156px; height: 156px; display: block; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -471px 0px; " class="inner_b"></div>
                      </div>
                      <div style="left:628px;top:0px; width:157px; height:157px;" id="slider_4_0" class="cube">
                          <div style="display: block; top: 0px; left: 0px; width: 156px; height: 156px; opacity: 0; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -628px 0px; " class="inner_a"></div>
                          <div style="top: 0px; left: 0px; opacity: 1; width: 156px; height: 156px; display: block; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -628px 0px; " class="inner_b"></div>
                      </div>
                      <div style="left:785px;top:0px; width:155px; height:157px;" id="slider_5_0" class="cube">
                          <div style="display: block; top: 0px; left: 0px; width: 156px; height: 156px; opacity: 0; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -785px 0px; " class="inner_a"></div>
                          <div style="top: 0px; left: 0px; opacity: 1; width: 156px; height: 156px; display: block; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -785px 0px; " class="inner_b"></div>
                      </div>
                      <div style="left:0px;top:157px; width:157px; height:157px;" id="slider_0_1" class="cube">
                          <div style="display: block; top: 0px; left: 0px; width: 156px; height: 156px; opacity: 0; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: 0px -157px; " class="inner_a"></div>
                          <div style="top: 0px; left: 0px; opacity: 1; width: 156px; height: 156px; display: block; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: 0px -157px; " class="inner_b"></div>
                      </div>
                      <div style="left:157px;top:157px; width:157px; height:157px;" id="slider_1_1" class="cube">
                          <div style="display: block; top: 0px; left: 0px; width: 156px; height: 156px; opacity: 0; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -157px -157px; " class="inner_a"></div>
                          <div style="top: 0px; left: 0px; opacity: 1; width: 156px; height: 156px; display: block; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -157px -157px; " class="inner_b"></div>
                      </div>
                      <div style="left:314px;top:157px; width:157px; height:157px;" id="slider_2_1" class="cube">
                          <div style="display: block; top: 0px; left: 0px; width: 156px; height: 156px; opacity: 0; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -314px -157px; " class="inner_a"></div>
                          <div style="top: 0px; left: 0px; opacity: 1; width: 156px; height: 156px; display: block; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -314px -157px; " class="inner_b"></div>
                      </div>
                      <div style="left:471px;top:157px; width:157px; height:157px;" id="slider_3_1" class="cube">
                          <div style="display: block; top: 0px; left: 0px; width: 156px; height: 156px; opacity: 0; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -471px -157px; " class="inner_a"></div>
                          <div style="top: 0px; left: 0px; opacity: 1; width: 156px; height: 156px; display: block; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -471px -157px; " class="inner_b"></div>
                      </div>
                      <div style="left:628px;top:157px; width:157px; height:157px;" id="slider_4_1" class="cube">
                          <div style="display: block; top: 0px; left: 0px; width: 156px; height: 156px; opacity: 0; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -628px -157px; " class="inner_a"></div>
                          <div style="top: 0px; left: 0px; opacity: 1; width: 156px; height: 156px; display: block; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -628px -157px; " class="inner_b"></div>
                      </div>
                      <div style="left:785px;top:157px; width:155px; height:157px;" id="slider_5_1" class="cube">
                          <div style="display: block; top: 0px; left: 0px; width: 156px; height: 156px; opacity: 0; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -785px -157px; " class="inner_a"></div>
                          <div style="top: 0px; left: 0px; opacity: 1; width: 156px; height: 156px; display: block; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -785px -157px; " class="inner_b"></div>
                      </div>
                      <div style="left:0px;top:314px; width:157px; height:156px;" id="slider_0_2" class="cube">
                          <div style="display: block; top: 0px; left: 0px; width: 156px; height: 156px; opacity: 0; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: 0px -314px; " class="inner_a"></div>
                          <div style="top: 0px; left: 0px; opacity: 1; width: 156px; height: 156px; display: block; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: 0px -314px; " class="inner_b"></div>
                      </div>
                      <div style="left:157px;top:314px; width:157px; height:156px;" id="slider_1_2" class="cube">
                          <div style="display: block; top: 0px; left: 0px; width: 156px; height: 156px; opacity: 0; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -157px -314px; " class="inner_a"></div>
                          <div style="top: 0px; left: 0px; opacity: 1; width: 156px; height: 156px; display: block; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -157px -314px; " class="inner_b"></div>
                      </div>
                      <div style="left:314px;top:314px; width:157px; height:156px;" id="slider_2_2" class="cube">
                          <div style="display: block; top: 0px; left: 0px; width: 156px; height: 156px; opacity: 0; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -314px -314px; " class="inner_a"></div>
                          <div style="top: 0px; left: 0px; opacity: 1; width: 156px; height: 156px; display: block; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -314px -314px; " class="inner_b"></div>
                      </div>
                      <div style="left:471px;top:314px; width:157px; height:156px;" id="slider_3_2" class="cube">
                          <div style="display: block; top: 0px; left: 0px; width: 156px; height: 156px; opacity: 0; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -471px -314px; " class="inner_a"></div>
                          <div style="top: 0px; left: 0px; opacity: 1; width: 156px; height: 156px; display: block; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -471px -314px; " class="inner_b"></div>
                      </div>
                      <div style="left:628px;top:314px; width:157px; height:156px;" id="slider_4_2" class="cube">
                          <div style="display: block; top: 0px; left: 0px; width: 156px; height: 156px; opacity: 0; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -628px -314px; " class="inner_a"></div>
                          <div style="top: 0px; left: 0px; opacity: 1; width: 156px; height: 156px; display: block; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -628px -314px; " class="inner_b"></div>
                      </div>

                      <div style="left:785px;top:314px; width:155px; height:156px;" id="slider_5_2" class="cube">
                          <div style="display: block; top: 0px; left: 0px; width: 156px; height: 156px; opacity: 0; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -785px -314px; " class="inner_a"></div>
                          <div style="top: 0px; left: 0px; opacity: 1; width: 156px; height: 156px; display: block; background-image: url(./class/timthumb.php?src=./upload/shouye/{{$pic[0]->pic??''}}&amp;w=940&amp;h=470&amp;zc=1); background-position: -785px -314px; " class="inner_b"></div>
                      </div>
                      <div class="slider_info_holder"><div class="info_line"><a href="{{$pic[0]->link??''}}" style="font-size: 48px; ">{{$pic[0]->title??''}}</a></div>
                          <div class="clear"></div>
                          <ul class="slider_nav" style="opacity: 1; ">
                              @foreach($pic as $i => $v)
                                  @if($i == 0)
                                      <li class="slider_nav_active">{{$i}}</li>
                                      @else
                                      <li class="">{{$i}}</li>
                                  @endif
                              @endforeach
                          </ul>
                      </div>
                  </div>
                  <div id="slider-feed">
                      @foreach($pic as $p)
                          <div class="slide">
                              <img src="./class/timthumb.php?src=./upload/shouye/{{ $p->pic }}&amp;w=940&amp;h=470&amp;zc=1" alt="" class="slide_source">
                              <div class="transition">random</div>
                              <div class="title">{{ $p->title }}</div>
                              <div class="lightbox">0</div>
                              <div class="link_url">{{ $p->link }}</div>
                              <div class="s_description"></div>
                          </div>
                      @endforeach
                      <div class="slider-img-count">{{ $pic->count() }}</div>
                  </div>
              </div>
          </div>
      </div>

  </div>
    <div id="footer">
        <div class="f_bg1"></div>
        <div id="rotatey1" class="animated_div">
        </div>
        <div class="f_bg2"></div>
        <script type="text/javascript">
            var y,ny=0,rotYINT;
            function rotateXDIV()
            {
                y=document.getElementById("rotatey1");
                clearInterval(rotYINT);
                rotYINT=setInterval("startXRotate()",1);
            }

            function startXRotate()
            {
                ny=ny+1;
                y.style.transform="rotateX(" + ny + "deg)";
                y.style.webkitTransform="rotateX(" + ny + "deg)";
                y.style.OTransform="rotateX(" + ny + "deg)";
                y.style.MozTransform="rotateX(" + ny + "deg)";
                if ( ny>=360)
                {
                    clearInterval(rotYINT);
                    if (ny>=360){ny=0}
                }
            }
            window.setInterval("rotateXDIV()",3000);
        </script>
    </div>
    <div class="container">
        <section class="rw-wrapper">
            <h2 class="rw-sentence">
                <div class="rw-words rw-words-2">
                    <span>Joseph</span>
                </div>
                <div class="rw-words rw-words-1">
                    <span>Designer</span>
                </div>
            </h2>
        </section>
    </div>
    <script type="text/javascript" src="{{asset('public/js/sonw.js')}}" ></script>
</body>
</html>