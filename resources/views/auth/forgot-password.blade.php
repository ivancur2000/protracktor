<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="form w-100">

        <x-jet-validation-errors class="mb-4" />

            <div class="text-center mb-10">
                <h1 class="text-dark mb-3">Forgot Password ?</h1>
                <div class="text-gray-400 fw-bold fs-4">Enter your email to reset your password.</div>
            </div>

            @if (session('status'))
                <div class="mb-4 fs-4 text-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="/forgot-password" novalidate>
                @csrf
                <div class="fv-row mb-10">
                    <x-jet-label value="Email" />
                    <x-jet-input type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                    <button class="btn btn-lg btn-primary fw-bolder me-4" type="submit">
                        Submit
                    </button>
                    <a href="{{ route('login') }}" class="btn btn-lg btn-light-primary fw-bolder">Cancel</a>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>