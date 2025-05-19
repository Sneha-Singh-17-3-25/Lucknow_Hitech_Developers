<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - SELL SQUARE Properties India</title>
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

        .policy-section {
            border-left: 4px solid #FF9933;
        }

        .policy-section:hover {
            background-color: rgba(255, 153, 51, 0.05);
        }
    </style>
</head>

<body class="font-sans text-slate bg-gray-50">
    <!-- Navigation Bar Placeholder -->
    @include('landing_page/include/navbar')
    <!-- Privacy Policy Hero Section -->
    <section class="relative flex justify-center items-center text-center h-[40vh] overflow-hidden">
        <!-- Background with Overlay -->
        <div class="absolute top-0 left-0 w-full h-full">
            <video autoplay muted loop playsinline class="object-cover w-full h-full">
                <source src="{{asset('videos/privacypolicy.mp4')}}" type="video/mp4">
                <!-- Fallback image in case video doesn't load -->
                <img src="/api/placeholder/1920/600" alt="Real Estate Excellence" class="object-cover w-full h-full">
            </video>
            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-black/70 via-black/50 to-black/60">
            </div>
        </div>

        <div class="w-11/12 max-w-screen-lg z-10">
            <h1 class="text-4xl md:text-6xl leading-tight font-heading font-bold text-white text-shadow">Privacy <span
                    class="text-saffron">Policy</span></h1>
            <p class="text-white/80 max-w-2xl mx-auto mt-4">We are committed to protecting your personal information and
                your right to privacy</p>
            <div class="mt-8 flex justify-center">
                <div class="h-1 w-24 bg-saffron"></div>
            </div>
        </div>
    </section>

    <!-- Privacy Policy Content -->
    <section id="privacy-policy" class="py-20">
        <div class="max-w-screen-xl mx-auto px-4">
            <!-- Introduction -->
            <div class="mb-16 text-center">
                <p class="text-saffron uppercase tracking-widest font-medium mb-2">Last Updated: May 16, 2025</p>
                <h2 class="text-2xl md:text-3xl font-heading font-bold mb-6 text-slate">Protecting Your Information</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">At SELL SQUARE Properties India, we take your privacy
                    seriously. This Privacy Policy explains how we collect, use, disclose, and safeguard your
                    information when you visit our website or use our real estate services.</p>
            </div>

            <!-- Policy Sections -->
            <div class="space-y-12">
                <!-- Information Collection -->
                <div id="information-collection"
                    class="bg-white rounded-lg shadow-md p-8 slide-in policy-section pl-10">
                    <div class="flex items-center mb-6">
                        <div
                            class="h-12 w-12 rounded-full bg-saffron/10 flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-database text-saffron text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-heading font-bold text-navy">Information We Collect</h3>
                    </div>

                    <p class="text-gray-600 mb-6">We collect personal information that you voluntarily provide to us
                        when you:</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="flex items-start">
                            <div
                                class="h-8 w-8 rounded-full bg-saffron/10 flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-user text-saffron text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-2 text-slate">Personal Information</h4>
                                <p class="text-gray-600 text-sm">Name, email address, phone number, postal address, and
                                    other contact information.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div
                                class="h-8 w-8 rounded-full bg-saffron/10 flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-home text-saffron text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-2 text-slate">Property Preferences</h4>
                                <p class="text-gray-600 text-sm">Location preferences, property types, budget range, and
                                    other property criteria.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div
                                class="h-8 w-8 rounded-full bg-saffron/10 flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-file-contract text-saffron text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-2 text-slate">Financial Information</h4>
                                <p class="text-gray-600 text-sm">When necessary for transactions, property evaluations,
                                    or loan assessments.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div
                                class="h-8 w-8 rounded-full bg-saffron/10 flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-id-card text-saffron text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-2 text-slate">Identity Verification</h4>
                                <p class="text-gray-600 text-sm">Information required for KYC (Know Your Customer)
                                    compliance.</p>
                            </div>
                        </div>
                    </div>

                    <p class="text-gray-600 mb-4">We also automatically collect certain information when you visit our
                        website, including:</p>
                    <ul class="list-disc list-inside text-gray-600 space-y-2 mb-6 pl-4">
                        <li>Device and usage information (browser type, IP address, device type)</li>
                        <li>Log and usage data (pages visited, time spent on pages)</li>
                        <li>Location data (with your permission)</li>
                        <li>Cookies and similar tracking technologies</li>
                    </ul>
                </div>

                <!-- Use of Information -->
                <div id="information-use" class="bg-white rounded-lg shadow-md p-8 slide-in policy-section pl-10">
                    <div class="flex items-center mb-6">
                        <div
                            class="h-12 w-12 rounded-full bg-saffron/10 flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-tasks text-saffron text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-heading font-bold text-navy">Use of Your Information</h3>
                    </div>

                    <p class="text-gray-600 mb-6">We use the information we collect for various real estate-related
                        purposes, including to:</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="flex items-start">
                            <div
                                class="h-8 w-8 rounded-full bg-saffron/10 flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-search-location text-saffron text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-2 text-slate">Property Matching</h4>
                                <p class="text-gray-600 text-sm">Connect you with properties that match your criteria
                                    and preferences.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div
                                class="h-8 w-8 rounded-full bg-saffron/10 flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-clipboard-list text-saffron text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-2 text-slate">Transaction Processing</h4>
                                <p class="text-gray-600 text-sm">Facilitate property transactions, including sales,
                                    purchases, and rentals.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div
                                class="h-8 w-8 rounded-full bg-saffron/10 flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-bell text-saffron text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-2 text-slate">Alerts & Notifications</h4>
                                <p class="text-gray-600 text-sm">Send you alerts about new properties, price changes,
                                    and other updates.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div
                                class="h-8 w-8 rounded-full bg-saffron/10 flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-bullhorn text-saffron text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-2 text-slate">Marketing Communications</h4>
                                <p class="text-gray-600 text-sm">Share relevant promotional offers, market insights, and
                                    newsletters (with your consent).</p>
                            </div>
                        </div>
                    </div>

                    <p class="text-gray-600">We may also use your information to improve our services, maintain legal
                        compliance, respond to inquiries, prevent fraud, and ensure the security of our platform and
                        users.</p>
                </div>

                <!-- Information Disclosure -->
                <div id="information-disclosure"
                    class="bg-white rounded-lg shadow-md p-8 slide-in policy-section pl-10">
                    <div class="flex items-center mb-6">
                        <div
                            class="h-12 w-12 rounded-full bg-saffron/10 flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-share-alt text-saffron text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-heading font-bold text-navy">Disclosure of Your Information</h3>
                    </div>

                    <p class="text-gray-600 mb-6">We may share your information with the following categories of third
                        parties:</p>

                    <ul class="space-y-4 mb-6">
                        <li class="flex items-start">
                            <div
                                class="h-8 w-8 rounded-full bg-saffron/10 flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-handshake text-saffron text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-1 text-slate">Business Partners</h4>
                                <p class="text-gray-600 text-sm">Property developers, financial institutions, and other
                                    real estate professionals involved in your transaction.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div
                                class="h-8 w-8 rounded-full bg-saffron/10 flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-server text-saffron text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-1 text-slate">Service Providers</h4>
                                <p class="text-gray-600 text-sm">Companies that assist us in providing our services,
                                    such as payment processors, marketing agencies, and technology providers.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div
                                class="h-8 w-8 rounded-full bg-saffron/10 flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-balance-scale text-saffron text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-1 text-slate">Legal Compliance</h4>
                                <p class="text-gray-600 text-sm">Regulatory authorities, law enforcement agencies, and
                                    other parties as required by law or to protect our rights.</p>
                            </div>
                        </li>
                    </ul>

                    <p class="text-gray-600">We require all third parties to respect the security of your personal
                        information and to treat it in accordance with applicable laws. We do not allow our third-party
                        service providers to use your personal data for their own purposes.</p>
                </div>

                <!-- Cookies and Tracking -->
                <div id="cookies" class="bg-white rounded-lg shadow-md p-8 slide-in policy-section pl-10">
                    <div class="flex items-center mb-6">
                        <div
                            class="h-12 w-12 rounded-full bg-saffron/10 flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-cookie-bite text-saffron text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-heading font-bold text-navy">Cookies and Tracking Technologies</h3>
                    </div>

                    <p class="text-gray-600 mb-6">We use cookies and similar tracking technologies to track activity on
                        our website and store certain information. These technologies help us:</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div class="bg-gray-50 p-4 rounded">
                            <h4 class="font-bold mb-2 text-slate flex items-center">
                                <i class="fas fa-thumbtack text-saffron mr-2"></i>
                                Remember your preferences
                            </h4>
                            <p class="text-gray-600 text-sm">Such as saved property searches and login information</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded">
                            <h4 class="font-bold mb-2 text-slate flex items-center">
                                <i class="fas fa-chart-line text-saffron mr-2"></i>
                                Analyze website traffic
                            </h4>
                            <p class="text-gray-600 text-sm">To improve user experience and website performance</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded">
                            <h4 class="font-bold mb-2 text-slate flex items-center">
                                <i class="fas fa-bullseye text-saffron mr-2"></i>
                                Deliver targeted advertising
                            </h4>
                            <p class="text-gray-600 text-sm">Based on your browsing habits and preferences</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded">
                            <h4 class="font-bold mb-2 text-slate flex items-center">
                                <i class="fas fa-shield-alt text-saffron mr-2"></i>
                                Enhance website security
                            </h4>
                            <p class="text-gray-600 text-sm">Protecting against unauthorized access and fraud</p>
                        </div>
                    </div>

                    <p class="text-gray-600 mb-4">You can instruct your browser to refuse all cookies or to indicate
                        when a cookie is being sent. However, if you do not accept cookies, you may not be able to use
                        some portions of our website.</p>
                </div>

                <!-- Third-Party Websites -->
                <div id="third-party" class="bg-white rounded-lg shadow-md p-8 slide-in policy-section pl-10">
                    <div class="flex items-center mb-6">
                        <div
                            class="h-12 w-12 rounded-full bg-saffron/10 flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-external-link-alt text-saffron text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-heading font-bold text-navy">Third-Party Websites</h3>
                    </div>

                    <p class="text-gray-600 mb-6">Our website may contain links to third-party websites, including:</p>

                    <ul class="list-disc list-inside text-gray-600 space-y-2 mb-6 pl-4">
                        <li>Financial institutions for mortgage pre-approval</li>
                        <li>Property valuation services</li>
                        <li>Home inspection companies</li>
                        <li>Legal services for property transactions</li>
                        <li>Insurance providers</li>
                        <li>Government portals for property registration</li>
                    </ul>

                    <div class="bg-gray-50 p-6 rounded-lg border-l-4 border-saffron">
                        <p class="text-gray-600 mb-0">These third-party sites have separate and independent privacy
                            policies. We have no responsibility or liability for the content and activities of these
                            linked sites. Nonetheless, we seek to protect the integrity of our site and welcome any
                            feedback about these sites.</p>
                    </div>
                </div>

                <!-- Data Security -->
                <div id="data-security" class="bg-white rounded-lg shadow-md p-8 slide-in policy-section pl-10">
                    <div class="flex items-center mb-6">
                        <div
                            class="h-12 w-12 rounded-full bg-saffron/10 flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-lock text-saffron text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-heading font-bold text-navy">Data Security</h3>
                    </div>

                    <p class="text-gray-600 mb-6">We have implemented appropriate technical and organizational security
                        measures designed to protect the security of any personal information we process, including:</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div class="bg-navy/5 p-4 rounded flex items-start">
                            <i class="fas fa-shield-alt text-saffron mr-3 mt-1"></i>
                            <p class="text-gray-600 text-sm">Encryption of sensitive data during transmission and
                                storage</p>
                        </div>
                        <div class="bg-navy/5 p-4 rounded flex items-start">
                            <i class="fas fa-user-lock text-saffron mr-3 mt-1"></i>
                            <p class="text-gray-600 text-sm">Access controls to limit data access to authorized
                                personnel only</p>
                        </div>
                        <div class="bg-navy/5 p-4 rounded flex items-start">
                            <i class="fas fa-fingerprint text-saffron mr-3 mt-1"></i>
                            <p class="text-gray-600 text-sm">Multi-factor authentication for accessing sensitive systems
                            </p>
                        </div>
                        <div class="bg-navy/5 p-4 rounded flex items-start">
                            <i class="fas fa-shield-virus text-saffron mr-3 mt-1"></i>
                            <p class="text-gray-600 text-sm">Regular security audits and vulnerability assessments</p>
                        </div>
                    </div>

                    <p class="text-gray-600">However, please be aware that no method of transmission over the Internet
                        or method of electronic storage is 100% secure. While we strive to use commercially acceptable
                        means to protect your personal information, we cannot guarantee its absolute security.</p>
                </div>

                <!-- Data Retention -->
                <div id="data-retention" class="bg-white rounded-lg shadow-md p-8 slide-in policy-section pl-10">
                    <div class="flex items-center mb-6">
                        <div
                            class="h-12 w-12 rounded-full bg-saffron/10 flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-clock text-saffron text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-heading font-bold text-navy">Data Retention</h3>
                    </div>

                    <p class="text-gray-600 mb-6">We will retain your personal information only for as long as is
                        necessary for the purposes set out in this Privacy Policy. We will also retain and use your
                        information to the extent necessary:</p>

                    <ul class="list-disc list-inside text-gray-600 space-y-2 mb-6 pl-4">
                        <li>To comply with our legal obligations (such as data retention requirements under real estate
                            regulations)</li>
                        <li>To resolve disputes and enforce our legal agreements and policies</li>
                        <li>For legitimate business purposes, such as maintaining records of transactions</li>
                    </ul>

                    <div class="bg-saffron/5 p-6 rounded-lg border border-saffron/20">
                        <h4 class="font-bold mb-2 text-slate">Real Estate Transaction Records</h4>
                        <p class="text-gray-600 mb-0">For completed real estate transactions, we typically retain
                            records for a minimum of 8 years, as required by various real estate regulatory authorities
                            in India, including RERA compliance requirements.</p>
                    </div>
                </div>

                <!-- Children's Privacy -->
                <div id="children-privacy" class="bg-white rounded-lg shadow-md p-8 slide-in policy-section pl-10">
                    <div class="flex items-center mb-6">
                        <div
                            class="h-12 w-12 rounded-full bg-saffron/10 flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-child text-saffron text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-heading font-bold text-navy">Children's Privacy</h3>
                    </div>

                    <p class="text-gray-600 mb-6">Our services are not intended for individuals under the age of 18. We
                        do not knowingly collect personal information from children under 18. If you are a parent or
                        guardian and believe that your child has provided us with personal information, please contact
                        us, and we will take steps to delete such information from our systems.</p>
                </div>

                <!-- Your Privacy Rights -->
                <div id="your-rights" class="bg-white rounded-lg shadow-md p-8 slide-in policy-section pl-10">
                    <div class="flex items-center mb-6">
                        <div
                            class="h-12 w-12 rounded-full bg-saffron/10 flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-user-shield text-saffron text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-heading font-bold text-navy">Your Privacy Rights</h3>
                    </div>

                    <p class="text-gray-600 mb-6">As per Indian data protection laws and regulations, you have certain
                        rights regarding your personal information, including the right to:</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="flex items-start">
                            <div
                                class="h-8 w-8 rounded-full bg-saffron/10 flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-eye text-saffron text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-2 text-slate">Access</h4>
                                <p class="text-gray-600 text-sm">Request information about how your personal data is
                                    being processed and obtain a copy of that data.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div
                                class="h-8 w-8 rounded-full bg-saffron/10 flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-edit text-saffron text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-2 text-slate">Rectification</h4>
                                <p class="text-gray-600 text-sm">Request correction of any inaccurate personal data we
                                    hold about you.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div
                                class="h-8 w-8 rounded-full bg-saffron/10 flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-trash-alt text-saffron text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-2 text-slate">Erasure</h4>
                                <p class="text-gray-600 text-sm">Request deletion of your personal data when it's no
                                    longer needed for the purposes for which it was collected.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div
                                class="h-8 w-8 rounded-full bg-saffron/10 flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-ban text-saffron text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-2 text-slate">Restrict Processing</h4>
                                <p class="text-gray-600 text-sm">Request restriction of processing of your personal data
                                    under certain circumstances.</p>
                            </div>
                        </div>
                    </div>

                    <p class="text-gray-600 mb-4">To exercise any of these rights, please contact us using the
                        information provided in the "Contact Us" section. We will respond to your request within 30
                        days.</p>

                    <div class="bg-navy/5 p-6 rounded-lg">
                        <h4 class="font-bold mb-2 text-navy flex items-center">
                            <i class="fas fa-gavel text-saffron mr-2"></i>
                            Indian Legal Framework
                        </h4>
                        <p class="text-gray-600 mb-0">Our privacy practices comply with applicable Indian laws including
                            the Information Technology Act, 2000 (IT Act), the Information Technology (Reasonable
                            Security Practices and Procedures and Sensitive Personal Data or Information) Rules, 2011,
                            and the proposed Personal Data Protection Bill.</p>
                    </div>
                </div>

                <!-- Updates to Policy -->
                <div id="updates" class="bg-white rounded-lg shadow-md p-8 slide-in policy-section pl-10">
                    <div class="flex items-center mb-6">
                        <div
                            class="h-12 w-12 rounded-full bg-saffron/10 flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-sync-alt text-saffron text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-heading font-bold text-navy">Updates to This Privacy Policy</h3>
                    </div>

                    <p class="text-gray-600 mb-6">We may update our Privacy Policy from time to time to reflect changes
                        in our practices or for other operational, legal, or regulatory reasons. The updated version
                        will be indicated by an updated "Last Updated" date at the top of this Privacy Policy.</p>

                    <p class="text-gray-600 mb-6">If we make material changes to this Privacy Policy, we will notify you
                        either through the email address you have provided us or by placing a prominent notice on our
                        website.</p>

                    <div class="bg-saffron/10 p-6 rounded-lg border-l-4 border-saffron">
                        <p class="text-gray-700 font-medium mb-0">We encourage you to review this Privacy Policy
                            periodically to stay informed about how we are protecting your information.</p>
                    </div>
                </div>

                <!-- Contact Us -->
                <div id="contact" class="bg-white rounded-lg shadow-md p-8 slide-in policy-section pl-10">
                    <div class="flex items-center mb-6">
                        <div
                            class="h-12 w-12 rounded-full bg-saffron/10 flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-envelope text-saffron text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-heading font-bold text-navy">Contact Us</h3>
                    </div>

                    <p class="text-gray-600 mb-6">If you have any questions or concerns about this Privacy Policy or our
                        data practices, please contact us at:</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                        <div class="bg-gradient-to-br from-navy/5 to-saffron/5 p-6 rounded-lg">
                            <h4 class="font-bold mb-3 text-navy">Data Protection Officer</h4>
                            <ul class="space-y-3">
                                <li class="flex items-center">
                                    <i class="fas fa-envelope text-saffron mr-3"></i>
                                    <span class="text-gray-600">lucknowhitechdevelopers@gmail.com</span>
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-phone text-saffron mr-3"></i>
                                    <span class="text-gray-600">+91 9335766586</span>
                                </li>
                            </ul>
                        </div>
                        <div class="bg-gradient-to-br from-navy/5 to-saffron/5 p-6 rounded-lg">
                            <h4 class="font-bold mb-3 text-navy">Corporate Office</h4>
                            <address class="flex items-start not-italic">
                                <i class="fas fa-map-marker-alt text-saffron mr-3 mt-1"></i>
                                <span class="text-gray-600">DLF MY PAD , B1 Tower ,<br>9th Floor , Vibhuti Khand
                                    ,<br>Gomti Nagar ,<br>Lucknow 226010</span>
                            </address>
                        </div>
                    </div>

                    <div class="flex justify-center mb-8">
                        <a href="#"
                            class="group relative overflow-hidden px-8 py-4 inline-block bg-transparent border-2 border-saffron text-saffron font-bold rounded-md hover:text-white transition-all duration-300">
                            <span class="relative z-10">Submit Privacy Request</span>
                            <span
                                class="absolute inset-0 bg-saffron transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300"></span>
                        </a>
                    </div>

                    <p class="text-gray-500 text-sm text-center">By using our services, you acknowledge that you have
                        read and understood this Privacy Policy.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust Badges Section -->
    <section class="bg-navy py-12 mb-10">
        <div class="max-w-screen-xl mx-auto px-4 ">
            <h2 class="text-2xl font-heading font-bold mb-10 text-white text-center">Your Data Is Safe With Us</h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div class="bg-white/10 backdrop-blur-sm p-6 rounded-lg">
                    <div class="h-16 w-16 mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-shield-alt text-saffron text-4xl"></i>
                    </div>
                    <h3 class="text-white font-bold mb-2">SSL Secured</h3>
                    <p class="text-white/70 text-sm">256-bit encryption</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm p-6 rounded-lg">
                    <div class="h-16 w-16 mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-certificate text-saffron text-4xl"></i>
                    </div>
                    <h3 class="text-white font-bold mb-2">RERA Compliant</h3>
                    <p class="text-white/70 text-sm">Following all regulations</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm p-6 rounded-lg">
                    <div class="h-16 w-16 mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-user-secret text-saffron text-4xl"></i>
                    </div>
                    <h3 class="text-white font-bold mb-2">Privacy First</h3>
                    <p class="text-white/70 text-sm">No data sharing</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm p-6 rounded-lg">
                    <div class="h-16 w-16 mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-lock text-saffron text-4xl"></i>
                    </div>
                    <h3 class="text-white font-bold mb-2">Secure Payments</h3>
                    <p class="text-white/70 text-sm">PCI DSS compliant</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Placeholder -->
    @include('landing_page.include.footer')


    <!-- Back to Top Button -->
    <button id="backToTop"
        class="fixed bottom-6 right-6 z-50 h-12 w-12 bg-saffron hover:bg-saffron-dark text-white rounded-full shadow-lg flex items-center justify-center transition-all duration-300 opacity-0 invisible">
        <i class="fas fa-arrow-up"></i>
    </button>

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

                // Show/hide back to top button
                const backToTop = document.getElementById('backToTop');
                if (window.scrollY > 300) {
                    backToTop.classList.remove('opacity-0', 'invisible');
                } else {
                    backToTop.classList.add('opacity-0', 'invisible');
                }
            });

            // Back to top functionality
            document.getElementById('backToTop').addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();

                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;

                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>