<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoriesData = [
            [
                'name' => 'Kenya Safaris',
                'slug' => 'kenya-safaris',
            ],

            [
                'name' => 'Uganda Safaris',
                'slug' => 'uganda-safaris',
            ],

            [
                'name' => 'Tanzania Safaris',
                'slug' => 'tanzania-safaris',
            ],

        ];

        $categories = Category::all();

        if(empty($categories))
        {
            foreach($categoriesData as $category)
            {
                Category::create($category);
            }
        }
    }
}
