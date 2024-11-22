<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Imoveis>
 */
class ImoveisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'des_nome' => $this->faker->word, // Nome do imóvel
            'num_valor' => $this->faker->randomFloat(2, 50000, 500000), // Valor entre 50.000 e 500.000
            'num_tamanho' => $this->faker->numberBetween(50, 500), // Tamanho entre 50m² e 500m²
            'des_informacoes' => $this->faker->paragraph, // Informações em formato de texto
            'des_endereco' => $this->faker->address, // Endereço fictício
            'des_bairro' => $this->faker->word, // Nome de bairro fictício
            'des_cidade' => $this->faker->city, // Nome de cidade fictícia
            'des_estado' => $this->faker->state, // Nome de estado fictício
        ];
    }
}
