<template>
    <div id="details">
      <header></header>
      <div class="details-wrapper">
        <div class="article-title">{{article.title}}</div>
        <div class="article-time">{{article.created_at}}</div>
        <mavon-editor
          class="md"
          :value="article.content"
          :subfield = "false"
          :defaultOpen = "'preview'"
          :toolbarsFlag = "false"
          :editable="false"
          :scrollStyle="true"
          :ishljs = "true"
        ></mavon-editor>
          <el-card class="el-card-d" shadow="always">
              <div class="infinite-list-wrapper" style="overflow:auto;">
                  <el-timeline
                          infinite-scroll-disabled="disabled">
                      <div v-if="comments.length>0">
                          <el-timeline-item v-for="(item,index) in comments"  :key="index" :timestamp='item.created_at' placement="top">
                              <el-card class="el-card-m" style="height:120px">
                                  <h4>游客{{item.id}}：</h4>
                                  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{item.comment}}</p>
                              </el-card>
                          </el-timeline-item>
                      </div>
                      <div v-else>
                      <el-timeline-item placement="top">
                          <el-card class="el-card-m" style="min-height:120px" >
                              <h4>游客：</h4>
                              <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 说点什么吧😁</p>
                          </el-card>
                      </el-timeline-item>
                      </div>
                  </el-timeline>
              </div>
              <div class="el-card-messages">
                  <el-input type="textarea" :rows="5" placeholder="输入留言" maxlength="200" v-model="message"></el-input>
                  <el-button type="info" round class="submit-message" @click="submitMessage">留言</el-button>
              </div>
          </el-card>
      </div>




    </div>
</template>

<script>
    export default {
        name: "Details",
        mounted(){
            this.getDetail()
        },
        methods:{
            getDetail(){
                axios.get('/detail',
                    {
                        params:{
                            id:this.$route.query.id,
                        }
                    }

                ).then((response) => {
                    this.article = response.data;
                    this.comments = response.data.comments;
                }).catch((error) => {
                        this.$router.push({path:'blog'});
                    });
            },
            submitMessage(){
                if(this.message=='' || this.message.replace(/(^\s*)|(\s*$)/g, "")==""){
                    this.$message('写点啥提交也行呀😉');
                    return;
                }
                axios.post('/comment',
                    {
                        article_id:this.$route.query.id,
                        comment:this.message,
                    }

                ).then((response) => {
                    if(response.data.code == 200){
                        this.$message('添加留言成功');
                        this.message ='';
                        this.getDetail();
                        return;
                    }else{
                        this.$message('添加留言呢失败');
                        this.message = '';
                        return;
                    }
                }).catch((error) => {
                    this.$router.push({path:'blog'});
                });
            }


        },
        data () {
            return {
                article_id:this.$route.query.id,
                article :{},
                comments : [],
                message:'',
            }
        }
    }
</script>

<style scoped>
  header{
    height: 210px;
  }
  .md{
    box-shadow: none;
  }
  .v-note-wrapper.shadow{
    box-shadow: none !important;
  }
  .v-note-wrapper .v-note-panel .v-note-show .v-show-content, .v-note-wrapper .v-note-panel .v-note-show .v-show-content-html{
    background: #fff !important;
  }
  #editor {
    margin: auto;
    width: 100%;
    height: 580px;
    margin: 15px 0;
  }
  .details-wrapper{
    max-width: 960px;
    margin: -110px auto 50px;
    min-height: 100px;
    box-shadow: rgba(0, 0, 0, 0.2) 0px 10px 30px;
    padding: 35px;
    background: rgb(255, 255, 255);
    border-radius: 4px;
    box-sizing: border-box;
    min-height: calc(100vh - 120px);
  }
  .article-title{
    font-size: 36px;
    line-height: 48px;
    font-weight: 400;
    color: rgb(33,33,33);
  }
  .article-time{
    line-height: 14px;
    font-size: 13px;
    font-weight: bold;
    color: rgb(114, 114, 114);
    margin: 8px 0px 10px;
    overflow: hidden;
  }
  .v-note-wrapper{
    z-index: 0 !important;
  }
  .infinite-list-wrapper{
      width: 100%;
      min-height: 80px;
  }
  .submit-message{
      width: 100%;
      background: rgb(235, 245, 247);
      color: cadetblue;
      letter-spacing:20px;
  }


</style>
