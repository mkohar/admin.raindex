<?php

use Illuminate\Database\Seeder;

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
         'name' => 'Mohammad Kohar',
         'email' => 'm.kohar28@gmail.com',
         'email_verified_at' => date('Y-m-d H:i:s'),
         'password' => bcrypt('password'),
         'role' => '1',
         'created_at' => date('Y-m-d H:i:s'),
         'updated_at' => date('Y-m-d H:i:s'),
     ]);
      DB::table('users')->insert([
         'name' => 'Saeful Rahman',
         'email' => 'saeful13.id@gmail.com',
         'email_verified_at' => date('Y-m-d H:i:s'),
         'password' => bcrypt('password'),
         'role' => '1',
         'created_at' => date('Y-m-d H:i:s'),
         'updated_at' => date('Y-m-d H:i:s'),
     ]);
      DB::table('users')->insert([
         'name' => 'Hamdan Abdul Majid',
         'email' => 'hamdanabdoel@gmail.com',
         'email_verified_at' => date('Y-m-d H:i:s'),
         'password' => bcrypt('password'),
         'role' => '1',
         'created_at' => date('Y-m-d H:i:s'),
         'updated_at' => date('Y-m-d H:i:s'),
     ]);
   }
}
