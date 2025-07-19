@extends('layouts/users/app')


@section('page-css')
<!-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
@endsection

@push('style')
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

    /* Accordion styles */
    .accordion-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-out;
    }

    .accordion-item.active .accordion-content {
        max-height: 1000px;
    }

    .accordion-header {
        transition: all 0.3s ease;
    }

    .accordion-item.active .accordion-header {
        background-color: rgba(255, 153, 51, 0.1);
        color: #FF9933;
    }

    .accordion-icon {
        transition: transform 0.3s ease;
    }

    .accordion-item.active .accordion-icon {
        transform: rotate(180deg);
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

    /* Back to top button */
    .back-to-top {
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    .back-to-top.visible {
        opacity: 1;
        visibility: visible;
    }

    /* Link hover effect */
    .hover-link {
        position: relative;
    }

    .hover-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -2px;
        left: 0;
        background-color: #FF9933;
        transition: width 0.3s ease;
    }

    .hover-link:hover::after {
        width: 100%;
    }
</style>
@endpush

@section('content')

<body class="font-sans text-slate bg-gray-50">

    <!-- Terms & Conditions Hero Section -->
    <section class="relative flex justify-center items-center text-center h-[40vh] overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute top-0 left-0 w-full h-full">
            <video autoplay muted loop playsinline class="object-cover w-full h-full">
                <source src="{{asset('videos/termsconditions.mp4')}}" type="video/mp4">
                <!-- Fallback image in case video doesn't load -->
                <img src="/api/placeholder/1920/600" alt="Real Estate Excellence" class="object-cover w-full h-full">
            </video>
            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-black/70 via-black/50 to-black/60">
            </div>
        </div>

        <div class="w-11/12 max-w-screen-lg z-20">
            <h1 class="text-4xl md:text-5xl leading-tight font-heading font-bold text-white text-shadow">Terms & <span
                    class="text-saffron">Conditions</span></h1>
            <p class="text-white/80 max-w-xl mx-auto mt-4">Understanding our policies for using SELLSQUARE Properties
                India services</p>
            <div class="mt-8">
                <a href="#content-section"
                    class="px-6 py-3 bg-saffron hover:bg-saffron-dark text-white rounded-md transition-colors duration-300 flex items-center btn-hover-slide mx-auto w-fit">
                    <i class="fas fa-file-contract mr-2"></i> Read Terms
                </a>
            </div>
        </div>
    </section>

    <!-- Table of Contents Navigation -->
    <section class="bg-white border-b border-gray-200 sticky top-0 z-30 shadow-sm">
        <div class="w-11/12 max-w-screen-xl mx-auto py-4">
            <nav class="flex flex-wrap justify-center gap-x-8 gap-y-2">
                <a href="#acceptance"
                    class="text-navy hover:text-saffron transition-colors duration-300 hover-link text-sm font-medium">
                    <i class="fas fa-check-circle mr-1"></i> Acceptance
                </a>
                <a href="#services"
                    class="text-navy hover:text-saffron transition-colors duration-300 hover-link text-sm font-medium">
                    <i class="fas fa-home mr-1"></i> Services
                </a>
                <a href="#user-obligations"
                    class="text-navy hover:text-saffron transition-colors duration-300 hover-link text-sm font-medium">
                    <i class="fas fa-user-shield mr-1"></i> User Obligations
                </a>
                <a href="#property-listings"
                    class="text-navy hover:text-saffron transition-colors duration-300 hover-link text-sm font-medium">
                    <i class="fas fa-building mr-1"></i> Property Listings
                </a>
                <a href="#payments"
                    class="text-navy hover:text-saffron transition-colors duration-300 hover-link text-sm font-medium">
                    <i class="fas fa-rupee-sign mr-1"></i> Payments
                </a>
                <a href="#privacy"
                    class="text-navy hover:text-saffron transition-colors duration-300 hover-link text-sm font-medium">
                    <i class="fas fa-lock mr-1"></i> Privacy
                </a>
                <a href="#liability"
                    class="text-navy hover:text-saffron transition-colors duration-300 hover-link text-sm font-medium">
                    <i class="fas fa-exclamation-triangle mr-1"></i> Liability
                </a>
                <a href="#disputes"
                    class="text-navy hover:text-saffron transition-colors duration-300 hover-link text-sm font-medium">
                    <i class="fas fa-gavel mr-1"></i> Disputes
                </a>
            </nav>
        </div>
    </section>

    <!-- Terms & Conditions Content -->
    <section id="content-section" class="py-16 bg-white">
        <div class="w-11/12 max-w-screen-lg mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-heading font-bold text-slate">Terms & <span
                        class="text-saffron">Conditions</span></h2>
                <div class="animated-line mx-auto"></div>
                <p class="text-gray-600 max-w-2xl mx-auto mt-4">Last Updated: May 16, 2025</p>
            </div>

            <div class="prose prose-lg max-w-none">
                <div class="mb-8 slide-in">
                    <p class="text-gray-600 leading-relaxed">
                        Welcome to SELLSQUAREProperties India. These Terms and Conditions govern your use of our
                        website,
                        mobile applications, and services. By accessing or using our platform, you agree to be bound by
                        these terms. Please read them carefully before proceeding.
                    </p>
                </div>

                <!-- Acceptance Section -->
                <div id="acceptance" class="mb-12 scroll-mt-20 slide-in">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 rounded-full bg-saffron/10 flex items-center justify-center mr-4">
                            <i class="fas fa-check-circle text-saffron"></i>
                        </div>
                        <h3 class="text-2xl font-heading font-bold text-slate">1. Acceptance of Terms</h3>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg border-l-4 border-saffron">
                        <p class="text-gray-700 mb-4">By accessing or using SELLSQUARE Properties India's website,
                            mobile applications, or services (collectively, the "Platform"), you acknowledge that you
                            have read, understood, and agree to be bound by these Terms and Conditions, our Privacy
                            Policy, and any additional guidelines or rules applicable to specific services offered.</p>
                        <p class="text-gray-700 mb-0">We reserve the right to modify these terms at any time. Changes
                            will be effective immediately upon posting to the Platform. Your continued use of the
                            Platform following such changes constitutes your acceptance of the modified terms.</p>
                    </div>
                </div>

                <!-- Services Section -->
                <div id="services" class="mb-12 scroll-mt-20 slide-in">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 rounded-full bg-saffron/10 flex items-center justify-center mr-4">
                            <i class="fas fa-home text-saffron"></i>
                        </div>
                        <h3 class="text-2xl font-heading font-bold text-slate">2. Services</h3>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg border-l-4 border-saffron">
                        <p class="text-gray-700 mb-4">SELLSQUARE Properties India provides a platform for users to
                            search, list, and inquire about real estate properties in India. Our services include but
                            are not limited to:</p>
                        <ul class="list-disc pl-6 mb-4 text-gray-700">
                            <li class="mb-2">Property listings for sale, purchase, and rental</li>
                            <li class="mb-2">Real estate advisory services</li>
                            <li class="mb-2">Property valuation assistance</li>
                            <li class="mb-2">Connecting buyers, sellers, tenants, and landlords</li>
                            <li class="mb-2">Real estate market insights and information</li>
                        </ul>
                        <p class="text-gray-700 mb-0">SELLSQUARE Properties India reserves the right to modify, suspend,
                            or discontinue any aspect of our services at any time without prior notice.</p>
                    </div>
                </div>

                <!-- User Obligations Section -->
                <div id="user-obligations" class="mb-12 scroll-mt-20 slide-in">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 rounded-full bg-saffron/10 flex items-center justify-center mr-4">
                            <i class="fas fa-user-shield text-saffron"></i>
                        </div>
                        <h3 class="text-2xl font-heading font-bold text-slate">3. User Obligations</h3>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg border-l-4 border-saffron">
                        <p class="text-gray-700 mb-4">By using our Platform, you agree to:</p>
                        <ul class="list-disc pl-6 mb-4 text-gray-700">
                            <li class="mb-2">Provide accurate, current, and complete information during registration and
                                when using our services</li>
                            <li class="mb-2">Maintain the confidentiality of your account credentials</li>
                            <li class="mb-2">Be responsible for all activities that occur under your account</li>
                            <li class="mb-2">Comply with all applicable laws and regulations</li>
                            <li class="mb-2">Not engage in any activity that may interfere with the proper functioning
                                of the Platform</li>
                            <li class="mb-2">Not attempt to access data not intended for you</li>
                            <li class="mb-2">Not use the Platform for any illegal or unauthorized purpose</li>
                            <li class="mb-2">Not post content that is false, misleading, or fraudulent</li>
                        </ul>
                        <p class="text-gray-700 mb-0">Violation of these obligations may result in the termination of
                            your account and access to our services without prior notice.</p>
                    </div>
                </div>

                <!-- Property Listings Section -->
                <div id="property-listings" class="mb-12 scroll-mt-20 slide-in">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 rounded-full bg-saffron/10 flex items-center justify-center mr-4">
                            <i class="fas fa-building text-saffron"></i>
                        </div>
                        <h3 class="text-2xl font-heading font-bold text-slate">4. Property Listings</h3>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg border-l-4 border-saffron">
                        <p class="text-gray-700 mb-4">For users who list properties on our Platform:</p>
                        <ul class="list-disc pl-6 mb-4 text-gray-700">
                            <li class="mb-2">You must have the legal right to list the property for sale or rent</li>
                            <li class="mb-2">All information provided must be accurate, complete, and not misleading
                            </li>
                            <li class="mb-2">Property images must be authentic and represent the actual property being
                                listed</li>
                            <li class="mb-2">You are responsible for maintaining and updating your listings</li>
                            <li class="mb-2">You agree not to post duplicate listings or spam the Platform</li>
                            <li class="mb-2">SELLSQUARE Properties India reserves the right to remove any listing that
                                violates our policies or applicable laws</li>
                        </ul>
                        <p class="text-gray-700 mb-4">SELLSQUARE Properties India does not verify all aspects of listed
                            properties. We do not guarantee the accuracy of listings, and users are advised to conduct
                            their own due diligence before engaging in any real estate transaction.</p>
                        <p class="text-gray-700 mb-0">We reserve the right to feature, promote, or highlight certain
                            listings at our discretion.</p>
                    </div>
                </div>

                <!-- Payments and Fees Section -->
                <div id="payments" class="mb-12 scroll-mt-20 slide-in">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 rounded-full bg-saffron/10 flex items-center justify-center mr-4">
                            <i class="fas fa-rupee-sign text-saffron"></i>
                        </div>
                        <h3 class="text-2xl font-heading font-bold text-slate">5. Payments and Fees</h3>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg border-l-4 border-saffron">
                        <p class="text-gray-700 mb-4">SELLSQUARE Properties India may charge fees for certain services,
                            features, or listings. All applicable fees will be clearly disclosed before you incur them.
                        </p>
                        <p class="text-gray-700 mb-4">Payment terms:</p>
                        <ul class="list-disc pl-6 mb-4 text-gray-700">
                            <li class="mb-2">All payments are to be made in Indian Rupees (INR) unless otherwise
                                specified</li>
                            <li class="mb-2">Payments are processed through secure third-party payment gateways</li>
                            <li class="mb-2">Subscription fees, if applicable, are billed in advance on a recurring
                                basis</li>
                            <li class="mb-2">Refunds, if applicable, will be processed according to our Refund Policy
                            </li>
                            <li class="mb-2">You agree to provide accurate and complete payment information</li>
                            <li class="mb-2">We reserve the right to modify our fee structure with reasonable notice
                            </li>
                        </ul>
                        <p class="text-gray-700 mb-0">Any fees paid for our services are separate from and do not
                            include transaction costs, taxes, or other expenses related to the actual real estate
                            transaction, which remain the responsibility of the transacting parties.</p>
                    </div>
                </div>

                <!-- Privacy Section -->
                <div id="privacy" class="mb-12 scroll-mt-20 slide-in">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 rounded-full bg-saffron/10 flex items-center justify-center mr-4">
                            <i class="fas fa-lock text-saffron"></i>
                        </div>
                        <h3 class="text-2xl font-heading font-bold text-slate">6. Privacy and Data Protection</h3>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg border-l-4 border-saffron">
                        <p class="text-gray-700 mb-4">Your privacy is important to us. Our collection and use of your
                            personal information is governed by our Privacy Policy, which is incorporated into these
                            Terms and Conditions by reference.</p>
                        <p class="text-gray-700 mb-4">By using our Platform, you consent to our collection, storage, and
                            processing of your personal information as described in our Privacy Policy.</p>
                        <p class="text-gray-700 mb-4">We implement reasonable security measures to protect your personal
                            information. However, no internet transmission is completely secure, and we cannot guarantee
                            the security of information transmitted through our Platform.</p>
                        <p class="text-gray-700 mb-0">We comply with all applicable data protection laws, including but
                            not limited to the Information Technology Act, 2000, and the Information Technology
                            (Reasonable Security Practices and Procedures and Sensitive Personal Data or Information)
                            Rules, 2011.</p>
                    </div>
                </div>

                <!-- Limitation of Liability Section -->
                <div id="liability" class="mb-12 scroll-mt-20 slide-in">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 rounded-full bg-saffron/10 flex items-center justify-center mr-4">
                            <i class="fas fa-exclamation-triangle text-saffron"></i>
                        </div>
                        <h3 class="text-2xl font-heading font-bold text-slate">7. Limitation of Liability</h3>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg border-l-4 border-saffron">
                        <p class="text-gray-700 mb-4">SELLSQUARE Properties India acts as an intermediary platform and
                            does not:</p>
                        <ul class="list-disc pl-6 mb-4 text-gray-700">
                            <li class="mb-2">Guarantee the accuracy, completeness, or reliability of any property
                                listing</li>
                            <li class="mb-2">Verify the legal status, ownership, or condition of listed properties</li>
                            <li class="mb-2">Act as an agent, broker, or legal representative for any party</li>
                            <li class="mb-2">Guarantee the outcome of any real estate transaction</li>
                            <li class="mb-2">Provide legal, financial, or investment advice</li>
                        </ul>
                        <p class="text-gray-700 mb-4">To the maximum extent permitted by law, SELLSQUARE Properties
                            India and its affiliates, directors, employees, and agents shall not be liable for any
                            indirect, incidental, special, consequential, or punitive damages, or any loss of profits or
                            revenues, whether incurred directly or indirectly, or any loss of data, use, goodwill, or
                            other intangible losses resulting from:</p>
                        <ul class="list-disc pl-6 mb-4 text-gray-700">
                            <li class="mb-2">Your use or inability to use our Platform</li>
                            <li class="mb-2">Any unauthorized access to or use of our servers and/or any personal
                                information stored therein</li>
                            <li class="mb-2">Any transaction or relationship between you and any third party</li>
                            <li class="mb-2">Any content obtained from the Platform</li>
                        </ul>
                        <p class="text-gray-700 mb-0">Our total liability for any claim arising out of or relating to
                            these Terms or our services shall not exceed the amount paid by you to SELLSQUARE Properties
                            India during the 12 months preceding such claim.</p>
                    </div>
                </div>

                <!-- Disputes and Governing Law Section -->
                <div id="disputes" class="mb-12 scroll-mt-20 slide-in">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 rounded-full bg-saffron/10 flex items-center justify-center mr-4">
                            <i class="fas fa-gavel text-saffron"></i>
                        </div>
                        <h3 class="text-2xl font-heading font-bold text-slate">8. Disputes and Governing Law</h3>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg border-l-4 border-saffron">
                        <p class="text-gray-700 mb-4">These Terms and Conditions shall be governed by and construed in
                            accordance with the laws of the Republic of India.</p>
                        <p class="text-gray-700 mb-4">Any dispute arising out of or in connection with these Terms,
                            including any question regarding its existence, validity, or termination, shall be referred
                            to and finally resolved by arbitration under the Arbitration and Conciliation Act, 1996.</p>
                        <p class="text-gray-700 mb-4">The arbitration shall be conducted in Mumbai, India, in the
                            English language, by a sole arbitrator appointed by SELLSQUARE Properties India.</p>
                        <p class="text-gray-700 mb-0">You agree that the courts in Mumbai, India shall have exclusive
                            jurisdiction over any matter not subject to arbitration.</p>
                    </div>
                </div>

                <!-- Termination Section -->
                <div id="termination" class="mb-12 scroll-mt-20 slide-in">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 rounded-full bg-saffron/10 flex items-center justify-center mr-4">
                            <i class="fas fa-times-circle text-saffron"></i>
                        </div>
                        <h3 class="text-2xl font-heading font-bold text-slate">9. Termination</h3>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg border-l-4 border-saffron">
                        <p class="text-gray-700 mb-4">SELLSQUARE Properties India reserves the right to:</p>
                        <ul class="list-disc pl-6 mb-4 text-gray-700">
                            <li class="mb-2">Terminate or suspend your access to the Platform immediately, without prior
                                notice or liability, for any reason, including but not limited to a breach of these
                                Terms</li>
                            <li class="mb-2">Remove or disable any content that violates these Terms or is otherwise
                                objectionable</li>
                            <li class="mb-2">Take appropriate legal action for any illegal or unauthorized use of the
                                Platform</li>
                        </ul>
                        <p class="text-gray-700 mb-0">Upon termination, your right to use the Platform will immediately
                            cease. All provisions of these Terms which by their nature should survive termination shall
                            survive, including without limitation, ownership provisions, warranty disclaimers,
                            indemnity, and limitations of liability.</p>
                    </div>
                </div>

                <!-- Contact Us Section -->
                <div id="contact" class="mb-8 scroll-mt-20 slide-in">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 rounded-full bg-saffron/10 flex items-center justify-center mr-4">
                            <i class="fas fa-envelope text-saffron"></i>
                        </div>
                        <h3 class="text-2xl font-heading font-bold text-slate">10. Contact Us</h3>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg border-l-4 border-saffron">
                        <p class="text-gray-700 mb-4">If you have any questions or concerns about these Terms and
                            Conditions, please contact us at:</p>
                        <div class="mb-4">
                            <p class="font-medium mb-1">Email:</p>
                            <p class="text-gray-700">lucknowhitechdevelopers@gmail.com</p>
                        </div>
                        <div class="mb-4">
                            <p class="font-medium mb-1">Phone:</p>
                            <p class="text-gray-700">+91 9335766586</p>
                        </div>
                        <div>
                            <p class="font-medium mb-1">Address:</p>
                            <p class="text-gray-700">DLF MY PAD , B1 Tower , 9th Floor , Vibhuti Khand , Gomti Nagar ,
                                Lucknow 226010</p>
                        </div>
                    </div>
                </div>

                <!-- Final Acknowledgement -->
                <div class="p-6 bg-navy/5 rounded-lg mb-12 slide-in">
                    <p class="text-navy font-medium text-center">By using Lucknow Hitech Developers Properties India's
                        services,
                        you
                        acknowledge that you have read, understood, and agree to be bound by these Terms and Conditions.
                    </p>
                </div>

            </div>

            <!-- Back to Top & Other Actions -->
            <div class="flex flex-col md:flex-row justify-center items-center gap-4 mt-12">
                <a href="/contact"
                    class="px-6 py-3 bg-navy hover:bg-navy-light text-white rounded-md transition-colors duration-300 flex items-center">
                    <i class="fas fa-question-circle mr-2"></i> Have Questions?
                </a>
                <a href="#"
                    class="px-6 py-3 bg-saffron hover:bg-saffron-dark text-white rounded-md transition-colors duration-300 flex items-center btn-hover-slide">
                    <i class="fas fa-arrow-up mr-2"></i> Back to Top
                </a>
                <a href="{{route('landing_privacypolicy')}}"
                    class="px-6 py-3 bg-emerald hover:bg-emerald/80 text-white rounded-md transition-colors duration-300 flex items-center">
                    <i class="fas fa-shield-alt mr-2"></i> Privacy Policy
                </a>
            </div>
        </div>
    </section>

    <!-- FAQ Section About Terms -->
    <section class="py-16 bg-gray-50">
        <div class="w-11/12 max-w-screen-lg mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-heading font-bold text-slate">Frequently Asked <span
                        class="text-saffron">Questions</span></h2>
                <div class="animated-line mx-auto"></div>
                <p class="text-gray-600 max-w-2xl mx-auto mt-4">Common questions about our terms and conditions</p>
            </div>

            <div class="space-y-4">
                <!-- FAQ Items -->
                <div class="accordion-item bg-white rounded-lg shadow-sm overflow-hidden slide-in">
                    <div class="accordion-header flex justify-between items-center p-5 cursor-pointer">
                        <h4 class="font-medium text-lg">Do I need to create an account to browse properties?</h4>
                        <i class="fas fa-chevron-down accordion-icon text-saffron"></i>
                    </div>
                    <div class="accordion-content p-5 bg-gray-50 border-t border-gray-100">
                        <p class="text-gray-700">No, you can browse available properties without creating an account.
                            However, creating an account provides additional benefits such as saving favorite
                            properties, receiving alerts for new listings that match your criteria, and accessing
                            premium features.</p>
                    </div>
                </div>

                <div class="accordion-item bg-white rounded-lg shadow-sm overflow-hidden slide-in">
                    <div class="accordion-header flex justify-between items-center p-5 cursor-pointer">
                        <h4 class="font-medium text-lg">How accurate are the property details on your website?</h4>
                        <i class="fas fa-chevron-down accordion-icon text-saffron"></i>
                    </div>
                    <div class="accordion-content p-5 bg-gray-50 border-t border-gray-100">
                        <p class="text-gray-700">We strive to ensure all property listings are accurate and up-to-date.
                            However, as stated in our Terms and Conditions, SELLSQUARE Properties India does not
                            independently verify all aspects of listed properties. We rely on information provided by
                            property owners, agents, and developers. We recommend conducting your own due diligence
                            before making any real estate decisions.</p>
                    </div>
                </div>

                <div class="accordion-item bg-white rounded-lg shadow-sm overflow-hidden slide-in">
                    <div class="accordion-header flex justify-between items-center p-5 cursor-pointer">
                        <h4 class="font-medium text-lg">What happens if I find incorrect information in a property
                            listing?</h4>
                        <i class="fas fa-chevron-down accordion-icon text-saffron"></i>
                    </div>
                    <div class="accordion-content p-5 bg-gray-50 border-t border-gray-100">
                        <p class="text-gray-700">If you discover any incorrect information in a property listing, please
                            report it to us immediately. You can use the "Report Listing" feature on the property page
                            or contact our customer support team. We take such reports seriously and will investigate
                            promptly to ensure our platform maintains high standards of accuracy and transparency.</p>
                    </div>
                </div>

                <div class="accordion-item bg-white rounded-lg shadow-sm overflow-hidden slide-in">
                    <div class="accordion-header flex justify-between items-center p-5 cursor-pointer">
                        <h4 class="font-medium text-lg">Can I cancel my subscription and get a refund?</h4>
                        <i class="fas fa-chevron-down accordion-icon text-saffron"></i>
                    </div>
                    <div class="accordion-content p-5 bg-gray-50 border-t border-gray-100">
                        <p class="text-gray-700">Yes, you can cancel your subscription at any time through your account
                            settings. Refund eligibility depends on your subscription plan and when you cancel. Please
                            refer to our Refund Policy for specific details. Generally, we offer prorated refunds for
                            annual subscriptions canceled within 30 days of purchase. Monthly subscriptions can be
                            canceled but are typically not eligible for refunds for the current billing period.</p>
                    </div>
                </div>

                <div class="accordion-item bg-white rounded-lg shadow-sm overflow-hidden slide-in">
                    <div class="accordion-header flex justify-between items-center p-5 cursor-pointer">
                        <h4 class="font-medium text-lg">Is SELLSQUARE Properties India responsible for transactions
                            between buyers and sellers?</h4>
                        <i class="fas fa-chevron-down accordion-icon text-saffron"></i>
                    </div>
                    <div class="accordion-content p-5 bg-gray-50 border-t border-gray-100">
                        <p class="text-gray-700">No, SELLSQUARE Properties India is a platform that connects buyers,
                            sellers, tenants, and landlords. We are not a party to any transaction between users. We do
                            not guarantee property conditions, legal status, or transaction outcomes. All users are
                            advised to perform appropriate due diligence, engage qualified professionals like lawyers
                            and inspectors, and follow proper legal procedures when conducting real estate transactions.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-navy relative overflow-hidden mb-10">
        <div class="absolute top-0 right-0 w-64 h-64 bg-saffron/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-saffron/5 rounded-full translate-y-1/2 -translate-x-1/3">
        </div>

        <div class="w-11/12 max-w-screen-lg mx-auto relative z-10">
            <div class="text-center">
                <h2 class="text-3xl md:text-4xl font-heading font-bold text-white">Ready to Find Your <span
                        class="text-saffron">Dream Property</span>?</h2>
                <p class="text-white/80 max-w-xl mx-auto mt-4 mb-8">Start your property journey with SELLSQUARE
                    Properties India today</p>

                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="#"
                        class="px-6 py-3 bg-saffron hover:bg-saffron-dark text-white rounded-md transition-colors duration-300 flex items-center justify-center btn-hover-slide">
                        <i class="fas fa-search mr-2"></i> Browse Properties
                    </a>
                    <a href="{{route('landing_contact')}}"
                        class="px-6 py-3 bg-white hover:bg-gray-100 text-navy rounded-md transition-colors duration-300 flex items-center justify-center">
                        <i class="fas fa-envelope mr-2"></i> Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Back to Top Button -->
    <button id="back-to-top-btn"
        class="back-to-top fixed bottom-6 right-6 w-12 h-12 rounded-full bg-saffron text-white flex items-center justify-center shadow-lg z-50">
        <i class="fas fa-arrow-up"></i>
    </button>
</body>
@endsection


@push('script')
<!-- Script for interactions -->
<script>
    // Show/hide navigation background on scroll
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        const backToTopBtn = document.getElementById('back-to-top-btn');

        // Show/hide back to top button
        if (window.scrollY > 300) {
            backToTopBtn.classList.add('visible');
        } else {
            backToTopBtn.classList.remove('visible');
        }

        // Add background to navbar when scrolled
        if (navbar && window.scrollY > 50) {
            navbar.classList.add('bg-slate');
            navbar.classList.add('shadow-lg');
        } else if (navbar) {
            navbar.classList.remove('bg-slate');
            navbar.classList.remove('shadow-lg');
        }
    });

    // Back to top button functionality
    document.getElementById('back-to-top-btn').addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
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

        // Accordion functionality
        const accordionHeaders = document.querySelectorAll('.accordion-header');
        accordionHeaders.forEach(header => {
            header.addEventListener('click', function() {
                const accordionItem = this.parentElement;
                accordionItem.classList.toggle('active');
            });
        });
    });
</script>
@endpush