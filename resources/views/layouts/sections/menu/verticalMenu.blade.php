<style>
@import url('https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Dosis:wght@200..800&family=Paytone+One&family=Raleway:ital,wght@0,100..900;1,100..900&family=Rammetto+One&family=Special+Gothic&display=swap');

.special-gothic-regular {
    font-family: "Special Gothic", sans-serif;
    font-weight: 400;
    font-style: normal;
}

/* Enhanced active menu item styles */
.menu-item.active {
    background-color: transparent !important;
    /* border-radius: 0.375rem; */
}

.menu-item.active > .menu-link {
    color: #696cff !important;
    font-weight: 600;
}

.menu-item.active > .menu-link i {
    color: #696cff !important;
    transform: scale(1.1);
}

.menu-item.active .menu-icon {
    color: #696cff !important;
}

/* Submenu active item styles */
.menu-sub .menu-item.active {
    /* background-color: none !important; */
}

.menu-sub .menu-item.active > .menu-link {
    color: #696cff !important;
    font-weight: 500;
}

/* Hover effect for menu items */
.menu-item:not(.active):hover {
    background-color: rgba(105, 108, 255, 0.08);
    border-radius: 0.375rem;
    transition: all 0.3s ease;
}

/* Transition effects for smoother interactions */
.menu-item, .menu-link, .menu-icon {
    transition: all 0.3s ease;
}
</style>



<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <!-- ! Hide app brand if navbar-full -->
    <div class="app-brand demo">
        <a href="{{url('/')}}" class="app-brand-link">
            <span class="app-brand-logo demo" style="font-size: large;">
                @include('_partials.macros',["width"=>25,"withbg"=>'var(--bs-primary)'])
            </span>
            <span class=" demo menu-text fw-bold ms-2 special-gothic-regular">SELLSQUARE</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="fa-solid fa-chevron-left align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    @php
    use Illuminate\Support\Facades\Auth;

    $verticalMenuJson = null;

    if (Auth::check()) {
    if (auth()->user()->hasRole('super-admin')) {
    $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenu.json'));
    } else {
    $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenuSeller.json'));
    }

    // Decode JSON and wrap in the correct structure
    $decodedMenu = json_decode($verticalMenuJson);

    $menuData = [
            (object)[
                'menu' => $decodedMenu->menu
            ]
        ];

    
    }
    
    @endphp

    <ul class="menu-inner py-1">
        @foreach ($menuData[0]->menu as $menu)

        {{-- adding active and open class if child is active --}}

        {{-- menu headers --}}
        @if (isset($menu->menuHeader))
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">{{ __($menu->menuHeader) }}</span>
        </li>

        @else

        {{-- active menu method --}}
        @php
        $activeClass = null;
        $currentRouteName = Route::currentRouteName();
        $currentUrl = request()->path();

        // Check if the current route matches this menu item
        if ($currentRouteName === $menu->slug) {
            $activeClass = 'active';
        }
        // Check if the current URL matches this menu item
        elseif (isset($menu->url) && ltrim($menu->url, '/') === $currentUrl) {
            $activeClass = 'active';
        }
        // Check if any submenu is active
        elseif (isset($menu->submenu)) {
            // Check submenu items for active state
            $hasActiveSubmenu = false;
            
            foreach ($menu->submenu as $submenu) {
                // Check if submenu route matches
                if (isset($submenu->slug) && $currentRouteName === $submenu->slug) {
                    $hasActiveSubmenu = true;
                    break;
                }
                
                // Check if submenu URL matches
                if (isset($submenu->url) && ltrim($submenu->url, '/') === $currentUrl) {
                    $hasActiveSubmenu = true;
                    break;
                }
                
                // Check nested submenus if they exist
                if (isset($submenu->submenu)) {
                    foreach ($submenu->submenu as $nestedSubmenu) {
                        if (isset($nestedSubmenu->slug) && $currentRouteName === $nestedSubmenu->slug) {
                            $hasActiveSubmenu = true;
                            break 2;
                        }
                        
                        if (isset($nestedSubmenu->url) && ltrim($nestedSubmenu->url, '/') === $currentUrl) {
                            $hasActiveSubmenu = true;
                            break 2;
                        }
                    }
                }
            }
            
            if ($hasActiveSubmenu) {
                $activeClass = ' open';
            }
            // Original slug-based check for backward compatibility
            elseif (gettype($menu->slug) === 'array') {
                foreach($menu->slug as $slug){
                    if (str_contains($currentRouteName, $slug) && strpos($currentRouteName, $slug) === 0) {
                        $activeClass = 'active open';
                        break;
                    }
                }
            }
            else {
                if (str_contains($currentRouteName, $menu->slug) && strpos($currentRouteName, $menu->slug) === 0) {
                    $activeClass = 'active open';
                }
            }
        }
        @endphp

        {{-- main menu --}}
        <li class="menu-item {{$activeClass}}">
            <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0);' }}"
                class="{{ isset($menu->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}" @if (isset($menu->target)
                and !empty($menu->target)) target="_blank" @endif>
                @isset($menu->icon)
                <i class="{{ $menu->icon }} text-primary"></i>
                @endisset
                <div>{{ isset($menu->name) ? __($menu->name) : '' }}</div>
                @isset($menu->badge)
                <div class="badge bg-{{ $menu->badge[0] }} rounded-pill ms-auto">{{ $menu->badge[1] }}</div>
                @endisset
            </a>

            {{-- submenu --}}
            @isset($menu->submenu)
            @include('layouts.sections.menu.submenu',['menu' => $menu->submenu])
            @endisset
        </li>
        @endif
        @endforeach
    </ul>

</aside>