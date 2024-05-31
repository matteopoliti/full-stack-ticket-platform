<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = config('ticket_categories');

        foreach ($categories as $element) {
            Category::create([
                'name' => $element['name'],
                'description' => $element['description']
            ]);
        }
    }
}
