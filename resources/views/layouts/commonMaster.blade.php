<!DOCTYPE html>

<html class="light-style layout-menu-fixed" data-theme="theme-default" data-assets-path="{{ asset('/assets') . '/' }}"
    data-base-url="{{url('/')}}" data-framework="laravel" data-template="vertical-menu-laravel-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title') | Real Estate</title>
    <meta name="description"
        content="{{ config('variables.templateDescription') ? config('variables.templateDescription') : '' }}" />
    <meta name="keywords"
        content="{{ config('variables.templateKeyword') ? config('variables.templateKeyword') : '' }}">
    <!-- laravel CRUD token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Canonical SEO -->
    <link rel="canonical" href="{{ config('variables.productPage') ? config('variables.productPage') : '' }}">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />



    <!-- Include Styles -->
    @include('layouts/sections/styles')

    <!-- Include Scripts for customizer, helper, analytics, config -->
    @include('layouts/sections/scriptsIncludes')
    <style>
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
            background: linear-gradient(90deg, #0241a7, #3281e2, #93C5FD, #3B82F6);
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
    </style>
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

    // Removed the click event listener so the progress bar only shows on initial page load

    window.showProgressBar = showProgressBar;
    window.completeProgressBar = completeProgressBar;
</script>
    <div id="toast-container" class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;"></div>

    <!-- Layout Content -->
    @yield('layoutContent')
    <!--/ Layout Content -->



    <!-- Include Scripts -->
    @include('layouts/sections/scripts')

</body>

</html>