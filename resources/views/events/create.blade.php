@extends('layouts.eventLayout')

@section('title')
    New event
@endsection

@section('formStart')
    <form action="/events" method="POST">
        @csrf
@endsection

@section('eventName')
    <div class="col-auto">
        <div class="form-group mb-0">
            <label for="tbx_eventName" class="bmd-label-floating">Title</label>
            <input type="text" required class="form-control" id="tbx_eventName" name="title" maxlength="26" minlength="3"/>
        </div>
    </div>
    <div class="col-auto mt-4">
        <button class="btn btn-raised btn-primary" type="submit">
            Create
        </button>
    </div>
    <div class="col-auto mt-4">
        <a class="btn btn-raised btn-danger" href="/dashboard">
            Cancel
        </a>
    </div>
@endsection

@section('contentDesc')
    <textarea class="form-control" id="tbx_eventDescription" name="description"></textarea>
@endsection
@section('formEnd')
    </form>
@endsection
