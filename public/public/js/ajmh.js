function getManhua(page) {
    var mhurl=$('.cm_smh').attr('url');
    $.ajax({
        type: 'GET',
        url: mhurl,
        data: {'page': page,'mh':mh},
        dataType: 'json',

        success: function (json) {
            $(".cm_smh").empty();
            var rootpath = $('.cm_smh').attr('datapath');
            total = json.total; //总记录数
            pageSize = json.per_page; //每页显示条数
            curPage = json.current_page; //当前页
            totalPage = json.last_page; //总页数
            var li = "";
            var list = json.data;
            if(list==null){
                li += "<div class='err'>无结果</div>";
            }else {
                $.each(list, function (index, array) { //遍历json数据列

                    li += "<li><div class='cm_sm1'><a href='" + array['man_number']['allnumber'] + "'><img src='"+rootpath+"/upload/man/" + array['animage'] + "'/></a></div>" +
                    "<div class='cm_sm2'><a href='" + array['man_number']['allnumber'] + "'>" + array['animation'] + "</a>[<a href='" + array['man_number']['newsnumber'] + "'>第" + array['man_number']['newsname'] + "话</a>]</div>" +
                    "<div class='cm_sm3'>更新时间：" + array['newstime'] + "</div></li>";
                });
            }
            $(".cm_smh").append(li);
        },
        complete: function () { //生成分页条
            if (totalPage > 1) {
                getPageBar();
            } 
        },
        error: function () {
            alert("数据加载失败");
        }
    });
}

$(function(){
    getManhua(1);
    $(".quotes a").live('click',function(){
        var rel = $(this).attr("rel");
        if(rel){
            getManhua(rel);
        }
    });
/*    $(".zb_show a").live('click',function(){
        var name = $(this).attr("name");
        if(name){
            location.href='Zhoubian/showzb/zid/'+name;
        }
    });*/
});


//$rows_num=1,$pages_num=1,$page=1,$pageSize,$url='',$param=''
function getPageBar()
{
//    total = json.total; //总记录数
//    pageSize = json.pageSize; //每页显示条数
//    curPage = page; //当前页
//    totalPage = json.totalPage; //总页数

//    $str= $sqlstr." limit ".(($page-1)*$pageSize).", ".$pageSize;

    var  pageStr='';
    var per_screen=5;//页码显示数量
    var mid = Math.ceil((per_screen+1)/2);

    if(curPage<=mid){
        begin = 1;  }
    else if(curPage> totalPage-mid){
        begin = totalPage-per_screen+1; }
    else{
        begin = curPage-mid+1;}

    if(begin<=0){ begin = 1;}


    if(curPage>1){
        pageStr= "<a href='javascript:void(0)' id='disabled' rel='"+(curPage-1)+"' '></a>";}
    else{
        pageStr = "<span id='disabled'></span>";
    }

    if(begin!=1){
        pageStr+= "<a  href='javascript:void(0)' rel='1'  class='ayangshi' >1</a>";}

    end = (begin+per_screen>totalPage)?totalPage+1:begin+per_screen;

    for( var i=begin; i<end; i++)
    {
        pageStr+= (curPage!=i) ?"<a href='javascript:void(0)' rel="+i+"  class='ayangshi'>"+i+"</a>" :" <span class='current'>"+i+"</span>";
    }

    if(end!=totalPage+1){
        pageStr+= "<a href='javascript:void(0)' rel="+totalPage+"  class='ayangshi'>"+totalPage+"</a>";
    }


    if(curPage<totalPage){
        pageStr+= "<a href='javascript:void(0)' rel="+(parseInt(curPage)+1)+" id='b_next'></a>";}
    else{
        pageStr+= "<span id='b_next'></span>";}

    $(".quotes").html(pageStr);

}

