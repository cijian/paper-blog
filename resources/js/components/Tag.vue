<template>
  <div id="tag">
    <header>
      <div class="explain">
        <h1>热门标签</h1>
        <div class="tag-list">
          <p  v-for="(i,l) in labels"  :class="{'tag-active':l==0}">{{i.label_name}}</p>
        </div>
        <div class="tag-more" @click="showTagModel()">...</div>
      </div>
    </header>
    <div class="archives-wrapper">
      <h3 class="archive-separator"></h3>
      <div class="archives-list" >
        <div class="archives-item" v-for="a in article">
          <p class="archives-time">{{ a.created_at }}</p>
          <h3 class="archives-title">{{ a.title }}</h3>
          <div class="archives-operation">
            <p class="archives-tag" v-for="l in a.labels ">{{ l.label_name }}</p>
          </div>
        </div>

      </div>
    </div>
    <div class="tag-model" v-show="isshowTagModel" @click="showTagModel()">
      <div class="tag-wrapper">
        <p  v-for="(i,l) in labels"  :class="{'tag-active':l==0}" @click.stop="selectTag($event)">{{i.label_name}}</p>

      </div>
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
    name: "Tag",
    mounted(){
      this.getLabel();
      this.$root.$on('keyword', (active,keyword) => {
        console.log(active)
        console.log(keyword)
        if(active == 'tag'){
          this.keyword = keyword;
          this.getArticle();
        }

      })

    },
    data(){
      return {
        isshowTagModel:false,
        labels:[],
        active_id:0,
        article:[],
        total: 0,//总数
        pageNum: 1,//当前页
        pageSize: 15,//每页显示数量
        keyword:'',
      }
    },
    methods:{
      showTagModel(){
        this.isshowTagModel = !this.isshowTagModel;
      },
      getLabel(){
        axios.get('/labels',).then((response) => {
          this.labels = response.data;
          this.active_id = response.data[0].id !== undefined?response.data[0].id:0;
          this.getArticle()

        }).catch((error) => {
          this.$router.push({path:'blog'});
        });
      },
      getArticle(){
        axios.get('/article',
                {
                  params:{
                    page_size:this.pageSize,
                    page:this.pageNum,
                    label_id:this.active_id,
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

      selectTag(event){
        
      }
    }
  }
</script>

<style scoped>
  .tag-model{
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: rgba(0,0,0,0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 2;
  }
  .tag-wrapper{
    width: 70%;
    display: flex;
    flex-wrap: wrap;
    background:#fff;
    padding: 15px;
    border-radius: 4px;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
  }
  .tag-wrapper p {
    padding: 0 15px;
    margin: 5px;
    line-height: 32px;
    cursor: pointer;
  }
  .tag-active{
    color: #fff;
    background: #ff4081;
    border-radius: .2em;
  }
  .explain{
    position: relative;
  }
  .tag-more{
    position: absolute;
    bottom: 0px;
    right: 0px;
    background: #3f51b5;
    width: 60px;
    text-align: center;
    line-height: 40px;
    height: 44px;
    cursor: pointer;
  }
  header{
    padding: 100px 15px !important;
  }
  .archives-wrapper{
    margin: 0px auto 40px;
    min-height: calc(100vh - 270px);
  }
  .archive-separator{
    margin: 10px 0;
    color: #3f51b5;
    font-size: 16px;
    font-weight: bold;
    margin-top: 30px;
  }
  .main-wrapper {
    flex: 1;
    background: #f6f6f6;
    padding: 0 15px;
  }
  .archives-list{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-between;
  }
  .archives-item{
    width: calc(50% - 10px);
    box-sizing: border-box;
    padding: 16px 20px 0;
    background: #fff;
    border-radius: 3px;
    box-shadow: 0 1px 2px rgba(151,151,151,0.58);
    margin-bottom: 20px;

  }
  .archives-time{
    margin: 0 0 10px;
    line-height: 14px;
    font-size: 13px;
    font-weight: bold;
    color: #727272;
    overflow: hidden;
  }
  .archives-title{
    font-size: 18px;
    margin-bottom: 0;
    padding-bottom: 16px;
  }
  .archives-operation{
    border-top: 1px solid #ddd;
    display: flex;
    padding: 12px 20px 8px;
    margin: 0 -20px;
  }
  .archives-tag{
    border-radius: 2px;
    background: #8bc34a;
    padding: 0 16px;
    line-height: 28px;
    color: rgba(255,255,255,0.8);
  }
  .tag-list{
    display: flex;
    height: 44px;
    margin-top: 8px;
    line-height: 44px;
    overflow: hidden;
    flex-wrap: wrap;
  }
  .tag-list p{
    padding: 0 12px;
    color: rgba(255,255,255,0.8);
  }
  .tag-list p:hover{
    cursor: pointer;
  }
  .tag-active{
    border-bottom: 2px solid #ff4081;;
  }
</style>
