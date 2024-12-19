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
        // Category
        $category = [
            [
                'id' => 1,
                'name' => 'Album',
            ],
            [
                'id' => 2,
                'name' => 'Single',
            ],
        ];

        foreach ($category as $cat) {
            Category::create($cat);
        }
    }
}
