<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <input class="form-control" type="text" id="search-box"/>
            </div>

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="country-container"></div>
                    </div>
                </div>
            </div>

            <br>
            <div id="hits-container"></div>

            <div class="col-md-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <div id="pagination"></div>
                    </ul>
                </nav>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.createSearch();
        },

        methods: {
            createSearch() {
                var search = instantsearch({
                    appId: '9JUTOYSC0P',
                    apiKey: '1a8a0bdc9bf17ec7fea1046d16055136',
                    indexName: 'users',
                    urlSync: true
                });

                search.addWidget(
                    instantsearch.widgets.searchBox({
                        container: '#search-box',
                        placeholder: 'Search for users...'
                    })
                );

                var itemTemplate = '<div class="col-md-4">'+
                    '<div class="panel panel-default user-panel">'+
                    '<a href="/@{{ username }}">'+
                    '<div class="media">'+
                    '<div class="media-left">'+
                    '<img style="max-height: 68px;" class="media-object" src="{{ avatar }}" alt="{{ username }}">'+
                    '</div>'+
                    '<div class="media-body">'+
                    '<h5 class="media-heading">{{ username }}</h4>'+
                    '<i class="fa fa-map-marker" aria-hidden="true"></i> {{ country }}'+
                    '</div>'+
                    '</div>'+
                    '</a>'+
                    '</div>'+
                    '</div>';

                search.addWidget(
                    instantsearch.widgets.hits({
                        container: '#hits-container',
                        templates: {
                            empty: '<div class="panel panel-default text-center">'+
                            '<div class="panel-body">'+
                            '<h4>No results</h4>'+
                            '</div>'+
                            '</div>',
                            item: itemTemplate
                        },
                        hitsPerPage: 50
                    })
                );

                search.addWidget(
                    instantsearch.widgets.refinementList({
                        container: '#country-container',
                        attributeName: 'country',
                        operator: 'or',
                        limit: 25,
                        templates: {
//                                header: 'Filter by Country'
                        }
                    })
                );

                search.addWidget(
                    instantsearch.widgets.pagination({
                        container: '#pagination',
                        cssClasses: {
                            root: 'pagination',
                            active: 'active'
                        }
                    })
                );

                search.start();
            }
        }
    }
</script>