<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class MenuHelper
{
    public static function getMenuData()
    {
        // if (!Auth::check()) {
        //     return [];
        // }

        // $user = Auth::user();
        // dd($user);

        // if ($user->hasRole('super-admin')) {
        //     $file = 'verticalMenu.json';
        // } elseif ($user->hasRole('seller')) {
        //     $file = 'verticalMenuSeller.json';
        // } else {
        //     $file = 'verticalMenuUser.json';
        // }

        // $menuPath = base_path("resources/menu/{$file}");
        // if (file_exists($menuPath)) {
        //     return json_decode(file_get_contents($menuPath));
        // }

        // return [];
        // $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenu.json'));
        // $verticalMenuData = json_decode($verticalMenuJson);

        // // Share all menuData to all the views
        // \View::share('menuData', [$verticalMenuData]);
    }
}
