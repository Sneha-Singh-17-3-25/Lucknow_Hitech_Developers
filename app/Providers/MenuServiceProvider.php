<?php

namespace App\Providers;

<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Auth;
>>>>>>> f86465329cac696875aedcdf017dcf499179cd7c
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
<<<<<<< HEAD
    $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenu.json'));
    $verticalMenuData = json_decode($verticalMenuJson);

    // Share all menuData to all the views
    \View::share('menuData', [$verticalMenuData]);
=======
    // dd(Auth::user());
    // $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenu.json'));
    // $verticalMenuData = json_decode($verticalMenuJson);

    // Share all menuData to all the views
    // \View::share('menuData', [$verticalMenuData]);
>>>>>>> f86465329cac696875aedcdf017dcf499179cd7c
  }
}
