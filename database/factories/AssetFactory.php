<?php

namespace Database\Factories;

use App\Http\Enums\AssetStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asset>
 */
class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'serial_number' => Str::random(10),
            'status' => $this->faker->randomElement(AssetStatus::cases())
        ];
    }
}
