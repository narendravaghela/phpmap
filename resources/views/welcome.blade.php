@extends('layouts.default')

@section('page_title')
    Home
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.css" />
@endsection

@section('scripts')

@endsection

@section('content')
    <!--<div class="map-wrapper">
        <homemap></homemap>
    </div>-->

    <div class="no-margin">
        <div class="container-full-bg" style="background-image:url('/images/bg-banner.jpg');">
            <div class="container special">
                <div class="jumbotron">
                    <h1 class="text-center">Hello, world!</h1>
                    <h4 class="text-center">
                        <strong>PHPMap</strong> is the new social network for PHP-Developers around the world. <br>

                    </h4>
                    <p class="text-center">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <input type="text" id="search-input" class="form-control" placeholder="Search for users, meetups and more.."/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
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
    </div>

    <div class="container">
        <h3>Latest Users</h3>
        <userlist></userlist>
        <hr>
    </div>
@endsection

@section('footer_styles')

@endsection

@section('footer_scripts')
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.jquery.min.js"></script>

    <script type="text/template" id="search_results_template">
        <div class="my-custom-menu">
            <div class="row">
                <div class="col-sm-12">
                    <div class="aa-dataset-users" style="padding: 5px;"></div>
                </div>
                <div class="col-sm-12">
                    <div class="aa-dataset-ug" style="padding: 5px;"></div>
                    <div class="aa-dataset-d3"></div>
                </div>
            </div>
        </div>
    </script>


    <script id="search_empty_template" type="text/template">
        <div class="autocomplete-wrapper empty">
            <div class="h2">We didn't find any result for "@{{{ query }}}". Sorry!</div>
        </div>
    </script>

    <script id="search_footer_template" type="text/template">
        <div class="footer" style="padding: 8px;">
            <div class="pull-right">Powered by
                <a target="_blank" href="https://www.algolia.com/?utm_source=phpmap&utm_medium=link&utm_campaign=phpmap_search">
                    <img width="50" src="https://www.algolia.com/assets/algolia128x40.png">
                </a>
            </div>

        </div>
    </script>

    <script>
        console.log('Search initialized.');
        var client = algoliasearch('{!! env('ALGOLIA_APP_ID') !!}', '{!! env('ALGOLIA_SECRET') !!}');
        var userindex = client.initIndex('users');
        var ugindex = client.initIndex('devusergroups');

        $('#search-input').autocomplete(
            {
                templates: {
                    dropdownMenu: '#search_results_template',
                    footer: '#search_footer_template',
                    empty: '#search_empty_template'
                }
            },
            [
                {
                    source: $.fn.autocomplete.sources.hits(userindex, { hitsPerPage: 5 }),
                    name: 'users',
                    templates: {
                        header: '<h4>Users</h4><hr>',
                        suggestion: function(suggestion) {
                            return suggestion._highlightResult.username.value;
                        }
                    }
                },
                {
                    source: $.fn.autocomplete.sources.hits(ugindex, { hitsPerPage: 5 }),
                    name: 'ug',
                    templates: {
                        header: '<h4>Usergroups</h4><hr>',
                        suggestion: function(suggestion) {
                            return suggestion._highlightResult.name.value;
                        }
                    }
                }
            ]).on('autocomplete:selected', function(event, suggestion, dataset) {
                console.log(suggestion);
                if (dataset === 'ug') {
                    window.location = "/usergroups/" + suggestion.shortname;
                }

                if (dataset === 'users') {
                    window.location = "/@" + suggestion.username;
                }
            }
        );

    </script>
@endsection