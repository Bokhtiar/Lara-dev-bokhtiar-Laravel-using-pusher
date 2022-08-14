<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return [
            'value' => $this->faker->numberBetween(0, 30),
            'color' => $this->faker->hexColor
        ];
    }
}
