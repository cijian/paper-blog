<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $userModel = config('admin.database.users_model');

        if ($userModel::count() == 0) {
            $this->call( \Encore\Admin\Auth\Database\AdminTablesSeeder::class);
        }


        $this->call(AdminMenuSeeder::class);
    }
}
