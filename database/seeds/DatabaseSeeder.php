<?php

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
        // $this->call(UsersTableSeeder::class);

        // First we need an admin account:
        \App\Models\User::create([
            'email'             => 'tests@pdfParser.com',
            'password'          => bcrypt('123456'),
            'remember_token'    => str_random(10),
            'name'              => 'admin'
        ]);

        // Now, let's make some dummy accounts..
        factory(\App\Models\User::class, 20)->create();
    }
}
