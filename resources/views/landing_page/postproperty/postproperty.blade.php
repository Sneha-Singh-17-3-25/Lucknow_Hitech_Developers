@extends('layouts/users/app')
@push('style')
<style>
    .property-type-btn.active {
        background-color: #FF9933;
        color: white;
        border-color: #E68A00;
    }

    .sub-property-option.active {
        background-color: rgba(255, 153, 51, 0.1);
        border-color: #FF9933;
        color: #FF9933;
    }

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
</style>


<!------------------------------------- style for Plot/land common form ---------------------------------------------------->
<style>
    .text-saffron {
        color: #f59e0b;
    }

    .focus-ring-amber:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.3);
        border-color: #f59e0b;
    }

    .hover-amber:hover {
        border-color: #f59e0b;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        border-color: #f59e0b;
        box-shadow: 0 0 0 0.2rem rgba(245, 158, 11, 0.25);
    }

    .form-select:focus {
        border-color: #f59e0b;
        box-shadow: 0 0 0 0.2rem rgba(245, 158, 11, 0.25);
    }

    .form-check-input:checked {
        background-color: #f59e0b;
        border-color: #f59e0b;
    }

    .form-check-input:focus {
        box-shadow: 0 0 0 0.25rem rgba(245, 158, 11, 0.25);
    }

    .info-icon {
        background-color: #f3f4f6;
        border: 1px solid #d1d5db;
        border-left: none;
    }

    .section-divider {
        border-top: 2px solid #f59e0b;
        margin: 2rem 0;
    }
</style>
@endpush



@section('content')

<body class="font-sans text-slate bg-gray-50">

    <section class="relative flex justify-center items-center text-center h-[50vh] overflow-hidden">
        <!-- Video Background with Overlay -->
        <div class="absolute top-0 left-0 w-full h-full">
            <video autoplay muted loop playsinline class="object-cover w-full h-full">
                <source src="{{asset('videos/postproperty3.mp4')}}" type="video/mp4">
                <!-- Fallback image in case video doesn't load -->
                <!-- <img src="/api/placeholder/1920/600" alt="Post Your Property" class="object-cover w-full h-full"> -->
            </video>
            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-black/70 via-black/50 to-black/60">
            </div>
        </div>

        <div class="w-11/12 max-w-screen-lg z-10">
            <h1 class="text-4xl md:text-6xl leading-tight font-heading font-bold text-white text-shadow">Post <span
                    class="text-saffron">Property</span></h1>
            <p class="text-white/80 max-w-xl mx-auto mt-4">List Your Property and Connect with Potential Buyers</p>
            <div class="mt-8 flex justify-center space-x-4">
                <a href="#post-form"
                    class="px-6 py-3 bg-saffron hover:bg-saffron-dark text-white rounded-md transition-colors duration-300 flex items-center">
                    <i class="fas fa-plus-circle mr-2"></i> Start Listing
                </a>
                <a href="#"
                    class="px-6 py-3 bg-white/10 backdrop-blur-md hover:bg-white/20 text-white rounded-md transition-colors duration-300 flex items-center">
                    <i class="fas fa-question-circle mr-2"></i> How It Works
                </a>
            </div>
        </div>
    </section>

    <!-- Page Title -->
    <div class="bg-white shadow-sm pt-4 px-24">
        <div class="container mx-auto px-4 py-6">
            <h1 class="text-3xl font-heading font-bold text-slate">Post Your <span class="text-saffron">Property</span>
            </h1>
            <p class="text-gray-600 mt-2">List your property for free and connect with potential buyers or tenants</p>
        </div>
    </div>

    <!-- Main Form Section -->
    <div class="px-4 py-8 ">
        <div class="bg-white rounded-sm shadow-md md:p-8  md:px-24">
            <div class="mb-8">
                <h2 class="text-2xl font-heading font-semibold text-slate">Property <span
                        class="text-saffron">Details</span></h2>
                <div class="animated-line"></div>
            </div>

            <form>
                <!-- Intent Sele ction -->
                <div class="mb-8">
                    <label class="block text-gray-700 font-medium mb-3">I want for</label>
                    <div class="flex flex-wrap gap-4">
                        <!-- Sell Option -->
                        <label class="cursor-pointer">
                            <input type="radio" name="intent" id="sell" value="sell" class="peer hidden" checked>
                            <span class="flex items-center justify-center px-5 py-3 border-2 rounded-md border-gray-200 
                                peer-checked:border-saffron peer-checked:bg-saffron/10 transition-all">
                                <span class="w-4 h-4 mr-2 rounded-full border-2 border-gray-300 
                                  peer-checked:border-saffron flex items-center justify-center">
                                    <span class="w-2 h-2 rounded-full bg-saffron 
                                  peer-checked:opacity-100 opacity-0 transition-opacity"></span>
                                </span>
                                <span class="font-medium">Sell</span>
                            </span>
                        </label>

                        <!-- Rent/Lease Option -->
                        <label class="cursor-pointer">
                            <input type="radio" name="intent" id="rent" value="rent" class="peer hidden">
                            <span class="flex items-center justify-center px-5 py-3 border-2 rounded-md border-gray-200 
                            peer-checked:border-saffron peer-checked:bg-saffron/10 transition-all">
                                <span class="w-4 h-4 mr-2 rounded-full border-2 border-gray-300 
                            peer-checked:border-saffron flex items-center justify-center">
                                    <span class="w-2 h-2 rounded-full bg-saffron 
                            peer-checked:opacity-100 opacity-0 transition-opacity"></span>
                                </span>
                                <span class="font-medium">Rent/Lease</span>
                            </span>
                        </label>

                        <!-- PG/Hostel Option -->
                        <!-- <label class="cursor-pointer">
                            <input type="radio" name="intent" value="pg" class="peer hidden">
                            <span class="flex items-center justify-center px-5 py-3 border-2 rounded-md border-gray-200 
                            peer-checked:border-saffron peer-checked:bg-saffron/10 transition-all">
                                <span class="w-4 h-4 mr-2 rounded-full border-2 border-gray-300 
                            peer-checked:border-saffron flex items-center justify-center">
                                    <span class="w-2 h-2 rounded-full bg-saffron 
                            peer-checked:opacity-100 opacity-0 transition-opacity"></span>
                                </span>
                                <span class="font-medium">PG/Hostel</span>
                            </span>
                        </label> -->
                    </div>
                </div>


                <!-- Property Category Selection -->
                <div class="mb-8">
                    <label class="block text-gray-700 font-medium mb-3">Property Category</label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <button type="button" id="residential-btn" data-category="residential"
                            class="property-type-btn active flex items-center justify-center px-4 py-3 border-2 rounded-md border-gray-200 hover:border-saffron transition-all">
                            <i class="fas fa-home mr-2"></i>
                            <span>Residential</span>
                        </button>
                        <button type="button" id="commercial-btn" data-category="commercial"
                            class="property-type-btn flex items-center justify-center px-4 py-3 border-2 rounded-md border-gray-200 hover:border-saffron transition-all">
                            <i class="fas fa-building mr-2"></i>
                            <span>Commercial</span>
                        </button>
                        <button type="button" id="plotland-btn" data-category="plotland"
                            class="property-type-btn flex items-center justify-center px-4 py-3 border-2 rounded-md border-gray-200 hover:border-saffron transition-all">
                            <i class="fas fa-building mr-2"></i>
                            <span>Plot\Land</span>
                        </button>
                    </div>


                    <!-- Residential Sub-options -->
                    <div id="residential-options" class="property-sub-options">
                        <label class="block text-gray-700 text-sm mb-2">Property Type</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-7 gap-3">
                            @foreach($ResidentialProperty as $Rtype)
                            <div class="sub-property-option residential-option h-20 active border rounded-md p-3 cursor-pointer hover:bg-saffron/8 transition-all text-center"
                                data-res-type="{{ strtolower($Rtype->property_type) }}"
                                onclick="document.getElementById('idrestype').value = '{{$Rtype->property_type}}'">

                                <div class="text-saffron mb-1"><i class="fas {{ $Rtype->icon_class }}"></i></div>
                                <span class="text-sm" id="res-property-type">{{$Rtype->property_type}}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <input type="hidden" class="hidden-input" id="idrestype" name="res-property-type_hidden" value="{{$Rtype->property_type}}">

                    <!-- Commercial Sub-options (Hidden by default) -->
                    <div id="commercial-options" class="property-sub-options hidden">
                        <label class="block text-gray-700 text-sm mb-2">Property Category</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-7 gap-3">
                            @foreach($CommercialProperty as $Ctype)
                            <div class="sub-property-option commercial-option border rounded-md p-3 cursor-pointer hover:bg-saffron/5 transition-all text-center"
                                data-com-type="{{ strtolower($Ctype->property_type) }}" onclick="document.getElementById('idcommertype').value = '{{$Ctype->property_type}}' ">
                                <div class="text-saffron mb-1">
                                    <i class="fas {{ $Ctype->icon_class }}"></i>
                                </div>
                                <span class="text-sm">{{$Ctype->property_type}}</span>

                            </div>
                            @endforeach
                        </div>
                    </div>
                    <input type="hidden" class="hidden-input" id="idcommertype" name="commer-property-type-hidden" value="{{$Ctype->property_type}}">

                    <!-- plot/land Sub-options (Hidden by default) -->
                    <div id="plotland-options" class="property-sub-options hidden">
                        <label class="block text-gray-700 text-sm mb-2">Property Category</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-7 gap-3">
                            @foreach($PlotLandProperty as $Ptype)
                            <div class="sub-property-option plotland-option border rounded-md p-3 cursor-pointer hover:bg-saffron/5 transition-all text-center"
                                data-plot-type="{{ strtolower($Ptype->property_type) }}"
                                onclick="document.getElementById('idplotlandtype').value = '{{ $Ptype->property_type }}'">
                                <div class="text-saffron mb-1">
                                    <i class="fas {{ $Ptype->icon_class }}"></i>
                                </div>
                                <span class="text-sm">{{ $Ptype->property_type }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <input type="hidden" class="hidden-input" id="idplotlandtype" name="plotland-property-type-hidden" value="{{$Ptype->property_type}}">

                </div>

                <!-- Property Location -->
                <div class="mb-8 ">
                    <h3 class="text-xl font-heading font-semibold text-slate mb-4">Property <span
                            class="text-saffron">Location</span></h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                        <div>
                            <label for="pincode" class="block text-gray-700 text-sm font-medium mb-2">Pincode
                                <span class="text-amber-500">*</span>
                            </label>
                            <input type="text" id="pincode" name="pincode"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-saffron focus:border-transparent"
                                placeholder="Enter pincode">
                        </div>
                        <div>
                            <label for="city" class="block text-gray-700 text-sm font-medium mb-2">City <span
                                    class="text-amber-500">*</span></label>
                            <input type="text" id="city" name="city"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-saffron focus:border-transparent"
                                placeholder="Enter city" readonly>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="state" class="block text-gray-700 text-sm font-medium mb-2">State <span
                                    class="text-amber-500">*</span></label>
                            <input type="text" id="state" name="state"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-saffron focus:border-transparent"
                                placeholder="Enter state name" readonly>
                        </div>
                        <div>
                            <label for="address" class="block text-gray-700 text-sm font-medium mb-2">Address <span
                                    class="text-amber-500">*</span>
                            </label>
                            <input type="text" id="address" name="address"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-saffron focus:border-transparent"
                                placeholder="Enter address">
                        </div>
                    </div>
                </div>


                <!-- Transaction Type Section -->
                <div class="mb-8">
                    <h3 class="text-xl font-heading font-semibold text-slate mb-4">Property<span class="text-saffron">
                            Availability</span></h3>

                    <div class="mb-4 flex items-center">
                        <label class="text-gray-700 text-sm font-medium mr-4 min-w-max">Possession Status:</label>
                        <div class="flex items-center gap-6">
                            <label class="inline-flex items-center">
                                <input type="radio" name="possession-status" value="under-construction"
                                    class="w-4 h-4 accent-orange-500">
                                <span class="ml-2">Under Construction</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="possession-status" value="ready-to-move"
                                    class="w-4 h-4 accent-orange-500">
                                <span class="ml-2">Ready to Move</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- this common section for residential ------------------------------------------->
                <div class=" mx-auto py-6 hidden" id="residential-common-form">
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4 text-saffron">Area</h2>
                        <div class="flex flex-col md:flex-row md:gap-8 space-y-6 md:space-y-0">
                            <!-- Plot Area -->
                            <div class="w-full md:w-1/2">
                                <label class="block text-gray-700 text-sm mb-2">Plot Area</label>
                                <div class="flex items-center gap-2">
                                    <input type="number" placeholder="Plot Area" id="res-plot-area" name="plot-area"
                                        class="w-full p-3 border border-saffron rounded-md focus:outline-none focus:ring-2 focus:ring-saffron focus:border-saffron">
                                    <div class="relative w-32">
                                        <select id="res-plot-area-unit" name="res-plot-area-unit"
                                            class="appearance-none w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-saffron focus:border-saffron">
                                            <option value="Sq-ft">Sq-ft</option>
                                            <option value="Sq-m">Sq-m</option>
                                            <option value="Acres">Acres</option>
                                            <option value="Hectares">Hectares</option>
                                        </select>
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="text-gray-500 cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Super Area -->
                            <div class="w-full md:w-1/2">
                                <label class="block text-gray-700 text-sm mb-2">Super Area</label>
                                <div class="flex items-center gap-2">
                                    <input type="number" placeholder="Super Area" id="res-super-area" name="super-area"
                                        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-saffron focus:border-saffron">
                                    <div class="relative w-32">
                                        <select id="res-super-area-unit" name="res-super-area-unit"
                                            class="appearance-none w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-saffron focus:border-saffron">
                                            <option value="Sq-ft">Sq-ft</option>
                                            <option value="Sq-m">Sq-m</option>
                                        </select>
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="text-gray-500 cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Property Features Section -->
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">Property <span
                                class="text-saffron">Features</span></h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 text-sm mb-2">Bedrooms</label>
                                <div class="flex flex-wrap gap-2">
                                    @for ($i = 1; $i <= 8; $i++)
                                        <label>
                                        <input type="radio" name="res-bedrooms" value="{{ $i < 8 ? $i : '8+' }}" class="peer hidden" {{ $i === 1 ? 'checked' : '' }}>
                                        <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                        peer-checked:bg-amber-50 peer-checked:border-amber-500 peer-checked:text-amber-600 
                                        hover:bg-amber-50 hover:border-amber-500 transition-all">
                                            {{ $i < 8 ? $i : '8+' }}
                                        </span>
                                        </label>
                                        @endfor
                                </div>

                            </div>


                            <!-- Balconies -->
                            <div>
                                <label class="block text-gray-700 text-sm mb-2">Balconies</label>
                                <div class="flex flex-wrap gap-2">
                                    @for ($i = 1; $i <= 8; $i++)
                                        <label>
                                        <input type="radio" name="res-balconies" value="{{ $i < 8 ? $i : '8+' }}" class="peer hidden" {{ $i === 1 ? 'checked' : '' }}>
                                        <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                        peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron 
                                        hover:bg-saffron/5 hover:border-saffron transition-all">
                                            {{ $i < 8 ? $i : '8+' }}
                                        </span>
                                        </label>
                                        @endfor
                                </div>

                            </div>


                            <!-- Total rooms -->

                            <div>
                                <div>
                                    <label class="block text-gray-700 text-sm mb-2">Total rooms</label>
                                    <div class="flex flex-wrap gap-2">
                                        @for ($i = 1; $i <= 9; $i++)
                                            <label>
                                            <input type="radio" name="res-rooms" value="{{ $i < 9 ? $i : '9+' }}" class="peer hidden"
                                                {{ $i === 1 ? 'checked' : '' }}>
                                            <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                              peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron 
                                               hover:bg-saffron/5 hover:border-saffron transition-all">
                                                {{ $i < 9 ? $i : '9+' }}
                                            </span>
                                            </label>
                                            @endfor
                                    </div>
                                </div>
                            </div>

                            <!-- Total Floors -->

                            <!-- Total Floors -->
                            <div>
                                <div>
                                    <label class="block text-gray-700 text-sm mb-2">Total Floors</label>
                                    <div class="flex flex-wrap gap-2">
                                        @for ($i = 1; $i <= 9; $i++)
                                            <label>
                                            <input type="radio" name="res-total-floors" value="{{ $i < 9 ? $i : '9+' }}" class="peer hidden"
                                                {{ $i === 1 ? 'checked' : '' }}>
                                            <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                             peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron 
                                             hover:bg-saffron/5 hover:border-saffron transition-all">
                                                {{ $i < 9 ? $i : '9+' }}
                                            </span>
                                            </label>
                                            @endfor
                                    </div>
                                </div>
                            </div>

                            <!-- Furnished Status -->
                            <div>
                                <label class="block text-gray-700 text-sm mb-2">Furnished Status</label>
                                <div class="flex flex-wrap gap-2">
                                    <!-- Furnished -->
                                    <label>
                                        <input type="radio" id="furnished" name="res-furnished" value="furnished" class="peer hidden"
                                            checked>
                                        <span class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                         peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron
                                         hover:bg-saffron/5 hover:border-saffron transition-all">
                                            Furnished
                                        </span>
                                    </label>

                                    <!-- Unfurnished -->
                                    <label>
                                        <input type="radio" id="unfurnished" name="res-furnished" value="unfurnished" class="peer hidden">
                                        <span class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                         peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron
                                         hover:bg-saffron/5 hover:border-saffron transition-all">
                                            Unfurnished
                                        </span>
                                    </label>

                                    <!-- Semi-Furnished -->
                                    <label>
                                        <input type="radio" id="semi-furnished" name="res-furnished" value="semi-furnished" class="peer hidden">
                                        <span class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                        peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron
                                        hover:bg-saffron/5 hover:border-saffron transition-all">
                                            Semi-Furnished
                                        </span>
                                    </label>
                                </div>
                            </div>


                            <!-- Bathrooms -->
                            <div>
                                <label class="block text-gray-700 text-sm mb-2">Bathrooms</label>
                                <div class="flex flex-wrap gap-2">
                                    @for ($i = 1; $i <= 8; $i++)
                                        <label>
                                        <input type="radio" name="res-bathrooms" value="{{ $i < 8 ? $i : '8+' }}" class="peer hidden"
                                            {{ $i === 1 ? 'checked' : '' }}>
                                        <span class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                         peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron
                                         hover:bg-saffron/5 hover:border-saffron transition-all">
                                            {{ $i < 8 ? $i : '8+' }}
                                        </span>
                                        </label>
                                        @endfor
                                </div>
                            </div>


                            <!-- No of open sides -->
                            <div>
                                <label class="block text-gray-700 text-sm mb-2">No of open sides</label>
                                <div class="relative">
                                    <select id="res-no-open-sides" name="res-no-open-sides"
                                        class="appearance-none w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-saffron focus:border-saffron">
                                        <option disabled selected>Select</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Width of road facing the plot -->
                            <div>
                                <label class="block text-gray-700 text-sm mb-2">Width of road facing the plot</label>
                                <div class="flex items-center gap-2">
                                    <input type="number" placeholder="Road width" id="res-road-facing-plot" name="res-road-facing-plot"
                                        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-saffron focus:border-saffron">
                                    <div class="relative w-32">
                                        <select id="res-road-facing-plot-unit" name="res-road-facing-plot-unit"
                                            class="appearance-none w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-saffron/50 focus:border-saffron">
                                            <option value="Meters">Meters</option>
                                            <option value="Feet">Feet</option>
                                        </select>
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- this is the common section for commercial -------------------------------------------------->
                <div class="bg-white-50 hidden" id="commercial-common-form">
                    <div class="bg-white rounded-lg mb-5">

                        <h3 class="text-xl font-semibold text-gray-800 mb-2 pb-2 ">Property <span class="text-saffron">
                                Features</span>
                        </h3>
                        <div class="mb-8">
                            <h2 class="text-xl font-semibold text-gray-800 mb-4 text-saffron">Area</h2>
                            <div class="flex flex-col md:flex-row md:gap-8 space-y-6 md:space-y-0">
                                <!-- Plot Area -->
                                <div class="w-full md:w-1/2">
                                    <label class="block text-gray-700 text-sm mb-2">Plot Area</label>
                                    <div class="flex items-center gap-2">
                                        <input type="number" placeholder="Plot Area" name="commer-plot-area" id="commer-plot-area"
                                            class="w-full p-3 border border-saffron rounded-md focus:outline-none focus:ring-2 focus:ring-saffron focus:border-saffron">
                                        <div class="relative w-32">
                                            <select name="commer-plot-area-unit" id="commer-plot-area-unit"
                                                class="appearance-none w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-saffron focus:border-saffron">
                                                <option value="Sq-ft">Sq-ft</option>
                                                <option value="Sq-m">Sq-m</option>
                                                <option value="Acres">Acres</option>
                                                <option value="Hectares">Hectares</option>
                                            </select>
                                            <div
                                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="text-gray-500 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <!-- Super Area -->
                                <div class="w-full md:w-1/2">
                                    <label class="block text-gray-700 text-sm mb-2">Super Area</label>
                                    <div class="flex items-center gap-2">
                                        <input type="number" placeholder="Super Area" name="commer-super-area" id="commer-super-area"
                                            class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-saffron focus:border-saffron">
                                        <div class="relative w-32">
                                            <select name="commer-super-area-unit" id="commer-super-area-unit"
                                                class="appearance-none w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-saffron focus:border-saffron">
                                                <option value="Sq-ft">Sq-ft</option>
                                                <option value="Sq-m">Sq-m</option>
                                            </select>
                                            <div
                                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="text-gray-500 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Floor Information -->
                    <div class="bg-white rounded-lg mb-5">
                        <!-- Floor No. -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Floor No.</label>
                            <div class="flex flex-wrap gap-2">

                                <label>
                                    <input type="radio" name="commer_floor_no" value="Lower Basement" class="peer hidden" />
                                    <span class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                     peer-checked:bg-amber-50 peer-checked:border-amber-500 peer-checked:text-amber-600
                                     hover:bg-amber-50 hover:border-amber-500 transition-all">
                                        Lower Basement
                                    </span>
                                </label>

                                <label>
                                    <input type="radio" name="commer_floor_no" value="Upper Basement" class="peer hidden" />
                                    <span class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                    peer-checked:bg-amber-50 peer-checked:border-amber-500 peer-checked:text-amber-600
                                    hover:bg-amber-50 hover:border-amber-500 transition-all">
                                        Upper Basement
                                    </span>
                                </label>

                                <label>
                                    <input type="radio" name="commer_floor_no" value="Ground" class="peer hidden" />
                                    <span class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                     peer-checked:bg-amber-50 peer-checked:border-amber-500 peer-checked:text-amber-600
                                     hover:bg-amber-50 hover:border-amber-500 transition-all">
                                        Ground
                                    </span>
                                </label>

                                @for($i = 1; $i <= 6; $i++)
                                    <label>
                                    <input type="radio" name="commer_floor_no" value="{{ $i < 6 ? $i : '6+' }}" class="peer hidden" />
                                    <span class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                    peer-checked:bg-amber-50 peer-checked:border-amber-500 peer-checked:text-amber-600
                                    hover:bg-amber-50 hover:border-amber-500 transition-all">
                                        {{ $i < 6 ? $i : '6+' }}
                                    </span>
                                    </label>
                                    @endfor
                            </div>
                        </div>

                        <!-- Total Floors -->
                        <div class="mb-4">
                            <div class="mb-4">
                                <label class="block text-gray-700 font-medium mb-2">Total Floors</label>
                                <div class="flex flex-wrap gap-2">
                                    @for($i=1; $i<=10; $i++)
                                        <label>
                                        <input type="radio" name="commer_total_floor" value="{{ $i < 10 ? $i : '10+' }}" class="sr-only peer" />
                                        <div class="peer-checked:bg-amber-100 peer-checked:border-amber-500 peer-checked:text-amber-600
                                        px-4 py-2 border border-gray-300 rounded-md cursor-pointer 
                                        hover:bg-amber-50 hover:border-amber-500">
                                            {{ $i < 10 ? $i : '10+' }}
                                        </div>
                                        </label>
                                        @endfor
                                </div>
                            </div>
                        </div>

                        <!-- Furnished Status -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Furnished Status</label>
                            <div class="flex gap-2">
                                <!-- Furnished -->
                                <label>
                                    <input type="radio" name="commer_furnished_status" value="Furnished"
                                        class="sr-only peer" />
                                    <div
                                        class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                     hover:bg-amber-50 hover:border-amber-500
                                     peer-checked:bg-amber-100 peer-checked:border-amber-500 peer-checked:text-amber-600">
                                        Furnished
                                    </div>
                                </label>

                                <!-- Unfurnished -->
                                <label>
                                    <input type="radio" name="commer_furnished_status" value="Unfurnished"
                                        class="sr-only peer" />
                                    <div
                                        class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                    hover:bg-amber-50 hover:border-amber-500
                                     peer-checked:bg-amber-100 peer-checked:border-amber-500 peer-checked:text-amber-600">
                                        Unfurnished
                                    </div>
                                </label>

                                <!-- Semi-Furnished -->
                                <label>
                                    <input type="radio" name="commer_furnished_status" value="Semi-Furnished"
                                        class="sr-only peer" />
                                    <div
                                        class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                     hover:bg-amber-50 hover:border-amber-500
                                     peer-checked:bg-amber-100 peer-checked:border-amber-500 peer-checked:text-amber-600">
                                        Semi-Furnished
                                    </div>
                                </label>
                            </div>
                        </div>


                        <!-- Washrooms -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Washrooms</label>
                            <div class="flex gap-2 flex-wrap">
                                @for($i=1; $i <= 10 ; $i++)
                                    <label>
                                    <input type="radio" name="commer_washrooms" value="{{ $i < 5 ? $i : '10+' }}" class="sr-only peer" />
                                    <div class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                    hover:bg-amber-50 hover:border-amber-500
                                    peer-checked:bg-amber-100 peer-checked:border-amber-500 peer-checked:text-amber-600">
                                        {{ $i < 10 ? $i : '10+' }}
                                    </div>
                                    </label>
                                    @endfor
                            </div>
                        </div>

                        <!-- Personal Washroom -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Personal Washroom</label>
                            <div class="flex">
                                <div class="flex items-center mr-10">
                                    <input class="w-4 h-4 mr-2 bg-amber-500 border-gray-300 focus:ring-amber-500"
                                        type="radio" name="commer_perwashroom" id="washroomYes" value="Yes" />
                                    <label class="text-gray-700" for="washroomYes">Yes</label>
                                </div>
                                <div class="flex items-center">
                                    <input class="w-4 h-4 mr-2 bg-amber-500 border-gray-300 focus:ring-amber-500"
                                        type="radio" name="commer_perwashroom" id="washroomNo" value="No" />
                                    <label class="text-gray-700" for="washroomNo">No</label>
                                </div>
                            </div>
                        </div>

                        <!-- Pantry/Cafeteria -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Pantry/Cafeteria</label>
                            <div class="flex items-center">
                                <div class="flex items-center mr-6">
                                    <input class="w-4 h-4 mr-2 text-amber-500 border-gray-300 focus:ring-amber-500"
                                        type="radio" name="commer_pantry" id="pantryDry" value="Dry">
                                    <label class="text-gray-700" for="pantryDry">Dry</label>
                                </div>
                                <div class="flex items-center mr-6">
                                    <input class="w-4 h-4 mr-2 text-amber-500 border-gray-300 focus:ring-amber-500"
                                        type="radio" name="commer_pantry" id="pantryWet" value="Wet">
                                    <label class="text-gray-700" for="pantryWet">Wet</label>
                                </div>
                                <div class="flex items-center mr-6">
                                    <input class="w-4 h-4 mr-2 text-amber-500 border-gray-300 focus:ring-amber-500"
                                        type="radio" name="commer_pantry" id="pantryNone" value="NA">
                                    <label class="text-gray-700" for="pantryNone">Not Available</label>
                                </div>
                                <span class="text-gray-500 cursor-help"
                                    title="Dry pantry is for storing and heating food. Wet pantry includes plumbing for washing dishes.">
                                    <i class="fas fa-circle-info"></i>
                                </span>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- this is the common section for all type Land/Plots ------------------------------------------>
                <div class="container hidden" id="plot-land-form">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="rounded-3 mb-4">
                                <h3 class="h4 fw-semibold text-dark mb-3 pb-2">
                                    Property <span class="text-saffron">Features</span>
                                </h3>

                                <!-- Property Details Section -->
                                <div class="mb-5">
                                    <div class="row mb-4">
                                        <!-- No of open sides -->
                                        <div class="col-md-6">
                                            <label class="form-label text-dark fw-medium">No of open sides</label>
                                            <select id="common_no_open_sides" name="common_no_open_sides"
                                                class="form-select focus-ring-amber hover-amber focus:ring-2 focus:ring-saffron  focus:border-saffron">
                                                <option selected>Select</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>

                                        <!-- Width of road facing the plot -->
                                        <div class="col-md-6">
                                            <label class="form-label text-dark fw-medium">Width of road facing the
                                                plot</label>
                                            <div class="row g-3">
                                                <div class="col-8">
                                                    <input type="number" step="0.1" name="common_w_road_facing"
                                                        class="form-control focus-ring-amber hover-amber"
                                                        placeholder="Enter road width">
                                                </div>
                                                <div class="col-4">
                                                    <div class="input-group">
                                                        <select class="form-select focus-ring-amber hover-amber" name="common_w_road_facing_unit">
                                                            <option selected value="Meters">Meters</option>
                                                            <option value="Feet">Feet</option>
                                                        </select>
                                                        <span class="input-group-text info-icon text-muted"
                                                            data-bs-toggle="tooltip"
                                                            title="Width of the road adjacent to the plot">
                                                            <i class="fas fa-circle-info"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <!-- Corner Plot -->
                                        <div class="col-md-4">
                                            <label class="form-label text-dark fw-medium d-block mb-3">Is this a corner
                                                plot?</label>
                                            <div class="d-flex gap-4 mr-100">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="common_cornerplot"
                                                        id="cornerYes" value="Yes"
                                                        style="background-color: #f59e0b; border-color: #f59e0b; box-shadow: 0 0 5px #f59e0b;"
                                                        checked>
                                                    <label class="form-check-label text-dark"
                                                        for="cornerYes">Yes</label>
                                                </div>
                                                <div class="form-check ">
                                                    <input class="form-check-input" type="radio" name="common_cornerplot"
                                                        id="cornerNo" value="No"
                                                        style=" background-color: #f59e0b; border-color: #f59e0b; box-shadow: 0 0 5px #f59e0b;"
                                                        checked>
                                                    <label class="form-check-label text-dark" for="cornerNo">No</label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Any Construction Done -->
                                        <div class="col-md-4">
                                            <label class="form-label text-dark fw-medium d-block mb-3">Any Construction
                                                done</label>
                                            <div class="d-flex gap-4">
                                                <div class="form-check">
                                                    <input
                                                        class="form-check-input checked:bg-saffron checked:border-saffron"
                                                        type="radio" name="common_construction" id="constructionYes" value="Yes"
                                                        style="background-color: #f59e0b; border-color: #f59e0b; box-shadow: 0 0 5px #f59e0b;"
                                                        checked>
                                                    <label class="form-check-label text-dark"
                                                        for="constructionYes">Yes</label>
                                                </div>
                                                <div class="form-check">
                                                    <input
                                                        class="form-check-input checked:bg-saffron checked:border-saffron"
                                                        type="radio" name="common_construction" id="constructionNo" value="No" style="background-color: #f59e0b;
                                                    border-color: #f59e0b; box-shadow: 0 0 5px #f59e0b;">
                                                    <label class="form-check-label text-dark"
                                                        for="constructionNo">No</label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Boundary Wall Made -->
                                        <div class="col-md-4">
                                            <label class="form-label text-dark fw-medium d-block mb-3">Boundary wall
                                                made</label>
                                            <div class="d-flex gap-4">
                                                <div class="form-check">
                                                    <input
                                                        class="form-check-input checked:bg-amber-500 checked:border-amber-500"
                                                        type="radio" name="common_boundaryWall" id="boundaryYes" value="Yes"
                                                        style="background-color: #f59e0b; border-color: #f59e0b; box-shadow: 0 0 5px #f59e0b;"
                                                        checked>
                                                    <label class="form-check-label text-dark"
                                                        for="boundaryYes">Yes</label>
                                                </div>
                                                <div class="form-check">
                                                    <input
                                                        class="form-check-input checked:bg-amber-500 checked:border-amber-500"
                                                        type="radio" name="common_boundaryWall" id="boundaryNo" value="No"
                                                        style="background-color: #f59e0b; border-color: #f59e0b; box-shadow: 0 0 5px #f59e0b;">
                                                    <label class="form-check-label text-dark"
                                                        for="boundaryNo">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="section-divider"></div> -->

                                <!-- Area Section -->
                                <div class="mb-5">
                                    <h5 class="text-dark fw-medium mb-4">Area <span
                                            class="text-saffron">Information</span></h5>

                                    <div class="row mb-4">

                                        <!-- Plot Area -->
                                        <div class="col-md-6">
                                            <label class="form-label text-dark fw-medium">Plot/Land Area</label>
                                            <div class="row g-3">
                                                <div class="col-8">
                                                    <input type="number" name="common_plotland_area"
                                                        class="form-control focus-ring-amber hover-amber"
                                                        placeholder="Enter plot area">
                                                </div>
                                                <div class="col-4">
                                                    <div class="input-group">
                                                        <select class="form-select focus-ring-amber hover-amber" name="common_plotland_area_unit">
                                                            <option value="Sq-ft">Sq-ft</option>
                                                            <option value="Sq-m">Sq-m</option>
                                                            <option value="Sq-yrd">Sq-yrd</option>
                                                            <option value="Acres">Acres</option>
                                                            <option value="Hectares">Hectares</option>
                                                        </select>
                                                        <span class="input-group-text info-icon text-muted"
                                                            data-bs-toggle="tooltip" title="Total area of the plot">
                                                            <i class="fas fa-circle-info"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row mb-4">
                                        <!-- Plot Length -->
                                        <div class="col-md-6">
                                            <label class="form-label text-dark fw-medium">
                                                Plot/Land Length <span class="text-muted"></span>
                                            </label>
                                            <div class="row g-3">
                                                <div class="col-8">
                                                    <input type="number" name="common_plotland_length"
                                                        class="form-control focus-ring-amber hover-amber"
                                                        placeholder="Enter plot length">
                                                </div>
                                                <div class="col-4">
                                                    <div class="input-group">
                                                        <select class="form-select focus-ring-amber hover-amber" name="common_plotland_length_unit">
                                                            <option value="ft">ft</option>
                                                            <option value="m">m</option>
                                                            <option value="yrd">yrd</option>
                                                        </select>
                                                        <span class="input-group-text info-icon text-muted"
                                                            data-bs-toggle="tooltip" title="Length of the plot">
                                                            <i class="fas fa-circle-info"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Plot Breadth -->
                                        <div class="col-md-6">
                                            <label class="form-label text-dark fw-medium">
                                                Plot/Land Breadth <span class="text-muted"></span>
                                            </label>
                                            <div class="row g-3">
                                                <div class="col-8">
                                                    <input type="number" name="common_plotland_breath"
                                                        class="form-control focus-ring-amber hover-amber"
                                                        placeholder="Enter plot breadth">
                                                </div>
                                                <div class="col-4">
                                                    <div class="input-group">
                                                        <select class="form-select focus-ring-amber hover-amber" name="common_plotland_breath_unit">
                                                            <option value="ft">ft</option>
                                                            <option value="m">m</option>
                                                            <option value="yrd">yrd</option>
                                                        </select>
                                                        <span class="input-group-text info-icon text-muted"
                                                            data-bs-toggle="tooltip" title="Width/breadth of the plot">
                                                            <i class="fas fa-circle-info"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                <!-- Currently Leased out -->
                <div class="col-md-4">
                    <label class="form-label text-dark fw-medium d-block mb-3">Currently Leased out</label>
                    <div class="d-flex gap-4 mb-4">
                        <div class="form-check">
                            <input class="form-check-input checked:bg-amber-500 checked:border-amber-500" type="radio"
                                name="currleasedout" value="Yes"
                                style="background-color: #f59e0b; border-color: #f59e0b; box-shadow: 0 0 5px #f59e0b;"
                                checked>
                            <label class="form-check-label text-dark" for="boundaryYes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input checked:bg-amber-500 checked:border-amber-500" type="radio"
                                name="currleasedout" value="No"
                                style="background-color: #f59e0b; border-color: #f59e0b; box-shadow: 0 0 5px #f59e0b;">
                            <label class="form-check-label text-dark" for="boundaryNo">No</label>
                        </div>
                    </div>
                </div>

                <h3 class="text-xl font-heading font-semibold text-slate mb-4">Price<span
                        class="text-saffron">Details</span>
                </h3>

                <!-- Price Details -->
                <div class="mb-4">
                    <label class="form-label text-dark fw-medium">Expected Price</label>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="number" id="expect-price" name="expect-price" class="form-control focus-ring-amber hover-amber"
                                placeholder="Enter your expected price ">
                        </div>
                    </div>
                </div>

                <h3 class="text-xl font-heading font-semibold text-slate mb-4">Upload <span
                        class="text-saffron">Photos</span>
                </h3>

                <div id="photo-container" class="flex flex-wrap gap-4">
                    <!-- Add Photo Tile -->
                    <div id="add-photo-tile"
                        class="w-40 h-48 border-2 border-dashed border-gray-300 flex flex-col items-center justify-center text-gray-500 cursor-pointer hover:border-saffron"
                        onclick="triggerPhotoPicker()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Add more photos</span>
                    </div>
                </div>

                <!-- Hidden file input -->
                <input type="file" id="photoInput" accept="image/*" class="hidden" multiple onchange="handlePhotoSelect(event)">



                <div class="flex justify-end mt-4">
                    <button type="button" onclick="submitResidentialProperty()"
                        class="bg-saffron hover:bg-amber-600 text-white font-semibold py-2 px-6 rounded-md shadow-sm hover:shadow-md transition duration-300 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-1 ">
                        Post Property
                    </button>
                </div>

            </form>
        </div>
    </div>



    @push('script')
    <!-- external postproperty script -->
    <script src="{{asset('js/postproperty.js')}}"></script>
    <script>
        var PropertyChoosen;
    </script>
    <!-- JavaScript for interactions -->
    <!-- <script>
        document.getElementById('property-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Form submitted successfully!');
        });     
        document.querySelectorAll('button[type="button"]').forEach(button => {
            button.addEventListener('click', function() {
                
                const siblings = Array.from(this.parentElement.children).filter(el => el.tagName ===
                    'BUTTON');
              
                if (this.classList.contains('bg-amber-50')) {
                    this.classList.remove('bg-amber-50', 'border-amber-500');
                } else {
                    
                    siblings.forEach(sib => {
                        sib.classList.remove('bg-amber-50', 'border-amber-500');
                    });
                  
                    this.classList.add('bg-amber-50', 'border-amber-500');
                }
            });
        });

        document.querySelectorAll('.grid.grid-cols-2 > div').forEach(option => {
            option.addEventListener('click', function() {
                this.classList.toggle('bg-amber-50');
                this.classList.toggle('border-amber-500');
            });
        });
    </script> -->









    <!----------------------- land/plot common form ------------------------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Add smooth focus transitions
        document.querySelectorAll('input, select').forEach(element => {
            element.addEventListener('focus', function() {
                this.style.transition = 'all 0.3s ease';
            });
        });
    </script>




    <!-- script for open residential , commercial and plotland forms on clicking the button -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const buttons = {
                residential: document.getElementById('residential-btn'),
                commercial: document.getElementById('commercial-btn'),
                plotland: document.getElementById('plotland-btn'),
            };

            const optionBlocks = {
                residential: document.getElementById('residential-options'),
                commercial: document.getElementById('commercial-options'),
                plotland: document.getElementById('plotland-options'),
            };

            const forms = {
                residential: document.getElementById('residential-common-form'),
                commercial: document.getElementById('commercial-common-form'),
                plotland: document.getElementById('plot-land-form'),
            };

            const allButtons = document.querySelectorAll('.property-type-btn');
            const allOptionBlocks = document.querySelectorAll('.property-sub-options');
            let activeCategory = 'residential'; // default

            function disableFormFields(form) {
                if (!form) return;
                form.querySelectorAll('input, select, textarea, button[type="submit"]').forEach(field => {
                    // console.log("field");

                    field.disabled = true;
                    if (field.name) {
                        // console.log("removing name");
                        field.dataset.originalName = field.name;
                        field.removeAttribute('name');
                    }
                    field.style.opacity = '0.5';
                    field.style.pointerEvents = 'none';
                });
            }

            function enableFormFields(form) {
                if (!form) return;
                form.querySelectorAll('input, select, textarea, button[type="submit"]').forEach(field => {
                    field.disabled = false;
                    if (field.dataset.originalName) {
                        field.name = field.dataset.originalName;
                    }
                    field.style.opacity = '1';
                    field.style.pointerEvents = 'auto';
                });
            }

            function showCategory(type) {
                activeCategory = type;
                PropertyChoosen = type;

                // Deactivate all buttons and hide all option blocks
                allButtons.forEach(btn => btn.classList.remove('active'));
                allOptionBlocks.forEach(block => block.classList.add('hidden'));

                // Disable all forms and hide them
                Object.entries(forms).forEach(([formType, form]) => {
                    // console.log(formType);
                    // console.log(form);
                    if (!form) return;
                    if (formType === type) {
                        form.style.display = 'block';
                        enableFormFields(form);
                    } else {
                        form.style.display = 'none';
                        disableFormFields(form);
                    }
                });

                // Show correct options and activate button
                if (buttons[type]) buttons[type].classList.add('active');
                if (optionBlocks[type]) optionBlocks[type].classList.remove('hidden');
            }

            // Prevent submission of non-active forms
            Object.entries(forms).forEach(([formType, form]) => {
                if (!form) return;
                form.addEventListener('submit', function(e) {
                    if (formType !== activeCategory) {
                        e.preventDefault();
                        alert(`Only the "${activeCategory}" form is allowed to submit.`);
                    }
                });
            });

            // Attach event listeners to category buttons
            buttons.residential?.addEventListener('click', () => showCategory('residential'));
            buttons.commercial?.addEventListener('click', () => showCategory('commercial'));
            buttons.plotland?.addEventListener('click', () => showCategory('plotland'));

            // Initialize with default category
            showCategory('residential');
        });
    </script>







    <!-- pincode api -->
    <script>
        document.getElementById("pincode").addEventListener("blur", function() {
            const pincode = this.value.trim();
            if (pincode.length === 6) {
                fetch(`https://api.postalpincode.in/pincode/${pincode}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data[0].Status === "Success") {
                            const postOffice = data[0].PostOffice[0];
                            document.getElementById("city").value = postOffice.District;
                            document.getElementById("state").value = postOffice.State;
                        } else {
                            alert("Invalid Pincode. Please check again.");
                            document.getElementById("city").value = "";
                            document.getElementById("state").value = "";
                        }
                    })
                    .catch(error => {
                        console.error("Error fetching pincode data:", error);
                        showToast('Error', 'Something went wrong. Please try again later.', 'bx bx-error', 'bg-danger');
                    });
            } else {
                showToast('Error', 'Please enter a valid 6-digit pincode.', 'bx bx-error', 'bg-danger');
            }
        });
    </script>


    <!-- script for add photos ------------------------------------------------------------->
    <script>
        let selectedPhotos = []; // Final processed (compressed) images

        function triggerPhotoPicker() {
            document.getElementById('photoInput').click();
        }

        function handlePhotoSelect(event) {
            const files = event.target.files;
            if (!files || files.length === 0) return;

            const photoContainer = document.getElementById("photo-container");
            const addTile = document.getElementById("add-photo-tile");

            Array.from(files).forEach(async (file) => {
                // Show loading tile first
                const tile = document.createElement("div");
                tile.className = "w-40 h-48 border border-gray-200 rounded-md p-2 bg-white shadow-sm relative flex flex-col justify-center items-center text-gray-400 text-xs";
                tile.innerHTML = `<span>Processing...</span>`;
                photoContainer.insertBefore(tile, addTile);

                const resizedFile = await resizeImageTo1to5MB(file);

                // Show final preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    tile.innerHTML = `
                <div class="absolute top-1 left-1"></div>
                <img src="${e.target.result}" class="mx-auto mt-5 h-24 w-32 object-cover" />
                <div class="flex justify-between items-center mt-2">
                    <button class="text-xs text-red-500 hover:underline remove-photo-btn">Remove</button>
                    <span class="text-[10px] text-gray-500">Under Screening</span>
                </div>
            `;
                    bindRemoveButtons();
                };
                reader.readAsDataURL(resizedFile);

                selectedPhotos.push(resizedFile);
            });

            event.target.value = ''; // allow re-selection of same file
        }

        function bindRemoveButtons() {
            const removeButtons = document.querySelectorAll('.remove-photo-btn');
            removeButtons.forEach((btn, index) => {
                btn.onclick = function() {
                    const photoTile = this.closest('div.w-40');
                    if (photoTile) {
                        photoTile.remove();
                        selectedPhotos.splice(index, 1);
                    }
                };
            });
        }

        // 🔧 Resize + compress image to 1MB–5MB range
        async function resizeImageTo1to5MB(file) {
            const MAX_WIDTH = 1200;
            const MIN_MB = 1;
            const MAX_MB = 5;

            const toMB = (size) => (size / (1024 * 1024)).toFixed(2);

            console.log(`🔹 Original: ${file.name}, size = ${toMB(file.size)} MB`);

            return new Promise((resolve) => {
                const img = new Image();
                const reader = new FileReader();

                reader.onload = function(e) {
                    img.src = e.target.result;
                };

                img.onload = function() {
                    const canvas = document.createElement('canvas');
                    const scale = Math.min(MAX_WIDTH / img.width, 1); // Resize if wider than max
                    canvas.width = img.width * scale;
                    canvas.height = img.height * scale;

                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                    let quality = 0.9;

                    function compress() {
                        canvas.toBlob(async function(blob) {
                            const sizeMB = blob.size / (1024 * 1024);

                            if ((sizeMB >= MIN_MB && sizeMB <= MAX_MB) || quality < 0.4) {
                                console.log(`✅ Resized: ${file.name}, size = ${toMB(blob.size)} MB`);
                                resolve(new File([blob], file.name, {
                                    type: file.type
                                }));
                            } else {
                                quality -= 0.1;
                                compress();
                            }
                        }, file.type, quality);
                    }

                    compress();
                };

                reader.readAsDataURL(file);
            });
        }
    </script>





    <script>
        function submitResidentialProperty() {

            const formData = new FormData();
            let propertyCategory = '';

            const selectedUnit = document.querySelector('select[name="common_plotland_breath_unit"]')?.value;
            console.log("Selected breadth unit:", selectedUnit);

            if (PropertyChoosen == 'residential') {
                propertyCategory = 'residential';
                formData.append('property_category', propertyCategory);
                formData.append('want_for', document.querySelector('input[name="intent"]:checked')?.value);
                formData.append('res_property_type_hidden', document.querySelector('input[name="res-property-type_hidden"]')?.value);
                formData.append('pincode', document.getElementById('pincode').value);
                formData.append('city', document.getElementById('city').value);
                formData.append('state', document.getElementById('state').value);
                formData.append('address', document.getElementById('address').value);
                formData.append('possession_status', document.querySelector('input[name="possession-status"]:checked')?.value);

                formData.append('res_plot_area', document.getElementById('res-plot-area').value);
                formData.append('res_plot_area_unit', document.getElementById('res-plot-area-unit').value);
                formData.append('res_super_area', document.getElementById('res-super-area').value);
                formData.append('res_super_area_unit', document.getElementById('res-super-area-unit').value);
                formData.append('res_bedrooms', document.querySelector('input[name="res-bedrooms"]:checked')?.value);
                formData.append('res_balconies', document.querySelector('input[name="res-balconies"]:checked')?.value);
                formData.append('res_rooms', document.querySelector('input[name="res-rooms"]:checked')?.value);
                formData.append('res_total_floors', document.querySelector('input[name="res-total-floors"]:checked')?.value);
                formData.append('res_furnished', document.querySelector('input[name="res-furnished"]:checked')?.value);
                formData.append('res_bathrooms', document.querySelector('input[name="res-bathrooms"]:checked')?.value);
                formData.append('res_no_open_sides', document.getElementById('res-no-open-sides').value);
                formData.append('res_road_facing_plot', document.getElementById('res-road-facing-plot').value);
                formData.append('res_road_facing_plot_unit', document.getElementById('res-road-facing-plot-unit').value);

                formData.append('currleasedout', document.querySelector('input[name="currleasedout"]:checked')?.value);
                formData.append('expect_price', document.getElementById('expect-price').value);

            }



            // for commercial form 
            if (PropertyChoosen == 'commercial') {

                propertyCategory = 'commercial';

                formData.append('property_category', propertyCategory);
                formData.append('want_for', document.querySelector('input[name="intent"]:checked')?.value);
                formData.append('commer_property_type', document.querySelector('input[name="commer-property-type-hidden"]')?.value);
                formData.append('pincode', document.getElementById('pincode').value);
                formData.append('city', document.getElementById('city').value);
                formData.append('state', document.getElementById('state').value);
                formData.append('address', document.getElementById('address').value);
                formData.append('possession_status', document.querySelector('input[name="possession-status"]:checked')?.value);

                formData.append('commer_plot_area', document.getElementById('commer-plot-area').value);
                formData.append('commer_plot_area_unit', document.getElementById('commer-plot-area-unit').value);
                formData.append('commer_super_area', document.getElementById('commer-super-area').value);
                formData.append('commer_super_area_unit', document.getElementById('commer-super-area-unit').value);
                formData.append('commer_floor_no', document.querySelector('input[name="commer_floor_no"]:checked')?.value);
                formData.append('commer_total_floor', document.querySelector('input[name="commer_total_floor"]:checked')?.value);
                formData.append('commer_furnished_status', document.querySelector('input[name="commer_furnished_status"]:checked')?.value);
                formData.append('commer_washrooms', document.querySelector('input[name="commer_washrooms"]:checked')?.value);
                formData.append('commer_perwashroom', document.querySelector('input[name="commer_perwashroom"]:checked')?.value);
                formData.append('commer_pantry', document.querySelector('input[name="commer_pantry"]:checked')?.value);

                formData.append('currleasedout', document.querySelector('input[name="currleasedout"]:checked')?.value);
                formData.append('expect_price', document.getElementById('expect-price').value);
            }


            // for common form
            if (PropertyChoosen == 'plotland') {

                propertyCategory = 'plotland';

                formData.append('property_category', propertyCategory);

                formData.append('want_for', document.querySelector('input[name="intent"]:checked')?.value);
                formData.append('plotland_property_type', document.querySelector('input[name="plotland-property-type-hidden"]')?.value);
                formData.append('pincode', document.getElementById('pincode').value);
                formData.append('city', document.getElementById('city').value);
                formData.append('state', document.getElementById('state').value);
                formData.append('address', document.getElementById('address').value);
                formData.append('possession_status', document.querySelector('input[name="possession-status"]:checked')?.value);

                formData.append('common_no_open_sides', document.querySelector('select[name="common_no_open_sides"]')?.value);
                formData.append('common_w_road_facing', document.querySelector('input[name="common_w_road_facing"]')?.value);
                formData.append('common_w_road_facing_unit', document.querySelector('select[name="common_w_road_facing_unit"]')?.value);
                formData.append('common_cornerplot', document.querySelector('input[name="common_cornerplot"]')?.value);
                formData.append('common_construction', document.querySelector('input[name="common_construction"]')?.value);
                formData.append('common_boundaryWall', document.querySelector('input[name="common_boundaryWall"]')?.value);
                formData.append('common_plotland_area', document.querySelector('input[name="common_plotland_area"]')?.value);
                formData.append('common_plotland_area_unit', document.querySelector('select[name="common_plotland_area_unit"]')?.value);
                formData.append('common_plotland_length', document.querySelector('input[name="common_plotland_length"]')?.value);
                formData.append('common_plotland_length_unit', document.querySelector('select[name="common_plotland_length_unit"]')?.value);
                formData.append('common_plotland_breath', document.querySelector('input[name="common_plotland_breath"]')?.value);
                formData.append('common_plotland_breath_unit', document.querySelector('select[name="common_plotland_breath_unit"]')?.value);

                formData.append('currleasedout', document.querySelector('input[name="currleasedout"]:checked')?.value);
                formData.append('expect_price', document.getElementById('expect-price').value);
            }

            for (let i = 0; i < selectedPhotos.length; i++) {
                formData.append('photos[]', selectedPhotos[i]);
            }

            for (let pair of formData.entries()) {
                console.log(pair[0], pair[1]);
            }

            fetch('/submit-residential-property', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => console.log(response.json())) // FIXED THIS LINE
                .then(data => {
                    console.log(data);
                    // showToast('Success', data.message, 'bx bx-check-circle', 'bg-saffron');
                    alert('Property Posted successfully!');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to Post property!');
                    //  showToast('Success', 'Failed to Post property!', 'bx bx-check-circle', 'bg-red');
                });

        }
    </script>
    @endpush

</body>
@endsection