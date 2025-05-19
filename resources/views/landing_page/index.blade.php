<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SELLSQUAREProperties India</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'saffron': '#FF9933',
                        'saffron-light': '#FFB266',
                        'saffron-dark': '#E68A00',
                        'navy': '#0C2461',
                        'navy-light': '#1e3799',
                        'emerald': '#138808',
                        'slate': '#1E293B',
                    },
                    fontFamily: {
                        'sans': ['Poppins', 'Arial', 'sans-serif'],
                        'heading': ['Montserrat', 'serif'],
                    },
                }
            },
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap');

        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .property-card {
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .property-card::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2); */
            /* opacity: 0; */
            border-radius: 0.5rem;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            z-index: -1;
        }

        .property-card:hover {
            transform: translateY(-10px);
        }

        .property-card:hover::after {
            opacity: 1;
        }

        .slide-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease-out;
        }

        .slide-in.appear {
            opacity: 1;
            transform: translateY(0);
        }

        .hero-search-form {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.15);
        }

        .tab.active {
            border-color: #FF9933;
            color: #FF9933;
            font-weight: 600;
        }

        /* Custom loader */
        .loader {
            border: 4px solid rgba(255, 153, 51, 0.3);
            border-radius: 50%;
            border-top: 4px solid #FF9933;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .badge {
            position: absolute;
            top: 10px;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            z-index: 10;
        }

        .badge-premium {
            background-color: #FF9933;
            color: white;
            left: 10px;
        }

        .badge-new {
            background-color: #138808;
            color: white;
            left: 10px;
        }

        .badge-hot {
            background-color: #e74c3c;
            color: white;
            left: 10px;
        }

        .badge-type {
            background-color: #0C2461;
            color: white;
            right: 10px;
        }



        /* login and registration css start */

        /* Custom Colors */
        /* Custom Colors */
        :root {
            --saffron: #FF9933;
            --saffron-light: #FFB266;
            --saffron-dark: #E68A00;
            --navy: #0C2461;
            --navy-light: #1e3799;
        }

        /* Form styling */
        .form-control:focus {
            border-color: var(--saffron);
            box-shadow: 0 0 0 0.25rem rgba(255, 153, 51, 0.25);
        }

        .input-group-text {
            border: 1px solid #ced4da;
            border-right: none;
        }

        /* User type option styling */
        .user-type-option label {
            cursor: pointer;
            border: 2px solid transparent;
            transition: all 0.2s ease;
            width: 80px;
        }

        .user-type-option label:hover {
            background-color: rgba(255, 153, 51, 0.1);
        }

        .user-type-option.active label {
            border-color: var(--saffron);
            background-color: rgba(255, 153, 51, 0.15);
        }

        /* Button styling */
        .btn {
            transition: all 0.2s ease;
        }

        .btn:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        .btn:active {
            transform: translateY(0);
        }

        /* Modal styling */
        .modal-content {
            border-radius: 8px;
            overflow: hidden;
        }

        .modal-header,
        .modal-footer {
            border: none;
        }

        /* Animation for modals */
        .modal.fade .modal-dialog {
            transition: transform 0.3s ease-out;
        }

        .bg-saffron {
            background-color: #FF9933 !important;
            color: white !important;
        }

        /* login and registration css End */
    </style>
</head>

<body class="font-sans text-slate bg-gray-50">
    <!-- this div for showToast -->
    <div id="toast-container" class="position-fixed top-0 end-0 p-3" style="z-index: 1100;"></div>

    <!-- Navigation Bar -->
    @include('landing_page/include/navbar')


    <!-- Hero Section -->
    <section class="relative flex justify-center items-center text-center h-screen overflow-hidden">
        <!-- Video Background with Overlay -->
        <div class="absolute top-0 left-0 w-full h-full">
            <video autoplay muted loop playsinline class="object-cover w-full h-full">
                <source src="{{asset('videos/header1.mp4')}}" type="video/mp4">
                <!-- Fallback image in case video doesn't load -->
                <img src="https://images.pexels.com/photos/4161619/pexels-photo-4161619.jpeg?auto=compress&cs=tinysrgb&w=600"
                    alt="Luxury Property" class="object-cover w-full h-full">
            </video>
            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-black/70 via-black/50 to-black/60">
            </div>
        </div>

        <div class="w-11/12 max-w-screen-lg z-10">
            <p class="text-white text-sm mb-3 tracking-wider font-light">RERA No. MH12345678</p>
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
                class="hero-search-form flex flex-col md:flex-row rounded-lg overflow-hidden shadow-2xl max-w-4xl mx-auto">
                <div class="flex-1 bg-white/10 backdrop-blur-md flex items-center px-4">
                    <i class="fas fa-search text-white/70 mr-3"></i>
                    <input type="text"
                        class="w-full py-4 bg-transparent border-none text-white text-base focus:outline-none placeholder-white/70"
                        placeholder="Search by location, property type, or features">
                </div>
                <div class="flex-shrink-0 flex">
                    <select class="bg-white/10 backdrop-blur-md border-none text-white py-4 px-6 focus:outline-none">
                        <option value="">City</option>
                        <option value="mumbai">Gomti Nagar</option>
                        <option value="delhi">Hazratganj</option>
                        <option value="bangalore">Indira Nagar</option>
                        <option value="hyderabad">Aliganj</option>
                        <option value="bangalore">Mahanagar</option>
                        <option value="hyderabad">Vibhuti Khand</option>
                        <option value="pune">Chinhat</option>
                    </select>
                    <button
                        class="bg-saffron hover:bg-saffron-dark text-white py-4 px-8 flex items-center justify-center text-base font-medium transition-colors duration-300">
                        Search
                    </button>
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
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex flex-col items-center animate-bounce">
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

    <!-- Properties Section -->
    <section id="properties-section" class="relative py-20">
        <!-- Decorative background -->
        <div class="absolute top-0 right-0 w-1/3 h-72 bg-navy/5 -z-10 rounded-l-full"></div>
        <div class="absolute bottom-0 left-0 w-1/4 h-48 bg-saffron/5 -z-10 rounded-tr-full"></div>

        <div class="max-w-screen-xl mx-auto px-4">
            <!-- Section Header with Accent Line -->
            <div class="relative mb-16 text-center">
                <span class="inline-block h-1 w-12 bg-saffron mb-4"></span>
                <p class="text-saffron uppercase tracking-widest font-medium mb-2">Handpicked Properties</p>
                <h2 class="text-3xl md:text-4xl font-heading font-bold mb-6 text-slate">Featured Listings</h2>
                <div class="w-24 h-1 bg-saffron mx-auto"></div>
                <p class="mt-6 text-gray-600 max-w-2xl mx-auto">Discover premium properties across India's most
                    sought-after locations. Each listing is verified and represents exceptional value.</p>
            </div>

            <!-- Filter Controls -->
            <div class="flex flex-wrap justify-center mb-12 gap-4" id="property-filters">
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
            </div>

            <!-- Loading State -->
            <div id="properties-loading" class="flex justify-center items-center py-20">
                <div class="loader"></div>
            </div>

            <!-- Properties Grid -->
            <div id="properties-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16 ">
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
                class="flex flex-wrap justify-center items-center gap-8 md:gap-12 mb-12 bg-white/10 py-12 px-6 rounded-lg">
                <!-- Logo 1 -->
                <div class="w-32 md:w-40">
                    <img src="{{asset('images/dlfmypad.png')}}" alt="Century 21"
                        class="w-20 h-14 opacity-90 hover:opacity-100 transition-opacity" />
                </div>
                <!-- Logo 2 -->
                <div class="w-32 md:w-40">
                    <img src="{{asset('images/bhutani.png')}}" alt="RE/MAX"
                        class="w-20 h-14 opacity-90 hover:opacity-100 transition-opacity" />
                </div>
                <!-- Logo 3 -->
                <div class="w-32 md:w-40">
                    <img src="{{asset('images/ekana.png')}}" alt="Sotheby's"
                        class="w-20 h-14 opacity-90 hover:opacity-100 transition-opacity" />
                </div>
                <!-- Logo 4 -->
                <div class="w-32 md:w-40">
                    <img src="{{asset('images/omaxe.png')}}" 1 alt="Keller Williams"
                        class="w-20 h-14 opacity-90 hover:opacity-100 transition-opacity" />
                </div>
                <!-- Logo 5 -->
                <div class="w-32 md:w-40">
                    <img src="{{asset('images/shalimar.png')}}" alt="Coldwell Banker"
                        class="w-20 h-14 opacity-90 hover:opacity-100 transition-opacity" />
                </div>
            </div>
        </div>
    </section>


    <!-- Footer Start-->
    @include('landing_page.include.footer');
    <!-- Footer End-->


    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-sm">
                <!-- Header -->
                <div class="modal-header" style="background-color: #FF9933; color: white;">
                    <h5 class="modal-title" id="loginModalLabel">Welcome Back</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <!-- Body -->
                <div class="modal-body p-4">
                    <form id="loginForm">
                        <!-- Email Input -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text" style="background-color: #FFB266; color: #0C2461;">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" class="form-control border-start-0" id="email" name="email"
                                    placeholder="your@email.com" required>
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between">
                                <label for="password" class="form-label">Password</label>
                                <a href="#" class="text-decoration-none small" style="color: #E68A00;">Forgot
                                    Password?</a>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text" style="background-color: #FFB266; color: #0C2461;">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" class="form-control border-start-0" id="password" name="password"
                                    placeholder="••••••••" required>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn w-100" style="background-color: #FF9933; color: white;">
                            Login
                        </button>
                    </form>
                </div>

                <!-- Footer -->
                <div class="modal-footer justify-content-center border-0">
                    <p class="mb-0">
                        Don't have an account?
                        <a href="#" style="color: #E68A00;" data-bs-toggle="modal" data-bs-target="#signupModal">Sign
                            up</a>
                    </p>
                </div>
            </div>
        </div>
    </div>



    <!-- Signup Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-sm">
                <!-- Header -->
                <div class="modal-header" style="background-color: #FF9933; color: white;">
                    <h5 class="modal-title" id="signupModalLabel">Create Account</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <!-- Body -->
                <div class="modal-body p-4">
                    <form id="signupForm">
                        <!-- User Type Selection -->
                        <div class="mb-4">
                            <label class="form-label">I am a</label>
                            <div class="d-flex justify-content-between">
                                <div class="user-type-option active" data-type="buyer">
                                    <input class="form-check-input visually-hidden" type="radio" name="userType"
                                        id="buyer" value="buyer" checked>
                                    <label class="d-block text-center p-2 rounded" for="buyer">
                                        <i class="fas fa-home d-block mb-1" style="color: #E68A00;"></i>
                                        <small>Buyer</small>
                                    </label>
                                </div>
                                <div class="user-type-option" data-type="seller">
                                    <input class="form-check-input visually-hidden" type="radio" name="userType"
                                        id="seller" value="seller">
                                    <label class="d-block text-center p-2 rounded" for="seller">
                                        <i class="fas fa-dollar-sign d-block mb-1" style="color: #E68A00;"></i>
                                        <small>Seller</small>
                                    </label>
                                </div>
                                <div class="user-type-option" data-type="agent">
                                    <input class="form-check-input visually-hidden" type="radio" name="userType"
                                        id="agent" value="agent">
                                    <label class="d-block text-center p-2 rounded" for="agent">
                                        <i class="fas fa-user-tie d-block mb-1" style="color: #E68A00;"></i>
                                        <small>Agent</small>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Full Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text" style="background-color: #FFB266; color: #0C2461;">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" class="form-control border-start-0" id="name" placeholder="John Doe"
                                    name="name" required>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class=" mb-3">
                            <label for="signup-email" class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text" style="background-color: #FFB266; color: #0C2461;">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" class="form-control border-start-0" id="signup-email"
                                    placeholder="your@email.com" name="email" required>
                            </div>
                        </div>

                        <!-- Mobile -->
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile Number</label>
                            <div class="input-group">
                                <span class="input-group-text" style="background-color: #FFB266; color: #0C2461;">
                                    <i class="fas fa-phone-alt"></i>
                                </span>
                                <input type="tel" class="form-control border-start-0" id="mobile"
                                    placeholder="+1 (123) 456-7890" name="mobile" required>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="signup-password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text" style="background-color: #FFB266; color: #0C2461;">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" class="form-control border-start-0" id="signup-password"
                                    placeholder="••••••••" name="password" required>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn w-100" style="background-color: #FF9933; color: white;">
                            Create Account
                        </button>
                    </form>
                </div>

                <!-- Footer -->
                <div class="modal-footer justify-content-center border-0">
                    <p class="mb-0">Already have an account?
                        <a href="#" style="color: #E68A00;" data-bs-dismiss="modal" data-bs-toggle="modal"
                            data-bs-target="#loginModal">Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>



    <!-- JavaScript for interactive elements -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userTypeOptions = document.querySelectorAll('.user-type-option');
            userTypeOptions.forEach(option => {
                option.addEventListener('click', function() {
                    userTypeOptions.forEach(opt => opt.classList.remove('active'));
                    this.classList.add('active');
                    this.querySelector('input[type="radio"]').checked = true;
                });
            });

            // Form validation feedback
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                });
            });
        });
    </script>


    <script>
        // JavaScript for navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');

            if (window.scrollY > 50) {
                navbar.classList.add('bg-navy', 'bg-opacity-95', 'shadow-md');
                navbar.classList.remove('py-4');
                navbar.classList.add('py-3');
            } else {
                navbar.classList.remove('bg-navy', 'bg-opacity-95', 'shadow-md');
                navbar.classList.remove('py-3');
                navbar.classList.add('py-4');
            }
        });

        // Tab switching functionality
        const tabs = document.querySelectorAll('.tab');

        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                tabs.forEach(t => {
                    t.classList.remove('active', 'border-saffron', 'text-saffron');
                    t.classList.add('border-transparent', 'text-white/70');
                });
                this.classList.add('active', 'border-saffron', 'text-saffron');
                this.classList.remove('border-transparent', 'text-white/70');
            });
        });

        // Scroll animation for elements
        const appearOptions = {
            threshold: 0.15,
            rootMargin: "0px 0px -100px 0px"
        };

        const appearOnScroll = new IntersectionObserver(function(entries, appearOnScroll) {
            entries.forEach(entry => {
                if (!entry.isIntersecting) {
                    return;
                } else {
                    entry.target.classList.add('appear');
                    appearOnScroll.unobserve(entry.target);
                }
            });
        }, appearOptions);

        window.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.slide-in').forEach(slider => {
                appearOnScroll.observe(slider);
            });
        });


        // Property data management
        const propertyData = {
            currentPage: 1,
            totalPages: 3,
            perPage: 6,
            currentFilter: 'all',
            loading: true,
            properties: [],

            initialize() {
                this.fetchProperties();
                this.setupEventListeners();
            },

            setupEventListeners() {
                // Filter buttons
                document.querySelectorAll('.filter-btn').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        const filter = e.target.dataset.filter;
                        console.log(filter);
                        this.filterProperties(filter);
                    });
                });

                // Load more button
                document.getElementById('load-more-btn').addEventListener('click', () => {
                    this.loadMoreProperties();
                });
            },

            fetchProperties() {
                // Simulate API fetch
                setTimeout(() => {
                    // Sample property data - in a real app, this would come from an API
                    this.properties = [{
                            id: 1,
                            title: 'Luxury Apartment in Gomti Nagar',
                            location: 'DLF MY PAD , gomti nagar',
                            price: '₹1.2 Cr',
                            bedrooms: 3,
                            bathrooms: 3,
                            area: '1800 sq.ft.',
                            image: 'https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg?auto=compress&cs=tinysrgb&w=600',
                            type: 'Apartment',
                            tags: ['buy', 'premium'],
                            isNew: false,
                            isPremium: true
                        },
                        {
                            id: 2,
                            title: 'Apartment in Chinhat',
                            location: 'chinhat',
                            price: '₹70 lakh',
                            bedrooms: 2,
                            bathrooms: 2,
                            area: '3200 sq.ft.',
                            image: 'https://images.pexels.com/photos/275484/pexels-photo-275484.jpeg?auto=compress&cs=tinysrgb&w=600',
                            type: 'Villa',
                            tags: ['buy', 'premium'],
                            isNew: false,
                            isPremium: true
                        },
                        {
                            id: 3,
                            title: 'Apartment in vibhuti khand',
                            location: 'vibhuti khand,gomti nagar',
                            price: '₹18,000/month',
                            bedrooms: 2,
                            bathrooms: 1,
                            area: '1200 sq.ft.',
                            image: 'https://images.pexels.com/photos/2082087/pexels-photo-2082087.jpeg?auto=compress&cs=tinysrgb&w=600',
                            type: 'Apartment',
                            tags: ['rent'],
                            isNew: false,
                            isPremium: false
                        },
                        {
                            id: 4,
                            title: 'Flat in Hajratganj',
                            location: 'hajratganj',
                            price: '₹75 Lakh onwards',
                            bedrooms: '1/2/3 BHK',
                            bathrooms: 2,
                            area: '650-1450 sq.ft.',
                            image: 'https://images.pexels.com/photos/7174388/pexels-photo-7174388.jpeg?auto=compress&cs=tinysrgb&w=600',
                            type: 'Apartment',
                            tags: ['buy', 'new'],
                            isNew: true,
                            isPremium: false
                        },
                        {
                            id: 5,
                            title: 'Office Space in Tech Park',
                            location: 'Whitefield, Bangalore',
                            price: '₹85/sq.ft.',
                            bedrooms: null,
                            bathrooms: 4,
                            area: '5000 sq.ft.',
                            image: 'https://images.pexels.com/photos/1181406/pexels-photo-1181406.jpeg?auto=compress&cs=tinysrgb&w=600',
                            type: 'Commercial',
                            tags: ['rent'],
                            isNew: false,
                            isPremium: false
                        },
                        {
                            id: 6,
                            title: 'Luxury Penthouse with Terrace',
                            location: 'Jubilee Hills, Hyderabad',
                            price: '₹4.5 Cr',
                            bedrooms: 4,
                            bathrooms: 4,
                            area: '3600 sq.ft.',
                            image: 'https://images.pexels.com/photos/6312072/pexels-photo-6312072.jpeg?auto=compress&cs=tinysrgb&w=600',
                            type: 'Penthouse',
                            tags: ['buy', 'premium'],
                            isNew: false,
                            isPremium: true
                        },
                        {
                            id: 7,
                            title: 'New Launch: Serene Towers',
                            location: 'Gurgaon, Delhi NCR',
                            price: '₹1.2 Cr onwards',
                            bedrooms: '2/3 BHK',
                            bathrooms: 2,
                            area: '1100-1800 sq.ft.',
                            image: 'https://images.pexels.com/photos/5570226/pexels-photo-5570226.jpeg?auto=compress&cs=tinysrgb&w=600',
                            type: 'Apartment',
                            tags: ['buy', 'new'],
                            isNew: true,
                            isPremium: false
                        },
                        {
                            id: 8,
                            title: 'Independent House with Garden',
                            location: 'Anna Nagar, Chennai',
                            price: '₹2.8 Cr',
                            bedrooms: 3,
                            bathrooms: 3,
                            area: '2400 sq.ft.',
                            image: 'https://images.pexels.com/photos/7018402/pexels-photo-7018402.jpeg?auto=compress&cs=tinysrgb&w=600',
                            type: 'Villa',
                            tags: ['buy'],
                            isNew: false,
                            isPremium: false
                        },
                        {
                            id: 9,
                            title: 'Premium Service Apartment',
                            location: 'Indira Nagar, Bangalore',
                            price: '₹65,000/month',
                            bedrooms: 2,
                            bathrooms: 2,
                            area: '1100 sq.ft.',
                            image: 'https://media.istockphoto.com/id/907633960/photo/lobby-entrance-with-reception-desk-and-lounge-area.webp?a=1&b=1&s=612x612&w=0&k=20&c=8dPy43BpMqFAHERyxloNcc3KI6tqV0ymWaMnEfcMaks=',
                            type: 'Service Apartment',
                            tags: ['rent', 'premium'],
                            isNew: false,
                            isPremium: true
                        },
                        {
                            id: 10,
                            title: 'Gated Community Villa',
                            location: 'Salt Lake, Kolkata',
                            price: '₹1.8 Cr',
                            bedrooms: 3,
                            bathrooms: 3,
                            area: '2100 sq.ft.',
                            image: 'https://images.pexels.com/photos/7018402/pexels-photo-7018402.jpeg?auto=compress&cs=tinysrgb&w=600',
                            type: 'Villa',
                            tags: ['buy'],
                            isNew: false,
                            isPremium: false
                        },
                        {
                            id: 11,
                            title: 'New Launch: Horizon Heights',
                            location: 'Banjara Hills, Hyderabad',
                            price: '₹95 Lakh onwards',
                            bedrooms: '2/3 BHK',
                            bathrooms: 2,
                            area: '1050-1750 sq.ft.',
                            image: 'https://images.pexels.com/photos/7018402/pexels-photo-7018402.jpeg?auto=compress&cs=tinysrgb&w=600',
                            type: 'Apartment',
                            tags: ['buy', 'new'],
                            isNew: true,
                            isPremium: false
                        },
                        {
                            id: 12,
                            title: 'Beach View Apartment',
                            location: 'Juhu, Mumbai',
                            price: '₹3.9 Cr',
                            bedrooms: 3,
                            bathrooms: 3,
                            area: '1950 sq.ft.',
                            image: 'https://images.unsplash.com/photo-1609644124044-94dc4301872e?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fEJlYWNoJTIwVmlldyUyMEFwYXJ0bWVudHxlbnwwfHwwfHx8MA%3D%3D',
                            type: 'Apartment',
                            tags: ['buy', 'premium'],
                            isNew: false,
                            isPremium: true
                        },
                        {
                            id: 13,
                            title: 'Luxury Farmhouse',
                            location: 'Chattarpur, Delhi',
                            price: '₹12 Cr',
                            bedrooms: 5,
                            bathrooms: 5,
                            area: '10000 sq.ft.',
                            image: 'https://media.istockphoto.com/id/185275043/photo/old-stone-house.webp?a=1&b=1&s=612x612&w=0&k=20&c=MfVPCSPC4H5ZCnzg6vCjNLdaFdAsXbZ4XDfL0E0gZEA=',
                            type: 'Farmhouse',
                            tags: ['buy', 'premium'],
                            isNew: false,
                            isPremium: true
                        },
                        {
                            id: 14,
                            title: 'Studio Apartment for Rent',
                            location: 'HSR Layout, Bangalore',
                            price: '₹25,000/month',
                            bedrooms: 1,
                            bathrooms: 1,
                            area: '550 sq.ft.',
                            image: 'https://images.pexels.com/photos/6045325/pexels-photo-6045325.jpeg?auto=compress&cs=tinysrgb&w=600',
                            type: 'Studio',
                            tags: ['rent'],
                            isNew: false,
                            isPremium: false
                        },
                        {
                            id: 15,
                            title: 'New Launch: Sky Gardens',
                            location: 'Viman Nagar, Pune',
                            price: '₹85 Lakh onwards',
                            bedrooms: '1/2/3 BHK',
                            bathrooms: 2,
                            area: '580-1680 sq.ft.',
                            image: 'https://images.pexels.com/photos/7018402/pexels-photo-7018402.jpeg?auto=compress&cs=tinysrgb&w=600',
                            type: 'Apartment',
                            tags: ['buy', 'new'],
                            isNew: true,
                            isPremium: false
                        },
                        {
                            id: 16,
                            title: 'Mall Space for Rent',
                            location: 'MG Road, Bangalore',
                            price: '₹120/sq.ft.',
                            bedrooms: null,
                            bathrooms: null,
                            area: '2000 sq.ft.',
                            image: 'https://images.pexels.com/photos/7018402/pexels-photo-7018402.jpeg?auto=compress&cs=tinysrgb&w=600',
                            type: 'Commercial',
                            tags: ['rent'],
                            isNew: false,
                            isPremium: false
                        },
                        {
                            id: 17,
                            title: 'Premium Row House',
                            location: 'Lonavala, Maharashtra',
                            price: '₹1.6 Cr',
                            bedrooms: 3,
                            bathrooms: 3,
                            area: '1800 sq.ft.',
                            image: 'https://images.pexels.com/photos/7018402/pexels-photo-7018402.jpeg?auto=compress&cs=tinysrgb&w=600',
                            type: 'Row House',
                            tags: ['buy', 'premium'],
                            isNew: false,
                            isPremium: true
                        },
                        {
                            id: 18,
                            title: 'New Launch: Riverside Residences',
                            location: 'Gomti Nagar, Lucknow',
                            price: '₹60 Lakh onwards',
                            bedrooms: '2/3 BHK',
                            bathrooms: 2,
                            area: '950-1600 sq.ft.',
                            image: 'https://images.pexels.com/photos/7018402/pexels-photo-7018402.jpeg?auto=compress&cs=tinysrgb&w=600',
                            type: 'Apartment',
                            tags: ['buy', 'new'],
                            isNew: true,
                            isPremium: false
                        }
                    ];

                    // Load city data
                    this.loadCityData();

                    // Load testimonials
                    this.loadTestimonials();

                    // Initial properties rendering
                    this.renderProperties();

                    // Hide loading state
                    document.getElementById('properties-loading').classList.add('hidden');
                    document.getElementById('properties-grid').classList.remove('hidden');

                    this.loading = false;
                }, 1500);
            },

            filterProperties(filter) {
                // Update UI state
                document.querySelectorAll('.filter-btn').forEach(btn => {
                    if (btn.dataset.filter === filter) {
                        btn.classList.add('bg-saffron', 'text-white');
                        btn.classList.remove('bg-white', 'text-gray-700', 'hover:bg-gray-100');
                    } else {
                        btn.classList.remove('bg-saffron', 'text-white');
                        btn.classList.add('bg-white', 'text-gray-700', 'hover:bg-gray-100');
                    }
                });

                // Show loading
                document.getElementById('properties-grid').classList.add('hidden');
                document.getElementById('properties-loading').classList.remove('hidden');

                // Set current filter
                this.currentFilter = filter;
                this.currentPage = 1;

                // Simulate delay for API response
                setTimeout(() => {
                    this.renderProperties(true);
                    document.getElementById('properties-loading').classList.add('hidden');
                    document.getElementById('properties-grid').classList.remove('hidden');
                }, 800);
            },

            loadMoreProperties() {
                if (this.currentPage < this.totalPages) {
                    // Show loading state on button
                    const loadMoreBtn = document.getElementById('load-more-btn');
                    const originalText = loadMoreBtn.innerHTML;
                    loadMoreBtn.innerHTML =
                        '<span class="flex items-center"><div class="w-5 h-5 border-2 border-t-2 border-white rounded-full animate-spin mr-2"></div>Loading...</span>';

                    // Increment page and render more properties
                    this.currentPage++;

                    // Simulate API delay
                    setTimeout(() => {
                        this.renderProperties(true);
                        loadMoreBtn.innerHTML = originalText;

                        // Hide button if we reached the end
                        if (this.currentPage >= this.totalPages) {
                            loadMoreBtn.classList.add('opacity-50', 'cursor-not-allowed');
                        }
                    }, 1000);
                }
            },

            renderProperties(append = false) {
                const grid = document.getElementById('properties-grid');
                let filteredProperties = this.properties;

                // Apply filters
                if (this.currentFilter !== 'all') {
                    filteredProperties = this.properties.filter(property => {
                        console.log('I am here with ' + this.currentFilter);
                        if (this.currentFilter === 'premium') return property.isPremium;
                        if (this.currentFilter === 'new') return property.isNew;
                        return property.tags.includes(this.currentFilter);
                    });
                }

                // Pagination
                const startIndex = append ? (this.currentPage - 1) * this.perPage : 0;
                const endIndex = this.currentPage * this.perPage;
                const paginatedProperties = filteredProperties.slice(0, endIndex);

                // Clear grid if not appending
                if (!append) {
                    grid.innerHTML = '';
                }

                // Render properties
                paginatedProperties.forEach((property, index) => {
                    // Only render new items
                    if (index >= startIndex) {
                        const propertyCard = this.createPropertyCard(property);
                        grid.appendChild(propertyCard);

                        // Animate new cards
                        // gsap.from(propertyCard, {
                        //     opacity: 0,
                        //     y: 30,
                        //     duration: 0.5,
                        //     delay: 0.1 * (index % this.perPage)
                        // });
                    }
                });
            },

            createPropertyCard(property) {
                const card = document.createElement('div');
                card.className =
                    'property-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 relative';

                // Badges
                let badgeHTML = '';
                if (property.isPremium) {
                    badgeHTML += `<span class="badge badge-premium">Premium</span>`;
                } else if (property.isNew) {
                    badgeHTML += `<span class="badge badge-new">New Launch</span>`;
                } else if (property.tags.includes('hot')) {
                    badgeHTML += `<span class="badge badge-hot">Hot Deal</span>`;
                }

                badgeHTML += `<span class="badge badge-type">${property.type}</span>`;

                // Card contents
                card.innerHTML = `
            ${badgeHTML}
            <div class="relative overflow-hidden h-56">
                <img src="${property.image}" alt="${property.title}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
            </div>
            <div class="p-6">
                <h3 class="font-heading font-bold text-xl mb-2 text-slate">${property.title}</h3>
                <div class="flex items-center text-gray-600 mb-3">
                    <i class="fas fa-map-marker-alt text-saffron mr-2"></i>
                    <span>${property.location}</span>
                </div>
                <div class="flex justify-between mb-6">
                    <div class="font-bold text-xl text-saffron">${property.price}</div>
                    <div class="text-gray-600">${property.area}</div>
                </div>
                <div class="flex justify-between border-t border-gray-100 pt-4">
                    ${property.bedrooms ? `<div class="flex items-center text-gray-600">
                        <i class="fas fa-bed mr-2 text-saffron"></i>
                        <span>${property.bedrooms} ${typeof property.bedrooms === 'number' ? (property.bedrooms > 1 ? 'Beds' : 'Bed') : ''}</span>
                    </div>` : ''}
                    ${property.bathrooms ? `<div class="flex items-center text-gray-600">
                        <i class="fas fa-bath mr-2 text-saffron"></i>
                        <span>${property.bathrooms} ${property.bathrooms > 1 ? 'Baths' : 'Bath'}</span>
                    </div>` : ''}
                </div>
            </div>
            <div class="bg-gray-50 px-6 py-3 flex justify-between items-center">
                <a href="#" class="text-navy hover:text-saffron transition-colors font-medium">View Details</a>
                <button class="w-10 h-10 rounded-full bg-white shadow flex items-center justify-center hover:bg-saffron hover:text-white transition-colors">
                    <i class="far fa-heart"></i>
                </button>
            </div>
        `;

                return card;
            },

            loadCityData() {
                const cities = [{
                        name: 'Gomti Nagar',
                        properties: 245,
                        image: 'https://img.freepik.com/premium-photo/man-is-filming-house-with-camera-camera_1247965-98133.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740'
                    },
                    {
                        name: 'Hazratganj',
                        properties: 312,
                        image: 'https://img.freepik.com/free-photo/vertical-shot-modern-apartments-daytime_181624-13625.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740'
                    },
                    {
                        name: 'Vibhuti Khand',
                        properties: 186,
                        image: 'https://img.freepik.com/premium-photo/view-swimming-pool-by-building-against-sky_1048944-21046320.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740'
                    },
                    {
                        name: 'Aliganj',
                        properties: 154,
                        image: 'https://img.freepik.com/premium-photo/building-with-large-window-top_822609-687.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740'
                    },
                    {
                        name: 'Chinhat',
                        properties: 128,
                        image: 'https://img.freepik.com/free-photo/analog-landscape-city-with-buildings_23-2149661456.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740'
                    },
                    {
                        name: 'Indira Nagar',
                        properties: 97,
                        image: 'https://img.freepik.com/free-photo/analog-landscape-city-with-buildings_23-2149661457.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740'
                    },
                    {
                        name: 'Mahanagar',
                        properties: 89,
                        image: 'https://img.freepik.com/premium-photo/building-with-street-light-as-street-view_764413-97.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740'
                    },
                    {
                        name: 'Faizabad Road',
                        properties: 76,
                        image: 'https://img.freepik.com/premium-photo/holiday-apartments-city-playa-blanca-lanzarote-island-hotel-complex-royal-monica-canary-islands-december-2018_152520-1542.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740'
                    },
                ];

                const cityGrid = document.getElementById('city-grid');

                cities.forEach((city, index) => {
                    const cityCard = document.createElement('div');
                    cityCard.className = 'slide-in relative rounded-lg overflow-hidden group shadow-md';

                    cityCard.innerHTML = `
                <img src="${city.image}" alt="${city.name}" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-navy/80 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-5 text-white">
                    <h3 class="text-xl font-bold mb-1">${city.name}</h3>
                    <p>${city.properties} Properties</p>
                </div>
            `;

                    cityGrid.appendChild(cityCard);

                    // Delayed animation
                    setTimeout(() => {
                        cityCard.classList.add('appear');
                    }, index * 100);
                });
            },

            loadTestimonials() {
                // Sample testimonial data
                const testimonials = [{
                        name: 'Rohit Sharma',
                        position: 'Entrepreneur',
                        testimonial: 'Lucknow Hitech Developers made my property search incredibly smooth. Their expertise and transparent process helped me find my dream home in Mumbai.',
                        image: 'https://img.freepik.com/free-photo/portrait-handsome-smiling-stylish-young-man-model-dressed-red-checkered-shirt-fashion-man-posing_158538-4914.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740'
                    },
                    {
                        name: 'Priya Patel',
                        position: 'Software Engineer',
                        testimonial: 'As a first-time homebuyer, I was nervous about the process. The team at Lucknow Hitech Developers me through every step and found me a perfect apartment in Bangalore.',
                        image: 'https://img.freepik.com/premium-photo/beauty-fashion-portrait-young-beautiful-brunette-woman-with-long-black-hair-green-eyes_333900-2852.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740'
                    },
                    {
                        name: 'Anand Mehta',
                        position: 'Finance Director',
                        testimonial: 'I have worked with several real estate companies, but Lucknow Hitech Developers stands out for their professionalism and attention to detail. Highly recommended!',
                        image: 'https://img.freepik.com/free-photo/smiling-young-male-posing-meadow-with-arms-crossed_23-2148179874.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740'
                    }
                ];

                const testimonialsGrid = document.getElementById('testimonials-grid');

                testimonials.forEach((testimonial, index) => {
                    const testimonialCard = document.createElement('div');
                    testimonialCard.className = 'slide-in bg-white p-8 rounded-lg shadow-lg relative';

                    testimonialCard.innerHTML = `
                <div class="absolute -top-5 left-8 text-saffron text-6xl opacity-20">"</div>
                <p class="text-gray-600 mb-6 relative">${testimonial.testimonial}</p>
                <div class="flex items-center">
                    <img src="${testimonial.image}" alt="${testimonial.name}" class="w-12 h-12 rounded-full object-cover mr-4">
                    <div>
                        <h4 class="font-bold text-navy">${testimonial.name}</h4>
                        <p class="text-gray-500 text-sm">${testimonial.position}</p>
                    </div>
                </div>
            `;

                    testimonialsGrid.appendChild(testimonialCard);

                    // Delayed animation
                    setTimeout(() => {
                        testimonialCard.classList.add('appear');
                    }, index * 150);
                });
            }
        };

        // Initialize the property functionality
        document.addEventListener('DOMContentLoaded', function() {
            propertyData.initialize();
        });
    </script>



    <!-- registeration js --------------------------------->
    <script>
        document.querySelector('#signupForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);



            fetch("{{ url('landing/register') }}", {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    // console.log(data);
                    // console.log(formdata);
                    if (data.errors) {
                        // console.log(data);
                        let messages = '';
                        for (let field in data.errors) {
                            messages += data.errors[field].join('\n') + '\n';
                        }
                        // alert(messages);
                        showToast('alert', messages, 'bx bx-error', 'bg-saffron');
                    } else {
                        // alert('Registration successful!');
                        showToast('alert', 'Registration successful!', 'bx bx-error', 'bg-saffron');
                        const modalEl = document.getElementById('signupModal');
                        const modal = bootstrap.Modal.getInstance(modalEl);
                        modal.hide();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>

    <!-- login js ----------------------------------------------------------------->
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = {
                email: document.getElementById('email').value,
                password: document.getElementById('password').value
            };

            fetch('http://127.0.0.1:8000/landing/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
                    },
                    body: JSON.stringify(formData)
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    console.log(data.redirect);
                    if (data.status === 'success') {
                        showToast('success', data.message, 'bx bx-error', 'bg-saffron');
                        const modalEl = document.getElementById('loginModal');
                        const modal = bootstrap.Modal.getInstance(modalEl);
                        modal.hide();
                        setTimeout(() => {
                            window.location.href = data.redirect; // instead of location.href = '/'
                        }, 1500);
                    } else {
                        // alert(data.message || 'Login failed.');
                        showToast('error', 'invalid email or password ! Please try again.', 'bx bx-error',
                            'bg-saffron');
                    }
                })
                .catch(error => {
                    console.error('Login error:', error);
                    alert('Something went wrong.');
                });
        });
    </script>

    <!-- logout script -->
    <script>
        document.getElementById('logout').addEventListener('click', function(e) {

            e.preventDefault();

            fetch("{{ route('landing_logout') }}", {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    if (data.status === 'success') {
                        showToast('Success', data.message, 'bx bx-check-circle', 'bg-saffron');
                        // Optionally redirect after toast
                        setTimeout(() => {
                            window.location.href = '/';
                        }, 1500);
                    } else {
                        showToast('error', 'Failed to logout.', 'bx bx-error', 'bg-danger');
                    }
                })
                .catch(err => {
                    showToast('Error', 'Something went wrong.', 'bx bx-error', 'bg-danger');
                    console.error(err);
                });
        });
    </script>




    <script>
        // function toshow the toast-----------------------------------------
        function showToast(title, message, iconClass, bgColor) {
            const toastHTML = `
        <div class="bs-toast toast fade show ${bgColor} text-white" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header ${bgColor} text-white">
                <i class='${iconClass} me-2'></i>
                <strong class="me-auto">${title}</strong>
                <small>Just now</small>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                ${message}
            </div>
        </div>
    `;

            document.getElementById('toast-container').insertAdjacentHTML('beforeend', toastHTML);

            const toastEl = document.querySelector('#toast-container .toast:last-child');
            const bsToast = new bootstrap.Toast(toastEl, {
                delay: 3000
            });
            bsToast.show();

        }
    </script>


</body>

</html>