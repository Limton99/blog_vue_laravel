<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            'title' => 'The Crazy Programmer.',
            'description' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
            'image' => '/images/1612845882.jpg',
            'user_id' => 1,
        ]);

        DB::table('blog_tags')->insert([
            'blog_id' => 2,
            'tag_id' => rand(1, 10),
        ]);

        DB::table('blog_categories')->insert([
            'blog_id' => 2,
            'category_id' => rand(1, 10),
        ]);

        // Second

        DB::table('blogs')->insert([
            'title' => 'David Walsh Blog (DWB)',
            'description' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
            'image' => '/images/1612845882.jpg',
            'user_id' => 1,
        ]);

        DB::table('blog_tags')->insert([
            'blog_id' => 3,
            'tag_id' => rand(1, 10),
        ]);

        DB::table('blog_categories')->insert([
            'blog_id' => 3,
            'category_id' => rand(1, 10),
        ]);

        //Third

        DB::table('blogs')->insert([
            'title' => 'Droids On Roids Blog',
            'description' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
            'image' => '/images/1612845882.jpg',
            'user_id' => 1,
        ]);

        DB::table('blog_tags')->insert([
            'blog_id' => 4,
            'tag_id' => rand(1, 10),
        ]);

        DB::table('blog_categories')->insert([
            'blog_id' => 4,
            'category_id' => rand(1, 10),
        ]);
    }
}
