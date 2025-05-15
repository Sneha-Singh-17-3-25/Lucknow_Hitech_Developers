<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Agents - SELLSQUARE Properties India</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
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

    .slide-in {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease-out;
    }

    .slide-in.appear {
        opacity: 1;
        transform: translateY(0);
    }

    /* Animated line */
    .animated-line {
        height: 4px;
        width: 60px;
        background-color: #FF9933;
        margin: 16px 0;
        position: relative;
        overflow: hidden;
    }

    .animated-line::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.8), transparent);
        animation: shimmer 2s infinite;
    }

    @keyframes shimmer {
        0% {
            left: -100%;
        }

        100% {
            left: 100%;
        }
    }

    /* Agent Card hover effect */
    .agent-card {
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .agent-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .agent-card:hover .agent-image img {
        transform: scale(1.1);
    }

    .agent-image {
        overflow: hidden;
    }

    .agent-image img {
        transition: transform 0.5s ease;
    }

    .agent-socials a {
        transition: all 0.3s ease;
    }

    .agent-socials a:hover {
        background-color: #FF9933;
        color: white;
    }

    .agent-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(12, 36, 97, 0.9), transparent);
        padding: 30px 20px 20px;
        transform: translateY(100px);
        transition: all 0.3s ease;
    }

    .agent-card:hover .agent-overlay {
        transform: translateY(0);
    }

    /* Button hover animation */
    .btn-hover-slide {
        position: relative;
        overflow: hidden;
        z-index: 1;
    }

    .btn-hover-slide::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background-color: #E68A00;
        transition: left 0.3s ease;
        z-index: -1;
    }

    .btn-hover-slide:hover::before {
        left: 0;
    }

    /* Filter buttons */
    .filter-btn {
        transition: all 0.3s ease;
    }

    .filter-btn.active {
        background-color: #FF9933;
        color: white;
    }

    .filter-btn:hover:not(.active) {
        background-color: #FFB266;
        color: white;
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
    </style>
</head>

<body class="font-sans text-slate bg-gray-50">
    <!-- Navigation Bar (Same as Contact Page) -->
    <nav id="navbar" class="fixed top-0 left-0 w-full py-4 z-50 transition-all duration-300">
        <div class="w-11/12 max-w-screen-xl mx-auto flex justify-between items-center">
            <a href="#" class="flex items-center">
                <i class="fas fa-building text-saffron text-2xl mr-2"></i>
                <span class="text-xl font-heading font-bold text-white">SELL <span
                        class="text-saffron">SQUARE</span></span>
            </a>

            <div class="hidden md:flex items-center space-x-6">
                <a href="{{route('landing_index')}}"
                    class="text-white hover:text-saffron transition-colors duration-300">Home</a>
                <!-- <a href="#" class="text-white hover:text-saffron transition-colors duration-300">Properties</a> -->
                <a href="{{route('landing_agents')}}"
                    class="text-white hover:text-saffron transition-colors duration-300 border-b-2 border-saffron">Agents</a>
                <a href="{{route('landing_about')}}"
                    class="text-white hover:text-saffron transition-colors duration-300">About
                    Us</a>
                <a href="{{route('landing_contact')}}"
                    class="text-white hover:text-saffron transition-colors duration-300">Contact</a>
            </div>

            <div class="hidden md:flex items-center">
                <a href="#" class="mr-6 text-white hover:text-saffron transition-colors duration-300 flex items-center">
                    <i class="fas fa-phone-alt mr-2"></i> +91 98765 43210
                </a>
                <a href="#"
                    class="ml-4 px-5 py-2 bg-saffron hover:bg-saffron-dark text-white rounded-md transition-colors duration-300 flex items-center">
                    <i class="fas fa-plus-circle mr-2"></i> Post Property
                </a>
            </div>

            <!-- Mobile menu button -->
            <button class="md:hidden text-white focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </nav>

    <!-- Agents Hero Section -->
    <section class="relative flex justify-center items-center text-center h-[50vh] overflow-hidden">
        <!-- Video Background with Overlay -->
        <div class="absolute top-0 left-0 w-full h-full">
            <video autoplay muted loop playsinline class="object-cover w-full h-full">
                <source src="https://videos.pexels.com/video-files/7647253/7647253-sd_640_360_24fps.mp4"
                    type="video/mp4">
                <!-- Fallback image in case video doesn't load -->
                <img src="/api/placeholder/1920/600" alt="Our Agents" class="object-cover w-full h-full">
            </video>
            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-black/70 via-black/50 to-black/60">
            </div>
        </div>

        <div class="w-11/12 max-w-screen-lg z-10">
            <h1 class="text-4xl md:text-6xl leading-tight font-heading font-bold text-white text-shadow">Meet Our <span
                    class="text-saffron">Agents</span></h1>
            <p class="text-white/80 max-w-xl mx-auto mt-4">Dedicated professionals committed to helping you find your
                perfect property</p>
            <div class="mt-8 flex justify-center space-x-4">
                <a href="#featured-agents"
                    class="px-6 py-3 bg-saffron hover:bg-saffron-dark text-white rounded-md transition-colors duration-300 flex items-center btn-hover-slide">
                    <i class="fas fa-user-tie mr-2"></i> View Featured Agents
                </a>
                <a href="#join-team"
                    class="px-6 py-3 bg-white/10 backdrop-blur-md hover:bg-white/20 text-white rounded-md transition-colors duration-300 flex items-center">
                    <i class="fas fa-handshake mr-2"></i> Join Our Team
                </a>
            </div>
        </div>
    </section>

    <!-- Agents Filter Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-heading font-bold text-slate">Our <span class="text-saffron">Expert
                        Agents</span></h2>
                <div class="animated-line mx-auto"></div>
                <p class="text-gray-600 max-w-2xl mx-auto mt-4">Professional agents committed to helping you find your
                    perfect property across India</p>
            </div>

            <!-- Filter Options -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-12">
                <h3 class="text-xl font-semibold text-slate mb-4">Filter Agents</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Property Type Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Property Type</label>
                        <select
                            class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-saffron focus:border-saffron">
                            <option value="">All Property Types</option>
                            <option value="residential">Residential</option>
                            <option value="commercial">Commercial</option>
                            <option value="land">Land/Plot</option>
                            <option value="prelaunch">Pre-Launch Projects</option>
                        </select>
                    </div>

                    <!-- Price Range Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Price Range</label>
                        <select
                            class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-saffron focus:border-saffron">
                            <option value="">All Price Ranges</option>
                            <option value="0-3000000">Below ₹30 Lakhs</option>
                            <option value="3000000-7000000">₹30 Lakhs - ₹70 Lakhs</option>
                            <option value="7000000-15000000">₹70 Lakhs - ₹1.5 Crore</option>
                            <option value="15000000+">Above ₹1.5 Crore</option>
                        </select>
                    </div>

                    <!-- Experience Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Experience</label>
                        <select
                            class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-saffron focus:border-saffron">
                            <option value="">Any Experience</option>
                            <option value="0-2">0-2 Years</option>
                            <option value="3-5">3-5 Years</option>
                            <option value="5-10">5-10 Years</option>
                            <option value="10+">10+ Years</option>
                        </select>
                    </div>

                    <!-- City Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">City</label>
                        <select
                            class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-saffron focus:border-saffron">
                            <option value="">All Cities</option>
                            <option value="mumbai">Mumbai</option>
                            <option value="delhi">Delhi NCR</option>
                            <option value="bangalore">Bangalore</option>
                            <option value="hyderabad">Hyderabad</option>
                            <option value="pune">Pune</option>
                            <option value="lucknow">Lucknow</option>
                        </select>
                    </div>
                </div>
                <div class="mt-6 flex justify-center">
                    <button
                        class="px-6 py-3 bg-saffron hover:bg-saffron-dark text-white rounded-md transition-colors duration-300 flex items-center btn-hover-slide">
                        <i class="fas fa-filter mr-2"></i> Apply Filters
                    </button>
                    <button
                        class="ml-4 px-6 py-3 bg-white border border-gray-300 text-slate hover:bg-gray-100 rounded-md transition-colors duration-300">
                        <i class="fas fa-redo-alt mr-2"></i> Reset
                    </button>
                </div>
            </div>

            <section class="py-16 max-w-screen-xl mx-auto px-4">
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Agent Card 1 -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                        <div class="relative">
                            <img src="https://img.freepik.com/premium-photo/young-indian-businessm-selective-focus-shallow-depth-field-follow-focus-blur_685725-82.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740"
                                alt="Agent Profile" class="w-full h-80 object-cover object-top ">
                            <div class="absolute top-4 right-4">
                                <span
                                    class="bg-saffron text-white px-3 py-1 rounded-full text-sm animated-badge">Preferred
                                    Agent</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <div>
                                    <h3 class="text-xl font-bold text-navy">Jitendra Kumar Yadav</h3>
                                    <p class="text-gray-600">Lucknow, Operating since 2013</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-4 mb-4 text-center">
                                <div>
                                    <div class="text-saffron font-bold text-lg">31</div>
                                    <div class="text-sm text-gray-600">Properties</div>
                                </div>
                                <div>
                                    <div class="text-saffron font-bold text-lg">900</div>
                                    <div class="text-sm text-gray-600">Deals</div>
                                </div>
                                <div>
                                    <div class="text-saffron font-bold text-lg">11+</div>
                                    <div class="text-sm text-gray-600">Experience</div>
                                </div>
                            </div>
                            <div class="flex space-x-4">
                                <button
                                    class="w-full bg-saffron text-white py-3 rounded-md hover:bg-saffron-dark transition-colors">
                                    Contact Agent
                                </button>
                                <button
                                    class="w-full border border-navy text-navy py-3 rounded-md hover:bg-gray-100 transition-colors">
                                    View Details
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Agent Card 2 -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                        <div class="relative">
                            <img src="https://img.freepik.com/premium-photo/smiling-casual-businessman-with-arms-crossed_13339-158620.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740"
                                alt="Agent Profile" class="w-full h-80 object-cover object-top">
                            <div class="absolute top-4 right-4">
                                <span
                                    class="bg-saffron text-white px-3 py-1 rounded-full text-sm animated-badge">Preferred
                                    Agent</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <div>
                                    <h3 class="text-xl font-bold text-navy">Anoop Shukla</h3>
                                    <p class="text-gray-600">Gomti Nagar, Operating since 2011</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-4 mb-4 text-center">
                                <div>
                                    <div class="text-saffron font-bold text-lg">117</div>
                                    <div class="text-sm text-gray-600">Properties</div>
                                </div>
                                <div>
                                    <div class="text-saffron font-bold text-lg">500</div>
                                    <div class="text-sm text-gray-600">Deals</div>
                                </div>
                                <div>
                                    <div class="text-saffron font-bold text-lg">12+</div>
                                    <div class="text-sm text-gray-600">Experience</div>
                                </div>
                            </div>
                            <div class="flex space-x-4">
                                <button
                                    class="w-full bg-saffron text-white py-3 rounded-md hover:bg-saffron-dark transition-colors">
                                    Contact Agent
                                </button>
                                <button
                                    class="w-full border border-navy text-navy py-3 rounded-md hover:bg-gray-100 transition-colors">
                                    View Details
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Agent Card 3 -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                        <div class="relative">
                            <img src="https://img.freepik.com/premium-photo/close-up-portrait-man_1048944-9896532.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740"
                                alt="Agent Profile" class="w-full h-80 object-contain object-top">
                            <div class="absolute top-4 right-4">
                                <span
                                    class="bg-saffron text-white px-3 py-1 rounded-full text-sm animated-badge">Preferred
                                    Agent</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <div>
                                    <h3 class="text-xl font-bold text-navy">Rajesh Verma</h3>
                                    <p class="text-gray-600">Delhi NCR, Operating since 2015</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-4 mb-4 text-center">
                                <div>
                                    <div class="text-saffron font-bold text-lg">75</div>
                                    <div class="text-sm text-gray-600">Properties</div>
                                </div>
                                <div>
                                    <div class="text-saffron font-bold text-lg">450</div>
                                    <div class="text-sm text-gray-600">Deals</div>
                                </div>
                                <div>
                                    <div class="text-saffron font-bold text-lg">8+</div>
                                    <div class="text-sm text-gray-600">Experience</div>
                                </div>
                            </div>
                            <div class="flex space-x-4">
                                <button
                                    class="w-full bg-saffron text-white py-3 rounded-md hover:bg-saffron-dark transition-colors">
                                    Contact Agent
                                </button>
                                <button
                                    class="w-full border border-navy text-navy py-3 rounded-md hover:bg-gray-100 transition-colors">
                                    View Details
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Agent Card 4 -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                        <div class="relative">
                            <img src="https://img.freepik.com/free-photo/close-up-shot-handsome-caucasian-man-with-beard-dressed-t-shirt-looking-smiling-with-happy-cheerful-expression-sitting-sidewalk-restaurant-sunny-day-waiting-friends_273609-6600.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740"
                                alt="Agent Profile" class="w-full h-80 object-cover object-top">
                            <div class="absolute top-4 right-4">
                                <span
                                    class="bg-saffron text-white px-3 py-1 rounded-full text-sm animated-badge">Preferred
                                    Agent</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <div>
                                    <h3 class="text-xl font-bold text-navy">Rajesh Verma</h3>
                                    <p class="text-gray-600">Delhi NCR, Operating since 2015</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-4 mb-4 text-center">
                                <div>
                                    <div class="text-saffron font-bold text-lg">75</div>
                                    <div class="text-sm text-gray-600">Properties</div>
                                </div>
                                <div>
                                    <div class="text-saffron font-bold text-lg">450</div>
                                    <div class="text-sm text-gray-600">Deals</div>
                                </div>
                                <div>
                                    <div class="text-saffron font-bold text-lg">8+</div>
                                    <div class="text-sm text-gray-600">Experience</div>
                                </div>
                            </div>
                            <div class="flex space-x-4">
                                <button
                                    class="w-full bg-saffron text-white py-3 rounded-md hover:bg-saffron-dark transition-colors">
                                    Contact Agent
                                </button>
                                <button
                                    class="w-full border border-navy text-navy py-3 rounded-md hover:bg-gray-100 transition-colors">
                                    View Details
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Agent Card 5 -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                        <div class="relative">
                            <img src="https://img.freepik.com/free-photo/portrait-older-man-using-smartphone-home_23-2150572332.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740"
                                alt="Agent Profile" class="w-full h-80 object-cover object-top">
                            <div class="absolute top-4 right-4">
                                <span
                                    class="bg-saffron text-white px-3 py-1 rounded-full text-sm animated-badge">Preferred
                                    Agent</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <div>
                                    <h3 class="text-xl font-bold text-navy">Rajesh Verma</h3>
                                    <p class="text-gray-600">Delhi NCR, Operating since 2015</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-4 mb-4 text-center">
                                <div>
                                    <div class="text-saffron font-bold text-lg">75</div>
                                    <div class="text-sm text-gray-600">Properties</div>
                                </div>
                                <div>
                                    <div class="text-saffron font-bold text-lg">450</div>
                                    <div class="text-sm text-gray-600">Deals</div>
                                </div>
                                <div>
                                    <div class="text-saffron font-bold text-lg">8+</div>
                                    <div class="text-sm text-gray-600">Experience</div>
                                </div>
                            </div>
                            <div class="flex space-x-4">
                                <button
                                    class="w-full bg-saffron text-white py-3 rounded-md hover:bg-saffron-dark transition-colors">
                                    Contact Agent
                                </button>
                                <button
                                    class="w-full border border-navy text-navy py-3 rounded-md hover:bg-gray-100 transition-colors">
                                    View Details
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Agent Card 6 -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                        <div class="relative">
                            <img src="https://img.freepik.com/premium-photo/indian-man_1048944-1296716.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740"
                                alt="Agent Profile" class="w-full h-80 object-cover object-top">
                            <div class="absolute top-4 right-4">
                                <span
                                    class="bg-saffron text-white px-3 py-1 rounded-full text-sm animated-badge">Preferred
                                    Agent</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <div>
                                    <h3 class="text-xl font-bold text-navy">Rajesh Verma</h3>
                                    <p class="text-gray-600">Delhi NCR, Operating since 2015</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-4 mb-4 text-center">
                                <div>
                                    <div class="text-saffron font-bold text-lg">75</div>
                                    <div class="text-sm text-gray-600">Properties</div>
                                </div>
                                <div>
                                    <div class="text-saffron font-bold text-lg">450</div>
                                    <div class="text-sm text-gray-600">Deals</div>
                                </div>
                                <div>
                                    <div class="text-saffron font-bold text-lg">8+</div>
                                    <div class="text-sm text-gray-600">Experience</div>
                                </div>
                            </div>
                            <div class="flex space-x-4">
                                <button
                                    class="w-full bg-saffron text-white py-3 rounded-md hover:bg-saffron-dark transition-colors">
                                    Contact Agent
                                </button>
                                <button
                                    class="w-full border border-navy text-navy py-3 rounded-md hover:bg-gray-100 transition-colors">
                                    View Details
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                <nav class="flex items-center">
                    <a href="#"
                        class="px-4 py-2 mx-1 bg-white text-gray-500 rounded-md hover:bg-gray-100 transition-colors duration-300">Previous</a>
                    <a href="#" class="px-4 py-2 mx-1 bg-saffron text-white rounded-md">1</a>
                    <a href="#"
                        class="px-4 py-2 mx-1 bg-white text-gray-500 rounded-md hover:bg-gray-100 transition-colors duration-300">2</a>
                    <a href="#"
                        class="px-4 py-2 mx-1 bg-white text-gray-500 rounded-md hover:bg-gray-100 transition-colors duration-300">3</a>
                    <span class="mx-1 text-gray-500">...</span>
                    <a href="#"
                        class="px-4 py-2 mx-1 bg-white text-gray-500 rounded-md hover:bg-gray-100 transition-colors duration-300">10</a>
                    <a href="#"
                        class="px-4 py-2 mx-1 bg-white text-gray-500 rounded-md hover:bg-gray-100 transition-colors duration-300">Next</a>
                </nav>
            </div>
        </div>
    </section>

    <!-- Footer (Same as Contact Page) -->
    <footer class="bg-slate text-white pt-16 pb-8">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <div>
                    <a href="#" class="flex items-center mb-6">
                        <i class="fas fa-building text-saffron text-2xl mr-2"></i>
                        <span class="text-xl font-heading font-bold">SELLSQUARE<span
                                class="text-saffron">Properties</span></span>
                    </a>
                    <p class="text-gray-400 mb-6">India's premier real estate platform offering curated
                        properties
                        across major cities.</p>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-saffron transition-colors duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-saffron transition-colors duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-saffron transition-colors duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-saffron transition-colors duration-300">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-6">Quick Links</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-saffron transition-colors">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-saffron transition-colors">About Us</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-saffron transition-colors">Properties</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-saffron transition-colors">New
                                Projects</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-saffron transition-colors">Contact
                                Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-saffron transition-colors">Blog</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-6">Top Locations</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-saffron transition-colors">Mumbai</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-saffron transition-colors">Delhi NCR</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-saffron transition-colors">Bangalore</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-saffron transition-colors">Hyderabad</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-saffron transition-colors">Pune</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-saffron transition-colors">Chennai</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-6">Contact Us</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-saffron"></i>
                            <span class="text-gray-400">201, SELLSQUARE Tower, Bandra Kurla Complex, Mumbai
                                400051</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone-alt mr-3 text-saffron"></i>
                            <span class="text-gray-400">+91 98765 43210</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-saffron"></i>
                            <span class="text-gray-400">info@sellsquare.in</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-clock mr-3 text-saffron"></i>
                            <span class="text-gray-400">Mon - Sat: 10:00 AM - 7:00 PM</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="pt-8 border-t border-gray-800 text-center text-gray-400 text-sm">
                <p>© 2025 SELLSQUARE Properties. All Rights Reserved. RERA Registered.</p>
            </div>
        </div>
    </footer>



    <!-- Script for scroll effects and nav background -->
    <script>
    // Show/hide navigation background on scroll
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('bg-slate');
            navbar.classList.add('shadow-lg');
        } else {
            navbar.classList.remove('bg-slate');
            navbar.classList.remove('shadow-lg');
        }
    });

    // Initialize scroll animations when the page loads
    window.addEventListener('DOMContentLoaded', function() {
        // Check if GSAP ScrollTrigger is available
        if (typeof ScrollTrigger !== 'undefined') {
            // Initialize GSAP ScrollTrigger
            gsap.registerPlugin(ScrollTrigger);

            // Animate slide-in elements
            const slideInElements = document.querySelectorAll('.slide-in');
            slideInElements.forEach(element => {
                ScrollTrigger.create({
                    trigger: element,
                    start: "top 80%",
                    onEnter: () => element.classList.add('appear')
                });
            });
        } else {
            // Fallback for browsers without GSAP
            const slideInElements = document.querySelectorAll('.slide-in');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('appear');
                    }
                });
            }, {
                threshold: 0.1
            });

            slideInElements.forEach(element => {
                observer.observe(element);
            });
        }

        // Filter buttons functionality
        const filterButtons = document.querySelectorAll('.filter-btn');
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                // Add active class to clicked button
                this.classList.add('active');

                // Here you would typically filter the agents
                // This is just a placeholder for the real functionality
                console.log("Filter applied:", this.textContent.trim());
            });
        });
    });
    </script><!-- JavaScript for Agent Filtering -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // This is where you would add your filtering logic
        // Here's a basic structure for how it might work:

        const filterButton = document.querySelector('.btn-hover-slide');
        const resetButton = document.querySelector('.btn-hover-slide + button');
        const filterSelects = document.querySelectorAll('select');

        // Apply filters
        filterButton.addEventListener('click', function() {
            // Get filter values
            const filterValues = {};
            filterSelects.forEach(select => {
                if (select.value) {
                    filterValues[select.previousElementSibling.textContent.trim()
                        .toLowerCase()] = select.value;
                }
            });

            console.log('Applying filters:', filterValues);
            // In a real implementation, you would:
            // 1. Make an AJAX request to your server with these filter values
            // 2. Replace the current agents with the filtered results
            // 3. Update the pagination if necessary

            // Show a loading state
            const agentsContainer = document.querySelector(
                '.grid.grid-cols-1.md\\:grid-cols-2.lg\\:grid-cols-3');
            agentsContainer.innerHTML =
                '<div class="col-span-3 py-16 flex justify-center"><div class="loader"></div></div>';

            // Simulate loading (remove in production)
            setTimeout(() => {
                // For demo purposes, we'll just reload the same agents
                // In a real implementation, this would come from your server response
                agentsContainer.innerHTML = agentsContainer
                    .innerHTML; // This just simulates - would be replaced with actual filtered data
            }, 1000);
        });

        // Reset filters 
        resetButton.addEventListener('click', function() {
            filterSelects.forEach(select => {
                select.selectedIndex = 0;
            });

            // Then you would trigger the same fetch/display logic as the filter button
            // but with no filters applied
            console.log('Filters reset');
        });

        // Display and hide the overlay on hover for smaller screens
        const agentCards = document.querySelectorAll('.agent-card');
        agentCards.forEach(card => {
            const detailsBtn = card.querySelector('.text-saffron');
            detailsBtn.addEventListener('click', function(e) {
                e.preventDefault();
                // Implement view details action
                console.log('View details clicked');
            });

            const contactBtn = card.querySelector('.bg-red-600');
            contactBtn.addEventListener('click', function(e) {
                e.preventDefault();
                // Implement contact action
                console.log('Contact agent clicked');
            });
        });
    });
    </script>
</body>

</html>