<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubCategory;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategoriesData = [
            [
                'name' => 'Day Trip Safari',
                'slug' => 'day-trip-safari',
                'categoryId' => '1',
            ],

            [
                'name' => 'Multi Day Safaris',
                'slug' => 'multi-day-safaris',
                'categoryId' => '1',
            ],

        ];

        $subcategories = SubCategory::all();

        if(empty($subcategories))
        {
            foreach($subcategoriesData as $subcategory)
            {
                SubCategory::create($subcategory);
            }
        }
    }
}
