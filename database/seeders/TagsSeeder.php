<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::insert([
            ['name' => 'Laravel'],
            ['name' => 'PHP'],
            ['name' => 'MySQL'],
            ['name' => 'API'],
            ['name' => 'Backend'],
            ['name' => 'Frontend'],
            ['name' => 'JavaScript'],
            ['name' => 'React'],
        ]);
    }
}
