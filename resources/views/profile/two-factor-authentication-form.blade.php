<div>
    <div class="bg-secondary rounded border-dotted border-primary d-flex justify-content-between align-items-center">
        <div class="d-flex p-5">
            <div class="me-2">
                <svg width="33" height="38" viewBox="0 0 33 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 19.59L12.41 17L11 18.41L15 22.41L23 14.41L21.59 13L15 19.59Z" fill="#0357B9"/>
                    <path d="M16.5 38L8.008 33.5309C5.58709 32.2597 3.56259 30.3618 2.15177 28.0409C0.74096 25.72 -0.00290546 23.0637 8.52854e-06 20.3571V2.71429C0.000736559 1.99463 0.290702 1.30466 0.806269 0.795789C1.32184 0.286918 2.02089 0.000718575 2.75001 0H30.25C30.9791 0.000718575 31.6782 0.286918 32.1937 0.795789C32.7093 1.30466 32.9993 1.99463 33 2.71429V20.3571C33.0029 23.0637 32.259 25.72 30.8482 28.0409C29.4374 30.3618 27.4129 32.2597 24.992 33.5309L16.5 38ZM2.75001 2.71429V20.3571C2.74773 22.5717 3.35652 24.7451 4.51106 26.644C5.66559 28.543 7.32226 30.0957 9.30325 31.1356L16.5 34.9234L23.6967 31.1369C25.6779 30.0969 27.3348 28.544 28.4893 26.6448C29.6438 24.7456 30.2525 22.572 30.25 20.3571V2.71429H2.75001Z" fill="#0357B9"/>
                </svg>
            </div>
            <div class="ms-2">
                <div class="fw-bolder">
                    @if ($this->enabled)
                        {{ __('You have enabled two factor authentication.') }}
                    @else
                        {{ __('Secure Your Account.') }}
                    @endif
                </div>
                <div>
                    {{ __('Two-factor authentication adds an extra layer of security to your account. When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone\'s Google Authenticator application.') }}
                </div>
            </div>
        </div>
        <div class="p-5 text-center">
            @if (! $this->enabled)
                <x-jet-confirms-password wire:then="enableTwoFactorAuthentication">
                    <button class="btn btn-primary ms-2" type="button" wire:loading.attr="disabled">
                        {{ __('Enable') }}
                    </button>
                </x-jet-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-jet-confirms-password wire:then="regenerateRecoveryCodes">
                        <button class="btn btn-outline-info mb-1">
                            <div wire:loading wire:target="regenerateRecoveryCodes" class="spinner-border spinner-border-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>

                            {{ __('Regenerate Recovery Codes') }}
                        </button>
                    </x-jet-confirms-password>
                @else
                    <x-jet-confirms-password wire:then="showRecoveryCodes">
                        <button class="btn btn-outline-info mb-1">
                            <div wire:loading wire:target="showRecoveryCodes" class="spinner-border spinner-border-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>

                            {{ __('Show Recovery Codes') }}
                        </button>
                    </x-jet-confirms-password>
                @endif

                <x-jet-confirms-password wire:then="disableTwoFactorAuthentication">
                    <x-jet-danger-button wire:loading.attr="disabled">
                        <div wire:loading wire:target="disableTwoFactorAuthentication" class="spinner-border spinner-border-sm" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>

                        {{ __('Disable') }}
                    </x-jet-danger-button>
                </x-jet-confirms-password>
            @endif
        </div>
    </div>

    @if ($this->enabled)
        @if ($showingQrCode)
            <p class="mt-3">
                {{ __('Two factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application.') }}
            </p>

            <div class="mt-3">
                {!! $this->user->twoFactorQrCodeSvg() !!}
            </div>
        @endif

        @if ($showingRecoveryCodes)
            <p class="mt-3">
                {{ __('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.') }}
            </p>

            <div class="bg-light rounded p-3">
                @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                    <div>{{ $code }}</div>
                @endforeach
            </div>
        @endif
    @endif



























    <div class="mt-3">
        
    </div>
</div>