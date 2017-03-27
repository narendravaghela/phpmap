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
                <div class="row">
                    <div class="col-md-3">
                        <h3>{{ $user->username }}</h3>
                        @if($user->is_verified)
                            <p><small><strong>Verified</strong> <i class="fa fa-star verified" aria-hidden="true"></i></small></p>
                        @else
                            <p><small><strong>Unverified</strong> <i class="fa fa-star-o" aria-hidden="true"></i></small></p>
                        @endif
                    </div>

                    @if(Auth::check() && Auth::user()->is_admin)
                        <div class="col-md-2 pull-right">
                            <br>
                            <div class="btn-group">
                                <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Actions <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#"></a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Report User</a></li>
                                    @if($user->is_admin)
                                        @canImpersonate
                                        <li role="separator" class="divider"></li>
                                        <li><a href="{{ route('impersonate', $user->id) }}">Impersonate</a></li>
                                        @endCanImpersonate
                                    @endif
                                </ul>
                            </div>
                            <a href="/api/users/{{ $user->id }}/follow" class="btn btn-xs btn-primary">Follow User</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
            <li role="presentation"><a href="#activity" aria-controls="activity" role="tab" data-toggle="tab">Activity</a></li>
            <li role="presentation"><a href="#resources" aria-controls="resources" role="tab" data-toggle="tab">Resources</a></li>
        </ul>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="activity">

            </div>

            <div role="tabpanel" class="tab-pane" id="profile">

            </div>

            <div role="tabpanel" class="tab-pane" id="resources">

            </div>
        </div>
    </div>

@endsection

@section('footer_styles')

@endsection

@section('footer_scripts')

@endsection