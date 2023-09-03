<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProduckFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->word(),
            'slug' => $this->faker->unique()->slug(),
            'harga' => mt_rand(20000, 200000),
            'deskripsi' => $this->faker->sentence(mt_rand(50, 100)),
            'user_id' => mt_rand(1,10),
            'category_id' => mt_rand(1,3),
            'status' => 'disetujui'
        ];
    }
}
