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
        var itemList = $('.LocationList');
        var search = {
            delay: 100,
            data: '',
            xhr: null
        };
        var map = {
            element: $('#Map-holder'),
            config: {
                mapTypeId: mapsLoaded && google.maps.MapTypeId.ROADMAP,
                zoom: 16,
                center: mapsLoaded && new google.maps.LatLng(0, 0)
            },
            markers: [],
            bounds: mapsLoaded && new google.maps.LatLngBounds(null)
        };

        map.setActive = function (id) {
            if (!map.instance) {
                return;
            }
            var marker = map.getMarkerById(id);
            if (!marker) {
                return;
            }
            map.instance.panTo(marker.getPosition());
            marker.setZIndex(300);
            map.instance.setZoom(16);
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
            var items = itemList.find('.LocationList-item');
            items.on('click', function () {
                var item = $(this);
                items.removeClass('isActive');
                item.addClass('isActive');
                map.setActive(item.attr('data-location-id'));
            });
            items.each(function (index) {
                var item = $(this);
                var markerConfig = {
                    position: {
                        lat: Number(item.attr('data-location-lat')),
                        lng: Number(item.attr('data-location-lng'))
                    },
                    locationId: item.attr('data-location-id'),
                    map: map.instance,
                    animation: google.maps.Animation.DROP
                };
                var marker = new google.maps.Marker(markerConfig);

                marker.addListener('click', function () {
                    map.setActive(index);
                    items.removeClass('isActive');
                    item.addClass('isActive');
                    $(window).scrollTop(item.offset().top);
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

        search.form = $('.Location-search');
        search.url = search.form.attr('action');
        search.method = search.form.attr('method');
        search.action  = debounce(function () {
            search.submit();
        }, 200);
        search.submit  = function () {
            var data = search.form.serialize();
            if (data === search.data) {
                return;
            }
            search.data = search.form.serialize();

            if (search.xhr && search.xhr.abort) {
                search.xhr.abort();
            }

            search.xhr = $.ajax({
                method: search.method,
                url: search.url,
                data: search.data,
                success: function(response) {
                    var results = $(response);
                    var list = results.find('.LocationList');
                    var items = list.find('.LocationList-item');

                    map.clear();

                    itemList.html(list.html());

                    if (items.length) {
                        map.setMarkers();
                    }
                }
            });
        };

        search.form.on('submit', function (e) {
            e.preventDefault();
            search.submit();
        });

        search.form.find(':input').on('change keyup blur', function () {
            search.action();
        });

        map.instance = mapsLoaded && new google.maps.Map(map.element.get(0), map.config);
        map.setMarkers();

    });
}(window.jQuery));
