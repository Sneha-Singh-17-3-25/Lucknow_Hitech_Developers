<style>
@import url('https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Dosis:wght@200..800&family=Paytone+One&family=Raleway:ital,wght@0,100..900;1,100..900&family=Rammetto+One&family=Special+Gothic&display=swap');

.special-gothic-regular {
    font-family: "Special Gothic", sans-serif;
    font-weight: 400;
    font-style: normal;
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
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
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

        if ($currentRouteName === $menu->slug) {
        $activeClass = 'active';
        }
        elseif (isset($menu->submenu)) {
        if (gettype($menu->slug) === 'array') {
        foreach($menu->slug as $slug){
        if (str_contains($currentRouteName,$slug) and strpos($currentRouteName,$slug) === 0) {
        $activeClass = 'active open';
        }
        }
        }
        else{
        if (str_contains($currentRouteName,$menu->slug) and strpos($currentRouteName,$menu->slug) === 0) {
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
                <i class="{{ $menu->icon }}"></i>
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