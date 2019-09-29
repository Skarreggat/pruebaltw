<?php

use Illuminate\Database\Seeder;

class Clients_tractamentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_tractament')->insert(array(
            'client_id' => 1,
            'tractament_id' => 1
        ));
        DB::table('client_tractament')->insert(array(
            'client_id' => 1,
            'tractament_id' => 2
        ));
        DB::table('client_tractament')->insert(array(
            'client_id' => 1,
            'tractament_id' => 4
        ));
        DB::table('client_tractament')->insert(array(
            'client_id' => 2,
            'tractament_id' => 1
        ));
        DB::table('client_tractament')->insert(array(
            'client_id' => 2,
            'tractament_id' => 2
        ));
        DB::table('client_tractament')->insert(array(
            'client_id' => 3,
            'tractament_id' => 5
        ));
        DB::table('client_tractament')->insert(array(
            'client_id' => 4,
            'tractament_id' => 1
        ));
        DB::table('client_tractament')->insert(array(
            'client_id' => 4,
            'tractament_id' => 4
        ));
        DB::table('client_tractament')->insert(array(
            'client_id' => 5,
            'tractament_id' => 5
        ));
        DB::table('client_tractament')->insert(array(
            'client_id' => 5,
            'tractament_id' => 1
        ));
        DB::table('client_tractament')->insert(array(
            'client_id' => 5,
            'tractament_id' => 3
        ));
    }
}
