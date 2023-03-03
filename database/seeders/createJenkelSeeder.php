<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class createJenkelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\jenis_kelamin::create(
        [
            'jenkel' => 'laki - laki'
        ],
        [
            'jenkel' => 'perempuam'
        ]
        );
    }
}
