<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Computer>
 */
class ComputerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => $this->faker->company(),
            'name' => $this->faker->company(),
            'brand' => $this->faker->company(),
            'picture' => $this->faker->imageUrl(),
            'rent' => $this->faker->numerify('##.##'),
            'stocks' => $this->faker->numerify('##'),
            'os' => $this->faker->company(),
            'DISP_size' => $this->faker->company(),
            'RAM' => $this->faker->company(),
            'USB_port_num' => $this->faker->numerify('#'),
            'HDMI_port' => $this->faker->boolean(),

//            'email' => $this->faker->unique()->safeEmail(),
//            'email_verified_at' => now(),
//            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//            'remember_token' => Str::random(10),
        ];
    }
}
