"use strict";

(function() {
    $(function() {
        var map = new google.maps.Map(document.getElementById("Map-holder"), {
            center: new google.maps.LatLng({
                lat: Number(loc.latitude),
                lng: Number(loc.longitude)
            }),
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var marker = new google.maps.Marker({
            position: {
                lat: Number(loc.latitude),
                lng: Number(loc.longitude)
            },
            map: map,
            locationId: loc.id,
            animation: google.maps.Animation.DROP
        });

        marker.addListener("click", function(m) {

            map.panTo(marker.getPosition());

        });

        $(window).on("resize", function() {

            map.panTo(marker.getPosition());

        });
    });
})();
