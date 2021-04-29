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
    <script>
        function ts(cb) {
            if (cb.readOnly)
                cb.checked=cb.readOnly=false;
            else if (!cb.checked)
                cb.readOnly=cb.indeterminate=true;

            const state = cb.checked
                ? 1
                : cb.indeterminate
                    ? 0
                    : -1;
            const ids = cb.id.split(":");


            $.ajax({
                url: '/events/{{ $event->id }}/participate',
                type: 'POST',
                dataType: "json",
                data : {
                    "_token": "{{ csrf_token() }}",
                    "state": state,
                    "participant_id": ids[0],
                    "date_id": ids[1]
                },
            });
        }
    </script>
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
                            <th class="text-center">
                                {{ str_replace("-", "/", explode(" ", $date->datetime)[0]) }}
                                <br>
                                {{ explode(" ", $date->datetime)[1] }}
                            </th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($participants->groupBy('name') as $key => $participantGroup)
                        <tr>
                            <td class="row">{{ $key }}</td>
                            @foreach($dates as $date)
                                @foreach($participantGroup as $participant)
                                    <td class="text-center">
                                        <input type="checkbox" id="{{ $participant->user_id }}:{{ $date->id }}" onclick="ts(this)" />
                                        @if (isset($participant->state))
                                            <script>
                                                @if ($participant->state === 0)
                                                    $("#{{ $participant->user_id }}:{{ $date->id }}").prop("indeterminate", true).submit();
                                                @elseif ($participant->state === 1)
                                                    $("#{{ $participant->user_id }}:{{ $date->id }}").prop("checked", true).submit();
                                                @endif
                                            </script>
                                        @endif
                                    </td>
                                @endforeach
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
