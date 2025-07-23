<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Lucknow Hitech Developers')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script> -->

    <!-- notify links Start-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <!-- notify links End-->


    <!-- this both link for postpropertydetailspage image swipe -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- this both link for postpropertydetailspage image swipe -->



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

        /* Progress Bar Styles */
        .progress-bar-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: rgba(255, 255, 255, 0.1);
            z-index: 9999;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .progress-bar-container.show {
            opacity: 1;
        }

        .progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #0C2461, #1e3799, #0C2461);
            background-size: 200% 100%;
            width: 0%;
            transition: width 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .progress-bar::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
            animation: shine 1.5s ease-in-out infinite;
        }

        @keyframes shine {
            0% {
                left: -100%;
            }

            100% {
                left: 100%;
            }
        }

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
            width: 40px;
            height: 20px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 50px auto;
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

        /* login and registration css start */
        :root {
            --saffron: #FF9933;
            --saffron-light: #FFB266;
            --saffron-dark: #E68A00;
            --navy: #0C2461;
            --navy-light: #1e3799;
        }

        /* Form styling */
        .form-control:focus {
            border-color: var(--saffron);
            box-shadow: 0 0 0 0.25rem rgba(255, 153, 51, 0.25);
        }

        .input-group-text {
            border: 1px solid #ced4da;
            border-right: none;
        }

        /* User type option styling */
        .user-type-option label {
            cursor: pointer;
            border: 2px solid transparent;
            transition: all 0.2s ease;
            width: 80px;
        }

        .user-type-option label:hover {
            background-color: rgba(255, 153, 51, 0.1);
        }

        .user-type-option.active label {
            border-color: var(--saffron);
            background-color: rgba(255, 153, 51, 0.15);
        }

        /* Button styling */

        .btn {
            transition: all 0.2s ease;
        }

        .btn:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        .btn:active {
            transform: translateY(0);
        }

        /* Modal styling */
        .modal-content {
            border-radius: 8px;
            overflow: hidden;
        }

        .modal-header,
        .modal-footer {
            border: none;
        }

        /* Animation for modals */
        .modal.fade .modal-dialog {
            transition: transform 0.3s ease-out;
        }

        .bg-saffron {
            background-color: #FF9933 !important;
            color: white !important;
        }

        a {
            text-decoration: none;
        }

        .social-media {
            color: white;
        }

        /* login and registration css End */
    </style>

    @stack('style')

</head>

<body>

    <!-- Progress Bar -->
    <div id="progressBarContainer" class="progress-bar-container">
        <div id="progressBar" class="progress-bar"></div>
    </div>
    <script>
        const progressBarContainer = document.getElementById('progressBarContainer');
        const progressBar = document.getElementById('progressBar');
        let progressInterval;

        function showProgressBar() {
            progressBarContainer.classList.add('show');

            let progress = 20; // start at 20%
            progressBar.style.width = progress + '%';

            progressInterval = setInterval(() => {
                progress += Math.random() * 10;
                if (progress < 90) {
                    progressBar.style.width = progress + '%';
                } else {
                    clearInterval(progressInterval);
                }
            }, 200);
        }

        function completeProgressBar() {
            clearInterval(progressInterval);
            progressBar.style.width = '100%';
            setTimeout(() => {
                progressBarContainer.classList.remove('show');
                progressBar.style.width = '0%';
            }, 300);
        }

        document.addEventListener('DOMContentLoaded', function() {
            showProgressBar();
            setTimeout(completeProgressBar, 1000);
        });

        document.addEventListener('click', function(e) {
            const link = e.target.closest('a');
            if (link && link.href && !link.href.includes('#') && link.target !== '_blank') {
                const url = new URL(link.href);
                if (url.origin === window.location.origin) {
                    showProgressBar();
                }
            }
        });

        window.showProgressBar = showProgressBar;
        window.completeProgressBar = completeProgressBar;
    </script>


    <!-- Navigation Bar -Start-->
    @include('landing_page/include/navbar')
    <!-- Navigation Bar  End -->


    @yield('content')


    <!-- include the footer -->
    @include('landing_page.include.footer')

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-sm">
                <!-- Header -->
                <div class="modal-header" style="background-color: #FF9933; color: white;">
                    <h5 class="modal-title" id="loginModalLabel">Welcome Back</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <!-- Body -->
                <div class="modal-body p-4">
                    <form id="loginForm">
                        <!-- Email Input -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text" style="background-color: #FFB266; color: #0C2461;">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" class="form-control border-start-0" id="email" name="email"
                                    placeholder="your@email.com" required>
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between">
                                <label for="password" class="form-label">Password</label>
                                <a href="#" class="text-decoration-none small" style="color: #E68A00;">Forgot
                                    Password?</a>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text" style="background-color: #FFB266; color: #0C2461;">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" class="form-control border-start-0" id="password"
                                    name="password" placeholder="••••••••" required>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button id="login_button" type="submit" class="btn w-100"
                            style="background-color: #FF9933; color: white;">
                            Login
                        </button>
                    </form>
                </div>

                <!-- Footer -->
                <div class="modal-footer justify-content-center border-0">
                    <p class="mb-0">
                        Don't have an account?
                        <a href="#" style="color: #E68A00;" data-bs-toggle="modal"
                            data-bs-target="#signupModal">Sign
                            up</a>
                    </p>
                </div>
            </div>
        </div>
    </div>



    <!-- Signup Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-sm">
                <!-- Header -->
                <div class="modal-header" style="background-color: #FF9933; color: white;">
                    <h5 class="modal-title" id="signupModalLabel">Create Account</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <!-- Body -->
                <div class="modal-body p-4">
                    <form id="signupForm">
                        <!-- User Type Selection -->
                        <div class="mb-4">
                            <label class="form-label">I am a</label>
                            <div class="d-flex justify-content-between">
                                <div class="user-type-option active" data-type="buyer">
                                    <input class="form-check-input visually-hidden" type="radio" name="userType"
                                        id="buyer" value="buyer" checked>
                                    <label class="d-block text-center p-2 rounded" for="buyer">
                                        <i class="fas fa-home d-block mb-1" style="color: #E68A00;"></i>
                                        <small>Buyer</small>
                                    </label>
                                </div>
                                <div class="user-type-option" data-type="seller">
                                    <input class="form-check-input visually-hidden" type="radio" name="userType"
                                        id="seller" value="seller">
                                    <label class="d-block text-center p-2 rounded" for="seller">
                                        <i class="fas fa-dollar-sign d-block mb-1" style="color: #E68A00;"></i>
                                        <small>Seller</small>
                                    </label>
                                </div>
                                <div class="user-type-option" data-type="agent">
                                    <input class="form-check-input visually-hidden" type="radio" name="userType"
                                        id="agent" value="agent">
                                    <label class="d-block text-center p-2 rounded" for="agent">
                                        <i class="fas fa-user-tie d-block mb-1" style="color: #E68A00;"></i>
                                        <small>Agent</small>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Full Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text" style="background-color: #FFB266; color: #0C2461;">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" class="form-control border-start-0" id="name"
                                    placeholder="John Doe" name="name" required>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class=" mb-3">
                            <label for="signup-email" class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text" style="background-color: #FFB266; color: #0C2461;">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" class="form-control border-start-0" id="signup-email"
                                    placeholder="your@email.com" name="email" required>
                            </div>
                        </div>

                        <!-- Mobile -->
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile Number</label>
                            <div class="input-group">
                                <span class="input-group-text" style="background-color: #FFB266; color: #0C2461;">
                                    <i class="fas fa-phone-alt"></i>
                                </span>
                                <input type="tel" class="form-control border-start-0" id="mobile"
                                    placeholder="+1 (123) 456-7890" name="mobile" required>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="signup-password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text" style="background-color: #FFB266; color: #0C2461;">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" class="form-control border-start-0" id="signup-password"
                                    placeholder="••••••••" name="password" required>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn w-100" style="background-color: #FF9933; color: white;">
                            Create Account
                        </button>
                    </form>
                </div>

                <!-- Footer -->
                <div class="modal-footer justify-content-center border-0">
                    <p class="mb-0">Already have an account?
                        <a href="#" style="color: #E68A00;" data-bs-dismiss="modal" data-bs-toggle="modal"
                            data-bs-target="#loginModal">Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    @stack('script')

    <!-- Progress Bar JavaScript -->


    <!-- registeration js --------------------------------->
    <script>
        document.querySelector('#signupForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Show progress bar
            showProgressBar();

            const formData = new FormData(this);

            fetch("{{ url('landing/register') }}", {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    // Complete progress bar
                    completeProgressBar();

                    if (data.errors) {
                        let messages = '';
                        for (let field in data.errors) {
                            messages += data.errors[field].join('\n') + '\n';
                        }
                        // showToast('alert', messages, 'bx bx-error', 'bg-saffron');
                        notyf.error(messages);
                    } else {
                        // showToast('alert', 'Registration successful!', 'bx bx-error',
                        //     'bg-saffron');
                        notyf.success('Registration successful!');
                        const modalEl = document.getElementById('signupModal');
                        const modal = bootstrap.Modal.getInstance(modalEl);
                        modal.hide();
                    }
                })
                .catch(error => {
                    completeProgressBar();
                    console.error('Error:', error);
                });
        });
    </script>

    <!-- login js ----------------------------------------------------------------->
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Show progress bar
            showProgressBar();

            const loginBtn = document.getElementById('login_button');
            loginBtn.disabled = true;
            loginBtn.innerHTML = `<span style="
            display: inline-block;
            width: 22px;
            height: 22px;
            border: 3px solid #fff;
            border-top: 3px solid #FF9933;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
            vertical-align: middle;
        "></span>`;

            // Add keyframes for spin animation if not already present
            if (!document.getElementById('inline-spinner-style')) {
                const style = document.createElement('style');
                style.id = 'inline-spinner-style';
                style.innerHTML = `
                @keyframes spin {
                    0% { transform: rotate(0deg);}
                    100% { transform: rotate(360deg);}
                }
            `;
                document.head.appendChild(style);
            }

            const formData = {
                email: document.getElementById('email').value,
                password: document.getElementById('password').value
            };

            console.log('Form Data:', formData);

            fetch("{{route('landing_login')}}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: JSON.stringify(formData)
                })
                .then(response => response.json())
                .then(data => {
                    // Complete progress bar
                    completeProgressBar();

                    if (data.status === 'success') {
                        notyf.success(data.message);
                        const modalEl = document.getElementById('loginModal');
                        const modal = bootstrap.Modal.getInstance(modalEl);
                        modal.hide();
                        setTimeout(() => {
                            window.location.href = data.redirect;
                        }, 1500);
                    } else {
                        notyf.error("Invalid email or password! Please try again.");
                        loginBtn.disabled = false;
                        loginBtn.innerHTML = 'Login';
                    }
                })
                .catch(error => {
                    completeProgressBar();
                    console.error('Login error:', error);
                    alert('Something went wrong.');
                    loginBtn.disabled = false;
                    loginBtn.innerHTML = 'Login';
                });
        });
    </script>

    <!-- logout script -->
    <script>
        if (document.getElementById('logout') != null) {
            document.getElementById('logout').addEventListener('click', function(e) {

                e.preventDefault();

                // Show progress bar
                showProgressBar();

                fetch("{{ route('landing_logout') }}", {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        completeProgressBar();
                        console.log(data);
                        if (data.status === 'success') {
                            notyf.success(data.message);
                            setTimeout(() => {
                                window.location.href = '/';
                            }, 1500);
                        } else {
                            notyf.error(data.message);
                        }
                    })
                    .catch(err => {
                        completeProgressBar();
                        notyf.error('Something went wrong. Please try again later.');
                        console.error(err);
                    });
            });
        }
    </script>



    <!-- function toshow the toast----------------------------------------- -->
    <script>
        function showToast(title, message, iconClass, bgColor) {
            const toastHTML = `
        <div class="bs-toast toast fade ${bgColor} text-white" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header ${bgColor} text-white">
                <i class='${iconClass} me-2'></i>
                <strong class="me-auto">${title}</strong>
                <small>Just now</small>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                ${message}
            </div>
        </div>
    `;

            // Append the toast HTML
            document.getElementById('toast-container').insertAdjacentHTML('beforeend', toastHTML);

            // Select the newly added toast
            const toastEl = document.querySelector('#toast-container .toast:last-child');

            // Initialize Bootstrap Toast
            const bsToast = new bootstrap.Toast(toastEl, {
                delay: 3000
            });

            // Clean up after it's hidden
            toastEl.addEventListener('hidden.bs.toast', () => {
                toastEl.remove();
            });

            // Show the toast
            bsToast.show();
        }
    </script>

    <!-- JavaScript for navbar scroll effect -->
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');

            if (window.scrollY > 50) {
                navbar.classList.add('bg-navy', 'bg-opacity-95', 'shadow-md');
                navbar.classList.remove('py-4');
                navbar.classList.add('py-3');
            } else {
                navbar.classList.remove('bg-navy', 'bg-opacity-95', 'shadow-md');
                navbar.classList.remove('py-3');
                navbar.classList.add('py-4');
            }
        });
    </script>

    <script>
        // Initialize Notyf with custom configuration
        window.notyf = new Notyf({
            duration: 4000,
            position: {
                x: 'right',
                y: 'bottom'
            },
            dismissible: false,
            ripple: true,
            types: [{
                    type: 'success',
                    background: 'white',
                    color: '#10B981',
                    icon: {
                        className: 'notyf__icon--success',
                        tagName: 'i',
                        text: '',
                        color: '#10B981'
                    }
                },
                {
                    type: 'error',
                    background: 'white',
                    color: '#EF4444',
                    icon: {
                        className: 'notyf__icon--error',
                        tagName: 'i',
                        text: '',
                        color: '#EF4444'
                    }
                },
                {
                    type: 'warning',
                    background: 'white',
                    color: '#F59E0B',
                    icon: {
                        className: 'notyf__icon--warning',
                        tagName: 'i',
                        text: '',
                        color: '#F59E0B'
                    }
                },
                {
                    type: 'info',
                    background: 'white',
                    color: '#3B82F6',
                    icon: {
                        className: 'notyf__icon--info',
                        tagName: 'i',
                        text: 'i',
                        color: '#3B82F6'
                    }
                }
            ]
        });

        // Add custom CSS styles
        const style = document.createElement('style');
        style.textContent = `
        

            /* Custom Notyf styles for white background */
            .notyf__toast {
                background: white !important;
               
                border-radius: 4px !important;
                box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
            }

            .notyf__toast--success {
              border-left: 4px solid #10B981 !important;
                color: #10B981;
            }

            .notyf__toast--error {
                border-left: 4px solid #EF4444 !important;
                color: #EF4444;
            }

            .notyf__toast--warning {
                border-left: 4px solid #F59E0B !important;
                color: #F59E0B;
            }

            .notyf__toast--info {
            border-left: 4px solid #3B82F6 !important;
                color: #3B82F6;
            }

            .notyf__message {
                font-weight: 600;
            }

            .notyf__icon {
                font-size: 18px !important;
                font-weight: bold !important;
            }
        `;
        document.head.appendChild(style);
    </script>

</body>

</html>