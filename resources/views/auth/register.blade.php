@extends('layouts.default')

@section('page_title')
    Register
@endsection

@section('styles')

@endsection

@section('scripts')

@endsection

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Information</h3>
                    </div>
                    <div class="panel-body">
                        <h5>What is PHPMap?</h5>
                        <p>PHPMap is an interactive map of php-developers worldwide.</p>

                        <h5>Features</h5>
                        <ul class="fa-ul">
                            <li class=""><i class="fa fa-check green" aria-hidden="true"></i> Meet other php-developers around you</li>
                            <li><i class="fa fa-check green" aria-hidden="true"></i> Organize meetups & usergroups in your area</li>
                            <li><i class="fa fa-check green" aria-hidden="true"></i> Work on projects together</li>
                            <li><i class="fa fa-check green" aria-hidden="true"></i> Find awesome projects</li>
                            <li><i class="fa fa-check green" aria-hidden="true"></i> Have a look, who´s next to you</li>
                            <li><i class="fa fa-check green" aria-hidden="true"></i> Create own articles / tutorials and more</li>
                            <li><i class="fa fa-check green" aria-hidden="true"></i> More will follow..</li>
                        </ul>

                        <h5>Can I contribute?</h5>
                        <p>Yes. The source of PHPMap is licensed under the MIT-License available on <a href="https://github.com/PHPMap/PHPMap">GitHub</a>.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Register</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" name="form" id="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Display Name</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-md-4 control-label">Address</label>

                                <div class="col-md-6">
                                    <input type="search" name="address" class="form-control" id="address-input"/>
                                    <input type="hidden" name="lat" value="">
                                    <input type="hidden" name="lng" value="">

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            @if ($errors->has('city'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>

                                    <a href="{{ url('/auth/github') }}" class="btn btn-social-icon btn-github">
                                        <span class="fa fa-github"></span>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_styles')

@endsection

@section('footer_scripts')
    <script>
        var placesAutocomplete = places({
            container: document.querySelector('#address-input'),
        });
        var updateLatLng = function(e) {
            $('<input>').attr({
                type: 'hidden',
                id: 'lat',
                name: 'lat',
                value: e.suggestion['latlng']['lat']
            }).appendTo('form');
            $('<input>').attr({
                type: 'hidden',
                id: 'lng',
                name: 'lng',
                value: e.suggestion['latlng']['lng']
            }).appendTo('form');
            $('<input>').attr({
                type: 'hidden',
                id: 'city',
                name: 'city',
                value: e.suggestion['name']
            }).appendTo('form');
            $('<input>').attr({
                type: 'hidden',
                id: 'country',
                name: 'country',
                value: e.suggestion['country']
            }).appendTo('form');
        };
        placesAutocomplete.on('change', function(e) {
            updateLatLng(e);
            console.log(e.suggestion);
        });
    </script>
@endsection