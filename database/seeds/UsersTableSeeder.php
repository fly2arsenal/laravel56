<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
        [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(111111),
            'created_at' => Carbon::now(),
        ]);
    }
}
