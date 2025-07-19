@extends('layouts.users.app')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
@endpush

@section('content')

<body class="bg-gray-50 font-sans">
    <!-- main header -->
    <section class="relative flex justify-center items-center text-center h-[50vh] overflow-hidden">
        <!-- Video Background with Overlay -->
        <div class="absolute top-0 left-0 w-full h-full">
            <video autoplay muted loop playsinline class="object-cover w-full h-full">
                <source src="{{ asset('videos/myproperty_video.mp4') }}" type="video/mp4">
                <!-- Fallback image in case video doesn't load -->
                <img src="/api/placeholder/1920/600" alt="My Property" class="object-cover w-full h-full">
            </video>
            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-black/70 via-black/50 to-black/60"></div>
        </div>

        <div class="w-11/12 max-w-screen-lg z-10">
            <h1 class="text-4xl md:text-6xl leading-tight font-heading font-bold text-white text-shadow">
                My <span class="text-saffron">Property</span>
            </h1>
            <p class="text-white/80 max-w-xl mx-auto mt-4">
                Manage and showcase your real estate properties with ease and confidence.
            </p>
            <div class="mt-8 flex justify-center space-x-4">
                <a href="#property-list"
                    class="px-6 py-3 bg-saffron hover:bg-saffron-dark text-white rounded-md transition-colors duration-300 flex items-center">
                    <i class="fas fa-list mr-2"></i> View Properties
                </a>
                <a href="#add-property"
                    class="px-6 py-3 bg-white/10 backdrop-blur-md hover:bg-white/20 text-white rounded-md transition-colors duration-300 flex items-center">
                    <i class="fas fa-plus mr-2"></i> Add New Property
                </a>
            </div>
        </div>
    </section>

    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div>
                    <h1 class="text-2xl font-heading font-bold text-navy">Hi Sneha Singh, <span class="text-gray-600 font-normal">Welcome to your Dashboard</span></h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-600">For Paid Service - Talk to Experts</span>
                    <button class="bg-saffron hover:bg-saffron-dark text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span>Request Call back</span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-3xl font-heading font-bold text-navy mb-2">My Properties</h2>
                <p class="text-gray-600">Manage and track all your listed properties</p>
            </div>

            <!-- Filter and Sort Controls -->
            <!-- <div class="flex items-center space-x-4">
                <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-saffron focus:border-saffron">
                    <option>All Properties</option>
                    <option>Active</option>
                    <option>Inactive</option>
                    <option>Sold/Rented</option>
                </select>

                <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-saffron focus:border-saffron">
                    <option>Sort by Date</option>
                    <option>Sort by Price</option>
                    <option>Sort by Views</option>
                </select>

                <button class="bg-saffron hover:bg-saffron-dark text-white px-6 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span>Add New Property</span>
                </button>
            </div> -->
        </div>

        <!-- Properties Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
            <!-- Property Card 1 - Active -->
            @foreach($allProperties as $property)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow duration-300 group">
                <div class="relative">
                    @if ($property->multipleImage->count() === 1)
                    {{-- Show single image --}}
                    <img src="{{ asset($property->multipleImage->first()->image) }}"
                        alt="Property Image"
                        class="w-full h-64 object-cover" />
                    @elseif($property->multipleImage->count() > 1)
                    {{-- Show slider if multiple images --}}
                    <div class="swiper mySwiper w-full h-64">
                        <div class="swiper-wrapper">
                            @foreach ($property->multipleImage as $image)
                            <div class="swiper-slide">
                                <img src="{{ asset($image->image) }}" alt="Property Image"
                                    class="w-full h-64 object-cover" />
                            </div>
                            @endforeach
                        </div>

                        {{-- Navigation arrows --}}
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    @else
                    {{-- Show fallback placeholder --}}
                    <div class="h-48 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                        <div class="text-center">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="text-sm text-gray-500">No Image Available</p>
                        </div>
                    </div>
                    @endif

                    {{-- Status Badge --}}
                    <!-- <div class="absolute top-3 left-3">
                        <span class="bg-emerald text-white px-3 py-1 rounded-full text-xs font-medium">ACTIVE</span>
                    </div> -->

                    {{-- Favorite icon --}}
                    <!-- <div class="absolute top-3 right-3">
                        <button class="bg-white/90 hover:bg-white p-2 rounded-full shadow-sm transition-colors duration-200">
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </button>
                    </div> -->
                </div>

                <div class="p-3">
                    <div class="flex item-center justify-between mb-3">
                        <div>
                            <h3 class="font-semibold text-lg text-navy mb-1">{{$property->property_type}} in {{$property->location->address}},{{$property->location->city}}</h3>
                            <p class="text-gray-600 text-sm">{{$property->location->address}},{{$property->location->city}},{{$property->location->pincode}}</p>
                        </div>
                    </div>


                    <div class="flex items-center  justify-between space-x-4 mb-4">
                        <span class="text-2xl font-bold text-saffron">₹ {{$property->property_price}}</span>
                        <span class="text-sm text-gray-500">{{$property->plot_area}} {{$property->plot_area_unit}}</span>
                    </div>

                    <div class="flex items-center justify-between space-x-4 mb-4">
                        <span class="text-sm text-gray-600">Property ID: PR-{{ str_pad($property->id, 6, '0', STR_PAD_LEFT) }}</span>
                        <span class="text-sm text-gray-600 text-right">Posted At: {{$property->created_at}}</span>
                    </div>

                    <!-- response and view count -->
                    <!-- <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-emerald" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm text-gray-600">245 views</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-saffron" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                            </svg>
                            <span class="text-sm font-medium text-saffron">12 Responses</span>
                        </div>
                    </div> -->

                    <div class="flex space-x-2">
                        <button
                            class="flex-1 bg-navy hover:bg-navy-light text-white py-2 px-4 rounded-lg font-medium text-sm transition-colors duration-200"
                            onclick="openModal(this)"
                            data-name="{{ $property->user->name }}"
                            data-email="{{ $property->user->email }}"
                            data-phone="{{ $property->user->mobile }}"
                            data-property_type="{{ $property->property_type }}"
                            data-want_for="{{ $property->want_for }}"
                            data-poss_status="{{ $property->poss_status }}"
                            data-plot_area="{{ $property->plot_area }} {{ $property->plot_area_unit }}"
                            data-super_area="{{ $property->super_area }} {{ $property->super_area_unit }}"
                            data-furnished="{{ $property->furnished_status }}"
                            data-price="{{ $property->property_price }}"
                            data-address="{{ $property->location->address}} {{ $property->location->city}},{{ $property->location->pincode}}"
                            data-bedrooms="{{ $property->bedrooms }}"
                            data-bathrooms="{{ $property->bathrooms }}"
                            data-balconies="{{ $property->balconies }}"
                            data-total_rooms="{{ $property->total_rooms }}"
                            data-total_floors="{{ $property->total_floor }}"
                            data-any_construction="{{ $property->const_plot}}"
                            data-boundary_wall="{{ $property->boundary_wall_made}}"
                            data-plot_length="{{ $property->plot_land_length}} {{ $property->plot_land_length_unit}}"
                            data-plot_breath="{{ $property->plot_land_breath}} {{ $property->plot_land_breath_unit}}"
                            data-leased="{{ $property->leased_out}}"
                            data-no_open_sides="{{ $property->open_sides }}"
                            data-width_road_facing="{{ $property->w_road_facing }} {{ $property->w_road_facing_unit }}"
                            data-washrooms="{{ $property->washrooms }}"
                            data-per_washrooms="{{ $property->per_washrooms }}"
                            data-pantry_cafe="{{ $property->pantry_cafeteria }}"
                            data-corner_plot="{{ $property->corner_plot }}"
                            data-floor_no="{{ $property->floor_no }}"
                            >
                            View Details
                        </button>



                        <!-- Edit Button -->
                        <button class="p-2 border border-gray-300 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.232 5.232l3.536 3.536M16.5 3.5a2.121 2.121 0 113 3L7 19l-4 1 1-4 12.5-12.5z" />
                            </svg>
                        </button>

                        <!-- Delete Button -->
                        <button
                            class="p-2 border border-red-500 text-red-500 hover:bg-red-50 rounded"
                            onclick="deleteLocation(this)"
                            data-location-id="{{ $property->location_id }}"
                            data-user-id="{{ $property->user_id }}"
                            title="Delete Property">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>


                        <!-- share button -->
                        <!-- <button
                            class="p-2 border border-gray-300 hover:bg-gray-50 rounded-lg transition-colors duration-200"
                            onclick="shareProperty(this)"
                            title="Share Property">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z" />
                            </svg>
                        </button> -->
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Heading Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-navy mb-4 hover:text-emerald transition-colors duration-300">Property Analytics Dashboard</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Track your real estate performance with comprehensive insights and key metrics</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="bg-white rounded-xl p-6 text-center shadow-sm border border-gray-200 hover:shadow-lg hover:scale-105 transition-all duration-300 cursor-pointer group">
                <div class="w-12 h-12 bg-emerald/10 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:bg-emerald/20 transition-colors duration-300">
                    <svg class="w-6 h-6 text-emerald group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H3m2 0h4M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-navy mb-1 group-hover:text-emerald transition-colors duration-300">45</h3>
                <p class="text-sm text-gray-600">Active Properties</p>
            </div>

            <div class="bg-white rounded-xl p-6 text-center shadow-sm border border-gray-200 hover:shadow-lg hover:scale-105 transition-all duration-300 cursor-pointer group">
                <div class="w-12 h-12 bg-saffron/10 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:bg-saffron/20 transition-colors duration-300">
                    <svg class="w-6 h-6 text-saffron group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-navy mb-1 group-hover:text-saffron transition-colors duration-300">156</h3>
                <p class="text-sm text-gray-600">Total Inquiries</p>
            </div>

            <div class="bg-white rounded-xl p-6 text-center shadow-sm border border-gray-200 hover:shadow-lg hover:scale-105 transition-all duration-300 cursor-pointer group">
                <div class="w-12 h-12 bg-navy/10 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:bg-navy/20 transition-colors duration-300">
                    <svg class="w-6 h-6 text-navy group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-navy mb-1 group-hover:text-navy/80 transition-colors duration-300">2.3K</h3>
                <p class="text-sm text-gray-600">Total Views</p>
            </div>

            <div class="bg-white rounded-xl p-6 text-center shadow-sm border border-gray-200 hover:shadow-lg hover:scale-105 transition-all duration-300 cursor-pointer group">
                <div class="w-12 h-12 bg-emerald/10 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:bg-emerald/20 transition-colors duration-300">
                    <svg class="w-6 h-6 text-emerald group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-navy mb-1 group-hover:text-emerald transition-colors duration-300">12</h3>
                <p class="text-sm text-gray-600">Sold This Month</p>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Section Heading -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-navy mb-4 hover:text-saffron transition-colors duration-300">Get Started Today</h1>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">Transform your property journey with our comprehensive real estate solutions and expert guidance</p>
        </div>

        <!-- CTA Section -->
        <div class="bg-gradient-to-br from-saffron/5 to-saffron/10 rounded-xl p-8 border border-saffron/20 hover:shadow-xl hover:border-saffron/30 transition-all duration-300">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-navy mb-4 hover:text-saffron transition-colors duration-300">Ready to List Your Property?</h2>
                <p class="text-gray-600 mb-6 max-w-2xl mx-auto">Join thousands of property owners who trust us to showcase their commercial spaces to the right buyers.</p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <button class="bg-saffron hover:bg-saffron-dark text-white px-8 py-3 rounded-lg font-medium transition-all duration-200 flex items-center gap-2 hover:scale-105 hover:shadow-lg group">
                        <svg class="w-5 h-5 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        List Your Property
                    </button>

                    <button class="border-2 border-navy text-navy hover:bg-navy hover:text-white px-8 py-3 rounded-lg font-medium transition-all duration-200 flex items-center gap-2 hover:scale-105 hover:shadow-lg group">
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        Contact Us
                    </button>
                </div>

                <div class="flex flex-col sm:flex-row gap-8 justify-center items-center mt-8 pt-8 border-t border-saffron/20">
                    <div class="flex items-center gap-3 hover:scale-105 transition-transform duration-300 cursor-pointer group">
                        <div class="w-10 h-10 bg-emerald rounded-full flex items-center justify-center group-hover:bg-emerald/80 transition-colors duration-300">
                            <svg class="w-5 h-5 text-white group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="text-gray-700 font-medium group-hover:text-emerald transition-colors duration-300">Free Property Valuation</span>
                    </div>

                    <div class="flex items-center gap-3 hover:scale-105 transition-transform duration-300 cursor-pointer group">
                        <div class="w-10 h-10 bg-emerald rounded-full flex items-center justify-center group-hover:bg-emerald/80 transition-colors duration-300">
                            <svg class="w-5 h-5 text-white group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <span class="text-gray-700 font-medium group-hover:text-emerald transition-colors duration-300">Quick Sale Process</span>
                    </div>

                    <div class="flex items-center gap-3 hover:scale-105 transition-transform duration-300 cursor-pointer group">
                        <div class="w-10 h-10 bg-emerald rounded-full flex items-center justify-center group-hover:bg-emerald/80 transition-colors duration-300">
                            <svg class="w-5 h-5 text-white group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <span class="text-gray-700 font-medium group-hover:text-emerald transition-colors duration-300">Secure Transactions</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Backdrop -->
    <div id="propertyPreviewModal" class="fixed inset-0 bg-opacity-60 flex items-center justify-center z-50 hidden transition-opacity duration-300">
        <!-- Modal Container -->
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl mx-4 max-h-[700px] overflow-hidden transform transition-all duration-300 scale-95 opacity-0" id="modalContent">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-4 border-b border-gray-200 bg-gradient-to-r from-indigo-600 to-purple-600">
                <h5 class="text-lg font-bold text-white flex items-center">
                    <i class="fas fa-home mr-2"></i>Property Details
                </h5>
                <button type="button" class="text-white hover:text-gray-200 transition-all duration-200 hover:rotate-90 hover:scale-110" onclick="closeModal()">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-4 max-h-[60vh] overflow-y-auto">
                <!-- Property Gallery -->
                <!-- <div id="property-image-container" class="flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200 rounded-lg p-16 mb-4 hover:shadow-md transition-shadow duration-200">
                    <div class="text-center" id="property-image-placeholder">
                        <i class="fa-solid fa-image text-4xl text-gray-400 mb-2"></i>
                        <p class="text-sm text-gray-500">Property Image</p>
                    </div>
                    <img id="property-image" src="" alt="Property Image" class="hidden max-h-80 object-cover rounded-lg shadow-md">
                </div> -->


                <!-- Property Details Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <!-- Left Column -->
                    <div class="space-y-3">
                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-3 rounded-lg border-l-4 border-blue-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-blue-600 mb-1 uppercase tracking-wide">Owner Name</div>
                            <div id="preview-name" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                        <div class="bg-gradient-to-r from-green-50 to-emerald-50 p-3 rounded-lg border-l-4 border-green-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-green-600 mb-1 uppercase tracking-wide">Email</div>
                            <div id="preview-email" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                        <div class="bg-gradient-to-r from-orange-50 to-yellow-50 p-3 rounded-lg border-l-4 border-orange-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-orange-600 mb-1 uppercase tracking-wide">Phone</div>
                            <div id="preview-phone" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 p-3 rounded-lg border-l-4 border-purple-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-purple-600 mb-1 uppercase tracking-wide">Property Type</div>
                            <div id="preview-type" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                        <div class="bg-gradient-to-r from-teal-50 to-cyan-50 p-3 rounded-lg border-l-4 border-teal-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-teal-600 mb-1 uppercase tracking-wide">Want For</div>
                            <div id="preview-want" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-3 rounded-lg border-l-4 border-blue-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-blue-600 mb-1 uppercase tracking-wide">Address</div>
                            <div id="preview-address" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                        <div class="bg-gradient-to-r from-green-50 to-emerald-50 p-3 rounded-lg border-l-4 border-green-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-green-600 mb-1 uppercase tracking-wide">Leased Out</div>
                            <div id="preview-leased" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                        <div class="bg-gradient-to-r from-orange-50 to-yellow-50 p-3 rounded-lg border-l-4 border-orange-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-orange-600 mb-1 uppercase tracking-wide">No of open sides</div>
                            <div id="preview-no_of_open_sides" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 p-3 rounded-lg border-l-4 border-purple-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-purple-600 mb-1 uppercase tracking-wide">Width of road facing the plot</div>
                            <div id="preview-width_road_facing" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                        <div class="bg-gradient-to-r from-teal-50 to-cyan-50 p-3 rounded-lg border-l-4 border-teal-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-teal-600 mb-1 uppercase tracking-wide">Floor No.</div>
                            <div id="preview-floor_no" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                        <div class="bg-gradient-to-r from-green-50 to-emerald-50 p-3 rounded-lg border-l-4 border-green-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-green-600 mb-1 uppercase tracking-wide">Washrooms</div>
                            <div id="preview-washrooms" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                        <div class="bg-gradient-to-r from-orange-50 to-yellow-50 p-3 rounded-lg border-l-4 border-orange-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-orange-600 mb-1 uppercase tracking-wide">Personal Washrooms</div>
                            <div id="preview-personal_washrooms" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 p-3 rounded-lg border-l-4 border-purple-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-purple-600 mb-1 uppercase tracking-wide">Pantry/Cafeteria</div>
                            <div id="preview-pantry" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                        <div class="bg-gradient-to-r from-teal-50 to-cyan-50 p-3 rounded-lg border-l-4 border-teal-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-teal-600 mb-1 uppercase tracking-wide">Is this corner plot</div>
                            <div id="preview-corner_plot" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                    </div>


                    <!-- Right Column -->
                    <div class="space-y-3">
                        <div class="bg-gradient-to-r from-green-50 to-rose-50 p-3 rounded-lg border-l-4 border-green-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-green-600 mb-1 uppercase tracking-wide">Possession Status</div>
                            <div id="preview-status" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                        <div class="bg-gradient-to-r from-emerald-50 to-green-50 p-3 rounded-lg border-l-4 border-emerald-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-emerald-600 mb-1 uppercase tracking-wide">Furnished</div>
                            <div id="preview-furnished" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                        <div class="bg-gradient-to-r from-violet-50 to-purple-50 p-3 rounded-lg border-l-4 border-violet-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-violet-600 mb-1 uppercase tracking-wide">Price</div>
                            <div id="preview-price" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                        <div class="bg-gradient-to-r from-slate-50 to-gray-50 p-3 rounded-lg border-l-4 border-slate-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-slate-600 mb-1 uppercase tracking-wide">Plot Area</div>
                            <div id="preview-plot_area" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                        <div class="bg-gradient-to-r from-amber-50 to-orange-50 p-3 rounded-lg border-l-4 border-amber-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-amber-600 mb-1 uppercase tracking-wide">Super Area</div>
                            <div id="preview-super_area" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                        <div class="bg-gradient-to-r from-green-50 to-rose-50 p-3 rounded-lg border-l-4 border-green-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-green-600 mb-1 uppercase tracking-wide">Bedrooms</div>
                            <div id="preview-bedrooms" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                        <div class="bg-gradient-to-r from-emerald-50 to-green-50 p-3 rounded-lg border-l-4 border-emerald-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-emerald-600 mb-1 uppercase tracking-wide">Balconies</div>
                            <div id="preview-balconies" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                        <div class="bg-gradient-to-r from-violet-50 to-purple-50 p-3 rounded-lg border-l-4 border-violet-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-violet-600 mb-1 uppercase tracking-wide">Bathrooms</div>
                            <div id="preview-bathrooms" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                        <div class="bg-gradient-to-r from-slate-50 to-gray-50 p-3 rounded-lg border-l-4 border-slate-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-slate-600 mb-1 uppercase tracking-wide">Total Rooms</div>
                            <div id="preview-total_rooms" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                        <div class="bg-gradient-to-r from-amber-50 to-orange-50 p-3 rounded-lg border-l-4 border-amber-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-amber-600 mb-1 uppercase tracking-wide">Total Floors</div>
                            <div id="preview-total_floors" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                        <div class="bg-gradient-to-r from-emerald-50 to-green-50 p-3 rounded-lg border-l-4 border-emerald-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-emerald-600 mb-1 uppercase tracking-wide">Any construction done</div>
                            <div id="preview-any_construction" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                        <div class="bg-gradient-to-r from-violet-50 to-purple-50 p-3 rounded-lg border-l-4 border-violet-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-violet-600 mb-1 uppercase tracking-wide">Boundary wall made</div>
                            <div id="preview-boundary_wall" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                        <div class="bg-gradient-to-r from-slate-50 to-gray-50 p-3 rounded-lg border-l-4 border-slate-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-slate-600 mb-1 uppercase tracking-wide">Plot Length</div>
                            <div id="preview-plot_length" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                        <div class="bg-gradient-to-r from-amber-50 to-orange-50 p-3 rounded-lg border-l-4 border-amber-400 hover:shadow-sm transition-shadow duration-200">
                            <div class="text-xs font-semibold text-amber-600 mb-1 uppercase tracking-wide">Plot Breath</div>
                            <div id="preview-plot_breath" class="text-gray-800 font-medium text-sm">-</div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Modal Footer -->
            <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-200 bg-gray-50">
                <button type="button" class="px-4 py-2 text-gray-600 hover:bg-gray-100 border border-gray-300 rounded-lg transition-all duration-200 font-medium text-sm hover:shadow-sm" onclick="closeModal()">
                    <i class="fas fa-times mr-1"></i>Close
                </button>
            </div>
        </div>
    </div>

</body>

@push('script')

<!-- these both script for swiper slider -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.swiper').forEach((swiperEl) => {
            new Swiper('.' + swiperEl.classList[1], {
                loop: true,
                navigation: {
                    nextEl: '.' + swiperEl.classList[1] + ' .swiper-button-next',
                    prevEl: '.' + swiperEl.classList[1] + ' .swiper-button-prev',
                },
            });
        });
    });
</script>


<!-- this script for delete property -->
<script>
    function deleteLocation(button) {
        const locationId = button.getAttribute('data-location-id');
        const userId = button.getAttribute('data-user-id');

        if (confirm("Are you sure you want to delete this property and related data?")) {
            fetch(`/my-property`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        _method: 'DELETE',
                        location_id: locationId,
                        user_id: userId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    // alert(data.message);
                    notyf.success('data.message');
                    location.reload(); // or remove DOM element if needed
                })
                .catch(error => {
                    console.error("Error deleting:", error);
                    // alert("Something went wrong.");
                    notyf.error('Something went wrong.');
                });
        }
    }
</script>


<!-- this script for property preview modal -->
<script>
    function openModal(button) {
        const modal = document.getElementById('propertyPreviewModal');
        const modalContent = document.getElementById('modalContent');

        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';

        // Animate modal
        setTimeout(() => {
            modal.classList.add('bg-opacity-60');
            modalContent.classList.remove('scale-95', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');
        }, 10);

        // Inject data into modal
        document.getElementById('preview-name').textContent = button.dataset.name || '-';
        document.getElementById('preview-email').textContent = button.dataset.email || '-';
        document.getElementById('preview-phone').textContent = button.dataset.phone || '-';
        document.getElementById('preview-type').textContent = button.dataset.property_type || '-';
        document.getElementById('preview-want').textContent = button.dataset.want_for || '-';
        document.getElementById('preview-status').textContent = button.dataset.poss_status || '-';
        document.getElementById('preview-plot_area').textContent = button.dataset.plot_area || '-';
        document.getElementById('preview-super_area').textContent = button.dataset.super_area || '-';
        document.getElementById('preview-furnished').textContent = button.dataset.furnished || '-';
        document.getElementById('preview-price').textContent = button.dataset.price || '-';
        document.getElementById('preview-address').textContent = button.dataset.address || '-';
        document.getElementById('preview-leased').textContent = button.dataset.leased || '-';
        document.getElementById('preview-no_of_open_sides').textContent = button.dataset.no_open_sides || '-';
        document.getElementById('preview-width_road_facing').textContent = button.dataset.width_road_facing || '-';
        document.getElementById('preview-floor_no').textContent = button.dataset.floor_no || '-';
        document.getElementById('preview-washrooms').textContent = button.dataset.washrooms || '-';
        document.getElementById('preview-personal_washrooms').textContent = button.dataset.per_washrooms || '-';
        document.getElementById('preview-pantry').textContent = button.dataset.pantry_cafe || '-';
        document.getElementById('preview-corner_plot').textContent = button.dataset.corner_plot || '-';
        document.getElementById('preview-bedrooms').textContent = button.dataset.bedrooms || '-';
        document.getElementById('preview-balconies').textContent = button.dataset.balconies || '-';
        document.getElementById('preview-bathrooms').textContent = button.dataset.bathrooms || '-';
        document.getElementById('preview-total_rooms').textContent = button.dataset.total_rooms || '-';
        document.getElementById('preview-total_floors').textContent = button.dataset.total_floors || '-';
        document.getElementById('preview-balconies').textContent = button.dataset.balconies || '-';
        document.getElementById('preview-any_construction').textContent = button.dataset.any_construction || '-';
        document.getElementById('preview-boundary_wall').textContent = button.dataset.boundary_wall || '-';
        document.getElementById('preview-plot_length').textContent = button.dataset.plot_length || '-';
        document.getElementById('preview-plot_breath').textContent = button.dataset.plot_breath || '-';

        // Image
        const image = button.dataset.image;
        const imgTag = document.getElementById('property-image');
        const placeholder = document.getElementById('property-image-placeholder');

        if (image) {
            imgTag.src = image;
            imgTag.classList.remove('hidden');
            placeholder.classList.add('hidden');
        } else {
            imgTag.src = '';
            imgTag.classList.add('hidden');
            placeholder.classList.remove('hidden');
        }
    }

    function closeModal() {
        const modal = document.getElementById('propertyPreviewModal');
        const modalContent = document.getElementById('modalContent');

        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }, 300);
    }

    // Close modal when clicking outside
    document.getElementById('propertyPreviewModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
</script>



@endpush

@endsection