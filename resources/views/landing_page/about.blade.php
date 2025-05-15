<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELLSQUAREProperties India</title>
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
    </style>
</head>

<body class="font-sans text-slate bg-gray-50">
    <!-- Navigation Bar -->
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
                    class="text-white hover:text-saffron transition-colors duration-300">Agents</a>
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

    <!-- About Hero Section -->
    <section class="relative flex justify-center items-center text-center h-[50vh] overflow-hidden">
        <!-- Video Background with Overlay -->
        <div class="absolute top-0 left-0 w-full h-full">
            <video autoplay muted loop playsinline class="object-cover w-full h-full">
                <source src="{{asset('videos/header2.mp4')}}" type="video/mp4">
                <!-- Fallback image in case video doesn't load -->
                <img src="/api/placeholder/1920/600" alt="Real Estate Excellence" class="object-cover w-full h-full">
            </video>
            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-black/70 via-black/50 to-black/60">
            </div>
        </div>

        <div class="w-11/12 max-w-screen-lg z-10">
            <h1 class="text-4xl md:text-6xl leading-tight font-heading font-bold text-white text-shadow">About <span
                    class="text-saffron">SELL SQUARE</span></h1>
            <p class="text-white/80 max-w-xl mx-auto mt-4">Your Trusted Partner in Real Estate Excellence</p>
            <div class="mt-8 flex justify-center space-x-4">
                <a href="#about-section"
                    class="px-6 py-3 bg-saffron hover:bg-saffron-dark text-white rounded-md transition-colors duration-300 flex items-center">
                    <i class="fas fa-info-circle mr-2"></i> Our Story
                </a>
                <a href="#"
                    class="px-6 py-3 bg-white/10 backdrop-blur-md hover:bg-white/20 text-white rounded-md transition-colors duration-300 flex items-center">
                    <i class="fas fa-play mr-2"></i> Watch Video
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about-section" class="py-20">
        <div class="max-w-screen-xl mx-auto px-4">
            <!-- Section Header with Accent Line -->
            <div class="relative mb-16 text-center">
                <span class="inline-block h-1 w-12 bg-saffron mb-4"></span>
                <p class="text-saffron uppercase tracking-widest font-medium mb-2">Our Story</p>
                <h2 class="text-3xl md:text-4xl font-heading font-bold mb-6 text-slate">Who We Are</h2>
                <div class="w-24 h-1 bg-saffron mx-auto"></div>
            </div>

            <!-- About Content with Image -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left: Image with accent border -->
                <div class="relative slide-in">
                    <div class="absolute -bottom-4 -right-4 w-2/3 h-2/3 bg-saffron/10 rounded-lg -z-10"></div>
                    <img src="https://img.freepik.com/premium-photo/female-realtor-holding-keychain-shape-small-house-keys-against-house-as-background_359031-7696.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740"
                        alt="SELL SQUARE Office" class="rounded-lg shadow-xl object-cover w-full h-25">
                    <div
                        class="absolute top-0 left-0 w-24 h-24 bg-saffron/20 -z-10 rounded-full transform -translate-x-1/2 -translate-y-1/2">
                    </div>
                    <div class="absolute -bottom-6 -right-6 w-40 h-40 border-4 border-navy/10 -z-10 rounded-full"></div>
                </div>

                <!-- Right: Text Content -->
                <div class="slide-in">
                    <h3 class="text-2xl font-heading font-bold mb-6 text-slate">Excellence in Indian Real Estate </h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">At SELL SQUARE Properties, we blend tradition with
                        innovation to redefine the Indian real estate experience. Founded with a vision to make property
                        transactions transparent, efficient, and rewarding, we have grown to become one of India's most
                        trusted real estate advisors.</p>

                    <p class="text-gray-600 mb-6 leading-relaxed">Our team of seasoned professionals brings extensive
                        local knowledge and market expertise to every transaction, ensuring that your real estate
                        journey is smooth and successful. Whether you're buying your first home, investing in commercial
                        property, or selling a luxury estate, SELL SQUARE delivers exceptional service tailored to your
                        unique needs.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="flex items-start">
                            <div
                                class="h-12 w-12 rounded-full bg-saffron/10 flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-award text-saffron text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-2 text-navy">RERA Certified</h4>
                                <p class="text-gray-600 text-sm">Fully compliant with Real Estate Regulatory Authority
                                    guidelines</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div
                                class="h-12 w-12 rounded-full bg-saffron/10 flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-handshake text-saffron text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-2 text-navy">10,000+ Transactions</h4>
                                <p class="text-gray-600 text-sm">Successfully completed across major Indian cities</p>
                            </div>
                        </div>
                    </div>

                    <a href="#"
                        class="group relative overflow-hidden px-6 py-3 inline-block bg-transparent border-2 border-saffron text-saffron font-bold rounded-md hover:text-white transition-all duration-300">
                        <span class="relative z-10">Learn More About Our Journey</span>
                        <span
                            class="absolute inset-0 bg-saffron transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-screen-xl mx-auto px-4">
            <!-- Section Header -->
            <div class="relative mb-16 text-center">
                <span class="inline-block h-1 w-12 bg-saffron mb-4"></span>
                <p class="text-saffron uppercase tracking-widest font-medium mb-2">Our Principles</p>
                <h2 class="text-3xl md:text-4xl font-heading font-bold mb-6 text-slate">Core Values</h2>
                <div class="w-24 h-1 bg-saffron mx-auto"></div>
                <p class="mt-6 text-gray-600 max-w-2xl mx-auto">The guiding principles that define how we conduct
                    business and serve our clients across India.</p>
            </div>

            <!-- Values Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Value Card 1 -->
                <div
                    class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 border-t-4 border-saffron slide-in">
                    <div class="w-16 h-16 rounded-full bg-saffron/10 flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-heart text-saffron text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-navy text-center mb-3">Client-Centered</h3>
                    <p class="text-gray-600 text-center">Your satisfaction is our top priority. We listen carefully to
                        understand your unique needs and deliver personalized solutions.</p>
                </div>

                <!-- Value Card 2 -->
                <div
                    class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 border-t-4 border-navy slide-in">
                    <div class="w-16 h-16 rounded-full bg-navy/10 flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-balance-scale text-navy text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-navy text-center mb-3">Integrity</h3>
                    <p class="text-gray-600 text-center">We uphold the highest ethical standards in all our dealings,
                        ensuring transparency and fairness at every step.</p>
                </div>

                <!-- Value Card 3 -->
                <div
                    class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 border-t-4 border-emerald slide-in">
                    <div class="w-16 h-16 rounded-full bg-emerald/10 flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-lightbulb text-emerald text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-navy text-center mb-3">Innovation</h3>
                    <p class="text-gray-600 text-center">We continuously adopt cutting-edge technologies and creative
                        solutions to enhance your real estate experience.</p>
                </div>

                <!-- Value Card 4 -->
                <div
                    class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 border-t-4 border-saffron slide-in">
                    <div class="w-16 h-16 rounded-full bg-saffron/10 flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-star text-saffron text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-navy text-center mb-3">Excellence</h3>
                    <p class="text-gray-600 text-center">We strive for perfection in every aspect of our service, from
                        property selection to after-sales support.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Achievements Section -->
    <section class="py-20 bg-navy text-white mb-20">
        <div class="max-w-screen-xl mx-auto px-4">
            <!-- Section Header -->
            <div class="relative mb-16 text-center">
                <span class="inline-block h-1 w-12 bg-saffron mb-4"></span>
                <p class="text-saffron uppercase tracking-widest font-medium mb-2">Our Impact</p>
                <h2 class="text-3xl md:text-4xl font-heading font-bold mb-6">SELL SQUARE By The Numbers</h2>
                <div class="w-24 h-1 bg-saffron mx-auto"></div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                <!-- Stat 1 -->
                <div class="slide-in">
                    <div class="text-5xl font-bold text-saffron mb-2">15+</div>
                    <div class="text-xl mb-1">Years</div>
                    <p class="text-white/70">Of Excellence in Real Estate</p>
                </div>

                <!-- Stat 2 -->
                <div class="slide-in">
                    <div class="text-5xl font-bold text-saffron mb-2">10k+</div>
                    <div class="text-xl mb-1">Happy Clients</div>
                    <p class="text-white/70">Across India</p>
                </div>

                <!-- Stat 3 -->
                <div class="slide-in">
                    <div class="text-5xl font-bold text-saffron mb-2">₹50B+</div>
                    <div class="text-xl mb-1">In Transactions</div>
                    <p class="text-white/70">Property Value Handled</p>
                </div>

                <!-- Stat 4 -->
                <div class="slide-in">
                    <div class="text-5xl font-bold text-saffron mb-2">12</div>
                    <div class="text-xl mb-1">Major Cities</div>
                    <p class="text-white/70">Pan-India Presence</p>
                </div>
            </div>

            <!-- Awards -->
            <!-- <div class="mt-20 text-center">
                <h3 class="text-2xl font-bold mb-10">Awards & Recognition</h3>
                <div class="flex flex-wrap justify-center gap-8">
                    <div class="w-36 h-36 bg-white/10 rounded-lg flex items-center justify-center p-4">
                        <i class="fas fa-trophy text-saffron text-4xl"></i>
                    </div>
                    <div class="w-36 h-36 bg-white/10 rounded-lg flex items-center justify-center p-4">
                        <i class="fas fa-medal text-saffron text-4xl"></i>
                    </div>
                    <div class="w-36 h-36 bg-white/10 rounded-lg flex items-center justify-center p-4">
                        <i class="fas fa-award text-saffron text-4xl"></i>
                    </div>
                    <div class="w-36 h-36 bg-white/10 rounded-lg flex items-center justify-center p-4">
                        <i class="fas fa-certificate text-saffron text-4xl"></i>
                    </div>
                </div>
            </div> -->
        </div>
    </section>


    <!-- Footer Start-->
    @include('landing_page.include.footer');
    <!-- Footer End-->




    <!-- Animation Script for Slide-In Elements -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Slide-in animations
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

        // Navbar background change on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('bg-navy', 'shadow-lg');
            } else {
                navbar.classList.remove('bg-navy', 'shadow-lg');
            }
        });
    });
    </script>
</body>

</html>