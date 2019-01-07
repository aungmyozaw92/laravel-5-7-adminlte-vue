<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    public function registerBindings()
    {

        $this->app->bind(
            \App\Repositories\Admin\Category\CategoryRepository::class,
            \App\Repositories\Admin\Category\EloquentCategoryRepository::class
        );

        $this->app->bind(
            \App\Repositories\Admin\SubCategory\SubCategoryRepository::class,
            \App\Repositories\Admin\SubCategory\EloquentSubCategoryRepository::class
        );

        $this->app->bind(
            \App\Repositories\Admin\Post\PostRepository::class,
            \App\Repositories\Admin\Post\EloquentPostRepository::class
        );
       
       //frontend
        $this->app->bind(
            \App\Repositories\Frontend\Category\CategoryRepository::class,
            \App\Repositories\Frontend\Category\EloquentCategoryRepository::class
        );

        $this->app->bind(
            \App\Repositories\Frontend\Post\PostRepository::class,
            \App\Repositories\Frontend\Post\EloquentPostRepository::class
        );
    }
}
