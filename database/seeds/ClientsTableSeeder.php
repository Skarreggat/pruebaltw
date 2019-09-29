<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table('clients')->insert(array(
            'nom' => 'Dani',
            'cognoms' => 'Urgell Aguilera',
            'data_naixement' => '1996-12-23'
        ));
        DB::table('clients')->insert(array(
            'nom' => 'Alex',
            'cognoms' => 'Fernandez Freixa',
            'data_naixement' => '1992-06-03'
        ));
        DB::table('clients')->insert(array(
            'nom' => 'Adrian',
            'cognoms' => 'Valera Sánchez',
            'data_naixement' => '1994-08-13'
        ));
        DB::table('clients')->insert(array(
            'nom' => 'Carla',
            'cognoms' => 'Miranda Aguilar',
            'data_naixement' => '2004-10-20'
        ));
        DB::table('clients')->insert(array(
            'nom' => 'Esther',
            'cognoms' => 'González Tapia',
            'data_naixement' => '1980-01-29'
        ));
    }

}
