<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="form w-100">

            <div class="text-center mb-10">
                <h1 class="text-dark mb-3">You Have Been Locked Out</h1>
                <div class="text-gray-400 fw-bold fs-4">Your account has been temporarily locked for 30 minutes due ti invalid login attemps
            </div>

            <i class="fa-solid fa-triangle-exclamation icon-warning"></i>

            {{-- <form method="POST"> --}}
                @csrf

                <div class="text-center">
                    <div class="d-flex justify-content-end align-items-baseline">
                        <x-jet-button class="btn-primary w-100" id="kt_sign_in_submit">
                            <span class="indicator-label">Request Access</span>
                        </x-jet-button>
                    </div>
                </div>
            {{-- </form> --}}
        </div>
    </x-jet-authentication-card>
</x-guest-layout>