@extends('layouts.theme.app')
@section('mainSection', 'Communications')
@section('pageTitle', 'Dashboard - Communications - Edit Closing Timeline')
@section('content')
<livewire:communication.timeline.timeline-edit :timeline="$timeline">
@endsection