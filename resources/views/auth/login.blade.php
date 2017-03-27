@extends('layouts.default')

@section('page_title')
    Login
@endsection

@section('styles')

@endsection

@section('scripts')

@endsection

@section('content')
    <div class="container">

        <h1>Login</h1>

        <div class="row">
            <div class="col-md-6">
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

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>

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

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                    <a href="{{ url('/auth/github') }}" class="btn btn-social-icon btn-github">
                                        <span class="fa fa-github"></span>
                                    </a>

                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                        Forgot Your Password?
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

@endsection