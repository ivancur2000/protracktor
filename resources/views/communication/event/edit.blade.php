@extends('layouts.theme.app')
@section('mainSection', 'Communications')
@section('pageTitle', 'Dashboard - Communications - Create Closing Timeline - Edit ' . $event->name)
@section('content')
<livewire:communication.event.event-edit :event_id="$event->id"/>
@endsection