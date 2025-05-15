@extends('layouts/blankLayout')

@section('title', 'Register - Property Portal')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
<style>
.authentication-wrapper {
    background-color: #f0f9ff;
    min-height: 100vh;
    display: flex;
    align-items: center;
}

.authentication-inner {
    width: 450px;
    margin: 0 auto;
}

.card {
    border: none;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    border-radius: 10px;
    background-color: #ffffff;
}

.form-control {
    border-radius: 6px;
    padding: 8px 12px;
    border-color: #e5e7eb;
    transition: all 0.2s ease;
    height: 42px;
}

.form-control:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 0.15rem rgba(59, 130, 246, 0.1);
}

.btn-primary {
    background-color: #3b82f6;
    border-color: #3b82f6;
    border-radius: 6px;
    padding: 10px;
    font-weight: 500;
    height: 42px;
}

.btn-primary:hover {
    background-color: #2563eb;
    border-color: #2563eb;
}

.card-body {
    padding: 2rem;
}

.app-brand-text {
    color: #3b82f6 !important;
}

.form-check-input:checked {
    background-color: #10b981;
    border-color: #10b981;
}

.form-label {
    color: #4b5563;
    font-weight: 500;
    margin-bottom: 6px;
}

.text-accent {
    color: #10b981;
}

.accent-border {
    border-left: 3px solid #10b981;
    padding-left: 10px;
}
</style>
@endsection

@section('content')
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register Card -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center mb-3">
                        <a href="{{url('/')}}" class="app-brand-link gap-2">
                            <span
                                class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'#3b82f6'])</span>
                            <span class="app-brand-text demo fw-bold ms-1">{{config('variables.templateName')}}</span>
                        </a>
                    </div>

                    <div class="mb-3 accent-border">
                        <h4 class="fw-semibold mb-1">Real Estate Simplified</h4>
                        <p class="text-muted mb-0">Buy. Sell. Invest. All in one place.</p>
                    </div>

                    <form id="formAuthentication" class="mb-3" action="{{url('/')}}" method="GET">
                        <div class="mb-2">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Enter your username" autofocus>
                        </div>

                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="name@example.com">
                        </div>

                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="••••••••" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms">
                                <label class="form-check-label" for="terms-conditions">
                                    I agree to the
                                    <a href="javascript:void(0);" class="text-accent">terms & conditions</a>
                                </label>
                            </div>
                        </div>

                        <button class="btn btn-primary d-grid w-100">
                            Sign up
                        </button>
                    </form>

                    <div class="text-center">
                        <span class="text-muted">Already have an account?</span>
                        <a href="{{url('auth/login-basic')}}" class="text-accent fw-semibold ms-1">
                            Sign in
                        </a>
                    </div>
                </div>
            </div>
            <!-- Register Card -->
        </div>
    </div>
</div>
@endsection