@extends('layouts.mainLayout')

@section('title')
New event
@endsection

@section('content')

<form action="/events/{{ $event->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="col">
        <div class="row">
            <label for="tbx_eventName" class="bmd-label-floating">Title</label>
            <input type="text" class="form-control" id="tbx_eventName" name="title" value="{{ $event->title  }}"/>
        </div>
        <div class="row">
            <label for="tbx_eventDescription" class="bmd-label-floating">Description</label>
            <textarea class="form-control" id="tbx_eventDescription" name="description">
                {{ $event->description  }}
            </textarea>
        </div>
        <div class="row">
            <button class="btn btn-primary" type="submit">
                Create
            </button>
        </div>
    </div>
</form>

@endsection
