@extends('layouts.theme.app')
@section('mainSection', 'Settings')
@section('pageTitle', 'Dashboard - Settings')
@section('content')
    <!--begin::Content-->
    <div id="kt_account_settings_profile_details" class="collapse show">
        <div class="card-body border-top p-9">
            @foreach ($global_api_keys as $index => $api_key)
                <livewire:setting :data="$api_key" :index="$index"/>
            @endforeach
        </div>
    </div>
    <!--end::Content-->
@endsection