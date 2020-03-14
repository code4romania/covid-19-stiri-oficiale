<?php

use App\Decision;
use App\Institution;
use App\News;
use App\User;
use App\Video;
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
        // $this->call(AdminUser::class);
        factory(User::class, 1)->create();

        factory(Institution::class, 25)->create();
        factory(News::class, 100)->create();
        factory(Decision::class, 100)->create();
        factory(Video::class, 100)->create();
    }
}
