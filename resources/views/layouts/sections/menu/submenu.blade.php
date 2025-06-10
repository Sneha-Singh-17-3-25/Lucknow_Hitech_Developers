<ul class="menu-sub">
  @if (isset($menu))
    @foreach ($menu as $submenu)

    {{-- active menu method --}}
    @php
      $activeClass = null;
      $active = 'active open';
      $currentRouteName = Route::currentRouteName();
      $currentUrl = request()->path();

      // Check if the current route matches this submenu item
      if ($currentRouteName === $submenu->slug) {
          $activeClass = 'active';
      }
      // Check if the current URL matches this submenu item
      elseif (isset($submenu->url) && ltrim($submenu->url, '/') === $currentUrl) {
          $activeClass = 'active';
      }
      // Check if any nested submenu is active
      elseif (isset($submenu->submenu)) {
          // Check nested submenu items for active state
          $hasActiveNestedSubmenu = false;
          
          foreach ($submenu->submenu as $nestedSubmenu) {
              // Check if nested submenu route matches
              if (isset($nestedSubmenu->slug) && $currentRouteName === $nestedSubmenu->slug) {
                  $hasActiveNestedSubmenu = true;
                  break;
              }
              
              // Check if nested submenu URL matches
              if (isset($nestedSubmenu->url) && ltrim($nestedSubmenu->url, '/') === $currentUrl) {
                  $hasActiveNestedSubmenu = true;
                  break;
              }
          }
          
          if ($hasActiveNestedSubmenu) {
              $activeClass = $active;
          }
          // Original slug-based check for backward compatibility
          elseif (gettype($submenu->slug) === 'array') {
              foreach($submenu->slug as $slug){
                  if (str_contains($currentRouteName, $slug) && strpos($currentRouteName, $slug) === 0) {
                      $activeClass = $active;
                      break;
                  }
              }
          }
          else {
              if (str_contains($currentRouteName, $submenu->slug) && strpos($currentRouteName, $submenu->slug) === 0) {
                  $activeClass = $active;
              }
          }
      }
    @endphp

      <li class="menu-item {{$activeClass}}">
        <a href="{{ isset($submenu->url) ? url($submenu->url) : 'javascript:void(0)' }}" class="{{ isset($submenu->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}" @if (isset($submenu->target) and !empty($submenu->target)) target="_blank" @endif>
          @if (isset($submenu->icon))
          <i class="{{ $submenu->icon }}"></i>
          @endif
          <div>{{ isset($submenu->name) ? __($submenu->name) : '' }}</div>
          @isset($submenu->badge)
            <div class="badge bg-{{ $submenu->badge[0] }} rounded-pill ms-auto">{{ $submenu->badge[1] }}</div>
          @endisset
        </a>

        {{-- submenu --}}
        @if (isset($submenu->submenu))
          @include('layouts.sections.menu.submenu',['menu' => $submenu->submenu])
        @endif
      </li>
    @endforeach
  @endif
</ul>
