<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface
{
    public function FindOrCreate(string $category_name);
}