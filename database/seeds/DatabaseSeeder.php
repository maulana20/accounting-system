<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(GroupAccountSeeder::class);
        $this->call(CoaPostingSeeder::class);
        $this->call(FinancialTransSeeder::class);
    }
}
