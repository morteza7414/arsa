<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        // \App\Models\User::factory(10)->create();
        $this->call(UserTableSeeder::class);
        $this->call(PropertyTableSeeder::class);

        Schema::enableForeignKeyConstraints();

    }
}
