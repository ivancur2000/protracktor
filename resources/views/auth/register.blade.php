<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="form w-100">
            <form method="POST" action="{{ route('register') }}" novalidate>
                @csrf

                <div class="mb-10 text-center">
                    <h1 class="mb-3 text-dark">Create an Account</h1>
                    <div class="text-gray-400 fw-bold fs-4">Already have an account?
                        <a href="{{ route('login') }}" class="link-primary fw-bolder">Sign in here</a>
                    </div>
                </div>

                <div class="mb-10 fv-row">
                    <x-jet-label value="{{ __('First Name') }}" />

                    <x-jet-input class="{{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        :value="old('name')" required autofocus autocomplete="name" />
                    <x-jet-input-error for="name"></x-jet-input-error>
                </div>

                <div class="mb-10 fv-row">
                    <x-jet-label value="{{ __('Last Name') }}" />

                    <x-jet-input class="{{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name"
                        :value="old('last_name')" required autofocus autocomplete="last_name" />
                    <x-jet-input-error for="last_name"></x-jet-input-error>
                </div>

                <div class="mb-10 fv-row">
                    <x-jet-label value="{{ __('Email') }}" />

                    <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                        :value="old('email')" required />
                    <x-jet-input-error for="email"></x-jet-input-error>
                </div>

                <div class="mb-10 fv-row">
                    <x-jet-label value="{{ __('Phone Number') }}" />

                    <x-jet-input class="{{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number"
                        :value="old('phone_number')" required />
                    <x-jet-input-error for="phone_number"></x-jet-input-error>
                </div>

                <div class="my-4">
                    <label class="form-check form-check-custom form-check-solid form-check-inline" for="terms">
                        <x-jet-checkbox name="terms" id="terms" />

                        <div class="ml-2">
                            {!! __('i agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                class="ms-1 link-primary">'.__('terms of service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                class="ms-1 link-primary">'.__('privacy policy').'</a>',
                            ]) !!}
                        </div>
                    </label>
                </div>

                <div class="text-center">
                    <x-jet-button class="btn-primary w-100">
                        {{ __('Register') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
