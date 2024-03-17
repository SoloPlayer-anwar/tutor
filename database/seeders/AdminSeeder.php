<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->email = "admin@gmail.com";
        $admin->password = Hash::make("123456789");
        $admin->name = "admin";
        $admin->role = "admin";
        $admin->save();
        $this->command->info("Berhasil");
    }
}
