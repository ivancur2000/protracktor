@extends('layouts.theme.app')
@section('mainSection', 'Communication')
@section('pageTitle', 'Dashboard - Communication - Event - Select Version')
@section('content')
<livewire:communication.event.select-version :event="$event" />
@endsection