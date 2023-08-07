<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Safari;

class SafariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $safarisData = [
            [
                'name' => 'Kenya Single Day Safaris',
                'slug' => 'kenya-single-day-safaris',
                'price_from' => '1000',
                'residents_price' => '1500',
                'non_residents_price' => '2000', 
                'entry_fee' => true,
                'transport' => true,
                'tour_guide' => true, 
                'drinks' => false, 
                'lunch' => false, 
                'dinner' => false,
                'accomodation' => true, 
                'description' => '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 
                'location' => 'Narok', 
                'map' => '', 
                'link' => '', 
                'featured' => true, 
                'cover' => '', 
                'gallery' =>, 
                'subcategoryId' =>, 
                'itineraryId' =>, 
                'categoryId' =>
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

        $safaris = Safari::all();

        if(empty($safaris))
        {
            foreach($safarisData as $safari)
            {
                Safari::create($safari);
            }
        }
    }
}
