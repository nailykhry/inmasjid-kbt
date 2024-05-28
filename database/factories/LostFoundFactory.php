<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LostFound>
 */
class LostFoundFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category' => 'Hilang',
            'item_name' => 'Kunci',
            'description' => 'Ini deskripsi',
            'location' => fake()->address(),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'pic_name' => fake()->name(),
            'pic_phone' => fake()->phoneNumber()
        ];
    }

}
