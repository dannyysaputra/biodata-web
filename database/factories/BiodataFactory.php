<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BiodataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_user' => '1',
            'nama' => $this->faker->name(),
            'tanggal_lahir' => $this->faker->date($format='Y-m-d', $min='1985-1-1', $max='2005-12-30'),
            'alamat' => $this->faker->streetName,
            'hobi' => $this->faker->randomElement(['Membaca buku', 'Menonton film', 'Skate', 'Basket'])
        ];
    }
}
