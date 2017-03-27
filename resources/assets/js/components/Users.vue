<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <input class="form-control" type="text" id="search-box"/>
            </div>

            <br><br>
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

                var itemTemplate = '<div class="col-md-3">' +
                    '<div class="thumbnail">' +
                    '<img src="{{ avatar }}" alt="{{ username }}" class="img img-circle img-responsive" style="max-height: 150px;">' +
                    '<div class="caption">' +
                    '<h4 class="text-center">{{ username }}</h4>' +
                    '<p class="text-center">{{ country }}</p>' +
                    '<a  href="/@{{ username }}" class="btn btn-default btn-xs btn-block" role="button">View Profile</a>' +
                    '</div>' +
                    '</div>' +
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