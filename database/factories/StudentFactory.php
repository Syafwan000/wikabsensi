<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $rombel = array(
            'BDP XI-1' => 'BDP XI-1',
            'BDP XI-2' => 'BDP XI-2',
            'HTL XI-1' => 'HTL XI-1',
            'MMD XI-1' => 'MMD XI-1',
            'MMD XI-2' => 'MMD XI-2',
            'OTKP XI-1' => 'OTKP XI-1',
            'OTKP XI-2' => 'OTKP XI-2',
            'RPL XI-1' => 'RPL XI-1',
            'RPL XI-2' => 'RPL XI-2',
            'RPL XI-3' => 'RPL XI-3',
            'RPL XI-4' => 'RPL XI-4',
            'RPL XI-5' => 'RPL XI-5',
            'TBG XI-1' => 'TBG XI-1',
            'TBG XI-2' => 'TBG XI-2',
            'TKJ XI-1' => 'TKJ XI-1',
            'TKJ XI-2' => 'TKJ XI-2',
            'TKJ XI-3' => 'TKJ XI-3',
            'TKJ XI-4' => 'TKJ XI-4'
        );

        $rayon = array(
            'Ciawi 1' => 'Ciawi 1',
            'Ciawi 2' => 'Ciawi 2',
            'Ciawi 3' => 'Ciawi 3',
            'Ciawi 4' => 'Ciawi 4',
            'Ciawi 5' => 'Ciawi 5',
            'Cibedug 1' => 'Cibedug 1',
            'Cibedug 2' => 'Cibedug 2',
            'Cibedug 3' => 'Cibedug 3',
            'Cicurug 1' => 'Cicurug 1',
            'Cicurug 2' => 'Cicurug 2',
            'Cicurug 3' => 'Cicurug 3',
            'Cicurug 4' => 'Cicurug 4',
            'Cicurug 5' => 'Cicurug 5',
            'Cicurug 6' => 'Cicurug 6',
            'Cicurug 7' => 'Cicurug 7',
            'Cisarua 1' => 'Cisarua 1',
            'Cisarua 2' => 'Cisarua 2',
            'Cisarua 3' => 'Cisarua 3',
            'Cisarua 4' => 'Cisarua 4',
            'Cisarua 5' => 'Cisarua 5',
            'Cisarua 6' => 'Cisarua 6',
            'Sukasari 1' => 'Sukasari 1',
            'Sukasari 2' => 'Sukasari 2',
            'Tajur 1' => 'Tajur 1',
            'Tajur 2' => 'Tajur 2',
            'Tajur 3' => 'Tajur 3',
            'Tajur 4' => 'Tajur 4',
            'Tajur 5' => 'Tajur 5',
            'Wikrama 1' => 'Wikrama 1',
            'Wikrama 2' => 'Wikrama 2',
            'Wikrama 3' => 'Wikrama 3',
            'Wikrama 4' => 'Wikrama 4'
        );

        return [
            'nis' => $this->faker->randomNumber(8),
            'nama' => $this->faker->name(),
            'rombel' => array_rand($rombel),
            'rayon' => array_rand($rayon),
            'username' => $this->faker->userName(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ];
    }
}
