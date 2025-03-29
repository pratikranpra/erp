<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin 2',
                'email' => 'test108@yopmail.com3',
                'email_verified_at' => '2025-02-25 16:28:24',
                'password' => '$2y$12$4A1jAeC77yXVqDadZZNym.TWOAu/LJRF8mbzqQKcnsX8CqtkspX5m',
                'remember_token' => NULL,
                'created_at' => '2025-02-25 16:28:24',
                'updated_at' => '2025-02-25 11:07:43',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'admin',
                'email' => 'test108@yopmail.com',
                'email_verified_at' => '2025-02-25 16:28:24',
                'password' => '$2y$12$pTcu5QB1kcz1VzrvzTXVOO7krN4eWNJq9UqUSrKizdVwazB7.x6zG',
                'remember_token' => NULL,
                'created_at' => '2025-02-25 16:28:24',
                'updated_at' => '2025-03-07 05:14:06',
            ),
        ));
        
        
    }
}