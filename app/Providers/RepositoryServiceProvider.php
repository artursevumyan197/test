<?php

namespace App\Providers;

use App\Rpository\Product\WriteProductRepository;
use App\Rpository\Product\WriteProductRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            WriteProductRepositoryInterface::class,
            WriteProductRepository::class
        );
    }
}
