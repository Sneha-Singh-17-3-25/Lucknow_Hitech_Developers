@extends('layouts/users/app')
<!-- style for marquee -->
<style>
    @keyframes marquee {
        0% {
            transform: translateX(100%);
        }

        100% {
            transform: translateX(-80%);
        }
    }

    .animate-marquee {
        animation: marquee 20s linear infinite;
    }
</style>

<body class="font-sans text-slate bg-gray-50">
    <!-- this div for showToast -->
    <div id="toast-container" class="position-fixed top-0 end-0 p-3" style="z-index: 1100;"></div>

    <!-- Hero Section -->
    <section class="relative flex justify-center items-center text-center h-screen overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full">
            <video autoplay muted loop playsinline class="object-cover w-full h-full">
                <source src="{{asset('videos/header1.mp4')}}" type="video/mp4">
                <img src="https://images.pexels.com/photos/4161619/pexels-photo-4161619.jpeg?auto=compress&cs=tinysrgb&w=600"
                    alt="Luxury Property" class="object-cover w-full h-full">
            </video>
            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-black/70 via-black/50 to-black/60">
            </div>
        </div>

        <div class="w-11/12 max-w-screen-lg z-10">
            <p class="hidden lg:block text-white text-sm mb-3 tracking-wider font-light">
                RERA No. MH12345678
            </p>

            <h1 class="text-4xl md:text-6xl mb-3 leading-tight font-heading font-bold text-white text-shadow">Discover
                Your Dream <br><span class="text-saffron">Home in India</span></h1>
            <p class="text-white/80 max-w-xl mx-auto mb-8">Explore premium properties across major Lucknow areas with
                trusted
                experts guiding you every step of the way.</p>

            <div class="flex justify-center mt-8 mb-8">
                <button
                    class="tab active px-6 py-3 bg-transparent border-b-2 border-saffron text-white font-medium text-base cursor-pointer transition duration-300">BUY</button>
                <button
                    class="tab px-6 py-3 bg-transparent border-b-2 border-transparent text-white/70 text-base cursor-pointer transition duration-300">RENT</button>
                <button
                    class="tab px-6 py-3 bg-transparent border-b-2 border-transparent text-white/70 text-base cursor-pointer transition duration-300">SELL</button>
            </div>

            <div
                class="hero-search-form flex flex-col md:flex-row rounded-lg overflow-hidden shadow-2xl max-w-4xl mx-auto ">
                <div class="flex-1 bg-white/10 backdrop-blur-md flex items-center px-4">
                    <i class="fas fa-search text-white/70 mr-3"></i>
                    <input type="text"
                        class="w-full py-4 bg-transparent border-none text-white text-base focus:outline-none placeholder-white/70"
                        placeholder="Search by location, property type, or features" id="searchKeyword">
                </div>
                <div class="flex-shrink-0 flex">
                    <select class="bg-white/10 backdrop-blur-md border-none text-black py-4 px-6 focus:outline-none w-96 " id="searchCity">
                        <option value="" class="lg:text-right">City</option>
                        <option value="mumbai">Gomti Nagar</option>
                        <option value="delhi">Hazratganj</option>
                        <option value="bangalore">Indira Nagar</option>
                        <option value="hyderabad">Aliganj</option>
                        <option value="bangalore">Mahanagar</option>
                        <option value="hyderabad">Vibhuti Khand</option>
                        <option value="pune">Chinhat</option>
                        <option value="kanpur">Kanpur</option>
                        <option value="lucknow">Lucknow</option>
                        <option value="basti">Basti</option>
                    </select>
                    <!-- <button
                        class="bg-saffron hover:bg-saffron-dark text-white py-4 px-8 flex items-center justify-center text-base font-medium transition-colors duration-300" id="searchBtn">
                        Search
                    </button> -->
                </div>
            </div>

            <!-- Trust badges -->
            <div class="flex flex-wrap justify-center mt-12 gap-x-12 gap-y-4">
                <div class="flex items-center text-white/90">
                    <i class="fas fa-check-circle text-saffron mr-2"></i>
                    <span>RERA Approved</span>
                </div>
                <div class="flex items-center text-white/90">
                    <i class="fas fa-shield-alt text-saffron mr-2"></i>
                    <span>Verified Properties</span>
                </div>
                <div class="flex items-center text-white/90">
                    <i class="fas fa-users text-saffron mr-2"></i>
                    <span>10K+ Happy Customers</span>
                </div>
                <div class="flex items-center text-white/90">
                    <i class="fas fa-map-marked-alt text-saffron mr-2"></i>
                    <span>Major Lucknow Areas</span>
                </div>
            </div>
        </div>



        <!-- Scroll down indicator -->
        <div class="hidden md:absolute md:bottom-8 md:left-[50%] transform -translate-x-1/2 md:flex flex-col items-center animate-bounce">
            <span class="text-white/80 text-sm mb-2">Scroll Down</span>
            <i class="fas fa-chevron-down text-white/80"></i>
        </div>


        <style>
            /* Custom color for the saffron accent */
            .text-saffron {
                color: #FF9933;
            }

            .bg-saffron {
                background-color: #FF9933;
            }

            .hover\:bg-saffron-dark:hover {
                background-color: #E68A2E;
            }

            .border-saffron {
                border-color: #FF9933;
            }

            /* Text shadow for better readability against video */
            .text-shadow {
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
            }
        </style>
    </section>


    <!-- Real Estate Horizontal Marquee -->
    <div class="bg-gradient-to-r from-navy to-navy-light overflow-hidden whitespace-nowrap border-y border-saffron/20">
        <div class="animate-marquee flex inline-block py-4">
            <span class="text-white/90 text-lg font-medium mx-8">🏠 Premium Properties Available in Gomti
                Nagar</span>
            <span class="text-saffron text-2xl font-medium mx-8">•</span>
            <span class="text-white/90 text-lg font-medium mx-8">🏢 Luxury Apartments Starting From ₹50 Lakhs</span>
            <span class="text-saffron text-2xl font-medium mx-8">•</span>
            <span class="text-white/90 text-lg font-medium mx-8">🌟 RERA Approved Projects in Hazratganj</span>
            <span class="text-saffron text-2xl font-medium mx-8">•</span>
            <span class="text-white/90 text-lg font-medium mx-8">🔑 Ready to Move Homes in Indira Nagar</span>
            <span class="text-saffron text-2xl font-medium mx-8">•</span>
            <span class="text-white/90 text-lg font-medium mx-8">💰 Zero Brokerage on Direct Bookings</span>
            <span class="text-saffron text-2xl font-medium mx-8">•</span>
            <span class="text-white/90 text-lg font-medium mx-8">🏡 Villa Projects in Aliganj - Limited Units</span>
            <span class="text-saffron text-2xl font-medium mx-8">•</span>
            <span class="text-white/90 text-lg font-medium mx-8">📈 Property Values Rising - Invest Now</span>
            <span class="text-saffron text-2xl font-medium mx-8">•</span>
            <span class="text-white/90 text-lg font-medium mx-8">🎯 Get Free Property Consultation Today</span>
            <span class="text-saffron text-2xl font-medium mx-8">•</span>
            <span class="text-white/90 text-lg font-medium mx-8">🏠 Premium Properties Available in Gomti
                Nagar</span>
            <span class="text-saffron text-2xl font-medium mx-8">•</span>
            <span class="text-white/90 text-lg font-medium mx-8">🏢 Luxury Apartments Starting From ₹50 Lakhs</span>
            <span class="text-saffron text-2xl font-medium mx-8">•</span>
            <span class="text-white/90 text-lg font-medium mx-8">🌟 RERA Approved Projects in Hazratganj</span>
            <span class="text-saffron text-2xl font-medium mx-8">•</span>
            <span class="text-white/90 text-lg font-medium mx-8">🔑 Ready to Move Homes in Indira Nagar</span>
            <span class="text-saffron text-2xl font-medium mx-8">•</span>
            <span class="text-white/90 text-lg font-medium mx-8">💰 Zero Brokerage on Direct Bookings</span>
            <span class="text-saffron text-2xl font-medium mx-8">•</span>
            <span class="text-white/90 text-lg font-medium mx-8">🏡 Villa Projects in Aliganj - Limited Units</span>
            <span class="text-saffron text-2xl font-medium mx-8">•</span>
            <span class="text-white/90 text-lg font-medium mx-8">📈 Property Values Rising - Invest Now</span>
            <span class="text-saffron text-2xl font-medium mx-8">•</span>
            <span class="text-white/90 text-lg font-medium mx-8">🎯 Get Free Property Consultation Today</span>
            <span class="text-saffron text-2xl font-medium mx-8">•</span>
        </div>
    </div>

    <!-- Properties Section -->
    <section id="properties-section" class="relative py-20">
        <div class="absolute top-0 right-0 w-1/3 h-72 bg-navy/5 -z-10 rounded-l-full"></div>
        <div class="absolute bottom-0 left-0 w-1/4 h-48 bg-saffron/5 -z-10 rounded-tr-full"></div>

        <div class="max-w-screen-xl mx-auto px-4">
            <div class="relative mb-16 text-center">
                <span class="inline-block h-1 w-12 bg-saffron mb-4"></span>
                <p class="text-saffron uppercase tracking-widest font-medium mb-2">Handpicked Properties</p>
                <h2 class="text-3xl md:text-4xl font-heading font-bold mb-6 text-slate">Featured Listings</h2>
                <div class="w-24 h-1 bg-saffron mx-auto"></div>
                <p class="mt-6 text-gray-600 max-w-2xl mx-auto">Discover premium properties across India's most
                    sought-after locations. Each listing is verified and represents exceptional value.</p>
            </div>

            <!-- Filter Controls -->
            <!-- <div class="flex flex-wrap justify-center mb-12 gap-4" id="property-filters">
                <button data-filter="all"
                    class="filter-btn px-5 py-2 rounded-md shadow-sm transition-all duration-300 font-medium bg-saffron text-white">
                    All Properties
                </button>
                <button data-filter="buy"
                    class="filter-btn px-5 py-2 rounded-md shadow-sm transition-all duration-300 font-medium bg-white text-gray-700 hover:bg-gray-100">
                    For Sale
                </button>
                <button data-filter="rent"
                    class="filter-btn px-5 py-2 rounded-md shadow-sm transition-all duration-300 font-medium bg-white text-gray-700 hover:bg-gray-100">
                    For Rent
                </button>
                <button data-filter="new"
                    class="filter-btn px-5 py-2 rounded-md shadow-sm transition-all duration-300 font-medium bg-white text-gray-700 hover:bg-gray-100">
                    New Launches
                </button>
                <button data-filter="premium"
                    class="filter-btn px-5 py-2 rounded-md shadow-sm transition-all duration-300 font-medium bg-white text-gray-700 hover:bg-gray-100">
                    Premium
                </button>
            </div> -->
            <div id="property-filters" class="flex flex-wrap gap-4 justify-center mb-12">
                <button data-filter="all" class="filter-btn px-5 py-2 rounded-md shadow-sm transition-all duration-300 font-medium bg-saffron text-white">
                    All Properties
                </button>
                  <button data-filter="rent" class="filter-btn px-5 py-2 rounded-md shadow-sm transition-all duration-300 font-medium bg-white text-gray-700 hover:bg-gray-100">
                    For Rent
                </button>
                <button data-filter="sell" class="filter-btn px-5 py-2 rounded-md shadow-sm transition-all duration-300 font-medium bg-white text-gray-700 hover:bg-gray-100">
                    For Sale
                </button>
              
                <!-- <button data-filter="new" class="filter-btn px-5 py-2 rounded-md shadow-sm transition-all duration-300 font-medium bg-white text-gray-700 hover:bg-gray-100">
                    New Launches
                </button>
                <button data-filter="premium" class="filter-btn px-5 py-2 rounded-md shadow-sm transition-all duration-300 font-medium bg-white text-gray-700 hover:bg-gray-100">
                    Premium
                </button> -->
            </div>



            <!-- Loading State -->
            <div id="properties-loading" class="flex justify-center items-center py-20">
                <div class="loader"></div>
            </div>

            <!-- Properties Grid -->
            <div id="properties-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16 mt-10">
                <!-- Property cards will be dynamically inserted here -->
            </div>

            <!-- View More Button -->
            <div class="flex justify-center">
                <button id="load-more-btn"
                    class="group relative overflow-hidden px-8 py-4 bg-transparent border-2 border-saffron text-saffron font-bold rounded-md hover:text-white transition-all duration-300">
                    <span class="relative z-10">View More Properties</span>
                    <span
                        class="absolute inset-0 bg-saffron transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300"></span>
                </button>
            </div>
        </div>
    </section>

    <!-- Featured Locations -->
    <section class="py-20 bg-gradient-to-b from-gray-50 to-gray-100">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="relative mb-16 text-center">
                <span class="inline-block h-1 w-12 bg-saffron mb-4"></span>
                <p class="text-saffron uppercase tracking-widest font-medium mb-2">Explore India</p>
                <h2 class="text-3xl md:text-4xl font-heading font-bold mb-6 text-slate">Popular Locations</h2>
                <div class="w-24 h-1 bg-saffron mx-auto"></div>
                <p class="mt-6 text-gray-600 max-w-2xl mx-auto">Discover properties in Lucknow most desirable
                    neighborhoods and thriving areas.</p>
            </div>

            <!-- City cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6" id="city-grid">
                <!-- Cities will be dynamically inserted here -->
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-20 bg-navy text-white">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="relative mb-16 text-center">
                <span class="inline-block h-1 w-12 bg-saffron mb-4"></span>
                <p class="text-saffron uppercase tracking-widest font-medium mb-2">Our Commitment</p>
                <h2 class="text-3xl md:text-4xl font-heading font-bold mb-6">Why Choose Lucknow Hitech
                    Developers Properties</h2>
                <div class="w-24 h-1 bg-saffron mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center p-6">
                    <div class="w-16 h-16 bg-saffron/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-check-circle text-saffron text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Verified Properties</h3>
                    <p class="text-white/70">All properties undergo rigorous verification to ensure legal compliance and
                        accurate details.</p>
                </div>
                <div class="text-center p-6">
                    <div class="w-16 h-16 bg-saffron/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-hands-helping text-saffron text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Expert Guidance</h3>
                    <p class="text-white/70">Our team of professionals offers personalized advice throughout your
                        property journey.</p>
                </div>
                <div class="text-center p-6">
                    <div class="w-16 h-16 bg-saffron/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-rupee-sign text-saffron text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">No Hidden Costs</h3>
                    <p class="text-white/70">Transparent pricing with all costs clearly disclosed upfront for your peace
                        of mind.</p>
                </div>
                <div class="text-center p-6">
                    <div class="w-16 h-16 bg-saffron/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-file-signature text-saffron text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Paperwork Assistance</h3>
                    <p class="text-white/70">Complete support with documentation, registration and legal formalities.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-20">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="relative mb-16 text-center">
                <span class="inline-block h-1 w-12 bg-saffron mb-4"></span>
                <p class="text-saffron uppercase tracking-widest font-medium mb-2">Customer Stories</p>
                <h2 class="text-3xl md:text-4xl font-heading font-bold mb-6 text-slate">What Our Clients Say</h2>
                <div class="w-24 h-1 bg-saffron mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8" id="testimonials-grid">
                <!-- Testimonials will be dynamically inserted here -->
            </div>
        </div>
    </section>

    <!-- Call to action -->
    <section class="py-16 bg-saffron">
        <div class="max-w-screen-xl mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-heading font-bold mb-6 text-white">Trusted By Industry Leaders</h2>
            <p class="text-white/90 max-w-2xl mx-auto mb-12">We partner with renowned real estate platforms to bring you
                the best properties and services.</p>

            <!-- Partners Logo Grid -->
            <div
                class="flex flex-wrap justify-center items-center gap-8 md:gap-12 mb-12  py-12 px-6 rounded-lg">
                <!-- Logo 1 -->
                <div class="w-32 md:w-40">
                    <img src="{{asset('images/dlfmypad.png')}}" alt="Century 21"
                        class="w-24 h-20 opacity-90 hover:opacity-100 transition-opacity" />
                </div>
                <!-- Logo 2 -->
                <div class="w-32 md:w-40">
                    <img src="{{asset('images/bhutani.png')}}" alt="RE/MAX"
                        class="w-24 h-20 opacity-90 hover:opacity-100 transition-opacity" />
                </div>
                <!-- Logo 3 -->
                <div class="w-32 md:w-40">
                    <img src="{{asset('images/ekana.png')}}" alt="Sotheby's"
                        class="w-24 h-20 opacity-90 hover:opacity-100 transition-opacity" />
                </div>
                <!-- Logo 4 -->
                <div class="w-32 md:w-40">
                    <img src="{{asset('images/omaxe.png')}}" 1 alt="Keller Williams"
                        class="w-24 h-20 opacity-90 hover:opacity-100 transition-opacity" />
                </div>
                <!-- Logo 5 -->
                <div class="w-32 md:w-40">
                    <img src="{{asset('images/shalimar.png')}}" alt="Coldwell Banker"
                        class="w-24 h-20 opacity-90 hover:opacity-100 transition-opacity" />
                </div>
            </div>
        </div>
    </section>


    <div id="properties-loading" class="text-center py-10 hidden">
        <div class="loader">Loading properties...</div>
    </div>

    <!-- this div for show the properties -->
    <div id="properties-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6"></div>

    <!-- For City Grid -->
    <div id="city-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6"></div>

    <!-- For Testimonials Grid -->
    <div id="testimonials-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"></div>

    <!-- this div for toast -->
    <div id="toast-container" class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;"></div>


    <script>
        window.isLoggedIn = @json(Auth::check());
    </script>

    <script src="{{asset('js/indexpage.js')}}"></script>

</body>

</html>