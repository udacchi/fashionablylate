<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => '商品のお届けについて']);
        Category::create(['name' => '商品の交換について']);
        Category::create(['name' => '商品トラブル']);
        Category::create(['name' => 'ショップへのお問い合わせ']);
        Category::create(['name' => 'その他']);
    }
}
