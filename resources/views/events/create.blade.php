@extends('layouts.eventLayout')

@section('title')
    New event
@endsection

@section('formStart')
<form action="/events" method="POST" id="saveForm">
    @csrf
</form>
@endsection

@section('eventName')
    <div class="row w-100">
        <div class="col-auto">
            <div class="form-group mb-0">
                <label for="tbx_eventName" class="bmd-label-floating">Title</label>
                <input type="text" required class="form-control" id="tbx_eventName" name="title" maxlength="26"
                       minlength="3" form="saveForm"/>
            </div>
        </div>
        <div class="col-auto mt-4">
            <button class="btn btn-raised btn-primary" type="submit" form="saveForm">
                Create
            </button>
        </div>
        <div class="col-auto mt-4">
            <a class="btn btn-raised btn-danger" href="/dashboard">
                Cancel
            </a>
        </div>
    </div>
@endsection

@section('contentDesc')
    <textarea class="form-control" id="tbx_eventDescription" name="description"></textarea>
@endsection

@section("contentEvent")
    <div class="col pl-0">
        <div class="row">
            <div class="col-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" id="date" class="w-100 mt-2">
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" id="time" class="w-100 mt-2">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary w-100">
                            <i class="fa fa-plus mr-1" aria-hidden="true"></i>
                            New date
                        </button>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Dates
                    </div>
                    <div class="card-body">
                        <em>TODO: Display added dates here</em>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
