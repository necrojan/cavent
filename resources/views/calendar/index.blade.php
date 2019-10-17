@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Events</div>

                    <div class="card-body">
                        <event></event>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Events</div>

                    <div class="card-body">
                        <calendar></calendar>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection