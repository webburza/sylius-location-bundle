'use strict';

(function ($) {

    function debounce (fn, delay) {
        var timer = null;
        return function () {
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
                fn.apply(context, args);
            }, delay);
        };
    };

    $(function () {

        var mapsLoaded = window.google && window.google.maps;
        var map = {
            element: $('#mapHolder'),
            config: {
                mapTypeId: mapsLoaded && google.maps.MapTypeId.ROADMAP,
                zoom: 16,
                center: mapsLoaded && new google.maps.LatLng(0, 0)
            },
            markers: [],
            bounds: mapsLoaded && new google.maps.LatLngBounds(null)
        };

        map.getMarkerById = function (id) {
            var i = 0;
            for (; i < map.markers.length; i++) {
                if (map.markers[i].locationId == id) {
                    return map.markers[i];
                }
            }
            return null;
        };

        map.clear = function () {
            if (!map.instance) {
                return;
            }
            $.each(map.markers, function () {
                this.setMap(null);
            });
            map.markers = [];
            map.bounds = new google.maps.LatLngBounds(null);
        };

        map.setMarkers = function () {
            if (!map.instance) {
                return;
            }

            var items = $('.location-item');

            items.each(function () {
                var item = $(this);
                var markerConfig = {
                    position: {
                        lat: Number(item.attr('data-latitude')),
                        lng: Number(item.attr('data-longitude'))
                    },
                    locationId: item.attr('data-id'),
                    map: map.instance,
                    animation: google.maps.Animation.DROP
                };
                var marker = new google.maps.Marker(markerConfig);

                marker.addListener('click', function () {
                    window.location = item.attr('data-href');
                });

                map.markers.push(marker);

                map.bounds.extend(new google.maps.LatLng({
                    lat: markerConfig.position.lat,
                    lng: markerConfig.position.lng
                }));
            });
            map.instance.panToBounds(map.bounds);
            map.instance.fitBounds(map.bounds);
        };

        map.instance = mapsLoaded && new google.maps.Map(map.element.get(0), map.config);
        map.setMarkers();

    });
}(window.jQuery));
