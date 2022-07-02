@extends('admin_panel.layouts.app')
@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{--                <div class="card-header"><h2>Welcome, {{ Auth::user()->name }}!</h2></div>--}}
                    @include('admin_panel.layouts.menu')


                </div>
            </div>
        </div>
    </div>
@endsection
