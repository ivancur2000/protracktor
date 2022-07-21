<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="form w-100">

            <form method="POST" action="/reset-password">
                @csrf

                <div class="text-center mb-10">
                    <h1 class="text-dark mb-3">Setup New Password</h1>
                    <div class="text-gray-400 fw-bold fs-4">Already have reset your password ?
                        <a href="{{ route('login') }}" class="link-primary fw-bolder">Sign in here</a>
                    </div>
                </div>

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="fv-row mb-10">
                    <x-jet-label value="{{ __('Email') }}" />

                    <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                        :value="old('email', $request->email)" required autofocus />
                    <x-jet-input-error for="email"></x-jet-input-error>
                </div>

                <div class="mb-10 fv-row" data-kt-password-meter="true">

                    <div class="mb-1">
                        <x-jet-label value="{{ __('Password') }}" />
                        <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                            name="password" required autocomplete="new-password" />
                        <x-jet-input-error for="password"></x-jet-input-error>
                        <div class="d-flex mt-3 align-items-center mb-3" data-kt-password-meter-control="highlight">
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                        </div>
                    </div>
                    <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
                </div>

                <div class="mb-3">

                </div>

                <div class="fv-row mb-10">
                    <x-jet-label value="{{ __('Confirm Password') }}" />

                    <x-jet-input class="{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                    <x-jet-input-error for="password_confirmation"></x-jet-input-error>
                </div>

                <div class="text-center">
                    <x-jet-button class="btn-primary w-100">
                        {{ __('Reset Password') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>