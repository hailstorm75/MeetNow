@extends('layouts.eventLayout')

@section('title')
    Edit event
@endsection

@section('formStart')
    <form onsubmit="submitForm()" method="POST" id="frm_saveForm">
    </form>
    <form id="frm_date" onsubmit="onAddDateClicked()" method="POST">
    </form>
    <script>
        const forms = document.getElementsByTagName("form");
        function handleForm(event) {event.preventDefault()}
        forms[0].addEventListener('submit', handleForm)
        forms[1].addEventListener('submit', handleForm)

        function submitForm () {
            $.ajax({
                url: '/events/{{ $event->id }}',
                type: 'PUT',
                dataType: "json",
                data : {
                    "_token": "{{ csrf_token() }}",
                    "title": document.getElementById("tbx_eventName").value,
                    "description": document.getElementById("tbx_eventDescription").value,
                    "dates": JSON.stringify(dates, null, 2)
                },
                success: window.location.replace("/dashboard")
            });
        }
    </script>
@endsection

@section('eventName')
<div class="col-auto">
    <div class="form-group mb-0">
        <label for="tbx_eventName" class="bmd-label-floating">Title</label>
        <input type="text" class="form-control" id="tbx_eventName" name="title" value="{{ $event->title  }}" form="frm_saveForm"/>
    </div>
</div>
<div class="col-auto mt-4">
    <button class="btn btn-raised btn-primary" type="submit" form="frm_saveForm">
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
              form="frm_saveForm"
              name="description">{{ $event->description  }}</textarea>
@endsection

@section("contentEvent")
    <script>
        class MyDate {
            date;
            time;
            id;

            get date() {
                return this.date;
            }

            get time() {
                return this.time;
            }

            constructor(id, date, time) {
                this.id = id;
                this.date = date;
                this.time = time;
            }
        }

        const dates = [];

        function createUUID() {
            return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
                const r = Math.random() * 16 | 0, v = c === 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
        }

        function onAddDateClickedEx(date, time) {
            const id = createUUID();
            const newDate = new MyDate(id, date, time);
            const newRow = document.getElementById("tbl_date").insertRow(0);
            newRow.id = id;

            const a = newRow.insertCell(0);
            const b = newRow.insertCell(1);
            const c = newRow.insertCell(2);
            a.innerHTML = date;
            b.innerHTML = time;
            c.innerHTML = "<button class='btn' onclick='onDeleteDateClicked(\"" + id + "\")'>Delete</button>"

            dates.push(newDate);
        }

        function onAddDateClicked() {
            const date = document.getElementById("date").value;
            const time = document.getElementById("time").value;

            const existingDates = dates.filter(function (e) {
                return e.date === date && e.time === time;
            })

            if (existingDates.length > 0) {
                alert("Please select a date that isn't created yet")
                return;
            }

            onAddDateClickedEx(date, time);
        }

        function onDeleteDateClicked(id) {
            const row = document.getElementById(id).rowIndex
            document.getElementById("tbl_date").deleteRow(row - 1)
        }

    </script>
    <div class="col pl-0">
        <div class="row">
            <div class="col-2">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" id="date" class="w-100 mt-2" required="true" form="frm_date">
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" id="time" class="w-100 mt-2" required="true" form="frm_date">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary w-100" form="frm_date" type="submit">
                            <i class="fa fa-plus mr-lg-1" aria-hidden="true"></i>
                            <span class="d-none d-lg-inline">New date</span>
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
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="tbl_date">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        @foreach ($dates as $date)
            onAddDateClickedEx('{{ explode(" ", $date->datetime)[0] }}', '{{ explode(" ", $date->datetime)[1] }}')
        @endforeach
    </script>
@endsection
