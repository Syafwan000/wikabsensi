<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Admin::factory(5)->create();
        Student::factory(5)->create();

        Admin::create([
            'nama' => 'Muhammad Syafwan Ardiansyah',
            'username' => 'syafwan000',
            'password' => bcrypt('12345')
        ]);
    }
}
