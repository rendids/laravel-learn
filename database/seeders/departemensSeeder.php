<?php

namespace Database\Seeders;

use App\Models\departemen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class departemensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [

            [
                'name' => 'Departemen Keuangan',
                'location' => 'lantai 1',
            ],

            [
                'name' => 'Departemen Sumber Daya Manusia',
                'location' => 'lantai 15',
            ],

            [
                'name' => 'Departemen Pemasaran ',
                'location' => 'lantai 7',
            ],

            [
                'name' => 'Departemen Teknologi Informasi ',
                'location' => 'lantai 9',
            ],
        ];

        foreach ($classes  as $dep){
            $value = new  departemen();

            $value->name = $dep['name'];
            $value->location = $dep['location'];

            $value->save();
        }
    }
}
