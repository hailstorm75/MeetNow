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
    <div class="col pl-0">
        <div class="card">
            <div class="card-header">
                <h3>Select dates</h3>
            </div>
            <div class="card-body">
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
        </div>
    </div>
@endsection
