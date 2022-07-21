@extends('layouts.theme.app')
@section('mainSection', 'Communication')
@section('pageTitle', 'Dashboard - Communication - Event - Create')
@section('content')
<div class="w-50">
    <div class="pb-10">
        <span class="fs-2hx fw-bolder me-2 lh-1 ls-n2 mb-10">Create New Event</span>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <form action="{{ route('communication.event.store') }}" method="POST">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-md">
                        <label class="labels">Event Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Event Name" value="{{ old('name') }}" name="name">
                    </div>
                </div>
                <div class="d-flex flex-row my-5">
                    <div class="col-md">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="sms" id="smsCheckbox" value="1"
                                {{ old() ? (old('sms') ? 'checked' : '') : '' }}>
                            <label class="form-check-label" for="smsCheckbox">
                                SMS
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col d-flex justify-content-end">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection