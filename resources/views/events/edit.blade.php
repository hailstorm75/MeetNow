@extends('layouts.eventLayout')

@section('title')
    Edit event
@endsection

@section('formStart')
    <form action="/events/{{ $event->id }}" method="POST">
        @csrf
        @method('PUT')
@endsection

@section('eventName')
<div class="col-auto">
    <div class="form-group mb-0">
        <label for="tbx_eventName" class="bmd-label-floating">Title</label>
        <input type="text" class="form-control" id="tbx_eventName" name="title" value="{{ $event->title  }}"/>
    </div>
</div>
<div class="col-auto mt-4">
    <button class="btn btn-raised btn-primary" type="submit">
        Save
    </button>
</div>
<div class="col-auto mt-4">
    <a class="btn btn-raised btn-danger" href="/dashboard">
        Cancel
    </a>
</div>
@endsection

@section('contentDesc')
    <textarea class="form-control" id="tbx_eventDescription"
              name="description">{{ $event->description  }}</textarea>
@endsection
@section('formEnd')
    </form>
@endsection
