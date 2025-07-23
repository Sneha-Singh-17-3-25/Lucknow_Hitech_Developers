<nav x-data="{ mobileMenuOpen: false }" id="navbar" class="fixed top-0 left-0 w-full py-4 z-50 transition-all duration-300">
    <div class="w-11/12 max-w-screen-xl mx-auto flex justify-between items-center">
        <a href="#" class="flex items-center space-x-2">
            <img src="{{ asset('images/Alogo.png') }}" alt="Company Logo" class="h-8 w-auto mix-blend-normal" />
            <span class="text-xl font-heading font-bold text-white">
                Lucknow <span class="text-saffron">Hitech</span> <span class="text-white">Developers</span>
            </span>
        </a>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center space-x-6">
            <a href="{{ route('landing_index') }}" class="text-white hover:text-saffron transition-colors duration-300">Home</a>
            <a href="{{ route('landing_about') }}" class="text-white hover:text-saffron transition-colors duration-300">About Us</a>
            <a href="{{ route('landing_contact') }}" class="text-white hover:text-saffron transition-colors duration-300">Contact</a>
        </div>

        <!-- Right Section -->
        <div class="hidden md:flex items-center space-x-4">
            @guest
            <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal"
                class="px-5 py-2 bg-saffron hover:bg-saffron-dark text-white rounded-md transition duration-300 flex items-center">
                <i class="fas fa-plus-circle mr-2"></i> Post Property
            </a>
            @endguest

            @auth
            <a href="{{ route('landing_postproperty') }}"
                class="px-5 py-2 bg-saffron hover:bg-saffron-dark text-white rounded-md transition duration-300 flex items-center">
                <i class="fas fa-plus-circle mr-2"></i> Post Property
            </a>

            <!-- Profile Dropdown -->
            <div class="relative group">
                <button class="flex items-center text-white space-x-2 focus:outline-none">
                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-800 font-semibold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <span><i class="fas fa-chevron-down text-xs ml-1"></i></span>
                </button>
                <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden group-hover:block z-50">
                    @if(Auth::user()->hasRole('super-admin'))
                    <a href="{{ route('dashboard-analytics') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Dashboard</a>
                    @endif
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                    <a href="{{ route('my-property') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">My Properties</a>
                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
                </div>
            </div>
            @endauth
        </div>

        <!-- Mobile menu toggle -->
        <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-white focus:outline-none">
            <i class="fas fa-bars text-2xl"></i>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" x-transition
        class="md:hidden mt-2 bg-gray-800 text-white rounded-lg shadow-lg mx-4 px-4 py-4 space-y-4"
        @click.away="mobileMenuOpen = false">
        <a href="{{ route('landing_index') }}" @click="mobileMenuOpen = false" class="block hover:text-saffron">Home</a>
        <a href="{{ route('landing_about') }}" @click="mobileMenuOpen = false" class="block hover:text-saffron">About Us</a>
        <a href="{{ route('landing_contact') }}" @click="mobileMenuOpen = false" class="block hover:text-saffron">Contact</a>

        @guest
        <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal"
            @click="mobileMenuOpen = false"
            class="block px-4 py-2 bg-saffron hover:bg-saffron-dark text-white rounded-md text-center">
            <i class="fas fa-plus-circle mr-2"></i> Post Property
        </a>
        @endguest

        @auth
        <a href="{{ route('landing_postproperty') }}"
            @click.prevent="mobileMenuOpen = false; setTimeout(() => { window.location.href = '{{ route('landing_postproperty') }}'; }, 100)"
            class="block px-4 py-2 bg-saffron hover:bg-saffron-dark text-white rounded-md text-center">
            <i class="fas fa-plus-circle mr-2"></i> Post Property
        </a>

        <a href="{{ route('my-property') }}" @click="mobileMenuOpen = false" class="block hover:text-saffron">My Properties</a>
        <a href="{{ route('logout') }}"
            @click.prevent="mobileMenuOpen = false; setTimeout(() => { window.location.href = '{{ route('logout') }}'; }, 100)"
            class="block hover:text-saffron">Logout</a>

        @endauth
    </div>
</nav>


@auth
<script>
    function trackAuth() {

    }
</script>
@endauth

@guest
<script>
    function trackAuth(event) {
        if (event) event.preventDefault();
        // alert('User is not authenticated');
        var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
        loginModal.show();
    }
</script>
<!-- js for open and close mobile menu toggle -->
<script src="//unpkg.com/alpinejs" defer></script>

@endguest