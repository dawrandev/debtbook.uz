<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Client;
use App\Models\debt;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'role'=>'admin',
            'surname'=>'Sipatdinov',
            'name'=>'Dawranbek',
            'phone'=>'933651302',
            'location'=>'Aday awil',
            'login'=>'dawrandev',
            'password'=>'DawrandeV',
            'photo'=>'user.png'
        ]);
        User::create([
            'role'=>'user',
            'surname' => 'Mamutov',
            'name' => 'Islam',
            'phone' => '90 575 16 19',
            'location' => '26-kishi rayon',
            'login' => "aaaaaa",
            'password' => Hash::make('12345'),
            'photo' => 'user.png'

        ]);
    
        Client::create([
            'user_id'=>2,
            'name'=>'Dawranbek',
            'phone'=>'933651302',
        ]);
        Debt::create([
            'user_id'=>2,
            'client_id'=>'1',
            'summa'=>'10000',
            'date'=>'02-11-2023'
        ]);
        
    }
}
