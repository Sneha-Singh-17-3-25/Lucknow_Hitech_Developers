 @extends('layouts/users/app')

 @push('style')
 <style>
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

     */ .contact-input {
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
 @endpush


 @section('content')

 <body class="font-sans text-slate bg-gray-50">
     <!-- Contact Hero Section -->
     <section class="relative flex justify-center items-center text-center h-[50vh] overflow-hidden">
         <!-- Video Background with Overlay -->
         <div class="absolute top-0 left-0 w-full h-full">
             <video autoplay muted loop playsinline class="object-cover w-full h-full">
                 <source src="{{asset('videos/contact.mp4')}}" type="video/mp4">
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
                 <div class="bg-white rounded-lg shadow-md p-6 contact-info-card">
                     <div class="w-16 h-16 rounded-full contact-icon flex items-center justify-center mb-4 mx-auto">
                         <i class="fas fa-map-marker-alt text-2xl"></i>
                     </div>
                     <h3 class="text-xl font-semibold text-center mb-2">Visit Our Office</h3>
                     <p class="text-gray-600 text-center">DLF MY PAD , B1 Tower , 9th Floor , Vibhuti Khand , Gomti Nagar
                         Lucknow 226010</p>
                 </div>

                 <div class="bg-white rounded-lg shadow-md p-6 contact-info-card">
                     <div class="w-16 h-16 rounded-full contact-icon flex items-center justify-center mb-4 mx-auto">
                         <i class="fas fa-phone-alt text-2xl"></i>
                     </div>
                     <h3 class="text-xl font-semibold text-center mb-2">Call Us</h3>
                     <p class="text-gray-600 text-center">+91 9335766586</p>
                     <p class="text-gray-600 text-center">+91 8299370217</p>
                 </div>

                 <div class="bg-white rounded-lg shadow-md p-6 contact-info-card">
                     <div class="w-16 h-16 rounded-full contact-icon flex items-center justify-center mb-4 mx-auto">
                         <i class="fas fa-envelope text-2xl"></i>
                     </div>
                     <h3 class="text-xl font-semibold text-center mb-2">Email Us</h3>
                     <!-- <p class="text-gray-600 text-center">info@sellsquare.in</p> -->
                     <p class="text-gray-600 text-center">lucknowhitechdevelopers@gmail.com</p>
                 </div>
             </div>

             <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start bg-white">
                 <div class="bg-white rounded-lg shadow-md p-8 slide-in">
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
                                 <input type="email" name="email"
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
                             src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3559.186989214653!2d81.00378117522263!3d26.865799576675187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399be2bef8e5f9d3%3A0xa0cd5cc1e323292c!2sDLF%20MyPad!5e0!3m2!1sen!2sin!4v1747391818930!5m2!1sen!2sin"
                             width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                             referrerpolicy="no-referrer-when-downgrade"></iframe>
                     </div>


                     <div class="bg-white rounded-lg shadow-md p-6 slide-in">
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

     <!-- Branch Locations Section -->
     <section id="location-section" class="py-16 bg-gray-50">
         <div class="w-11/12 max-w-screen-xl mx-auto">
             <div class="text-center mb-12">
                 <h2 class="text-3xl md:text-4xl font-heading font-bold text-slate">Our <span class="text-saffron">Branch
                         Locations</span></h2>
                 <div class="animated-line mx-auto"></div>
                 <p class="text-gray-600 max-w-xl mx-auto mt-4">Visit us at one of our offices across major Indian cities
                 </p>
             </div>

             <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                 <div class="bg-white rounded-lg shadow-md overflow-hidden slide-in">
                     <div class="h-48 overflow-hidden">
                         <img src="https://img.freepik.com/premium-photo/young-elegant-businesswoman-sitting-by-desk-corner-modern-office-looking-computer-screen-pandemic-period_274679-15360.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740"
                             alt="Mumbai Office" class="w-full h-full object-cover">
                     </div>
                     <div class="p-6">
                         <h3 class="text-xl font-semibold mb-2">Gomti <span class="text-saffron">Nagar</span></h3>
                         <div class="flex items-start mb-3">
                             <i class="fas fa-map-marker-alt text-saffron mt-1 mr-3"></i>
                             <p class="text-gray-700">DLF MY PAD , B1 Tower , 9th Floor , Vibhuti Khand , Gomti Nagar
                                 Lucknow 226010</p>
                         </div>
                         <div class="flex items-center mb-3">
                             <i class="fas fa-phone-alt text-saffron mr-3"></i>
                             <p class="text-gray-700">+91 9335766586</p>
                         </div>
                         <a href="#" class="text-saffron hover:text-saffron-dark font-medium flex items-center mt-4">
                             <span>Get Directions</span>
                             <i class="fas fa-arrow-right ml-2"></i>
                         </a>
                     </div>
                 </div>

                 <div class="bg-white rounded-lg shadow-md overflow-hidden slide-in">
                     <div class="h-48 overflow-hidden">
                         <img src="https://img.freepik.com/free-photo/empty-office-workplace-with-table-chair-computer_1170-1959.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740"
                             alt="Delhi Office" class="w-full h-full object-cover">
                     </div>
                     <div class="p-6">
                         <h3 class="text-xl font-semibold mb-2">Delhi <span class="text-saffron">NCR</span></h3>
                         <div class="flex items-start mb-3">
                             <i class="fas fa-map-marker-alt text-saffron mt-1 mr-3"></i>
                             <p class="text-gray-700">505, SELLSQUARE Heights, Cyber City, Gurgaon 122002</p>
                         </div>
                         <div class="flex items-center mb-3">
                             <i class="fas fa-phone-alt text-saffron mr-3"></i>
                             <p class="text-gray-700">+91 98765 43211</p>
                         </div>
                         <a href="#" class="text-saffron hover:text-saffron-dark font-medium flex items-center mt-4">
                             <span>Get Directions</span>
                             <i class="fas fa-arrow-right ml-2"></i>
                         </a>
                     </div>
                 </div>

                 <div class="bg-white rounded-lg shadow-md overflow-hidden slide-in">
                     <div class="h-48 overflow-hidden">
                         <img src="https://img.freepik.com/premium-photo/casual-colleagues-smiling_107420-34326.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740"
                             alt="Bangalore Office" class="w-full h-full object-cover">
                     </div>
                     <div class="p-6">
                         <h3 class="text-xl font-semibold mb-2">Bangalore <span class="text-saffron">Office</span></h3>
                         <div class="flex items-start mb-3">
                             <i class="fas fa-map-marker-alt text-saffron mt-1 mr-3"></i>
                             <p class="text-gray-700">302, SELLSQUARE Park, Whitefield, Bangalore 560066</p>
                         </div>
                         <div class="flex items-center mb-3">
                             <i class="fas fa-phone-alt text-saffron mr-3"></i>
                             <p class="text-gray-700">+91 98765 43212</p>
                         </div>
                         <a href="#" class="text-saffron hover:text-saffron-dark font-medium flex items-center mt-4">
                             <span>Get Directions</span>
                             <i class="fas fa-arrow-right ml-2"></i>
                         </a>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <!-- FAQ Section -->
     <section class="py-16 bg-white">
         <div class="w-11/12 max-w-screen-xl mx-auto">
             <div class="text-center mb-12">
                 <h2 class="text-3xl md:text-4xl font-heading font-bold text-slate">Frequently Asked <span
                         class="text-saffron">Questions</span></h2>
                 <div class="animated-line mx-auto"></div>
                 <p class="text-gray-600 max-w-xl mx-auto mt-4">Find answers to common questions about our services</p>
             </div>

             <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                 <div class="slide-in">
                     <div class="mb-6">
                         <h3 class="text-xl font-semibold mb-3">How do I schedule a property viewing?</h3>
                         <p class="text-gray-700">You can schedule a property viewing by filling out our contact form,
                             calling our office directly, or using the "Book Appointment" button on any property listing.
                             Our team will get back to you within 24 hours to confirm your appointment.</p>
                     </div>
                     <div class="mb-6">
                         <h3 class="text-xl font-semibold mb-3">What documents do I need to buy a property?</h3>
                         <p class="text-gray-700">Required documents typically include proof of identity (Aadhar, PAN),
                             address proof, income proof (salary slips, ITR), property documents, and bank statements.
                             Our agents will guide you through the specific requirements for your chosen property.</p>
                     </div>
                     <div>
                         <h3 class="text-xl font-semibold mb-3">Do you offer virtual property tours?</h3>
                         <p class="text-gray-700">Yes, we offer virtual property tours for most of our listings. You can
                             request a virtual tour through our contact form or by speaking directly with one of our
                             agents.</p>
                     </div>
                 </div>

                 <div class="slide-in">
                     <div class="mb-6">
                         <h3 class="text-xl font-semibold mb-3">What areas do you serve?</h3>
                         <p class="text-gray-700">We currently have offices in Lucknow, and we
                             handle properties across all major Lucknow areas including Gomti Nagar, Hazratganj, Aliganj,
                             Mahanagar, and Indira Nagar.</p>
                     </div>
                     <div class="mb-6">
                         <h3 class="text-xl font-semibold mb-3">Can you help with home loans?</h3>
                         <p class="text-gray-700">Yes, we have partnerships with major banks and financial institutions
                             to help you secure the best possible home loan rates. Our finance specialists can guide you
                             through the entire process.</p>
                     </div>
                     <div>
                         <h3 class="text-xl font-semibold mb-3">What are your service charges?</h3>
                         <p class="text-gray-700">Our service charges vary depending on the type of property and services
                             required. We maintain full transparency, and all fees will be disclosed upfront before any
                             agreement is signed.</p>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <!-- CTA Section -->
     <section class="py-16 bg-navy text-white">
         <div class="w-11/12 max-w-screen-xl mx-auto">
             <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                 <div class="slide-in">
                     <h2 class="text-3xl md:text-4xl font-heading font-bold mb-4">Ready to Find Your <span
                             class="text-saffron">Dream Property?</span></h2>
                     <p class="text-white/80 mb-6">Connect with our property experts today and let us help you find the
                         perfect property that meets all your requirements.</p>
                     <div class="flex flex-wrap gap-4">
                         <a href="#contact-section"
                             class="px-6 py-3 bg-saffron hover:bg-saffron-dark text-white rounded-md transition-colors duration-300 flex items-center btn-hover-slide">
                             <i class="fas fa-envelope mr-2"></i> Contact Now
                         </a>
                         <a href="tel:+919876543210"
                             class="px-6 py-3 bg-white/10 hover:bg-white/20 text-white rounded-md transition-colors duration-300 flex items-center">
                             <i class="fas fa-phone-alt mr-2"></i> Call Us
                         </a>
                     </div>
                     <div class="mt-8">
                         <p class="font-semibold mb-3">Follow us on social media:</p>
                         <div class="flex space-x-4">
                             <a href="#"
                                 class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-saffron transition-colors duration-300">
                                 <i class="fab fa-instagram text-white"></i>
                             </a>
                             <a href="#"
                                 class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-saffron transition-colors duration-300">
                                 <i class="fab fa-linkedin-in text-white"></i>
                             </a>
                         </div>
                     </div>
                 </div>

                 <div class="slide-in">
                     <div class="bg-white/5 backdrop-blur-md rounded-lg p-6 border border-white/10">
                         <div class="grid grid-cols-2 gap-4 mb-6">
                             <div class="text-center p-4 bg-white/5 rounded-lg">
                                 <h3 class="text-3xl font-bold text-saffron">15+</h3>
                                 <p class="text-white/80 text-sm mt-2">Years Experience</p>
                             </div>
                             <div class="text-center p-4 bg-white/5 rounded-lg">
                                 <h3 class="text-3xl font-bold text-saffron">5000+</h3>
                                 <p class="text-white/80 text-sm mt-2">Properties Sold</p>
                             </div>
                             <div class="text-center p-4 bg-white/5 rounded-lg">
                                 <h3 class="text-3xl font-bold text-saffron">50+</h3>
                                 <p class="text-white/80 text-sm mt-2">Expert Agents</p>
                             </div>
                             <div class="text-center p-4 bg-white/5 rounded-lg">
                                 <h3 class="text-3xl font-bold text-saffron">8+</h3>
                                 <p class="text-white/80 text-sm mt-2">Cities Covered</p>
                             </div>
                         </div>
                         <div class="text-center">
                             <i class="fas fa-quote-left text-saffron opacity-50 text-3xl mb-2"></i>
                             <p class="italic text-white/90 mb-4">Lucknow Hitech Developers Properties helped me find my
                                 dream home in
                                 just two weeks. Their team was professional, responsive, and truly understood my needs.
                             </p>
                             <div class="flex items-center justify-center">
                                 <div class="w-12 h-12 bg-navy-light rounded-full overflow-hidden mr-3">
                                     <img src="https://img.freepik.com/premium-photo/young-beautiful-woman-white_251136-56970.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740"
                                         alt="Client" class="w-full h-full object-cover">
                                 </div>
                                 <div class="text-left">
                                     <p class="font-semibold">Priya Sharma</p>
                                     <p class="text-white/70 text-sm">Satisfied Client</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <!-- Newsletter Section -->
     <section class="py-12 bg-gray-50">
         <div class="w-11/12 max-w-screen-xl mx-auto">
             <div class="bg-gradient-to-r from-navy to-navy-light rounded-lg p-8 md:p-12">
                 <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                     <div>
                         <h2 class="text-2xl md:text-3xl font-heading font-bold text-white mb-4">Subscribe to Our <span
                                 class="text-saffron">Newsletter</span></h2>
                         <p class="text-white/80 mb-6">Stay updated with the latest property listings, market trends, and
                             exclusive offers</p>
                     </div>
                     <div>
                         <form class="flex flex-col sm:flex-row gap-4">
                             <input type="email" placeholder="Enter your email address"
                                 class="flex-grow px-4 py-3 rounded-md border-0 focus:outline-none focus:ring-2 focus:ring-saffron">
                             <button type="submit"
                                 class="px-6 py-3 bg-saffron hover:bg-saffron-dark text-white rounded-md transition-colors duration-300 whitespace-nowrap btn-hover-slide">
                                 <i class="fas fa-paper-plane mr-2"></i> Subscribe
                             </button>
                         </form>
                         <p class="text-white/60 text-sm mt-3">By subscribing, you agree to our privacy policy and
                             consent to receive updates from our company.</p>
                     </div>
                 </div>
             </div>
         </div>
     </section>

 </body>
 @endsection

 @push('script')
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

 @endpush