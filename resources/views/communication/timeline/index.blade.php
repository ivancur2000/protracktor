@extends('layouts.theme.app')
@section('mainSection', 'Communications')
@section('pageTitle', 'Dashboard - Communications')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (!sizeof($timelines))
<div class="card mb-10">
    <div class="card-body my-20 mx-10">
        <div class="d-flex flex-row justify-content-between">
            <a href="{{route('communication.timeline.create') }} " 
                class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center h-md-25 mb-5 mb-xl-10 flex-column w-500px bg-primary">
                <div class="card-body d-flex">
                    <div class="d-flex flex-row flex-column-fluid">
                        <div class="d-flex flex-row-fluid flex-center flex-column h-200px">
                            <span class="fs-2hx fw-bolder text-white me-2 lh-1 ls-n2">Create Closing Timeline</span>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#" 
                class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center h-md-25 mb-5 mb-xl-10 flex-column w-500px bg-dark opacity-75">
                <div class="card-body d-flex">
                    <div class="d-flex flex-row flex-column-fluid">
                        <div class="d-flex flex-row-fluid flex-center flex-column h-200px">
                            <span class="fs-2hx fw-bolder text-white me-2 lh-1 ls-n2">Create Post Closing Timeline</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endif
<div class="d-flex flex-row justify-content-between">
    <div class="card shadow-sm flex-column w-600px">
        <div class="card-header">
            <h3 class="card-title text-primary">Active Timelines</h3>
        </div>
        <div class="card-body card-scroll h-600px">
            @foreach ($timelines as $timeline)
            <div>
                <a href="{{ route('communication.timeline.edit', $timeline) }}" class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center h-md-25 mb-5 mb-xl-10 flex-column bg-secondary">
                    <div class="card-body d-flex">
                        <div class="d-flex flex-row flex-column-fluid">
                            <div class="d-flex flex-row-fluid flex-center flex-column h-100px">
                                <span class="fs-2hx fw-bolder text me-2 lh-1 ls-n2">{{ $timeline->name }}</span>
                            </div>
                        </div>
                    </div>
                </a>
                <p>Last Updated on {{ $timeline->version_active->lastUpdated() }} by {{ $timeline->version_active->lastUserUpdated() }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection