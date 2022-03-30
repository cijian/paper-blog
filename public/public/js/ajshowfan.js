/**
 * Created by JIAN on 2015/4/9.
 */
var curdate = new Date();
var curPage = curdate.getDay(); //当前页码
function getFan(day) {
    var animationurl=$('.showfan').attr('url');
    $.ajax({
        type: 'GET',
        url: animationurl,
        data: {'day': day},
        dataType: 'json',
        beforeSend:function(){
            $(".showfan").append("<li id='loading'>loading...</li>");
        },
        success: function (json) {
            $(".showfan").empty();
            var data_url = $('.showfan').attr('data_url');
            var rootpath = $('.showfan').attr('data_root');
            curPage = day; //当前页
            var li = "";
            var list = json;

            $.each(list, function (index, array) { //遍历json数据列
                li += " <li> <a href='" + data_url + "?id="+array['id']+"'> <img src='"+rootpath+"/upload/xinfan/"+array['fanimage']+"'/></a>"+
                "<div class='n_d'><a href='" + data_url + "?id="+array['id']+"'><p class='t'>"+array['fanname']+"</p></a> " +
                "<p>更新至<span>"+array['fan_shu_max']['number']+"集</span></p> </div> </li>";
            });
            $(".showfan").append(li);
        },
        complete: function () { //生成分页条
                getPageBar();
        },
        error: function () {
            alert("数据加载失败");
        }
    });
}

$(function(){
    getFan(curPage);
    $(".clfix li a").live('click',function(){
        var rel = $(this).attr("day");
        if(rel){
            getFan(rel);
        }
    });

});



function getPageBar()
{
    var pageStr='';
    var per_day=6;
    var week = new Array('日','一','二','三','四','五','六');
    //var week = ['日','一','二','三','四','五','六'];
    for( var i=0; i<=per_day; i++)
    {
        if(curPage==i){
            pageStr += "<li class='on'><a href='javascript:void(0)' day=" +i+ "><span>星期" + week[i] + "</span></a></li>";
        }else {
            pageStr += "<li class=''><a href='javascript:void(0)' day=" +i+ "><span>星期" + week[i] + "</span></a></li>";
        }
    }
    $(".clfix").html(pageStr);
}

