 <nav id="navbar" class="fixed top-0 left-0 w-full py-4 z-50 transition-all duration-300">
     <div class="w-11/12 max-w-screen-xl mx-auto flex justify-between items-center">
         <a href="#" class="flex items-center space-x-2">
             <!-- Company Logo -->
             <img src="{{ asset('images/Alogo.png') }}" alt="Company Logo" class="h-8 w-auto mix-blend-normal" />

<<<<<<< HEAD

=======
>>>>>>> f86465329cac696875aedcdf017dcf499179cd7c
             <!-- Company Name -->
             <span class="text-xl font-heading font-bold text-white">
                 Lucknow <span class="text-saffron">Hitech</span> <span class="text-white">Developers</span>
             </span>
         </a>


         <div class="hidden md:flex items-center space-x-6">
             <a href="{{ route('landing_index') }}"
                 class="text-white hover:text-saffron transition-colors duration-300">Home</a>
             <!-- <a href="{{route('landing_agents')}}"
                    class="text-white hover:text-saffron transition-colors duration-300">Agents</a> -->
             <a href="{{ route('landing_about') }}"
                 class="text-white hover:text-saffron transition-colors duration-300">About Us</a>
             <a href="{{ route('landing_contact') }}"
                 class="text-white hover:text-saffron transition-colors duration-300">Contact</a>
         </div>
         <div class="hidden md:flex items-center space-x-4">
             @guest
             <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal"
                 class="px-5 py-2 bg-saffron hover:bg-saffron-dark text-white rounded-md transition-colors duration-300 flex items-center">
                 <i class="fas fa-sign-in-alt mr-2"></i> Login
             </a>
<<<<<<< HEAD
             <a href="#"
=======
             <a href="{{route('landing_postproperty')}}"
>>>>>>> f86465329cac696875aedcdf017dcf499179cd7c
                 class="px-5 py-2 bg-saffron hover:bg-saffron-dark text-white rounded-md transition-colors duration-300 flex items-center">
                 <i class="fas fa-plus-circle mr-2"></i> Post Property
             </a>
             @endguest

             @auth
             <!-- Liked Properties Counter -->
             <a href="#" class="flex items-center text-white hover:text-saffron-light transition-colors duration-300">
                 <i class="fas fa-heart fa-lg mr-1"></i>
                 <span class="flex items-center">
                     <span class="ml-1 bg-white text-saffron rounded-full px-2 py-0.5 text-xs font-bold">
                         {{-- {{ Auth::check() ? Auth::user()->likedProperties()->count() ?? 0 : 0 }} --}}
                         0
                     </span>
                 </span>
             </a>


             <!-- User Profile Dropdown -->
             <div class="relative group">
                 <button class="flex items-center text-white space-x-2 focus:outline-none">
                     <div
                         class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-800 font-semibold">
                         {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                     </div>
                     <span>Hi, {{ strtok(Auth::user()->name, ' ') }} <i
                             class="fas fa-chevron-down text-xs ml-1"></i></span>
                 </button>
                 <div
                     class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden group-focus-within:block z-50">
                     <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                     <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">My Properties</a>
                     <a href="" class="block px-4 py-2 text-gray-700 hover:bg-gray-100" id="logout">Logout</a>
                 </div>
             </div>

             <!-- Post Property Button -->
             <a href="#"
                 class="px-5 py-2 bg-saffron hover:bg-saffron-dark text-white rounded-md transition-colors duration-300 flex items-center">
                 <i class="fas fa-plus-circle mr-2"></i> Post Property
             </a>
             @endauth
         </div>

         <!-- Mobile menu toggle -->
         <button class="md:hidden text-white focus:outline-none">
             <i class="fas fa-bars text-2xl"></i>
         </button>
     </div>
 </nav>