<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
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
        Storage::disk('public')->makeDirectory('books');

        // Download a fake realistic image
        $imageUrl = 'https://picsum.photos/640/480'; // URL for realistic images
        $imageName = Str::random(10) . '.jpg';
        $imagePath = 'books/' . $imageName;

      
        $imageContent = Http::get($imageUrl)->body();
        Storage::disk('public')->put($imagePath, $imageContent);

        return [
            'name' => $this->faker->sentence(3), // Generate a random book title
            'author' => $this->faker->name,      // Generate a random author name
            'image' => $imagePath,              // Path to the downloaded image
        ];
    }
}
