<?php
/**
 * Created by PhpStorm.
 * User: atul
 * Date: 7/31/15
 * Time: 12:37 PM
 */

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {
    public function run()
    {
        DB::table('users')->delete();

        $userData=array(
            [
                'id'=> 1,
                'name' => 'Test User 1',
                'email'   => 'test1@demo.com',
                'password'   => bcrypt('password'),
                'type'   => 'testuser',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'=> 2,
                'name' => 'Test User 2',
                'email'   => 'test2@demo.com',
                'password'   => bcrypt('password'),
                'type'   => 'testuser',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'=> 3,
                'name' => 'Test User 3',
                'email'   => 'test3@demo.com',
                'password'   => bcrypt('password'),
                'type'   => 'testuser',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'=> 4,
                'name' => 'Test User 4',
                'email'   => 'test4@demo.com',
                'password'   => bcrypt('password'),
                'type'   => 'testuser',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id'=> 5,
                'name' => 'Test User 5',
                'email'   => 'test5@demo.com',
                'password'   => bcrypt('password'),
                'type'   => 'testuser',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        );

        DB::table('users')->insert($userData);
    }
}