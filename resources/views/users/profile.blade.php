@extends('layouts.default')

@section('page_title')
    User Profile
@endsection

@section('styles')

@endsection

@section('scripts')

@endsection

@section('content')
    <div class="container">
        <div class="fb-profile">
            @if($user->profile_cover === '/images/profile_cover.jpg')
                <div style="background: lightslategrey; height: 200px;"></div>
            @endif
            <img align="left" class="fb-image-profile thumbnail" src="{{ $user->avatar }}" alt="{{ $user->username }}"/>
            <div class="fb-profile-text">
                <h3>{{ $user->username }}</h3>
                <p>Girls just wanna go fun.</p>
            </div>
        </div>

        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
        </ul>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">

            </div>

            <div role="tabpanel" class="tab-pane" id="profile">

            </div>

            <div role="tabpanel" class="tab-pane" id="messages">

            </div>

            <div role="tabpanel" class="tab-pane" id="settings">

            </div>
        </div>
    </div>

@endsection

@section('footer_styles')

@endsection

@section('footer_scripts')

@endsection