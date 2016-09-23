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
        Role::create(['title' => 'Superadmin', 'slug' => 'super']);
        Role::create(['title' => 'Administrator', 'slug' => 'admin']);
        Role::create(['title' => 'Redactor', 'slug' => 'redac']);
        Role::create(['title' => 'User', 'slug' => 'user']);


        User::create(['name' => 'super', 'email' => 'super@iclover.net', 'password' => bcrypt('asdfasdf'), 'role_id' => 1, 'public_id' => str_random(8)]);

        User::create(['name' => 'admin', 'email' => 'admin@iclover.net', 'password' => bcrypt('asdfasdf'), 'role_id' => 2, 'public_id' => str_random(8)]);

        User::create(['name' => 'redac', 'email' => 'redac@iclover.net', 'password' => bcrypt('asdfasdf'), 'role_id' => 3, 'public_id' => str_random(8)]);

        for ($i=0; $i < 15; $i++) { 
            User::create(['name' => 'user '. $i, 'email' => 'user'. $i.'@iclover.net', 'password' => bcrypt('asdfasdf'), 'role_id' => 4, 'public_id' => str_random(8)]);
        }
    }
}
