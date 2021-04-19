@extends('layouts.mainLayout')

@section('title')
    Dashboard
@endsection

@section("content")
    <div class="row ml-3 mr-3">
        <div class="col mr-3">
            <div class="card">
                <div class="card-header">
                    <h2>My events</h2>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <h3>
                            <i class="fa fa-frown-o" aria-hidden="true"></i>
                        </h3>
                        <span>
                            You haven't created any events
                        </span>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="mt-3 btn btn-primary">
                        <i class="fa fa-plus mr-2 d-none d-sm-inline"></i>
                        Create event
                    </button>
                </div>
            </div>
        </div>
        <div class="col ml-3">
            <div class="card">
                <div class="card-header">
                    <h2>Joined events</h2>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <h3>
                            <i class="fa fa-frown-o" aria-hidden="true"></i>
                        </h3>
                        <span>
                            You haven't joined any events
                        </span>
                    </div>
                </div>
                <div class="card-footer pt-0">
                    <form class="mb-1">
                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-0">
                                    <label for="tbx_event_code" class="bmd-label-floating">Event code</label>
                                    <input type="text" required maxlength="36" minlength="36" pattern="[A-Za-z0-9]{8}-([A-Za-z0-9]{4}-){3}[A-Za-z0-9]{12}" class="form-control" id="tbx_event_code">
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <button type="submit" class="mr-2 mb-0 btn btn-primary" style="margin-top: 1.75rem">
                                    Join
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
