<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Lucknow Hitech Developers')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>


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
    @yield('style')
</head>

<body>
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
                                <input type="password" class="form-control border-start-0" id="password" name="password"
                                    placeholder="••••••••" required>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn w-100" style="background-color: #FF9933; color: white;">
                            Login
                        </button>
                    </form>
                </div>

                <!-- Footer -->
                <div class="modal-footer justify-content-center border-0">
                    <p class="mb-0">
                        Don't have an account?
                        <a href="#" style="color: #E68A00;" data-bs-toggle="modal" data-bs-target="#signupModal">Sign
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
                                <input type="text" class="form-control border-start-0" id="name" placeholder="John Doe"
                                    name="name" required>
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

    @yield('script')


    <!-- registeration js --------------------------------->
    <script>
        document.querySelector('#signupForm').addEventListener('submit', function(e) {
            e.preventDefault();

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
                    if (data.errors) {
                        let messages = '';
                        for (let field in data.errors) {
                            messages += data.errors[field].join('\n') + '\n';
                        }
                        showToast('alert', messages, 'bx bx-error', 'bg-saffron');
                    } else {
                        showToast('alert', 'Registration successful!', 'bx bx-error',
                            'bg-saffron');
                        const modalEl = document.getElementById('signupModal');
                        const modal = bootstrap.Modal.getInstance(modalEl);
                        modal.hide();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>

    <!-- login js ----------------------------------------------------------------->
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = {
                email: document.getElementById('email').value,
                password: document.getElementById('password').value
            };

            fetch('http://127.0.0.1:8000/landing/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute(
                                'content'),
                    },
                    body: JSON.stringify(formData)
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    console.log(data.redirect);
                    if (data.status === 'success') {
                        showToast('success', data.message, 'bx bx-error', 'bg-saffron');
                        const modalEl = document.getElementById('loginModal');
                        const modal = bootstrap.Modal.getInstance(modalEl);
                        modal.hide();
                        setTimeout(() => {
                            window.location.href = data
                                .redirect;
                        }, 1500);
                    } else {
                        showToast('error', 'invalid email or password ! Please try again.',
                            'bx bx-error',
                            'bg-saffron');
                    }
                })
                .catch(error => {
                    console.error('Login error:', error);
                    alert('Something went wrong.');
                });
        });
    </script>

    <!-- logout script -->
    <script>
        document.getElementById('logout').addEventListener('click', function(e) {

            e.preventDefault();

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
                    console.log(data);
                    if (data.status === 'success') {
                        showToast('Success', data.message, 'bx bx-check-circle',
                            'bg-saffron');
                        setTimeout(() => {
                            window.location.href = '/';
                        }, 1500);
                    } else {
                        showToast('error', 'Failed to logout.', 'bx bx-error', 'bg-danger');
                    }
                })
                .catch(err => {
                    showToast('Error', 'Something went wrong.', 'bx bx-error', 'bg-danger');
                    console.error(err);
                });
        });
    </script>



    <!-- function toshow the toast----------------------------------------- -->
    <script>
        function showToast(title, message, iconClass, bgColor) {
            const toastHTML = `
        <div class="bs-toast toast fade show ${bgColor} text-white" role="alert" aria-live="assertive" aria-atomic="true">
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

            document.getElementById('toast-container').insertAdjacentHTML('beforeend', toastHTML);

            const toastEl = document.querySelector('#toast-container .toast:last-child');
            const bsToast = new bootstrap.Toast(toastEl, {
                delay: 3000
            });
            bsToast.show();

        }
    </script>


</body>

</html>