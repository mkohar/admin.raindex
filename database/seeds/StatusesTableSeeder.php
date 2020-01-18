<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('statuses')->insert([
         'name' => 'Plan',
         'created_at' => date('Y-m-d H:i:s'),
         'updated_at' => date('Y-m-d H:i:s'),
      ]);
      DB::table('statuses')->insert([
         'name' => 'Proposal',
         'created_at' => date('Y-m-d H:i:s'),
         'updated_at' => date('Y-m-d H:i:s'),
      ]);
      DB::table('statuses')->insert([
         'name' => 'Negotiation',
         'created_at' => date('Y-m-d H:i:s'),
         'updated_at' => date('Y-m-d H:i:s'),
      ]);
      DB::table('statuses')->insert([
         'name' => 'Obtained',
         'created_at' => date('Y-m-d H:i:s'),
         'updated_at' => date('Y-m-d H:i:s'),
      ]);
      DB::table('statuses')->insert([
         'name' => 'Development',
         'created_at' => date('Y-m-d H:i:s'),
         'updated_at' => date('Y-m-d H:i:s'),
      ]);
      DB::table('statuses')->insert([
         'name' => 'Done',
         'created_at' => date('Y-m-d H:i:s'),
         'updated_at' => date('Y-m-d H:i:s'),
      ]);
      DB::table('statuses')->insert([
         'name' => 'Cancel',
         'created_at' => date('Y-m-d H:i:s'),
         'updated_at' => date('Y-m-d H:i:s'),
      ]);
   }
}
