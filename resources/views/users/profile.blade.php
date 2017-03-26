@extends('layouts.default')

@section('page_title')
    User Profile
@endsection

@section('styles')

@endsection

@section('scripts')

@endsection

@section('content')
    <div class="container-fluid">
        @canImpersonate
        <a href="{{ route('impersonate', $user->id) }}">Impersonate this user</a>
        @endCanImpersonate
        @impersonating
        <a href="{{ route('impersonate.leave') }}">Leave impersonation</a>
        @endImpersonating
        <div class="jumbotron">
            <h1>Hello, world!</h1>
            <p>...</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
        </div>
    </div>
@endsection

@section('footer_styles')

@endsection

@section('footer_scripts')

@endsection