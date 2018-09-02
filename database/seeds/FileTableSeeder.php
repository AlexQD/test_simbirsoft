<?php

use Illuminate\Database\Seeder;

class FileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $faker = Faker\Factory::create();
//        for ($i = 0; $i < 4800000; $i++) {
//            //factory(App\File::class, 10000)->create();
//            $name_file = "public/upload/".hash('md5',$faker->name);
//            $email = $faker->safeEmail;
//            DB::table('files')->insert([ //,
//                'name_file' => $name_file,
//                'description' => $faker->text(150),
//                'email' => $email,
//                'hash_user' => hash('md5',$name_file),
//                'hash_file' =>hash('md5',$email),
//            ]);
//        }

        for ($i = 0; $i < 7; $i++) {
            factory(App\File::class, 10000)->create();
        }



    }
}
