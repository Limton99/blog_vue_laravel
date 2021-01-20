<?php


namespace Database\Seeders;


use App\Models\Blog\Category;
use App\Models\Blog\Tag;
use Illuminate\Database\Seeder;

class TagsCategorySeeder extends Seeder
{
    public function run()
    {
        Tag::factory()->count(10)->create();
        Category::factory()->count(10)->create();
    }
}
