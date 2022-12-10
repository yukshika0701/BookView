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
        DB::table('users')->insert([
            'name' => '田中一郎',
            'email' => 'test@test.com',
            'password' => '00000000',
            'gender' => 0,
            'age' => 1,
            'admin_flg' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => '田中花子',
            'email' => 'etoigh@fe.com',
            'password' => '11111111',
            'gender' => 1,
            'age' => 2,
            'admin_flg' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => '山田太郎',
            'email' => 'egh@fe.com',
            'password' => '33333333',
            'gender' => 0,
            'age' => 3,
            'admin_flg' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => '山田花子',
            'email' => 'fefds@ge.com',
            'password' => '44444444',
            'gender' => 1,
            'age' => 2,
            'admin_flg' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => '川井太郎',
            'email' => 'etreoigh@fe.com',
            'password' => '55555555',
            'gender' => 0,
            'age' => 1,
            'admin_flg' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
