@extends('layouts.default')

@section('page_title')
    About
@endsection

@section('styles')

@endsection

@section('scripts')

@endsection

@section('content')
    <div class="container">

        <h1>About PHPMap</h1>
        <hr>

        <div class="row">
            <div class="col-md-3">
                <h3>Collaborate</h3>
                <article>
                    <strong>PHPMap</strong> allows you to easily find and collaborate with other php developers in your area.
                    Connect and work with others on the next big thing!
                </article>
            </div>

            <div class="col-md-3">
                <h3>Write articles</h3>
                <article>
                    <strong>Developers</strong> <span class="red"><i class="fa fa-heart" aria-hidden="true"></i></span> markdown! Write your articles in markdown and share them with others.
                    You can also export and use them on sites like GitHub and other sites/apps that support .md files.
                </article>
            </div>

            <div class="col-md-3">
                <h3>Connect</h3>
                <article>
                    <strong>Find</strong> other developers in your area and connect with them.
                    Organize meetups, work on projects and make friends.
                    Maybe you will also find your new job!
                </article>
            </div>

            <div class="col-md-3">
                <h3>Learn</h3>
                <article>
                    <strong>Learn</strong> from other developers on PHPMap!
                    As a developer, you will never stop learning.
                    Find developers around you and learn from the best.
                </article>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-4">
                <h3>Story</h3>
                <article>
                    Back in 2015, <a href="https://twitter.com/fwartner">Florian Wartner</a> was building <strong>Laramap</strong> which was only for the <a
                            href="https://laravel.com">Laravel Community</a>. He decided to reinvent the idea behind Laramap and created <strong>PHPMap</strong>.
                    After <a href="https://twitter.com/taylorotwell">Taylor Otwell</a> pushed the first code of Laravel 5.3 on GitHub, Florian started working on PHPMap.
                    It was released on August the 28. in 2016 right after Laravel 5.3 was released. <br> <br>
                    PHPMap is a community for PHP-Developers around the globe to organize meetups, get to know other developers in your city/country and learning from others.
                </article>
            </div>


            <div class="col-md-8">
                <h3>Sponsors & Partners</h3>
                <div class="col-md-3">
                    <a href="https://m.do.co/c/0955426a9bc1"><img src="{{ asset('images/sponsors/do_logo.png') }}" alt="DO Logo" class="img img-responsive"></a>
                </div>

                <div class="col-md-3">
                    <a href="https://algolia.com"><img src="{{ asset('images/sponsors/algolia-light.png') }}" alt="Algolia Logo" class="img img-responsive"></a>
                </div>

                <div class="col-md-3">
                    <a href="https://pusher.com"><img src="{{ asset('images/sponsors/pusher_logo_dark.png') }}" alt="Pusher Logo" class="img img-responsive"></a>
                </div>

                <div class="col-md-3">
                    <a href="https://larajobs.com/?partner=499"><img src="{{ asset('images/sponsors/larajobs.jpg') }}" alt="Larajobs Logo" class="img img-responsive"></a>
                </div>

                <div class="col-md-3">
                    <a class="fortrabbit" href="https://www.fortrabbit.com">•fortrabbit</a>
                </div>

                <div class="col-md-3">
                    <a href="https://php.ug"><img src="{{ asset('images/partners/phpug.png') }}" alt="PHPug Logo" class="img img-responsive"></a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_styles')

@endsection

@section('footer_scripts')

@endsection