<?php

use Illuminate\Database\Seeder;

class TractamentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tractaments')->insert(array(
            'nom_tractament' => 'tractament1',
            'descripcio' => 'Descripció del tractamen1'
        ));
        DB::table('tractaments')->insert(array(
            'nom_tractament' => 'tractament2',
            'descripcio' => 'Descripció del tractamen2'
        ));
        DB::table('tractaments')->insert(array(
            'nom_tractament' => 'tractament3',
            'descripcio' => 'Descripció del tractamen3'
        ));
        DB::table('tractaments')->insert(array(
            'nom_tractament' => 'tractament4',
            'descripcio' => 'Descripció del tractamen4'
        ));
        DB::table('tractaments')->insert(array(
            'nom_tractament' => 'tractament5',
            'descripcio' => 'Descripció del tractamen5'
        ));
    }
}
