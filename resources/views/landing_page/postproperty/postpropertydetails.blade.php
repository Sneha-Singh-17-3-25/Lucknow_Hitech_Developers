@extends('layouts/users/app')

@section('content')
<div class="bg-gray-50 font-sans">

    <section class="relative flex justify-center items-center text-center h-[50vh] overflow-hidden">
        <!-- Video Background with Overlay -->
        <div class="absolute top-0 left-0 w-full h-full">
            <video autoplay muted loop playsinline class="object-cover w-full h-full">
                <source src="{{asset('videos/property.mp4')}}" type="video/mp4">
                <!-- Fallback image in case video doesn't load -->
                <img src="/api/placeholder/1920/600" alt="Property Details" class="object-cover w-full h-full">
            </video>
            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-black/70 via-black/50 to-black/60">
            </div>
        </div>

        <div class="w-11/12 max-w-screen-lg z-10">
            <h1 class="text-4xl md:text-6xl leading-tight font-heading font-bold text-white text-shadow">Property <span
                    class="text-saffron">Details</span></h1>
            <p class="text-white/80 max-w-xl mx-auto mt-4">Comprehensive Information About Your Dream Property</p>
            <div class="mt-8 flex justify-center space-x-4">
                <a href="#property-section"
                    class="px-6 py-3 bg-saffron hover:bg-saffron-dark text-white rounded-md transition-colors duration-300 flex items-center">
                    <i class="fas fa-home mr-2"></i> View Details
                </a>
                <a href="#"
                    class="px-6 py-3 bg-white/10 backdrop-blur-md hover:bg-white/20 text-white rounded-md transition-colors duration-300 flex items-center">
                    <i class="fas fa-images mr-2"></i> Gallery
                </a>
            </div>
        </div>
    </section>
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
                            <h1 class="text-3xl font-heading font-bold text-navy mb-2">{{$property->property_price}}</h1>
                            <p class="text-gray-600 text-lg">
                                Finance your dream home | <span class="text-saffron hover:text-saffron-dark cursor-pointer">Explore home loan offers from top banks</span>
                            </p>

                        </div>
                        <div class="text-right text-sm text-gray-500">
                            <p>Posted on: {{$property->created_at}}</p>
                            <!-- <p>Property ID: 75701587</p> -->
                        </div>
                    </div>
                    <h2 class="text-xl font-semibold text-slate mb-4"><span class="text-orange-500">{{$property->property_type}}</span> in {{$location->address}}, {{$location->city}}, {{$location->pincode}}</h2>

                    <!-- Property Features -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-saffron-light rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium">want for : <b class="text-green-700">{{$property->want_for ?? 'N/A'}}</b> </span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-emerald rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM15 7a1 1 0 112 0v7.268a2 2 0 010 3.464V19a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V7z" />
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium">{{$property->poss_status ?? 'N/A'}}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-navy-light rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium">{{$property->furnished_status ?? 'N/A'}}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-saffron rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium">Leased Out : <b class="text-green-700">{{$property->leased_out ?? 'N/A'}}</b></span>
                        </div>
                    </div>
                </div>

                <!-- Property Images -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6  relative">
                    <h3 class="text-xl font-heading font-semibold text-navy mb-4">Property Images</h3>
                    <div class="absolute top-6 right-4 bg-navy bg-opacity-80 text-white px-3 py-1 rounded-lg text-sm font-medium">
                        {{ count($images) }} {{ count($images) === 1 ? 'Photo' : 'Photos' }}
                    </div>


                    @if(count($images) > 1)
                    <!-- Swiper Slider for multiple images -->
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach($images as $image)
                            <div class="swiper-slide">
                                <div class="relative overflow-hidden rounded-lg h-64 md:h-80 bg-gray-200">
                                    <img src="{{ asset($image->image) }}"
                                        alt="Property Image"
                                        class="w-full h-full object-cover transition-transform duration-500 hover:scale-110 p-2 bg-white rounded-md" />
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Swiper Navigation Buttons -->
                        <div class="swiper-button-next text-orange-600"></div>
                        <div class="swiper-button-prev text-orange-600"></div>
                    </div>
                    @elseif(count($images) === 1)
                    <!-- Single Image -->
                    <div class="md:col-span-2">
                        <div class="relative overflow-hidden rounded-lg h-64 md:h-80 bg-gray-200">
                            <img src="{{ asset($images[0]->image) }}"
                                alt="Property Image"
                                class="w-full h-full object-cover transition-transform duration-500 hover:scale-110 p-2 bg-white rounded-md" />
                        </div>
                    </div>
                    @endif
                </div>


                <!-- First Details Section -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h3 class="text-xl font-heading font-semibold text-navy mb-6">Property Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Property Type</span>
                                <span class="text-slate font-semibold">{{$property->property_type}}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Plot Area</span>
                                <span class="text-slate font-semibold">{{$property->plot_area ?? '_' }} {{$property->plot_area_unit ?? ' '}}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Super Area</span>
                                <span class="text-emerald font-semibold">{{$property->super_area ?? '_'}} {{$property->super_area_unit ?? ''}}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">No of open sides</span>
                                <span class="text-slate font-semibold">{{ $property->open_sides ?? 'N/A' }}</span>

                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Width of road facing the plot</span>
                                <span class="text-saffron font-semibold">{{$property->w_road_facing ?? 'N/A'}} {{$property->w_road_facing_unit ?? ''}}</span>
                            </div>
                            <div class="py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Address</span>
                                <div class="text-slate font-semibold mt-1">{{$location->address}} , {{$location->city}} , {{$location->pincode}}</div>
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
                                <span class="text-gray-600 font-medium">Bedrooms</span>
                                <span class="text-slate font-semibold">{{$property->bedrooms ?? '_'}}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Balconies</span>
                                <span class="text-slate font-semibold">{{$property->balconies ?? '_'}}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Bathrooms</span>
                                <span class="text-slate font-semibold">{{$property->bathrooms ?? '_'}}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Total Rooms</span>
                                <span class="text-slate font-semibold">{{$property->total_rooms ?? '_'}}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Total Floors</span>
                                <span class="text-slate font-semibold">{{$property->total_floor ?? '_'}}</span>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Floor No.</span>
                                <span class="text-slate font-semibold">{{$property->floor_no ?? 'N/A'}}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Leased Out</span>
                                <span class="text-red-600 font-semibold">No</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Washrooms</span>
                                <span class="text-emerald font-semibold">{{$property->washrooms ?? 'N/A'}}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Personal Washrooms</span>
                                <span class="text-emerald font-semibold">{{$property->per_washrooms ?? 'N/A'}}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Pantry/Cafeteria</span>
                                <span class="text-emerald font-semibold">{{$property->pantry_cafeteria ?? 'N/A'}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Third Section Start -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h3 class="text-xl font-heading font-semibold text-navy mb-6">More Additional Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Is this corner plot</span>
                                <span class="text-slate font-semibold">{{$property->corner_plot ?? '_'}}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Any construction done</span>
                                <span class="text-slate font-semibold">{{$property->const_plot ?? '_'}}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Boundary wall made</span>
                                <span class="text-slate font-semibold">{{$property->boundary_wall_made ?? '_'}}</span>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Plot Length</span>
                                <span class="text-slate font-semibold">{{$property->plot_land_length ?? 'N/A'}} {{$property->plot_land_length_unit ?? ' '}}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Plot Breath</span>
                                <span class="text-red-600 font-semibold">{{$property->plot_land_breath ?? 'N/A'}} {{$property->plot_land_breath_unit ?? ' '}}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium"></span>
                                <span class="text-emerald font-semibold"></span>
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
                <div class="sticky top-6 space-y-6">
                    <!-- Contact Owner -->
                    <div class="bg-white rounded-lg shadow-md p-6 mb-6 sticky top-6">
                        <h3 class="text-xl font-heading font-semibold text-navy mb-4">Contact Owner</h3>
                        <div class="mb-4">
                            <h4 class="font-semibold text-slate">Pawan Kanoujiya</h4>
                            <p class="text-gray-600">+91-9335XXXXXX</p>
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
                            <button class="flex-1 bg-navy hover:bg-navy-light text-white font-medium py-2 px-4 rounded-lg transition duration-200" onclick="shareProperty()">
                                Share Property
                            </button>
                            <button
                                class="flex-1 border-2 border-saffron text-saffron hover:bg-saffron hover:text-white font-medium py-2 px-4 rounded-lg transition duration-200"
                                onclick="openModal()">
                                Contact Us
                            </button>

                        </div>
                        <!-- <button class="w-full mt-4 flex items-center justify-center space-x-2 text-navy hover:text-navy-light font-medium py-2 border border-gray-300 rounded-lg transition duration-200">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 17a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1v-2zM3 7a1 1 0 011-1h12a1 1 0 011 1v8a1 1 0 01-1 1H4a1 1 0 01-1-1V7zM5 9a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zM5 13a1 1 0 011-1h4a1 1 0 110 2H6a1 1 0 01-1-1z" />
                        </svg>
                        <span>Download Brochure</span>
                    </button> -->
                    </div>

                    <!-- More Details -->
                    <div class="bg-white rounded-lg shadow-md sticky p-6">
                        <h3 class="text-xl font-heading font-semibold text-navy mb-4">Quick Details</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Price</span>
                                <span class="font-semibold text-slate">₹ {{$property->property_price}}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Address</span>
                                <span class="font-semibold text-slate text-right">{{$location->address}},{{$location->city}},{{$location->pincode}}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Plot Area</span>
                                <span class="font-semibold text-slate">{{$property->plot_area ?? 'N/A'}} {{$property->plot_area_unit ?? ' '}}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Want For</span>
                                <span class="font-semibold text-emerald">{{$property->want_for ?? 'N/A'}}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Leased Out</span>
                                <span class="font-semibold text-red-700">{{$property->leased_out ?? 'N/A'}}</span>
                            </div>
                        </div>
                        <!-- <button class="text-saffron hover:text-saffron-dark font-medium mt-4 underline">View all details</button> -->
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- this is the modal to store contact of buyer -->
<div id="contactModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white rounded-xl shadow-2xl max-w-md w-full max-h-[90vh] overflow-y-auto">

        <div class="bg-gradient-to-r from-saffron/20 to-saffron/10 p-4 rounded-t-xl border-b">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center gap-2 bg-saffron text-white px-3 py-1 rounded-full text-sm font-medium">
                    <span>⚡</span>
                    <span>Awesome! Most liked project in this area</span>
                </div>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Contact Seller Info -->
        <div class="p-4  border border-yellow-300 bg-yellow-50 text-slate-700 rounded-md flex items-center gap-2 text-sm">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" class="w-5 h-5" />
            <span>
                Enter your <span class="font-semibold">WhatsApp No.</span> to get Contact Details of the Owner
            </span>
        </div>


        <!-- Contact Details Form -->
        <div class="p-6">
            <h3 class="text-lg font-semibold text-slate mb-4">Please share your contact</h3>

            <div class="space-y-4">

                <!-- property details -->
                <input type="hidden" name="property_type" value="{{ $property->property_type }}">
                <input type="hidden" name="property_id" value="{{ $property->location_id }}">
                <input type="hidden" name="seller_id" value="{{ $property->user_id }}">

                <!-- Name Field -->
                <div>
                    <input
                        type="text"
                        name="name"
                        placeholder="Name"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-saffron focus:border-saffron outline-none transition-colors" />
                </div>

                <!-- Phone Field -->
                <div class="flex">
                    <div class="px-3 py-3 border border-gray-300 rounded-l-lg bg-gray-50 text-gray-700 flex items-center">
                        <span>+91</span>
                    </div>
                    <input
                        type="tel"
                        name="phone"
                        placeholder="Phone"
                        class="flex-1 px-4 py-3 border border-l-0 border-gray-300 rounded-r-lg focus:ring-2 focus:ring-saffron focus:border-saffron outline-none transition-colors" />
                </div>

                <!-- Email Field -->
                <div>
                    <input
                        type="email"
                        name="email"
                        placeholder="Email"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-saffron focus:border-saffron outline-none transition-colors" />
                </div>

                <!-- Checkboxes -->
                <div class="space-y-3">
                    <label class="flex items-start gap-3 cursor-pointer">
                        <input
                            type="checkbox"
                            name="agreeToContact"
                            checked
                            class="mt-1 w-4 h-4 text-saffron border-gray-300 rounded focus:ring-saffron accent-saffron" />
                        <span class="text-sm text-slate">
                            I agree to be contacted by Lucknow Hitech Developers team and owner via
                            <span class="text-emerald font-medium">WhatsApp</span>, SMS, phone, email etc
                        </span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button
                    onclick="submitForm()"
                    class="w-full bg-gray-600 hover:bg-gray-700 text-white py-3 rounded-lg font-semibold transition-colors duration-200 mt-6">
                    Get Contact Details
                </button>
            </div>
        </div>
    </div>
</div>
@endsection


@push('script')
<!-- this is for share the property -->
<script>
    function shareProperty() {
        if (navigator.share) {
            navigator.share({
                    title: 'Property Listing',
                    text: 'Check out this property on Groscope!',
                    url: window.location.href
                })
                .then(() => console.log('Shared successfully'))
                .catch((error) => console.error('Error sharing:', error));
        } else {
            alert('Sharing is not supported in your browser. Please use mobile or modern browser.');
        }
    }
</script>

<!-- this is for image swipe -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('.mySwiper', {
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            spaceBetween: 20,
        });
    });
</script>

<!-- this script for open and close the contact model -->
<script>
    function openModal() {
        document.getElementById('contactModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('contactModal').classList.add('hidden');
    }
    // function submitForm() {
    //     alert("Form submitted!");
    //     closeModal();
    // }
</script>

<script>
    function submitForm() {
        const name = document.querySelector('input[name="name"]').value;
        const phone = document.querySelector('input[name="phone"]').value;
        const email = document.querySelector('input[name="email"]').value;
        const agreeToContact = document.querySelector('input[name="agreeToContact"]').checked;

        // New values from hidden inputs , property details
        const propertyType = document.querySelector('input[name="property_type"]').value;
        const propertyId = document.querySelector('input[name="property_id"]').value;
        const sellerId = document.querySelector('input[name="seller_id"]').value;

        fetch("/submit-buyer-contact", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    property_type: propertyType,
                    property_id: propertyId,
                    seller_id: sellerId,
                    name,
                    phone,
                    email,
                    agree_to_contact: agreeToContact
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    // alert("Contact details submitted successfully!");
                    notyf.success('Contact details submitted successfully!');
                    closeModal();
                } else {
                    // alert("Submission failed.");
                    notyf.error('Submission failed.')
                }
            })
            .catch(error => {
                console.error("Error:", error);
                // alert("An error occurred because of invalid data.");
                notyf.error('An error occurred because of invalid data.');
            });
    }
</script>

@endpush