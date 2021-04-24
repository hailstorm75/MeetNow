@extends('events.eventLayout')

@section('title')
{{ $event->title }}
@endsection

@section('eventName')
<h3>
    @yield('title')
</h3>
@endsection

@section('contentSub')
    <a href="/dashboard">Back</a>
@endsection

@section('contentDesc')
    {{ $event->description }}
@endsection
