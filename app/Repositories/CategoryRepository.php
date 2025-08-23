<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function FindOrCreate(string $category_name)
    {
        return Category::firstOrCreate([
            'category_name' => $category_name
        ]);
    }
}