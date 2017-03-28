<template>
    <div id="map" :class="{loaded: mapLoaded}"></div>
</template>

<script>
    var MarkerClusterer = require('marker-clusterer-plus');
    var InfoBox = require('../extra/google_maps_infobox.js');

    export default {
        data() {
            return {
                users: [],
                usergroups: [],
                mapLoaded: false,
                map: null,
                markerClusterer: null
            };
        },

        mounted() {
            this.mapInit();
//            this.loadUserGroups();
        },

        methods: {
            mapInit() {
                var properties = this.loadMapProperties();
                var mapOptions = {
                    zoom: properties.zoom,
                    center: new google.maps.LatLng(properties.lat, properties.lng),
                    scrollwheel: false
                };
                this.map = new google.maps.Map(document.querySelector('#map'), mapOptions);
                this.createMap();
                google.maps.event.addListener(this.map, 'idle', () => {
                    $('footer').css('margin-top', ($('#map').height() - 160)+ 'px');
                });
                google.maps.event.addListener(this.map, 'dragend', () => {
                    this.storeMapProperties();
                });
                google.maps.event.addListener(this.map, 'zoom_changed', () => {
                    this.storeMapProperties();
                });
            },
            createMap() {
                axios.get('/api_public/users').then(response => {
                    this.users = response.data;
                    var all = this.users;
                    var positions = [];
                    var markers = [];
                    var infowindow = new google.maps.InfoWindow({
                    content: ""
                });

                all.forEach(function (user) {
                    var usr = {
                        name: user.name,
                        username: user.username,
                        avatar: user.avatar,
                        geo: {
                            lat: parseFloat(user.lat),
                            lon: parseFloat(user.lng)
                        }
                    };

                    // Make sure that we don't have two users at the exact same position
                    var position;
                    var randomness = 0.01;

                    while(true && usr.geo.lat > 0 && usr.geo.lon > 0) {
                        position = usr.geo.lat + "-" + usr.geo.lng;

                        if(positions.indexOf(position) !== -1) {
                            usr.geo.lat += (Math.random() - 0.5) * randomness;
                            usr.geo.lon += (Math.random() - 0.5) * randomness;
                        } else {
                            break;
                        }
                    }

                    positions.push(position);

                    var html = '<div class="profile"><img class="img img-circle" src="' + usr.avatar + '" alt="">&nbsp;<a href="/@'+ usr.username +'">' + usr.username + '</a></div>';
                    var userLatLng = new google.maps.LatLng(usr.geo.lat, usr.geo.lon);

                    var marker = new google.maps.Marker({
                        position: userLatLng
                    });

                    markers.push(marker);
                    var infoBox = null;

                    google.maps.event.addListener(marker, 'click', function (evt) {
                        if(infoBox === null) {
                            infoBox = new InfoBox({
                                latlng: this.getPosition(),
                                map: this.map,
                                content: html,
                                offset: {
                                    vertical: -190,
                                    horizontal: -50
                                }
                            });
                        } else {
                            infoBox.toggle();
                        }
                    });
                });

                var clustererOptions = {
                    imagePath: '/images/map/m'
                };

                this.markerClusterer = new MarkerClusterer(this.map, markers, clustererOptions);

                // Map and markers are loaded, show the map
                this.mapLoaded = true;

                // Add the usergroups
                if(this.usergroups.length > 0) {
                    this.addUserGroupsToMap();
                }
                });
            },

            loadMapProperties() {
                var properties = JSON.parse(localStorage.getItem('HomeMap.properties'));
                return properties ? properties : { lat: 51.165691, lng: 10.451526, zoom: 3 };
            },

            storeMapProperties() {
                localStorage.setItem('HomeMap.properties', JSON.stringify({
                    lat: this.map.getCenter().lat(),
                    lng: this.map.getCenter().lng(),
                    zoom: this.map.getZoom()
                }));
            },

            addUserGroupsToMap() {
                this.usergroups.forEach((usergroup) => {
                    let latLng = new google.maps.LatLng(usergroup.latitude, usergroup.longitude);

                var image = {
                    url: '/images/elephpant.png',
                    anchor: new google.maps.Point(22, 0)
                };

                var marker = new google.maps.Marker({
                    position: latLng,
                    title: "Hello World!",
                    icon: image
                });

                let infoBox = null;
                var tags = "";

                if(usergroup.tags) {
                    tags = '<div class="tags">';
                    usergroup.tags.forEach((tag) => {
                        tags += '<span>' + tag.name + '</span>';
                });
                    tags += '</div>';
                }

                var html = '<div class="usergroup"><a href="' + usergroup.url + '" target="_blank" class="name">Usergroup ' + usergroup.name + '</a>' + tags + '</div>';

                google.maps.event.addListener(marker, 'click', function (evt) {
                    if (infoBox === null) {
                        infoBox = new InfoBox({
                            latlng: this.getPosition(),
                            map: this.map,
                            content: html,
                            offset: {
                                vertical: -10,
                                horizontal: 30
                            }
                        });
                    } else {
                        infoBox.toggle();
                    }
                });

                this.markerClusterer.addMarker(marker);

                });
            },

            loadUserGroups() {
                axios.get('/api_public/usergroups').then(response => {
                    let result = response.json();
                if(typeof result.groups != 'undefined') {
                    this.usergroups = result.groups;
                    if(this.markerClusterer !== null) {
                        this.addUserGroupsToMap();
                    }
                }
            });
            }
        }
    }
</script>

<style>
    #map {
        opacity: 0;
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0;
        top: 0;
        transition: opacity .2s;
    }

    #map.loaded {
        opacity: 1;
    }
    #map .cluster {
        -webkit-touch-callout: none; /* iOS Safari */
        -webkit-user-select: none; /* Chrome/Safari/Opera */
        -khtml-user-select: none; /* Konqueror */
        -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
        user-select: none;
    }

    .infobox {
        position: absolute;
        user-select: none;
    }

    .infobox .content .profile {
        text-align: center;
    }

    .infobox .profile .img {
        width: 100px;
        height: 100px;
        display: block;
        margin: 0 auto;
        border: 3px solid #4CAF50;
        box-shadow: 0 1px 30px rgba(0, 0, 0, 0.3);
    }

    .infobox .profile a {
        display: inline-block;
        margin-top: 5px;
        background: white;
        border-radius: 20px;
        padding: 6px 12px;
        font-size: 14px;
        box-shadow: 0 1px 30px rgba(0, 0, 0, 0.3);
    }

    .infobox .usergroup {
        padding: 6px 12px 10px 12px;
        background: white;
        text-align: left;
        border-radius: 5px;
        position: relative;
        box-shadow: 0 1px 30px rgba(0, 0, 0, 0.3);
    }

    .infobox .usergroup:after {
        right: 100%;
        top: 21px;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
        border-color: rgba(255, 255, 255, 0);
        border-right-color: #fff;
        border-width: 10px;
        margin-top: -10px;
    }

    .infobox .usergroup .name {
        font-size: 18px;
        line-height: 26px;
    }

    .infobox .usergroup a {
        font-size: 14px;
    }

    .infobox .usergroup .tags span {
        display: inline-block;
        background: #4CAF50;
        color: white;
        border-radius: 5px;
        padding: 4px 8px;
        margin-right: 5px;
        margin-bottom: 5px;
    }
</style>