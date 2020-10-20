<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            "name" => 'Technical',
        ]);
        Category::create([
            "name" => 'Aptitude',
        ]);
        Category::create([
            "name" => 'Logical',
        ]);
    }
}
