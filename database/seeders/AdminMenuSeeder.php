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

    }
}
