@extends('layouts.eventLayout')

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

@section('contentEvent')
    <div class="col">
        <table class="table">
            <thead>
                <tr>
                    <th>Participant</th>
                    @foreach($dates as $date)
                        <th>{{ $date->datetime }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($participants->groupBy('name') as $key => $participant)
                    <tr>
                        <td class="row">{{ $key }}</td>
                        @foreach($dates as $date)
                            <td>

                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
