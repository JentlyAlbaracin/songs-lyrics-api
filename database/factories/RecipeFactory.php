<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->text,
            'ingredients' => $this->faker->text,
            'steps' => $this->faker->text,
            'time' => $this->generateRandomTimeString(),
        ];
    }

    private function generateRandomTimeString(): string
    {
        $timeString = '';
        $hours = $this->faker->numberBetween(0, 23);
        $minutes = $this->faker->numberBetween(0, 59);
        $seconds = $this->faker->numberBetween(0, 59);

        $ranNum = $this->faker->randomElement([0, 1]);
        if ($ranNum == 0) {
            if ($hours > 0) {
                $timeString .= $hours . ' ' . ($hours == 1 ? 'hour' : 'hours');
            }
            if ($minutes > 0) {
                $timeString .= ($hours > 0 ? ' and ' : '') . $minutes . ' ' . ($minutes == 1 ? 'minute' : 'minutes');
            }
            if ($seconds > 0) {
                $timeString .= ($hours > 0 || $minutes > 0 ? ' and ' : '') . $seconds . ' ' . ($seconds == 1 ? 'second' : 'seconds');
            }
            return $timeString;
        } else {
            if ($minutes > 0) {
                $timeString .= $minutes . ' ' . ($minutes == 1 ? 'minute' : 'minutes');
            }
            if ($seconds > 0) {
                $timeString .= ($minutes > 0 ? ' and ' : '') . $seconds . ' ' . ($seconds == 1 ? 'second' : 'seconds');
            }
            return $timeString;
        }
    }
}
