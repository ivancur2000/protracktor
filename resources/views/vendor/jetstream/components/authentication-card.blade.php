<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed bg-card-auth">
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <div>
                {{ $logo }}
            </div>

            <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                {{ $slot }}
            </div>
        </div>      
    </div>
</div>