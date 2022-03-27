<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use DB;

class AdminMenuSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('admin_menu')->where('id',1)->update(['title'=>'控制面板']);
        DB::table('admin_menu')->where('id',2)->update(['title'=>'后台管理']);
        DB::table('admin_menu')->where('id',3)->update(['title'=>'用户']);
        DB::table('admin_menu')->where('id',4)->update(['title'=>'角色']);
        DB::table('admin_menu')->where('id',5)->update(['title'=>'权限']);
        DB::table('admin_menu')->where('id',6)->update(['title'=>'菜单']);
        DB::table('admin_menu')->where('id',7)->update(['title'=>'操作日志']);

        DB::table('admin_menu')->insert(['id'=>8,'parent_id'=>0,'order'=>8,'title'=>'文章管理','icon'=>'fa-bars','uri'=>'/','created_at'=>'2022-03-15 03:44:35','updated_at'=>'2022-03-15 03:44:35']);
        DB::table('admin_menu')->insert(['id'=>9,'parent_id'=>8,'order'=>9,'title'=>'分类','icon'=>'fa-chain','uri'=>'/classify','created_at'=>'2022-03-15 03:44:35','updated_at'=>'2022-03-15 03:44:35']);

        DB::table('admin_menu')->insert(['id'=>10,'parent_id'=>8,'order'=>9,'title'=>'标签','icon'=>'fa-briefcase','uri'=>'/label','created_at'=>'2022-03-17 08:14:19','updated_at'=>'2022-03-17 08:14:19']);
        DB::table('admin_menu')->insert(['id'=>11,'parent_id'=>8,'order'=>10,'title'=>'文章','icon'=>'fa-book','uri'=>'/article','created_at'=>'2022-03-17 08:14:19','updated_at'=>'2022-03-17 08:14:19']);
        DB::table('admin_menu')->insert(['id'=>12,'parent_id'=>0,'order'=>12,'title'=>'留言管理','icon'=>'fa-envelope','uri'=>'','created_at'=>'2022-03-17 08:14:19','updated_at'=>'2022-03-17 08:14:19']);
        DB::table('admin_menu')->insert(['id'=>13,'parent_id'=>12,'order'=>13,'title'=>'留言','icon'=>'fa-bars','uri'=>'/leave/message','created_at'=>'2022-03-17 08:14:19','updated_at'=>'2022-03-17 08:14:19']);

    }
}
