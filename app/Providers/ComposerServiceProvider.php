<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Views\Composers\NavigationComposer;
use App\Category;
use App\Post;

class ComposerServiceProvider extends ServiceProvider
{
  /**
   * Bootstrap the application services.
   *
   * @return void
   */
  public function boot()
  {
    view()->composer('blog.partials.sidebar', NavigationComposer::class);
  }

  /**
   * Register the application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }
}
