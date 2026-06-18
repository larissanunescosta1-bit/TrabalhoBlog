<?php

namespace Database\Factories;

use App\Models\Postagem;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;

/**
 * @extends Factory<Postagem>
 */
class PostagemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'categoria_id' => Categoria::factory(),
            'autor' => fake()->name(),
         'titulo' => fake()->sentence(3),
     'texto' => fake()->paragraph()
        ];
    }
}
