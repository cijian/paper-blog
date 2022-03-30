$(function(){

/*
    var slideMenu=function(o) {
        var f = $("." + o.f), s = f.children("." + o.s), h = s.outerHeight();
        f.css({position: "relative"});
        s.css({height: 0, opacity: 0});
        f.hover(function () {
            s.show().stop(true, false).animate({height: h, opacity: 1}, 350, function () {
                s.css({overflow: "visible"});
            });
        }, function () {
            s.stop(true, false).animate({height: 0, opacity: 0}, 350, function () {
                s.hide();
            });
        });

    }*/

    var moveNav=function(o){
        var f=$("."+o.f),a=f.find("."+o.a);
        f.css({position:"relative"});
        var moveDiv=function(w,l,a,b){
            var div=$("<div class='move_div'></div>");
            f.append(div);
            if(b){
                div.addClass("active");
            }
            div.css({position:"absolute",left:l,width:w});
            addEvent(w,l,a,div,b);
        }

        var addEvent=function(w,l,a,div,b){
            a.each(function(){
                $(this).hover(function(){
                    if(b){
                        div.removeClass("active");
                }
                    var w2=$(this).outerWidth();
                    var l2=$(this).position().left;
                    div.stop(true,false).animate({left:l2,width:w2});
                },function(){
                    if(b){
                        div.stop(true,false).animate({left:l,width:w},function(){
                            div.addClass("active");
                        });
                    }
                    else{
                        div.stop(true,false).animate({left:l,width:w});
                    }
                });
            });
        }

        a.each(function(i){
            if($(this).hasClass("channel-now")){
                var w=$(this).outerWidth();
                var l=$(this).position().left;
                if(i==0){
                    moveDiv(w,l,a,true);
                }else{
                    moveDiv(w,l,a);
                }
            }
        });
    }
    moveNav({
        f:"cover-page-wrapper2",
        a:"channel"
    });





    /*导航贴顶*/

        var ie6 = /msie 6/i.test(navigator.userAgent)
        , dv = $('.nav'), st;
    dv.attr('otop', dv.offset().top); //存储原来的距离顶部的距离
    $(window).scroll(function () {
        st = Math.max(document.body.scrollTop || document.documentElement.scrollTop);
        if (st >= parseInt(dv.attr('otop'))) {
            if (ie6) {//IE6不支持fixed属性，所以只能靠设置position为absolute和top实现此效果
                dv.css({ position: 'absolute', top: st });
            }
            else if (dv.css('position') != 'fixed') dv.css({ 'position': 'fixed', top: 0 });
        } else if (dv.css('position') != 'static') dv.css({ 'position': 'static' });
    });


//        $(".cm_uh li").mouseenter(function() {
//            $("cm_uh ul li").each(function(){
//                $(this).removeClass('ano');
//            });
//
//        })



});


//漫画鼠标横栏
function changeTab(a,b){
    var o=$(".cm_uh ul li");
    var p=$('.cm_sli ul');
    for(var i=0;i<a;i++)
    {
        p[i].style.display='none';
        o[i].className='';
    }

    o[b].className='aon';
    p[b].style.display='block';
}





