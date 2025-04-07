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
        $user=new User();
        $user->full_name="Roshan Dhungana";
        $user->email="roshanstar@gmail.com";
        $user->password="pass@123";
        $user->role="Admin";
        $user->position="Programmer";
        $user->phonenumber="9823681753";
        $user->notes=fake()->paragraph();
        $user->save();
    }
}
