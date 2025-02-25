<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'designation'=>$this->faker->unique()->sentence(),
            'description'=>$this->faker->text(),
            'type'=>$this->faker->randomElement(['Roman','Livre','Magazine','Journal','Bande dessinée','Manuel scolaire']),
            'editeur'=>$this->faker->company(),
            'categorie'=>$this->faker->randomElement(['Dpcumentaires','Poésie','Mangas','Journaux','Magazines','Albums','Technologie']),
            'prix'=>$this->faker->randomFloat(2,0,1000),
            'auteur'=>$this->faker->name(),
            'cover'=> 'book.png'

        ];
    }
}
