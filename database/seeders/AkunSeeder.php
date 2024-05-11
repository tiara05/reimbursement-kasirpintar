<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'nip'=>'1234',
                'name'=>'Doni',
                'email'=>'1234@gmail.com',
                'role'=>'direktur',
                'password'=>Hash::make('123456')
            ],
            
            [
                'nip'=>'1235',
                'name'=>'Dono',
                'email'=>'1235@gmail.com',
                'role'=>'finance',
                'password'=>Hash::make('123456')
            ],
            [
                'nip'=>'1236',
                'name'=>'Dona',
                'email'=>'1236@gmail.com',
                'role'=>'staff',
                'password'=>Hash::make('123456')
            ],

        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
