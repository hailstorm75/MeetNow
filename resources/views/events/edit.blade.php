@extends('events.eventLayout')

@section('title')
    Edit event
@endsection

@section('formStart')
    <form action="/events/{{ $event->id }}" method="POST">
        @csrf
        @method('PUT')
@endsection

@section('eventName')
<div class="form-group mb-0">
    <label for="tbx_eventName" class="bmd-label-floating">Title</label>
    <input type="text" class="form-control" id="tbx_eventName" name="title" value="{{ $event->title  }}"/>
</div>
@endsection

@section('contentSub')
    <div>
        <a href="/dashboard">Cancel</a>
    </div>
    <div>
        <button class="btn btn-primary" type="submit">
            Save
        </button>
    </div>
@endsection
@section('contentDesc')
    <textarea class="form-control" id="tbx_eventDescription"
              name="description">{{ $event->description  }}</textarea>
@endsection
@section('formEnd')
    </form>
@endsection
