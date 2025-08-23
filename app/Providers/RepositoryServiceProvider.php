<?php

namespace App\Providers;

use App\Contracts\Repositories\ItemRepositoryInterface;
use App\Repositories\AuthRepository;
use App\Repositories\CatalogRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\Contracts\AuthRepositoryInterface;
use App\Repositories\Contracts\CatalogRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\FileRepositoryInterface;
use App\Repositories\FileRepository;
use App\Repositories\ItemRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register repositories in service container
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(CatalogRepositoryInterface::class, CatalogRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(FileRepositoryInterface::class, FileRepository::class);
        $this->app->bind(ItemRepositoryInterface::class, ItemRepository::class);
    }
}