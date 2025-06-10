@extends('layouts/users/app')


@section('content')

<h1>heloo</h1>
<div class="bg-gray-50 font-sans">
    <!-- Navigation Breadcrumb -->
    <div class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 py-3">
            <nav class="text-sm text-gray-600">
                <span>Home</span> >
                <span>Property for Sale in Lucknow</span> >
                <span>Flats for Sale in Lucknow</span> >
                <span>Flats for Sale in Charbagh</span> >
                <span class="text-navy font-medium">3 BHK Flats for Sale in Charbagh</span>
            </nav>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Property Header -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h1 class="text-3xl font-heading font-bold text-navy mb-2">₹1.52 Cr</h1>
                            <p class="text-gray-600 text-lg">EMI: ₹3.69k | <span class="text-saffron hover:text-saffron-dark cursor-pointer underline">Get Loan offers from 34+ banks</span></p>
                        </div>
                        <div class="text-right text-sm text-gray-500">
                            <p>Posted on: Jun 03, 25</p>
                            <p>Property ID: 75701587</p>
                        </div>
                    </div>
                    <h2 class="text-xl font-semibold text-slate mb-4">3 BHK Flat For Sale in Shalimar Dwelling, Charbagh, Lucknow</h2>

                    <!-- Property Features -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-saffron-light rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium">3 Beds</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-emerald rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM15 7a1 1 0 112 0v7.268a2 2 0 010 3.464V19a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V7z" />
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium">3 Baths</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-navy-light rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium">5 Balconies</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-saffron rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium">Semi-Furnished</span>
                        </div>
                    </div>
                </div>

                <!-- Property Images -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h3 class="text-xl font-heading font-semibold text-navy mb-4">Property Images</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Main Image -->
                        <div class="md:col-span-2">
                            <div class="relative rounded-lg overflow-hidden h-64 md:h-80 bg-gray-200">
                                <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Property exterior" class="w-full h-full object-cover">
                                <div class="absolute bottom-4 right-4 bg-navy bg-opacity-80 text-white px-3 py-1 rounded-lg text-sm font-medium">
                                    +8 Photos
                                </div>
                            </div>
                        </div>
                        <!-- Thumbnail Images -->
                        <div class="rounded-lg overflow-hidden h-32 bg-gray-200">
                            <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Interior view" class="w-full h-full object-cover">
                        </div>
                        <div class="rounded-lg overflow-hidden h-32 bg-gray-200">
                            <img src="https://images.unsplash.com/photo-1567767292278-a4f21aa2d36e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Kitchen view" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>

                <!-- First Details Section -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h3 class="text-xl font-heading font-semibold text-navy mb-6">Property Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Property Type</span>
                                <span class="text-slate font-semibold">Apartment</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Plot Area</span>
                                <span class="text-slate font-semibold">1450 sqft</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Possession Status</span>
                                <span class="text-emerald font-semibold">Ready to Move</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Furnished Status</span>
                                <span class="text-slate font-semibold">Semi-Furnished</span>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Want to</span>
                                <span class="text-saffron font-semibold">Sell</span>
                            </div>
                            <div class="py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Address</span>
                                <div class="text-slate font-semibold mt-1">A. P. Sen Road, Charbagh, Lucknow 226001, Charbagh, Lucknow, Uttar Pradesh</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Second Details Section -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h3 class="text-xl font-heading font-semibold text-navy mb-6">Additional Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">No of Open Sides</span>
                                <span class="text-slate font-semibold">2 Sides</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Super Area</span>
                                <span class="text-slate font-semibold">1450 sqft</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Total Rooms</span>
                                <span class="text-slate font-semibold">6 Rooms</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Total Floors</span>
                                <span class="text-slate font-semibold">7 Floors</span>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Floor</span>
                                <span class="text-slate font-semibold">5 (Out of 7 Floors)</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Leased Out</span>
                                <span class="text-red-600 font-semibold">No</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Road Facing</span>
                                <span class="text-emerald font-semibold">North - East</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Property Description -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-heading font-semibold text-navy mb-4">Description</h3>
                    <p class="text-gray-700 leading-relaxed">
                        Relish the finest blend of comfort and elegance in this stunning 3 BHK flat available for sale in the vibrant locality of Charbagh, Lucknow. The building is located in a lively neighborhood that offers easy access to essential amenities and transportation hubs.
                    </p>
                    <button class="text-saffron hover:text-saffron-dark font-medium mt-2 underline">Read more</button>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Contact Owner -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6 sticky top-6">
                    <h3 class="text-xl font-heading font-semibold text-navy mb-4">Contact Owner</h3>
                    <div class="mb-4">
                        <h4 class="font-semibold text-slate">Vaibhav</h4>
                        <p class="text-gray-600">+91-98XXXXXXX</p>
                    </div>
                    <button class="w-full bg-saffron hover:bg-saffron-dark text-white font-semibold py-3 px-4 rounded-lg transition duration-200 mb-3">
                        Check Availability
                    </button>
                    <div class="text-center mb-4">
                        <p class="text-emerald font-medium bg-emerald bg-opacity-10 px-3 py-1 rounded-full inline-block text-sm">
                            You have already contacted this property
                        </p>
                    </div>
                    <div class="flex space-x-2">
                        <button class="flex-1 bg-navy hover:bg-navy-light text-white font-medium py-2 px-4 rounded-lg transition duration-200">
                            Share Property
                        </button>
                        <button class="flex-1 border-2 border-saffron text-saffron hover:bg-saffron hover:text-white font-medium py-2 px-4 rounded-lg transition duration-200">
                            Share Feedback
                        </button>
                    </div>
                    <button class="w-full mt-4 flex items-center justify-center space-x-2 text-navy hover:text-navy-light font-medium py-2 border border-gray-300 rounded-lg transition duration-200">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 17a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1v-2zM3 7a1 1 0 011-1h12a1 1 0 011 1v8a1 1 0 01-1 1H4a1 1 0 01-1-1V7zM5 9a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zM5 13a1 1 0 011-1h4a1 1 0 110 2H6a1 1 0 01-1-1z" />
                        </svg>
                        <span>Download Brochure</span>
                    </button>
                </div>

                <!-- More Details -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-heading font-semibold text-navy mb-4">Quick Details</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Price</span>
                            <span class="font-semibold text-slate">₹1.52 Cr</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Landmarks</span>
                            <span class="font-semibold text-slate text-right">Close to Charbagh Railway Station</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Flooring</span>
                            <span class="font-semibold text-slate">Marble</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Loan Offered</span>
                            <span class="font-semibold text-emerald">₹68554 EMI</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Ownership</span>
                            <span class="font-semibold text-slate">Freehold</span>
                        </div>
                    </div>
                    <button class="text-saffron hover:text-saffron-dark font-medium mt-4 underline">View all details</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection