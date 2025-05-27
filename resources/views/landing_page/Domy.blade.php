<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - SELLSQUAREProperties India</title>
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

    .contact-input {
        transition: all 0.3s ease;
        border-color: #E2E8F0;
    }

    .contact-input:focus {
        border-color: #FF9933;
        box-shadow: 0 0 0 3px rgba(255, 153, 51, 0.2);
    }

    .map-container {
        height: 450px;
        overflow: hidden;
        border-radius: 0.5rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
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

    /* Card hover effect */
    .contact-info-card {
        transition: all 0.3s ease;
    }

    .contact-info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .contact-info-card:hover .contact-icon {
        background-color: #FF9933;
        color: white;
    }

    .contact-icon {
        transition: all 0.3s ease;
        background-color: rgba(255, 153, 51, 0.1);
        color: #FF9933;
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
    </style>
</head>

<body class="font-sans text-slate bg-gray-50">
    <!-- Navigation Bar -->
    @include('landing_page/include/navbar')


    <!-- Contact Hero Section -->
    <section class="relative flex justify-center items-center text-center h-[50vh] overflow-hidden">
        <!-- Video Background with Overlay -->
        <div class="absolute top-0 left-0 w-full h-full">
            <video autoplay muted loop playsinline class="object-cover w-full h-full">
                <source src="{{asset('videos/header2.mp4')}}" type="video/mp4">
                <!-- Fallback image in case video doesn't load -->
                <img src="/api/placeholder/1920/600" alt="Contact Us" class="object-cover w-full h-full">
            </video>
            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-black/70 via-black/50 to-black/60">
            </div>
        </div>

        <div class="w-11/12 max-w-screen-lg z-10">
            <h1 class="text-4xl md:text-6xl leading-tight font-heading font-bold text-white text-shadow">Get in <span
                    class="text-saffron">Touch</span></h1>
            <p class="text-white/80 max-w-xl mx-auto mt-4">We're here to answer your questions and help you find your
                dream property</p>
            <div class="mt-8 flex justify-center space-x-4">
                <a href="#contact-section"
                    class="px-6 py-3 bg-saffron hover:bg-saffron-dark text-white rounded-md transition-colors duration-300 flex items-center btn-hover-slide">
                    <i class="fas fa-envelope mr-2"></i> Contact Now
                </a>
                <a href="#location-section"
                    class="px-6 py-3 bg-white/10 backdrop-blur-md hover:bg-white/20 text-white rounded-md transition-colors duration-300 flex items-center">
                    <i class="fas fa-map-marker-alt mr-2"></i> Our Locations
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact-section" class="py-16 bg-white">
        <div class="w-11/12 max-w-screen-xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-heading font-bold text-slate">Contact <span
                        class="text-saffron">Us</span></h2>
                <div class="animated-line mx-auto"></div>
                <p class="text-gray-600 max-w-xl mx-auto mt-4">Reach out to our expert team for any inquiries about
                    properties, investments, or partnerships</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-16">
                <div class="bg-white rounded-lg shadow-lg p-6 contact-info-card">
                    <div class="w-16 h-16 rounded-full contact-icon flex items-center justify-center mb-4 mx-auto">
                        <i class="fas fa-map-marker-alt text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-2">Visit Our Office</h3>
                    <p class="text-gray-600 text-center">201, SELLSQUARE Tower, Bandra Kurla Complex, Mumbai 400051</p>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6 contact-info-card">
                    <div class="w-16 h-16 rounded-full contact-icon flex items-center justify-center mb-4 mx-auto">
                        <i class="fas fa-phone-alt text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-2">Call Us</h3>
                    <p class="text-gray-600 text-center">+91 98765 43210</p>
                    <p class="text-gray-600 text-center">+91 22 4567 8901</p>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6 contact-info-card">
                    <div class="w-16 h-16 rounded-full contact-icon flex items-center justify-center mb-4 mx-auto">
                        <i class="fas fa-envelope text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-2">Email Us</h3>
                    <p class="text-gray-600 text-center">info@sellsquare.in</p>
                    <p class="text-gray-600 text-center">support@sellsquare.in</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
                <div class="bg-white rounded-lg shadow-lg p-8 slide-in">
                    <h3 class="text-2xl font-heading font-bold text-slate mb-6">Send us a <span
                            class="text-saffron">Message</span></h3>
                    <form id="contact-form" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full
                                    Name*</label>
                                <input type="text" id="name" name="name"
                                    class="w-full px-4 py-3 rounded-md border contact-input focus:outline-none"
                                    placeholder="Your name">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email
                                    Address*</label>
                                <input type="email" id="email" name="email"
                                    class="w-full px-4 py-3 rounded-md border contact-input focus:outline-none"
                                    placeholder="your@email.com">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone
                                    Number*</label>
                                <input type="tel" id="phone" name="phone"
                                    class="w-full px-4 py-3 rounded-md border contact-input focus:outline-none"
                                    placeholder="+91 98765 43210">
                            </div>
                            <div>
                                <label for="subject"
                                    class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                                <input type="text" id="subject" name="subject"
                                    class="w-full px-4 py-3 rounded-md border contact-input focus:outline-none"
                                    placeholder="Property Inquiry">
                            </div>
                        </div>
                        <div>
                            <label for="property-type" class="block text-sm font-medium text-gray-700 mb-1">Property
                                Interest</label>
                            <select id="property-type" name="property-type"
                                class="w-full px-4 py-3 rounded-md border contact-input focus:outline-none appearance-none bg-white">
                                <option value="">Select Property Type</option>
                                <option value="residential">Residential</option>
                                <option value="commercial">Commercial</option>
                                <option value="land">Land/Plot</option>
                                <option value="investment">Investment Property</option>
                                <option value="rental">Rental Property</option>
                            </select>
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Your
                                Message*</label>
                            <textarea id="message" name="message" rows="5"
                                class="w-full px-4 py-3 rounded-md border contact-input focus:outline-none"
                                placeholder="Tell us more about your property requirements..."></textarea>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="newsletter" name="newsletter" class="mr-2 h-4 w-4 text-saffron">
                            <label for="newsletter" class="text-sm text-gray-700">Subscribe to our newsletter for
                                property updates</label>
                        </div>
                        <div>
                            <button type="submit"
                                class="w-full md:w-auto px-8 py-3 bg-saffron hover:bg-saffron-dark text-white rounded-md transition-all duration-300 flex items-center justify-center btn-hover-slide">
                                <i class="fas fa-paper-plane mr-2"></i> Send Message
                            </button>
                        </div>
                    </form>
                </div>

                <div class="space-y-8">
                    <div class="map-container slide-in w-full h-[450px]">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3559.186989214644!2d81.00378117522263!3d26.865799576675187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399be2bef8e5f9d3%3A0xa0cd5cc1e323292c!2sDLF%20MyPad!5e0!3m2!1sen!2sin!4v1746783915053!5m2!1sen!2sin"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>


                    <div class="bg-white rounded-lg shadow-lg p-6 slide-in">
                        <h3 class="text-xl font-semibold mb-4">Office <span class="text-saffron">Hours</span></h3>
                        <ul class="space-y-3">
                            <li class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-gray-700">Monday - Friday</span>
                                <span class="font-medium">10:00 AM - 7:00 PM</span>
                            </li>
                            <li class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-gray-700">Saturday</span>
                                <span class="font-medium">10:00 AM - 5:00 PM</span>
                            </li>
                            <li class="flex justify-between items-center py-2">
                                <span class="text-gray-700">Sunday</span>
                                <span class="font-medium text-saffron">By Appointment Only</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>






    <!-- Footer Start-->
    @include('landing_page.include.footer');
    <!-- Footer End-->


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

        // Form validation (basic example)
        const contactForm = document.getElementById('contact-form');
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                // Basic validation
                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const phone = document.getElementById('phone').value;
                const message = document.getElementById('message').value;

                if (!name || !email || !phone || !message) {
                    alert('Please fill in all required fields');
                    return;
                }

                // Add animation to show form is submitting
                const submitButton = contactForm.querySelector('button[type="submit"]');
                const originalButtonText = submitButton.innerHTML;
                submitButton.innerHTML = '<div class="loader mx-auto"></div>';
                submitButton.disabled = true;

                // Simulate form submission (replace with actual ajax submission)
                setTimeout(() => {
                    alert('Thank you for contacting us! We will get back to you soon.');
                    contactForm.reset();
                    submitButton.innerHTML = originalButtonText;
                    submitButton.disabled = false;
                }, 1500);
            });
        }
    });
    </script>
</body>

</html>