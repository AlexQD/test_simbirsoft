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

        for ($i = 0; $i < 100; $i++) {
            DB::transaction(function () {
                factory(App\File::class, 10000)->create();
            });
        }



    }
}
