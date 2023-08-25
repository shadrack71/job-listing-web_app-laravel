<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Listing;
use App\Models\ApiModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // $user = User::factory()->create();
        // Listing::factory(10)->create([
        //     'user_id' => $user->id
        // ]);
        // ApiModel::factory(50)->create();
// for($i = 0; $i < 5; $i++){

//     $user = User::factory()->create([
//         'role' => 'user'
//     ]);
//     Listing::factory(10)->create([
           
//             'user_id' => $user->id
//     ]);
// }

        // User::factory()->create([
        //     'name' => 'admin',
        //     'email' => 'admin@admin.com',
        //     'password' => '123456',
        //     'role'=>'admin'
        // ]);
        
    }
}