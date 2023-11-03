<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [

            [
                'name' => 'faker1',
                'email' => 'faker@exam.com',
                'password' => 'password',
            ],

            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => 'admin',
            ],
        ];

        foreach ($classes  as $dep){
            $value = new  User();

            $value->name = $dep['name'];
            $value->email = $dep['email'];
            $value->password = $dep['password'];

            $value->save();
        }
    }
}
