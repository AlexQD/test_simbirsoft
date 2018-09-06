<?php

use Illuminate\Database\Seeder;

class AdminCreate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_isset= DB::table('users')->where('name', 'Admin')->first();
        if($admin_isset){
            print('Пользователь Admin уже существует');
        }else{
            DB::table('users')->insert([
                'name' => 'Admin',
                'email' => 'test-project-laravel@ya.ru',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
                'remember_token' => str_random(10),
            ]);
        }
    }
}
