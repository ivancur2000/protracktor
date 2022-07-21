<x-guest-layout>
    <div class="row justify-content-center pt-4 bg-card-auth vh-100">
        <div class="col-6">
            <div>
                <x-jet-authentication-card-logo />
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    {!! $policy !!}
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>