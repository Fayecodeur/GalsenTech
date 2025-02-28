<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\SocialMedia;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $socials = SocialMedia::orderBy("id", "desc")->get();
        $categories = Category::where("isActive", 1)->orderBy('created_at', 'DESC')->get();

        view()->share("socials", $socials);
        view()->share("categories", $categories);
    }
}
