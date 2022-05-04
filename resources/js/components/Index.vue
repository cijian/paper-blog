<template>
  <div>
    <header>
      <div class="explain">
        <h1>Joseph Blog</h1>
        <h5>我的博客文章</h5>
      </div>
    </header>
    <div class="index-wrapper">
      <ul>
        <li class="blog-wrapper" v-for="value in article" @click="routerTo(value.id)">
          <p class="blog-time">{{ value.created_at }}</p>
          <h3 class="blog-title">{{ value.title }}</h3>
          <div class="blog-content">
            {{ value.describe }}<span class="blog-more">阅读原文...</span>
          </div>
          <div class="blog-tag">
            <ul>
              <li v-if="value.labels !== null" v-for="label in value.labels ">
                {{label.label_name}}
              </li>
            </ul>
          </div>
        </li>

      </ul>
    </div>

    <div style="width:90%;margin:0 0 30px;height:30px">
      <el-pagination
              layout="prev, pager, next"
              @current-change="changePageNum"
              :current-page="pageNum"
              :page-size="pageSize"
              :total="total" style="float: right">
      </el-pagination>
    </div>

  </div>
</template>

<script>

export default {
  name: 'index',

  mounted(){
    this.getArticle();
    this.$root.$on('keyword', (active,keyword) => {
      console.log(active)
      console.log(keyword)
      if(active == 'blog'){
        this.keyword = keyword;
        this.getArticle();
      }

    })
  },
  methods:{
    getArticle(){
      axios.get('/article',
            {
              params:{
                page_size:this.pageSize,
                page:this.pageNum,
                keyword:this.keyword
              }
            }

      ).then((response) => {
        this.article = response.data.data;
        this.total = response.data.total;
        this.pageNum = response.data.current_page;
        this.pageSize = response.data.per_page;
      })
    },
    changePageNum(val) {
      this.pageNum = val;
      this.getArticle();
    },
    routerTo(id){
      this.$router.push({ name: 'Details', query: { id: id}});
    }
  },

  data () {
    return {
      article:[],
      total: 0,//总数
      pageNum: 1,//当前页
      pageSize: 15,//每页显示数量
      keyword:'',
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .index-wrapper{
    max-width: 960px;
    margin: 30px auto 40px;
  }
  .blog-wrapper{
    margin-bottom: 30px;
    padding: 12px 12px 0;
    background: #fff;
    border-radius: 3px;
    box-shadow: 0 1px 2px rgba(151,151,151,0.58);
  }
  .blog-time{
    line-height: 24px;
    margin: 0 0 10px;
    font-size: 13px;
    font-weight: bold;
    color: #727272;
    overflow: hidden;
  }
  .blog-title{
    margin-bottom: 15px;
    font-size: 24px;
    line-height: 32px;
    color: #3f51b5;
  }
  .blog-content{
    word-break: break-all;
    padding-bottom: 20px;
    line-height: 1.8;
  }
  .blog-more{
    display: inline-block;
    padding: 0 6px;
    font-weight: 500;
    color: #3f51b5 !important;
    border: none !important;
    border-radius: 3px;
  }
  .blog-tag{
    position: relative;
    margin: 0 -12px;
    padding: 12px 20px 8px;
    border-top: 1px solid #ddd;
  }
  .blog-tag li{
    display: inline-block;
    margin: 0 8px 8px 0;
    border-radius: 2px;
    background: #8bc34a;
    padding: 0 16px;
    line-height: 28px;
    color: rgba(255,255,255,0.8);
  }
</style>
