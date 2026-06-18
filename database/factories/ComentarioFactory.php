<?php

namespace Database\Factories;

use App\Models\Comentario;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Postagem;

/**
 * @extends Factory<Comentario>
 */
class ComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'postagem_id' => Postagem::factory(),
            'autor' => fake()->name(),
        'texto' => fake()->sentence()
        ];
    }
}
