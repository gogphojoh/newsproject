<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Core\Repositories\UserRepository;
use App\Infrastructure\Persistence\EloquentUserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
    }

    public function boot()
    {
        // Any bootstrapping code can go here
    }
}
