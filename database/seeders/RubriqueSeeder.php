<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RubriqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rubriques')->insert(
            array (
                0 =>
                    array (
                        'name' => 'Miss',
                    ),
                1 =>
                    array (
                        'name' => 'Mister',
                    ),
                2 =>
                    array (
                        'name' => 'Street wear',
                    ),
                3 =>
                    array (
                        'name' => 'Chant',
                    ),
                4 =>
                    array (
                        'name' => 'Gospel',
                    ),
                5 =>
                    array (
                        'name' => 'Rap',
                    ),
                6 =>
                    array (
                        'name' => 'Mbole',
                    ),
                7 =>
                    array (
                        'name' => 'Afro dance',
                    ),
            )
    );
    }
}
