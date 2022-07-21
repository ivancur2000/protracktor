@extends('layouts.theme.app')
@section('mainSection', 'User Management')
@section('pageTitle', 'Dashboard - User Management - Profile')
@section('content')
<div class="card mb-10">
    <div class="card-body pb-0">
        <div class="d-flex">
            <div class="me-10 position-relative">
                @if (auth()->user()->profilePhotoSrc)
                <img class="rounded-circle" width="150px" height="150px" src="{{ auth()->user()->profilePhotoSrc }}">
                @else
                <img class="rounded-circle" width="150px" height="150px" src="assets/media/avatars/blank.png">
                @endif
                <i class="bi bi-circle-fill position-absolute top-50 start-100 translate-middle text-success"></i>
            </div>
            <div>
                <div>
                    <h3>{{ auth()->user()->full_name }} <span class="badge badge-light-success">Active</span></h3>
                </div>
                <div class="mb-5">
                    <span class="me-2">
                        <i class="bi bi-person-circle"></i>
                        {{ auth()->user()->account_access }}
                    </span>
                    <span class="mx-2">
                        <i class="bi bi-geo-alt-fill"></i>
                        {{ auth()->user()->location }}
                    </span>
                    <span class="ms-2">
                        <i class="bi bi-envelope"></i>
                        {{ auth()->user()->email }}
                    </span>
                </div>
                <div>
                    <span class="me-2">
                        <span class="text-muted">Account Created:</span> {{ auth()->user()->created_at_formatted }}
                    </span>
                    <span class="ms-2">
                        <span class="text-muted">Last Logged In:</span> {{ auth()->user()->last_session->last_login_date }}
                    </span>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" 
                        href="#overview">
                        <span class="fw-bolder text-primary">Overview</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" 
                        href="#security">
                        <span class="fw-bolder text-primary">Security</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" 
                        href="#api-Keys">
                        <span class="fw-bolder text-primary">API Keys</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="overview" role="tabpanel">
        <livewire:user.profile />
    </div>
    <div class="tab-pane fade" id="security" role="tabpanel">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title fw-bolder">Security</h3>
            </div>
            <div class="card-body">
                <h4 class="card-title fw-bolder">Sign-in Method</h4>
                <livewire:user.change-email />
                <div class="border-top-dotted mb-7">
                </div>
                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    @livewire('profile.update-password-form')

                    <x-jet-section-border />
                @endif
                @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                    @livewire('profile.two-factor-authentication-form')

                    <x-jet-section-border />
                @endif
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="api-Keys" role="tabpanel">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title fw-bolder">API Keys</h3>
            </div>
            <div class="card-body">
                <livewire:user.api-keys />
            </div>
        </div>
    </div>
</div>
@endsection
