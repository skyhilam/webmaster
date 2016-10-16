<?php

use Illuminate\Database\Seeder;

use App\Models\Role, App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Role::create(['title' => '超級管理者', 'en_title' => 'Superadmin', 'slug' => 'super']);
        Role::create(['title' => '管理者', 'en_title' => 'Administrator', 'slug' => 'admin']);
        Role::create(['title' => '編輯者', 'en_title' => 'Redactor', 'slug' => 'redac']);
        Role::create(['title' => '用戶', 'en_title' => 'User', 'slug' => 'user']);

       

        User::create(['name' => 'super', 'email' => 'super@iclover.net', 'password' => bcrypt('asdfasdf'), 'role_id' => 1, 'public_id' => str_random(8)]);

        User::create(['name' => 'admin', 'email' => 'admin@iclover.net', 'password' => bcrypt('asdfasdf'), 'role_id' => 2, 'public_id' => str_random(8)]);

        User::create(['name' => 'redac', 'email' => 'redac@iclover.net', 'password' => bcrypt('asdfasdf'), 'role_id' => 3, 'public_id' => str_random(8)]);

        User::create(['name' => 'user', 'email' => 'user@iclover.net', 'password' => bcrypt('asdfasdf'), 'role_id' => 4, 'public_id' => str_random(8)]);

    }
}
