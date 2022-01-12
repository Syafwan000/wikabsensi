<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Rayon;
use App\Models\Student;
use App\Models\Rombel;
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

        // Admin
        Admin::factory(5)->create();
        Admin::create([
            'nama' => 'Maman Resing',
            'username' => 'ngab01',
            'password' => bcrypt('password')
        ]);

        // Student
        Student::factory(10)->create();
        Student::create([
            'nis' => '12008020',
            'nama' => 'Budi Repsol',
            'rombel' => 'RPL XI-3',
            'rayon' => 'Wikrama 4',
            'username' => 'ngab02',
            'password' => bcrypt('password')
        ]);

        // Rombel
        Rombel::create([
            'rombel' => 'BDP XI-1'
        ]);

        Rombel::create([
            'rombel' => 'BDP XI-2'
        ]);

        Rombel::create([
            'rombel' => 'HTL XI-1'
        ]);

        Rombel::create([
            'rombel' => 'MMD XI-1'
        ]);

        Rombel::create([
            'rombel' => 'MMD XI-2'
        ]);

        Rombel::create([
            'rombel' => 'OTKP XI-1'
        ]);

        Rombel::create([
            'rombel' => 'OTKP XI-2'
        ]);

        Rombel::create([
            'rombel' => 'RPL XI-1'
        ]);

        Rombel::create([
            'rombel' => 'RPL XI-2'
        ]);

        Rombel::create([
            'rombel' => 'RPL XI-3'
        ]);
        
        Rombel::create([
            'rombel' => 'RPL XI-4'
        ]);

        Rombel::create([
            'rombel' => 'RPL XI-5'
        ]);

        Rombel::create([
            'rombel' => 'TBG XI-1'
        ]);

        Rombel::create([
            'rombel' => 'TBG XI-2'
        ]);

        Rombel::create([
            'rombel' => 'TKJ XI-1'
        ]);

        Rombel::create([
            'rombel' => 'TKJ XI-2'
        ]);

        Rombel::create([
            'rombel' => 'TKJ XI-3'
        ]);

        Rombel::create([
            'rombel' => 'TKJ XI-4'
        ]);

        // Rayon
        Rayon::create([
            'rayon' => 'Ciawi 1',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Ciawi 2',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Ciawi 3',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Ciawi 4',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Ciawi 5',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Cibedug 1',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Cibedug 2',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Cibedug 3',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Cicurug 1',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Cicurug 2',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Cicurug 3',
            'pembimbing_rayon' => 'Orang'
        ]);
        
        Rayon::create([
            'rayon' => 'Cicurug 4',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Cicurug 5',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Cicurug 6',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Cicurug 7',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Cisarua 1',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Cisarua 2',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Cisarua 3',
            'pembimbing_rayon' => 'Orang'
        ]);
        
        Rayon::create([
            'rayon' => 'Cisarua 4',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Cisarua 5',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Cisarua 6',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Sukasari 1',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Sukasari 2',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Tajur 1',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Tajur 2',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Tajur 3',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Tajur 4',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Tajur 5',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Wikrama 1',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Wikrama 2',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Wikrama 3',
            'pembimbing_rayon' => 'Orang'
        ]);

        Rayon::create([
            'rayon' => 'Wikrama 4',
            'pembimbing_rayon' => 'Orang'
        ]);
    }
}
