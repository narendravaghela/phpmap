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

            <hr>
        </div>


    </div>

    <div class="container">

    </div>
@endsection

@section('footer_styles')

@endsection

@section('footer_scripts')
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script>
        var client = algoliasearch('{!! env('ALGOLIA_APP_ID') !!}', '{!! env('ALGOLIA_SECRET') !!}')
        var index = client.initIndex('users');
        autocomplete('#search-input', { hint: false }, [
            {
                source: autocomplete.sources.hits(index, { hitsPerPage: 5 }),
                displayKey: 'my_attribute',
                templates: {
                    suggestion: function(suggestion) {
                        return suggestion._highlightResult.my_attribute.value;
                    }
                }
            }
        ]).on('autocomplete:selected', function(event, suggestion, dataset) {
            console.log(suggestion, dataset);
        });
    </script>

    <script type="text/template" id="my-custom-menu-template">
        <div class="my-custom-menu">
            <div class="row">
                <div class="col-sm-6">
                    <div class="aa-dataset-d1"></div>
                </div>
                <div class="col-sm-6">
                    <div class="aa-dataset-d2"></div>
                    <div class="aa-dataset-d3"></div>
                </div>
            </div>
        </div>
    </script>

    <script>
        $('#search-input').autocomplete(
            {
                templates: {
                    dropdownMenu: '#my-custom-menu-template',
                    footer: '<div class="branding">Powered by <img src="https://www.algolia.com/assets/algolia128x40.png" /></div>'
                }
            },
            [
                {
                    source: $.fn.autocomplete.sources.hits(index1, { hitsPerPage: 5 }),
                    name: 'd1',
                    templates: {
                        header: '<h4>List 1</h4>',
                        suggestion: function(suggestion) {
                            // FIXME
                        }
                    }
                },
                {
                    source: $.fn.autocomplete.sources.hits(index2, { hitsPerPage: 2 }),
                    name: 'd2',
                    templates: {
                        header: '<h4>List 2</h4>',
                        suggestion: function(suggestion) {
                            // FIXME
                        }
                    }
                },
                {
                    source: $.fn.autocomplete.sources.hits(index3, { hitsPerPage: 2 }),
                    name: 'd3',
                    templates: {
                        header: '<h4>List 3</h4>',
                        suggestion: function(suggestion, answer) {
                            // FIXME
                        }
                    }
                }
            ]
        );
    </script>
@endsection