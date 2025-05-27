<head>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
</head>
@extends('layouts/users/app')

<body class="font-sans text-slate bg-gray-50">


    <section class="relative flex justify-center items-center text-center h-[50vh] overflow-hidden">
        <!-- Video Background with Overlay -->
        <div class="absolute top-0 left-0 w-full h-full">
            <video autoplay muted loop playsinline class="object-cover w-full h-full">
                <source src="{{asset('videos/postproperty3.mp4')}}" type="video/mp4">
                <!-- Fallback image in case video doesn't load -->
                <img src="/api/placeholder/1920/600" alt="Post Your Property" class="object-cover w-full h-full">
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
                            <input type="radio" name="intent" value="sell" class="peer hidden" checked>
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
                            <input type="radio" name="intent" value="rent" class="peer hidden">
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
                        <label class="cursor-pointer">
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
                        </label>
                    </div>
                </div>


                <!-- Property Category Selection -->
                <div class="mb-8">
                    <label class="block text-gray-700 font-medium mb-3">Property Category</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <button type="button" id="residential-btn"
                            class="property-type-btn active flex items-center justify-center px-4 py-3 border-2 rounded-md border-gray-200 hover:border-saffron transition-all">
                            <i class="fas fa-home mr-2"></i>
                            <span>Residential</span>
                        </button>
                        <button type="button" id="commercial-btn"
                            class="property-type-btn flex items-center justify-center px-4 py-3 border-2 rounded-md border-gray-200 hover:border-saffron transition-all">
                            <i class="fas fa-building mr-2"></i>
                            <span>Commercial</span>
                        </button>
                        <!-- <button type="button" id="agricultural-btn"
                            class="property-type-btn flex items-center justify-center px-4 py-3 border-2 rounded-md border-gray-200 hover:border-saffron transition-all">
                            <i class="fas fa-tree mr-2"></i>
                            <span>Agricultural</span>
                        </button> -->
                    </div>

                    <!-- Residential Sub-options -->
                    <div id="residential-options" class="property-sub-options">
                        <label class="block text-gray-700 text-sm mb-2">Property Type</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-7 gap-3">
                            @foreach($ResidentialProperty as $Rtype)
                            <div class="sub-property-option  residential-option h-20 active border rounded-md p-3 cursor-pointer hover:bg-saffron/8 transition-all text-center"
                                data-res-type="{{ strtolower($Rtype->property_type) }}">
                                <div class="text-saffron mb-1"><i class="fas {{ $Rtype->icon_class }}"></i></div>
                                <span class="text-sm">{{$Rtype->property_type}}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Commercial Sub-options (Hidden by default) -->
                    <div id="commercial-options" class="property-sub-options hidden">
                        <label class="block text-gray-700 text-sm mb-2">Property Category</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-7 gap-3">
                            @foreach($CommercialProperty as $Ctype)
                            <div class="sub-property-option commercial-option border rounded-md p-3 cursor-pointer hover:bg-saffron/5 transition-all text-center"
                                data-com-type="{{ strtolower($Ctype->property_type) }}">
                                <div class="text-saffron mb-1">
                                    <i class="fas {{ $Ctype->icon_class }}"></i>
                                </div>
                                <span class="text-sm">{{$Ctype->property_type}}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Agricultural Sub-options (Hidden by default) -->
                    <!-- <div id="agricultural-options" class="property-sub-options hidden">
                        <label class="block text-gray-700 text-sm mb-2">Property Category</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-7 gap-3">
                            <div
                                class="sub-property-option border rounded-md p-3 cursor-pointer hover:bg-saffron/5 transition-all text-center">
                                <div class="text-saffron mb-1"><i class="fas fa-seedling"></i></div>
                                <span class="text-sm">Agricultural Land</span>
                            </div>
                            <div
                                class="sub-property-option border rounded-md p-3 cursor-pointer hover:bg-saffron/5 transition-all text-center">
                                <div class="text-saffron mb-1"><i class="fas fa-tractor"></i></div>
                                <span class="text-sm">Farm House</span>
                            </div>
                            <div
                                class="sub-property-option border rounded-md p-3 cursor-pointer hover:bg-saffron/5 transition-all text-center">
                                <div class="text-saffron mb-1"><i class="fas fa-tree"></i></div>
                                <span class="text-sm">Plantation</span>
                            </div>
                        </div>
                    </div> -->
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
                                placeholder="Enter city">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="state" class="block text-gray-700 text-sm font-medium mb-2">State <span
                                    class="text-amber-500">*</span></label>
                            <input type="text" id="state" name="state"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-saffron focus:border-transparent"
                                placeholder="Enter state name">
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
                                    <input type="number" placeholder="Plot Area"
                                        class="w-full p-3 border border-saffron rounded-md focus:outline-none focus:ring-2 focus:ring-saffron focus:border-saffron">
                                    <div class="relative w-32">
                                        <select
                                            class="appearance-none w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-saffron focus:border-saffron">
                                            <option>Sq-ft</option>
                                            <option>Sq-m</option>
                                            <option>Acres</option>
                                            <option>Hectares</option>
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
                                    <input type="number" placeholder="Super Area"
                                        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-saffron focus:border-saffron">
                                    <div class="relative w-32">
                                        <select
                                            class="appearance-none w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-saffron focus:border-saffron">
                                            <option>Sq-ft</option>
                                            <option>Sq-m</option>
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

                                    <label>
                                        <input type="radio" name="bedrooms" value="1" class="peer hidden" checked>
                                        <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                        peer-checked:bg-amber-50 peer-checked:border-amber-500 peer-checked:text-amber-600 
                                        hover:bg-amber-50 hover:border-amber-500 transition-all">
                                            1
                                        </span>
                                    </label>

                                    <label>
                                        <input type="radio" name="bedrooms" value="2" class="peer hidden">
                                        <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                        peer-checked:bg-amber-50 peer-checked:border-amber-500 peer-checked:text-amber-600 
                                        hover:bg-amber-50 hover:border-amber-500 transition-all">
                                            2
                                        </span>
                                    </label>

                                    <label>
                                        <input type="radio" name="bedrooms" value="3" class="peer hidden">
                                        <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                         peer-checked:bg-amber-50 peer-checked:border-amber-500 peer-checked:text-amber-600 
                                         hover:bg-amber-50 hover:border-amber-500 transition-all">
                                            3
                                        </span>
                                    </label>

                                    <label>
                                        <input type="radio" name="bedrooms" value="4" class="peer hidden">
                                        <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                         peer-checked:bg-amber-50 peer-checked:border-amber-500 peer-checked:text-amber-600 
                                         hover:bg-amber-50 hover:border-amber-500 transition-all">
                                            4
                                        </span>
                                    </label>

                                    <label>
                                        <input type="radio" name="bedrooms" value="5+" class="peer hidden">
                                        <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                         peer-checked:bg-amber-50 peer-checked:border-amber-500 peer-checked:text-amber-600 
                                         hover:bg-amber-50 hover:border-amber-500 transition-all">
                                            5+
                                        </span>
                                    </label>

                                </div>
                            </div>


                            <!-- Balconies -->
                            <div>
                                <label class="block text-gray-700 text-sm mb-2">Balconies</label>
                                <div class="flex flex-wrap gap-2">

                                    <label>
                                        <input type="radio" name="balconies" value="1" class="peer hidden" checked>
                                        <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                         peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron 
                                         hover:bg-saffron/5 hover:border-saffron transition-all">
                                            1
                                        </span>
                                    </label>

                                    <label>
                                        <input type="radio" name="balconies" value="2" class="peer hidden">
                                        <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                        peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron 
                                        hover:bg-saffron/5 hover:border-saffron transition-all">
                                            2
                                        </span>
                                    </label>

                                    <label>
                                        <input type="radio" name="balconies" value="3+" class="peer hidden">
                                        <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                         peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron 
                                         hover:bg-saffron/5 hover:border-saffron transition-all">
                                            3+
                                        </span>
                                    </label>

                                </div>
                            </div>


                            <!-- Total rooms -->

                            <div>
                                <div>
                                    <label class="block text-gray-700 text-sm mb-2">Total rooms</label>
                                    <div class="flex flex-wrap gap-2">
                                        <label>
                                            <input type="radio" name="rooms" value="1" class="peer hidden" checked>
                                            <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                            peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron 
                                            hover:bg-saffron/5 hover:border-saffron transition-all">
                                                1
                                            </span>
                                        </label>

                                        <label>
                                            <input type="radio" name="rooms" value="2" class="peer hidden">
                                            <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                            peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron 
                                            hover:bg-saffron/5 hover:border-saffron transition-all">
                                                2
                                            </span>
                                        </label>

                                        <label>
                                            <input type="radio" name="rooms" value="3" class="peer hidden">
                                            <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                       peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron 
                                        hover:bg-saffron/5 hover:border-saffron transition-all">
                                                3
                                            </span>
                                        </label>

                                        <label>
                                            <input type="radio" name="rooms" value="4" class="peer hidden">
                                            <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                    peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron 
                                      hover:bg-saffron/5 hover:border-saffron transition-all">
                                                4
                                            </span>
                                        </label>

                                        <label>
                                            <input type="radio" name="rooms" value="5" class="peer hidden">
                                            <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                        peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron 
                                     hover:bg-saffron/5 hover:border-saffron transition-all">
                                                5
                                            </span>
                                        </label>

                                        <label>
                                            <input type="radio" name="rooms" value="6" class="peer hidden">
                                            <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                      peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron 
                                        hover:bg-saffron/5 hover:border-saffron transition-all">
                                                6
                                            </span>
                                        </label>

                                        <label>
                                            <input type="radio" name="rooms" value="7" class="peer hidden">
                                            <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                      peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron 
                                    hover:bg-saffron/5 hover:border-saffron transition-all">
                                                7
                                            </span>
                                        </label>

                                        <label>
                                            <input type="radio" name="rooms" value="8" class="peer hidden">
                                            <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                     peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron 
                                             hover:bg-saffron/5 hover:border-saffron transition-all">
                                                8
                                            </span>
                                        </label>

                                        <label>
                                            <input type="radio" name="rooms" value="9+" class="peer hidden">
                                            <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                      peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron 
                                      hover:bg-saffron/5 hover:border-saffron transition-all">
                                                9+
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- Total Floors -->




                            <!-- Total Floors -->
                            <div>
                                <div>
                                    <label class="block text-gray-700 text-sm mb-2">Total Floors</label>
                                    <div class="flex flex-wrap gap-2">
                                        <label>
                                            <input type="radio" name="floor" value="1" class="peer hidden" checked>
                                            <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                            peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron 
                                            hover:bg-saffron/5 hover:border-saffron transition-all">
                                                1
                                            </span>
                                        </label>

                                        <label>
                                            <input type="radio" name="floor" value="2" class="peer hidden">
                                            <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                            peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron 
                                            hover:bg-saffron/5 hover:border-saffron transition-all">
                                                2
                                            </span>
                                        </label>

                                        <label>
                                            <input type="radio" name="floor" value="3" class="peer hidden">
                                            <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                            peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron 
                                            hover:bg-saffron/5 hover:border-saffron transition-all">
                                                3
                                            </span>
                                        </label>

                                        <label>
                                            <input type="radio" name="floor" value="4" class="peer hidden">
                                            <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                            peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron 
                                            hover:bg-saffron/5 hover:border-saffron transition-all">
                                                4
                                            </span>
                                        </label>

                                        <label>
                                            <input type="radio" name="floor" value="5" class="peer hidden">
                                            <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                            peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron 
                                           hover:bg-saffron/5 hover:border-saffron transition-all">
                                                5
                                            </span>
                                        </label>

                                        <label>
                                            <input type="radio" name="floor" value="6" class="peer hidden">
                                            <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                            peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron 
                                              hover:bg-saffron/5 hover:border-saffron transition-all">
                                                6
                                            </span>
                                        </label>

                                        <label>
                                            <input type="radio" name="floor" value="7" class="peer hidden">
                                            <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                            peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron 
                                            hover:bg-saffron/5 hover:border-saffron transition-all">
                                                7
                                            </span>
                                        </label>

                                        <label>
                                            <input type="radio" name="floor" value="8" class="peer hidden">
                                            <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                            peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron 
                                            hover:bg-saffron/5 hover:border-saffron transition-all">
                                                8
                                            </span>
                                        </label>

                                        <label>
                                            <input type="radio" name="floor" value="9+" class="peer hidden">
                                            <span class="px-4 py-2 border rounded-md cursor-pointer border-gray-300 
                                            peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron 
                                            hover:bg-saffron/5 hover:border-saffron transition-all">
                                                9+
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <!-- Furnished Status -->
                            <div>
                                <label class="block text-gray-700 text-sm mb-2">Furnished Status</label>
                                <div class="flex flex-wrap gap-2">
                                    <!-- Furnished -->
                                    <label>
                                        <input type="radio" name="furnished" value="furnished" class="peer hidden"
                                            checked>
                                        <span class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                         peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron
                                         hover:bg-saffron/5 hover:border-saffron transition-all">
                                            Furnished
                                        </span>
                                    </label>

                                    <!-- Unfurnished -->
                                    <label>
                                        <input type="radio" name="furnished" value="unfurnished" class="peer hidden">
                                        <span class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                         peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron
                                         hover:bg-saffron/5 hover:border-saffron transition-all">
                                            Unfurnished
                                        </span>
                                    </label>

                                    <!-- Semi-Furnished -->
                                    <label>
                                        <input type="radio" name="furnished" value="semi-furnished" class="peer hidden">
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
                                    <label>
                                        <input type="radio" name="bathrooms" value="1" class="peer hidden" checked>
                                        <span class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                        peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron
                                        hover:bg-saffron/5 hover:border-saffron transition-all">
                                            1
                                        </span>
                                    </label>

                                    <label>
                                        <input type="radio" name="bathrooms" value="2" class="peer hidden">
                                        <span class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                        peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron
                                        hover:bg-saffron/5 hover:border-saffron transition-all">
                                            2
                                        </span>
                                    </label>

                                    <label>
                                        <input type="radio" name="bathrooms" value="3+" class="peer hidden">
                                        <span class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                        peer-checked:bg-saffron/10 peer-checked:border-saffron peer-checked:text-saffron
                                        hover:bg-saffron/5 hover:border-saffron transition-all">
                                            3+
                                        </span>
                                    </label>
                                </div>
                            </div>


                            <!-- No of open sides -->
                            <div>
                                <label class="block text-gray-700 text-sm mb-2">No of open sides</label>
                                <div class="relative">
                                    <select
                                        class="appearance-none w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-saffron focus:border-saffron">
                                        <option disabled selected>Select</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
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
                                    <input type="number" placeholder="Road width"
                                        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-saffron focus:border-saffron">
                                    <div class="relative w-32">
                                        <select
                                            class="appearance-none w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-saffron/50 focus:border-saffron">
                                            <option>Meters</option>
                                            <option>Feet</option>
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
                                        <input type="number" placeholder="Plot Area"
                                            class="w-full p-3 border border-saffron rounded-md focus:outline-none focus:ring-2 focus:ring-saffron focus:border-saffron">
                                        <div class="relative w-32">
                                            <select
                                                class="appearance-none w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-saffron focus:border-saffron">
                                                <option>Sq-ft</option>
                                                <option>Sq-m</option>
                                                <option>Acres</option>
                                                <option>Hectares</option>
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
                                        <input type="number" placeholder="Super Area"
                                            class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-saffron focus:border-saffron">
                                        <div class="relative w-32">
                                            <select
                                                class="appearance-none w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-saffron focus:border-saffron">
                                                <option>Sq-ft</option>
                                                <option>Sq-m</option>
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
                                    <input type="radio" name="floor_no" value="Lower Basement" class="peer hidden" />
                                    <span class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                     peer-checked:bg-amber-50 peer-checked:border-amber-500 peer-checked:text-amber-600
                                     hover:bg-amber-50 hover:border-amber-500 transition-all">
                                        Lower Basement
                                    </span>
                                </label>

                                <label>
                                    <input type="radio" name="floor_no" value="Upper Basement" class="peer hidden" />
                                    <span class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                    peer-checked:bg-amber-50 peer-checked:border-amber-500 peer-checked:text-amber-600
                                    hover:bg-amber-50 hover:border-amber-500 transition-all">
                                        Upper Basement
                                    </span>
                                </label>

                                <label>
                                    <input type="radio" name="floor_no" value="Ground" class="peer hidden" />
                                    <span class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                     peer-checked:bg-amber-50 peer-checked:border-amber-500 peer-checked:text-amber-600
                                     hover:bg-amber-50 hover:border-amber-500 transition-all">
                                        Ground
                                    </span>
                                </label>

                                <label>
                                    <input type="radio" name="floor_no" value="1" class="peer hidden" />
                                    <span class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                      peer-checked:bg-amber-50 peer-checked:border-amber-500 peer-checked:text-amber-600
                                     hover:bg-amber-50 hover:border-amber-500 transition-all">
                                        1
                                    </span>
                                </label>

                                <label>
                                    <input type="radio" name="floor_no" value="2" class="peer hidden" />
                                    <span class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                    peer-checked:bg-amber-50 peer-checked:border-amber-500 peer-checked:text-amber-600
                                    hover:bg-amber-50 hover:border-amber-500 transition-all">
                                        2
                                    </span>
                                </label>

                                <label>
                                    <input type="radio" name="floor_no" value="3" class="peer hidden" />
                                    <span class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                     peer-checked:bg-amber-50 peer-checked:border-amber-500 peer-checked:text-amber-600
                                     hover:bg-amber-50 hover:border-amber-500 transition-all">
                                        3
                                    </span>
                                </label>

                                <label>
                                    <input type="radio" name="floor_no" value="4" class="peer hidden" />
                                    <span class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                     peer-checked:bg-amber-50 peer-checked:border-amber-500 peer-checked:text-amber-600
                                     hover:bg-amber-50 hover:border-amber-500 transition-all">
                                        4
                                    </span>
                                </label>

                                <label>
                                    <input type="radio" name="floor_no" value="5" class="peer hidden" />
                                    <span class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                     peer-checked:bg-amber-50 peer-checked:border-amber-500 peer-checked:text-amber-600
                                     hover:bg-amber-50 hover:border-amber-500 transition-all">
                                        5
                                    </span>
                                </label>

                                <label>
                                    <input type="radio" name="floor_no" value="5+" class="peer hidden" />
                                    <span class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                    peer-checked:bg-amber-50 peer-checked:border-amber-500 peer-checked:text-amber-600
                                    hover:bg-amber-50 hover:border-amber-500 transition-all">
                                        5+
                                    </span>
                                </label>

                            </div>
                        </div>


                        <!-- Total Floors -->
                        <div class="mb-4">
                            <!-- <label class="block text-gray-700 font-medium mb-2">Total Floors</label> -->
                            <div class="mb-4">
                                <label class="block text-gray-700 font-medium mb-2">Total Floors</label>
                                <div class="flex flex-wrap gap-2">
                                    <label>
                                        <input type="radio" name="floor" value="1" class="sr-only peer" />
                                        <div class="peer-checked:bg-amber-100 peer-checked:border-amber-500 peer-checked:text-amber-600
                                        px-4 py-2 border border-gray-300 rounded-md cursor-pointer 
                                        hover:bg-amber-50 hover:border-amber-500">
                                            1
                                        </div>
                                    </label>
                                    <label>
                                        <input type="radio" name="floor" value="2" class="sr-only peer" />
                                        <div class="peer-checked:bg-amber-100 peer-checked:border-amber-500 peer-checked:text-amber-600
                                        px-4 py-2 border border-gray-300 rounded-md cursor-pointer 
                                        hover:bg-amber-50 hover:border-amber-500">
                                            2
                                        </div>
                                    </label>
                                    <label>
                                        <input type="radio" name="floor" value="3" class="sr-only peer" />
                                        <div class="peer-checked:bg-amber-100 peer-checked:border-amber-500 peer-checked:text-amber-600
                                         px-4 py-2 border border-gray-300 rounded-md cursor-pointer 
                                         hover:bg-amber-50 hover:border-amber-500">
                                            3
                                        </div>
                                    </label>
                                    <label>
                                        <input type="radio" name="floor" value="3" class="sr-only peer" />
                                        <div class="peer-checked:bg-amber-100 peer-checked:border-amber-500 peer-checked:text-amber-600
                                         px-4 py-2 border border-gray-300 rounded-md cursor-pointer 
                                         hover:bg-amber-50 hover:border-amber-500">
                                            4
                                        </div>
                                    </label>
                                    <label>
                                        <input type="radio" name="floor" value="3" class="sr-only peer" />
                                        <div class="peer-checked:bg-amber-100 peer-checked:border-amber-500 peer-checked:text-amber-600
                                         px-4 py-2 border border-gray-300 rounded-md cursor-pointer 
                                         hover:bg-amber-50 hover:border-amber-500">
                                            5
                                        </div>
                                    </label>
                                    <label>
                                        <input type="radio" name="floor" value="3" class="sr-only peer" />
                                        <div class="peer-checked:bg-amber-100 peer-checked:border-amber-500 peer-checked:text-amber-600
                                         px-4 py-2 border border-gray-300 rounded-md cursor-pointer 
                                         hover:bg-amber-50 hover:border-amber-500">
                                            6
                                        </div>
                                    </label>
                                    <label>
                                        <input type="radio" name="floor" value="3" class="sr-only peer" />
                                        <div class="peer-checked:bg-amber-100 peer-checked:border-amber-500 peer-checked:text-amber-600
                                         px-4 py-2 border border-gray-300 rounded-md cursor-pointer 
                                         hover:bg-amber-50 hover:border-amber-500">
                                            7
                                        </div>
                                    </label>
                                    <label>
                                        <input type="radio" name="floor" value="3" class="sr-only peer" />
                                        <div class="peer-checked:bg-amber-100 peer-checked:border-amber-500 peer-checked:text-amber-600
                                         px-4 py-2 border border-gray-300 rounded-md cursor-pointer 
                                         hover:bg-amber-50 hover:border-amber-500">
                                            8
                                        </div>
                                    </label>
                                    <label>
                                        <input type="radio" name="floor" value="3" class="sr-only peer" />
                                        <div class="peer-checked:bg-amber-100 peer-checked:border-amber-500 peer-checked:text-amber-600
                                         px-4 py-2 border border-gray-300 rounded-md cursor-pointer 
                                         hover:bg-amber-50 hover:border-amber-500">
                                            9
                                        </div>
                                    </label>
                                    <label>
                                        <input type="radio" name="floor" value="3" class="sr-only peer" />
                                        <div class="peer-checked:bg-amber-100 peer-checked:border-amber-500 peer-checked:text-amber-600
                                         px-4 py-2 border border-gray-300 rounded-md cursor-pointer 
                                         hover:bg-amber-50 hover:border-amber-500">
                                            10+
                                        </div>
                                    </label>
                                </div>
                            </div>

                        </div>

                        <!-- Furnished Status -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Furnished Status</label>
                            <div class="flex gap-2">
                                <!-- Furnished -->
                                <label>
                                    <input type="radio" name="furnished_status" value="Furnished"
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
                                    <input type="radio" name="furnished_status" value="Unfurnished"
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
                                    <input type="radio" name="furnished_status" value="Semi-Furnished"
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

                                <!-- Option 0 -->
                                <label>
                                    <input type="radio" name="washrooms" value="0" class="sr-only peer" />
                                    <div
                                        class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                     hover:bg-amber-50 hover:border-amber-500
                                     peer-checked:bg-amber-100 peer-checked:border-amber-500 peer-checked:text-amber-600">
                                        0
                                    </div>
                                </label>

                                <!-- Option 1 -->
                                <label>
                                    <input type="radio" name="washrooms" value="1" class="sr-only peer" />
                                    <div
                                        class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                     hover:bg-amber-50 hover:border-amber-500
                                     peer-checked:bg-amber-100 peer-checked:border-amber-500 peer-checked:text-amber-600">
                                        1
                                    </div>
                                </label>

                                <!-- Option 2 -->
                                <label>
                                    <input type="radio" name="washrooms" value="2" class="sr-only peer" />
                                    <div
                                        class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                     hover:bg-amber-50 hover:border-amber-500
                                     peer-checked:bg-amber-100 peer-checked:border-amber-500 peer-checked:text-amber-600">
                                        2
                                    </div>
                                </label>

                                <!-- Option 3 -->
                                <label>
                                    <input type="radio" name="washrooms" value="3" class="sr-only peer" />
                                    <div
                                        class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                     hover:bg-amber-50 hover:border-amber-500
                                     peer-checked:bg-amber-100 peer-checked:border-amber-500 peer-checked:text-amber-600">
                                        3
                                    </div>
                                </label>

                                <!-- Option 3+ -->
                                <label>
                                    <input type="radio" name="washrooms" value="3+" class="sr-only peer" />
                                    <div
                                        class="px-4 py-2 border border-gray-300 rounded-md cursor-pointer
                                    hover:bg-amber-50 hover:border-amber-500
                                    peer-checked:bg-amber-100 peer-checked:border-amber-500 peer-checked:text-amber-600">
                                        3+
                                    </div>
                                </label>

                            </div>
                        </div>



                        <!-- Personal Washroom -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Personal Washroom</label>
                            <div class="flex">
                                <div class="flex items-center mr-10">
                                    <input class="w-4 h-4 mr-2 bg-amber-500 border-gray-300 focus:ring-amber-500"
                                        type="radio" name="personalWashroom" id="washroomYes" />
                                    <label class="text-gray-700" for="washroomYes">Yes</label>
                                </div>
                                <div class="flex items-center">
                                    <input class="w-4 h-4 mr-2 bg-amber-500 border-gray-300 focus:ring-amber-500"
                                        type="radio" name="personalWashroom" id="washroomNo" />
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
                                        type="radio" name="pantry" id="pantryDry">
                                    <label class="text-gray-700" for="pantryDry">Dry</label>
                                </div>
                                <div class="flex items-center mr-6">
                                    <input class="w-4 h-4 mr-2 text-amber-500 border-gray-300 focus:ring-amber-500"
                                        type="radio" name="pantry" id="pantryWet">
                                    <label class="text-gray-700" for="pantryWet">Wet</label>
                                </div>
                                <div class="flex items-center mr-6">
                                    <input class="w-4 h-4 mr-2 text-amber-500 border-gray-300 focus:ring-amber-500"
                                        type="radio" name="pantry" id="pantryNone">
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
                                            <select
                                                class="form-select focus-ring-amber hover-amber focus:ring-2 focus:ring-saffron  focus:border-saffron">
                                                <option selected>Select</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </div>

                                        <!-- Width of road facing the plot -->
                                        <div class="col-md-6">
                                            <label class="form-label text-dark fw-medium">Width of road facing the
                                                plot</label>
                                            <div class="row g-3">
                                                <div class="col-8">
                                                    <input type="number" step="0.1"
                                                        class="form-control focus-ring-amber hover-amber"
                                                        placeholder="Enter road width">
                                                </div>
                                                <div class="col-4">
                                                    <div class="input-group">
                                                        <select class="form-select focus-ring-amber hover-amber">
                                                            <option selected>Meters</option>
                                                            <option>Feet</option>
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
                                                    <input class="form-check-input" type="radio" name="cornerPlot"
                                                        id="cornerYes"
                                                        style="background-color: #f59e0b; border-color: #f59e0b; box-shadow: 0 0 5px #f59e0b;"
                                                        checked>
                                                    <label class="form-check-label text-dark"
                                                        for="cornerYes">Yes</label>
                                                </div>
                                                <div class="form-check ">
                                                    <input class="form-check-input" type="radio" name="cornerPlot"
                                                        id="cornerNo"
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
                                                        type="radio" name="construction" id="constructionYes"
                                                        style="background-color: #f59e0b; border-color: #f59e0b; box-shadow: 0 0 5px #f59e0b;"
                                                        checked>
                                                    <label class="form-check-label text-dark"
                                                        for="constructionYes">Yes</label>
                                                </div>
                                                <div class="form-check">
                                                    <input
                                                        class="form-check-input checked:bg-saffron checked:border-saffron"
                                                        type="radio" name="construction" id="constructionNo" style="background-color: #f59e0b;
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
                                                        type="radio" name="boundaryWall" id="boundaryYes"
                                                        style="background-color: #f59e0b; border-color: #f59e0b; box-shadow: 0 0 5px #f59e0b;"
                                                        checked>
                                                    <label class="form-check-label text-dark"
                                                        for="boundaryYes">Yes</label>
                                                </div>
                                                <div class="form-check">
                                                    <input
                                                        class="form-check-input checked:bg-amber-500 checked:border-amber-500"
                                                        type="radio" name="boundaryWall" id="boundaryNo"
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
                                                    <input type="number"
                                                        class="form-control focus-ring-amber hover-amber"
                                                        placeholder="Enter plot area">
                                                </div>
                                                <div class="col-4">
                                                    <div class="input-group">
                                                        <select class="form-select focus-ring-amber hover-amber">
                                                            <option selected>Sq-ft</option>
                                                            <option>Sq-m</option>
                                                            <option>Sq-yrd</option>
                                                            <option>Acres</option>
                                                            <option>Hectares</option>
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
                                                Plot/Land Length <span class="text-muted">(optional)</span>
                                            </label>
                                            <div class="row g-3">
                                                <div class="col-8">
                                                    <input type="number"
                                                        class="form-control focus-ring-amber hover-amber"
                                                        placeholder="Enter plot length">
                                                </div>
                                                <div class="col-4">
                                                    <div class="input-group">
                                                        <select class="form-select focus-ring-amber hover-amber">
                                                            <option selected>ft</option>
                                                            <option>m</option>
                                                            <option>yrd</option>
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
                                                Plot/Land Breadth <span class="text-muted">(optional)</span>
                                            </label>
                                            <div class="row g-3">
                                                <div class="col-8">
                                                    <input type="number"
                                                        class="form-control focus-ring-amber hover-amber"
                                                        placeholder="Enter plot breadth">
                                                </div>
                                                <div class="col-4">
                                                    <div class="input-group">
                                                        <select class="form-select focus-ring-amber hover-amber">
                                                            <option selected>ft</option>
                                                            <option>m</option>
                                                            <option>yrd</option>
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
                                name="boundaryWall" id="boundaryYes"
                                style="background-color: #f59e0b; border-color: #f59e0b; box-shadow: 0 0 5px #f59e0b;"
                                checked>
                            <label class="form-check-label text-dark" for="boundaryYes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input checked:bg-amber-500 checked:border-amber-500" type="radio"
                                name="boundaryWall" id="boundaryNo"
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
                            <input type="number" class="form-control focus-ring-amber hover-amber"
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
                <input type="file" id="photoInput" accept="image/*" class="hidden" onchange="handlePhotoSelect(event)">

                <div class="flex justify-end mt-4">
                    <button type="submit"
                        class="bg-saffron hover:bg-amber-600 text-white font-semibold py-2 px-6 rounded-md shadow-sm hover:shadow-md transition duration-300 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-1 ">
                        Post Property
                    </button>
                </div>


            </form>



        </div>
    </div>




    <!-- external postproperty script -->
    <script src="{{asset('js/postproperty.js')}}"></script>

    <!-- JavaScript for interactions -->
    <script>
        // Add event listener for form submission
        document.getElementById('property-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Form submitted successfully!');
        });

        // Add click events for selectable buttons
        document.querySelectorAll('button[type="button"]').forEach(button => {
            button.addEventListener('click', function() {
                // Get all sibling buttons
                const siblings = Array.from(this.parentElement.children).filter(el => el.tagName ===
                    'BUTTON');

                // Toggle active class on clicked button
                if (this.classList.contains('bg-amber-50')) {
                    this.classList.remove('bg-amber-50', 'border-amber-500');
                } else {
                    // Remove active class from siblings
                    siblings.forEach(sib => {
                        sib.classList.remove('bg-amber-50', 'border-amber-500');
                    });

                    // Add active class to clicked button
                    this.classList.add('bg-amber-50', 'border-amber-500');
                }
            });
        });

        // Add click events for property type options
        document.querySelectorAll('.grid.grid-cols-2 > div').forEach(option => {
            option.addEventListener('click', function() {
                this.classList.toggle('bg-amber-50');
                this.classList.toggle('border-amber-500');
            });
        });
    </script>









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


    <!-- this script for open plot/land form for residensial -->
    <script>
        document.querySelectorAll('.residential-option').forEach(option => {
            option.addEventListener('click', function() {
                const type = this.getAttribute('data-res-type');

                const plotForm = document.getElementById('plot-land-form');
                const residentialForm = document.getElementById("residential-common-form");
                const commercialForm = document.getElementById("commercial-common-form");

                plotForm.classList.add('hidden');

                if (type === 'residential plot/land') {

                    document.getElementById('plot-land-form').classList.remove('hidden');
                    residentialForm.style.display = "none";

                } else {

                    residentialForm.style.display = "block";
                    document.getElementById('plot-land-form').classList.add('hidden');

                }
            });
        });
    </script>


    <!-- this script for open plot/land form for Commercial -->
    <script>
        document.querySelectorAll('.commercial-option').forEach(option => {
            option.addEventListener('click', function() {
                const type = this.getAttribute('data-com-type');

                const plotForm = document.getElementById('plot-land-form');
                const residentialForm = document.getElementById("residential-common-form");
                const commercialForm = document.getElementById("commercial-common-form");

                plotForm.classList.add('hidden');


                if (type === 'industrial land' || type === 'commercial land/plot' || type ===
                    'agricultural land') {

                    document.getElementById('plot-land-form').classList.remove('hidden');
                    commercialForm.style.display = "none";
                } else {

                    commercialForm.style.display = "block";
                    document.getElementById('plot-land-form').classList.add('hidden');
                }
            });
        });
    </script>



    </html>