
//   JavaScript for interactive elements 
document.addEventListener('DOMContentLoaded', function () {
    const userTypeOptions = document.querySelectorAll('.user-type-option');
    userTypeOptions.forEach(option => {
        option.addEventListener('click', function () {
            userTypeOptions.forEach(opt => opt.classList.remove(
                'active'));
            this.classList.add('active');
            this.querySelector('input[type="radio"]').checked = true;
        });
    });

    // Form validation feedback
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        });
    });
});


// Tab switching functionality
const tabs = document.querySelectorAll('.tab');
tabs.forEach(tab => {
    tab.addEventListener('click', function () {
        tabs.forEach(t => {
            t.classList.remove('active', 'border-saffron',
                'text-saffron');
            t.classList.add('border-transparent', 'text-white/70');
        });
        this.classList.add('active', 'border-saffron', 'text-saffron');
        this.classList.remove('border-transparent', 'text-white/70');
    });
});

// Scroll animation for elements
const appearOptions = {
    threshold: 0.15,
    rootMargin: "0px 0px -100px 0px"
};

const appearOnScroll = new IntersectionObserver(function (entries, appearOnScroll) {
    entries.forEach(entry => {
        if (!entry.isIntersecting) {
            return;
        } else {
            entry.target.classList.add('appear');
            appearOnScroll.unobserve(entry.target);
        }
    });
}, appearOptions);

window.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.slide-in').forEach(slider => {
        appearOnScroll.observe(slider);
    });
});


// Main application logic for show properties on index page
const PropertyApp = {
    properties: [],
    currentPage: 1,
    perPage: 21,
    loading: false,

    init() {
        this.loading = true;
        document.getElementById('properties-loading').classList.remove('hidden');
        document.getElementById('properties-grid').classList.add('hidden');

        fetch('/api/properties')
            .then(response => response.json())
            .then(data => {
                console.log(" Properties fetched:", data);
                this.properties = data;

                this.loadCityData();
                this.loadTestimonials();
                this.renderProperties(); // Show all initially

                document.getElementById('properties-loading').classList.add('hidden');
                document.getElementById('properties-grid').classList.remove('hidden');
                this.loading = false;

                // This code is for filtering properties like sell, rent, new launched, isPremium
                document.querySelectorAll('.filter-btn').forEach(button => {
                    button.addEventListener('click', (e) => {
                        const category = e.target.getAttribute('data-filter');

                        document.querySelectorAll('.filter-btn').forEach(btn => {
                            btn.classList.remove('bg-saffron', 'text-white');
                            btn.classList.add('bg-white', 'text-gray-700');
                        });
                        e.target.classList.add('bg-saffron', 'text-white');
                        e.target.classList.remove('bg-white', 'text-gray-700');

                        this.filterByCategory(category);
                    });
                });

            })
            .catch(error => {
                console.error("Failed to fetch properties:", error);
                document.getElementById('properties-loading').classList.add('hidden');
                this.loading = false;
            });
    },

    //  Filter by selected city only
    filterProperties() {
        const city = document.getElementById('searchCity').value.trim().toLowerCase();

        console.log("Selected city from dropdown:", city);
        console.log("All API cities:", this.properties.map(p => p.city));

        if (!city) return this.properties;

        const filtered = this.properties.filter(prop =>
            prop.city && prop.city.toLowerCase().includes(city)
        );

        console.log("Filtered result:", filtered);
        return filtered;
    },

    // Filtering for sell, rent, all properties, new launched, isPremium
    filterByCategory(category) {
        let filtered = [];

        if (category === 'all') {
            filtered = this.properties;
        } else if (category === 'sell') {
            filtered = this.properties.filter(p => p.want_for === 'sell');
        } else if (category === 'rent') {
            filtered = this.properties.filter(p => p.want_for === 'rent');
        } else if (category === 'new') {
            filtered = this.properties.filter(p => p.isNew === true);
        }

        this.currentPage = 1;
        this.renderProperties(filtered);
    },


    renderProperties(propertyList = null, append = false) {
        const grid = document.getElementById('properties-grid');
        let filteredProperties = propertyList ?? this.properties;

        if (!append) {
            grid.innerHTML = '';
        }

        const startIndex = append ? (this.currentPage - 1) * this.perPage : 0;
        const endIndex = this.currentPage * this.perPage;
        const paginated = filteredProperties.slice(0, endIndex);

        if (paginated.length === 0 && !append) {
            grid.innerHTML = `<p class="text-center text-gray-500 py-10">No properties found for this city.</p>`;
            return;
        }

        paginated.forEach((property, index) => {
            if (index >= startIndex) {
                const card = this.createPropertyCard(property);
                grid.appendChild(card);
            }
        });
    },

    createPropertyCard(property) {
        const card = document.createElement('div');
        card.className = 'property-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 relative';

        let badgeHTML = '';
        if (property.isPremium) badgeHTML += `<span class="badge badge-premium">Premium</span>`;
        else if (property.isNew) badgeHTML += `<span class="badge badge-new">New Launch</span>`;
        else if (property.tags?.includes('hot')) badgeHTML += `<span class="badge badge-hot">Hot Deal</span>`;
        badgeHTML += `<span class="badge badge-type">${property.type}</span>`;

        badgeHTML += `<span class="absolute top-2 left-2 bg-orange-500 text-white text-xs font-semibold px-3 py-1 rounded-full">${property.want_for}</span>`;

        card.innerHTML = `
           
            <div class="relative overflow-hidden h-56">
             ${badgeHTML}
                <img src="${property.image}" alt="${property.title}" class="w-full h-full object-cover transition-transform duration-500 ">
            </div>
            <div class="p-6">
                <h3 class="font-heading font-bold text-xl mb-2 text-slate">${property.title}</h3>
                <div class="flex items-center text-gray-600 mb-3">
                    <i class="fas fa-map-marker-alt text-saffron mr-2"></i>
                    <span>${property.location}</span>
                </div>
                <div class="flex justify-between mb-6">
                    <div class="font-bold text-xl text-saffron">${property.price}</div>
                    <div class="text-gray-600">${property.area}</div>
                </div>
                <div class="flex justify-between border-t border-gray-100 pt-4">
                    ${property.bedrooms ? `<div class="flex items-center text-gray-600"><i class="fas fa-bed mr-2 text-saffron"></i><span>${property.bedrooms} ${property.bedrooms > 1 ? 'Beds' : 'Bed'}</span></div>` : ''}
                    ${property.bathrooms ? `<div class="flex items-center text-gray-600"><i class="fas fa-bath mr-2 text-saffron"></i><span>${property.bathrooms} ${property.bathrooms > 1 ? 'Baths' : 'Bath'}</span></div>` : ''}
                </div>
            </div>
            <div class="bg-gray-50 px-6 py-3 flex justify-between items-center">
                <a href="javascript:void(0);" onclick="handleViewDetails(event, ${property.id}, '${property.type}')" class="text-navy hover:text-saffron transition-colors font-medium">View Details</a>
                <button class="w-10 h-10 rounded-full bg-white shadow flex items-center justify-center hover:bg-saffron hover:text-white transition-colors">
                    <i class="far fa-heart"></i>
                </button>
            </div>
        `;
        return card;
    },

    loadTestimonials() {
        // Sample testimonial data
        const testimonials = [{
            name: 'Rohit Sharma',
            position: 'Entrepreneur',
            testimonial: 'Lucknow Hitech Developers made my property search incredibly smooth. Their expertise and transparent process helped me find my dream home in Mumbai.',
            image: 'https://img.freepik.com/free-photo/portrait-handsome-smiling-stylish-young-man-model-dressed-red-checkered-shirt-fashion-man-posing_158538-4914.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740'
        },
        {
            name: 'Priya Patel',
            position: 'Software Engineer',
            testimonial: 'As a first-time homebuyer, I was nervous about the process. The team at Lucknow Hitech Developers me through every step and found me a perfect apartment in Bangalore.',
            image: 'https://img.freepik.com/premium-photo/beauty-fashion-portrait-young-beautiful-brunette-woman-with-long-black-hair-green-eyes_333900-2852.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740'
        },
        {
            name: 'Anand Mehta',
            position: 'Finance Director',
            testimonial: 'I have worked with several real estate companies, but Lucknow Hitech Developers stands out for their professionalism and attention to detail. Highly recommended!',
            image: 'https://img.freepik.com/free-photo/smiling-young-male-posing-meadow-with-arms-crossed_23-2148179874.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740'
        }
        ];

        const testimonialsGrid = document.getElementById('testimonials-grid');

        testimonials.forEach((testimonial, index) => {
            const testimonialCard = document.createElement('div');
            testimonialCard.className =
                'slide-in bg-white p-8 rounded-lg shadow-lg relative';

            testimonialCard.innerHTML = `
                <div class="absolute -top-5 left-8 text-saffron text-6xl opacity-20">"</div>
                <p class="text-gray-600 mb-6 relative">${testimonial.testimonial}</p>
                <div class="flex items-center">
                    <img src="${testimonial.image}" alt="${testimonial.name}" class="w-12 h-12 rounded-full object-cover mr-4">
                    <div>
                        <h4 class="font-bold text-navy">${testimonial.name}</h4>
                        <p class="text-gray-500 text-sm">${testimonial.position}</p>
                    </div>
                </div>
            `;

            testimonialsGrid.appendChild(testimonialCard);

            // Delayed animation
            setTimeout(() => {
                testimonialCard.classList.add('appear');
            }, index * 150);
        });
    },
    loadCityData() {
        const cities = [{
            name: 'Gomti Nagar',
            properties: 245,
            image: 'https://img.freepik.com/premium-photo/man-is-filming-house-with-camera-camera_1247965-98133.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740'
        },
        {
            name: 'Hazratganj',
            properties: 312,
            image: 'https://img.freepik.com/free-photo/vertical-shot-modern-apartments-daytime_181624-13625.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740'
        },
        {
            name: 'Vibhuti Khand',
            properties: 186,
            image: 'https://img.freepik.com/premium-photo/view-swimming-pool-by-building-against-sky_1048944-21046320.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740'
        },
        {
            name: 'Aliganj',
            properties: 154,
            image: 'https://img.freepik.com/premium-photo/building-with-large-window-top_822609-687.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740'
        },
        {
            name: 'Chinhat',
            properties: 128,
            image: 'https://img.freepik.com/free-photo/analog-landscape-city-with-buildings_23-2149661456.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740'
        },
        {
            name: 'Indira Nagar',
            properties: 97,
            image: 'https://img.freepik.com/free-photo/analog-landscape-city-with-buildings_23-2149661457.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740'
        },
        {
            name: 'Mahanagar',
            properties: 89,
            image: 'https://img.freepik.com/premium-photo/building-with-street-light-as-street-view_764413-97.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740'
        },
        {
            name: 'Faizabad Road',
            properties: 76,
            image: 'https://img.freepik.com/premium-photo/holiday-apartments-city-playa-blanca-lanzarote-island-hotel-complex-royal-monica-canary-islands-december-2018_152520-1542.jpg?ga=GA1.1.1533442590.1746749268&semt=ais_hybrid&w=740'
        },
        ];

        const cityGrid = document.getElementById('city-grid');

        cities.forEach((city, index) => {
            const cityCard = document.createElement('div');
            cityCard.className =
                'slide-in relative rounded-lg overflow-hidden group shadow-md';

            cityCard.innerHTML = `
                <img src="${city.image}" alt="${city.name}" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-navy/80 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-5 text-white">
                    <h3 class="text-xl font-bold mb-1">${city.name}</h3>
                    <p>${city.properties} Properties</p>
                </div>
            `;

            cityGrid.appendChild(cityCard);

            // Delayed animation
            setTimeout(() => {
                cityCard.classList.add('appear');
            }, index * 100);
        });
    },
};

//  Initialize on page load
document.addEventListener('DOMContentLoaded', () => {
    PropertyApp.init();

    // Only city filter — no input field logic
    document.getElementById('searchCity').addEventListener('change', function () {
        const filtered = PropertyApp.filterProperties();
        PropertyApp.currentPage = 1;
        PropertyApp.renderProperties(filtered, false);
    });
});


// this is for view details to give the details of the property
function handleViewDetails(event, locationId, propertyType) {
    event.preventDefault();

    if (!window.isLoggedIn) {
        // notyf.error('Please login to view property details!');
        showToast('Warning', 'Please login on clicking Post Property Button!', 'bx bx-error', 'bg-danger');

        return;
    }

    window.location.href = `/postpropertydetails?location_id=${locationId}&property_type=${propertyType}`;
}

// this is foe index searchbar functionality
document.addEventListener('DOMContentLoaded', () => {
    const keywordInput = document.getElementById('searchKeyword');

    if (keywordInput) {
        keywordInput.addEventListener('keyup', function () {
            const keyword = this.value.trim();

            if (keyword.length < 2) return;

            fetch(`/search-properties?keyword=${encodeURIComponent(keyword)}`)
                .then(res => res.json())
                .then(data => {
                    console.log("Filtered properties:", data);
                    PropertyApp.currentPage = 1;
                    PropertyApp.renderProperties(data, false);
                })
                .catch(error => {
                    console.error("Error fetching search results:", error.message);
                    alert("Something went wrong. Check console.");
                });

        });
    }
});



