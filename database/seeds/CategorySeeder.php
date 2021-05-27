<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categories = ['art','cuisine','fashion','music','culture','dance','animals','travel'];

      foreach($categories as $category) {
        $category_obj = new Category();
        $category_obj->name = $category;
        $category_obj->slug = Str::slug($category,'-');
        $category_obj->save();
      }
    }
}
