<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="form w-100 mb-10">

            <div class="text-center mb-10">
                <img alt="Logo" class="mh-125px" src="{{ asset('media/svg/misc/smartphone.svg') }}" />
            </div>

            <div class="text-center mb-10">
                <h1 class="text-dark mb-3">Two Step Verification</h1>
                <div class="text-muted fw-bold fs-5 mb-5">Please confirm access to your account by entering the authentication code provided by your
                    authenticator application</div>
                <!--end::Mobile no-->
            </div>
            <div x-data="{ recovery: false }">

                <x-jet-validation-errors class="mb-3" />

                <form method="POST" action="{{ route('two-factor.login') }}">
                    @csrf

                    <div class="mb-3" x-show="! recovery">
                        <x-jet-label value="{{ __('Code') }}" />
                        <x-jet-input class="{{ $errors->has('code') ? 'is-invalid' : '' }}" type="text"
                            inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                        <x-jet-input-error for="code"></x-jet-input-error>
                    </div>

                    <div class="mb-3" x-show="recovery">
                        <x-jet-label value="{{ __('Recovery Code') }}" />
                        <x-jet-input class="{{ $errors->has('recovery_code') ? 'is-invalid' : '' }}" type="text"
                            name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                        <x-jet-input-error for="recovery_code"></x-jet-input-error>
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        <button type="button" class="btn btn-outline-secondary mr-2" x-show="! recovery" x-on:click="
                                            recovery = true;
                                            $nextTick(() => { $refs.recovery_code.focus() })
                                        ">
                            {{ __('Use a recovery code') }}
                        </button>

                        <button type="button" class="btn btn-outline-secondary mr-2" x-show="recovery" x-on:click="
                                            recovery = false;
                                            $nextTick(() => { $refs.code.focus() })
                                        ">
                            {{ __('Use an authentication code') }}
                        </button>

                        <button class="btn btn-primary" type="submit">
                            {{ __('Log in') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>