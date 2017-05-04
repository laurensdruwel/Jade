$( document ).ready(function(){


});


$(".slider").on("mouseup",function(){
    $("#value").html($(".slider").val());
    radius = $(".slider").val();
    console.log("heys");
    initMap();
});

var citymap = {
    cafe_pick: {
        center: {lat: 51.2094712, lng: 3.2236961},
        range: 250
    },
    cafe_du_theatre: {
        center: {lat: 51.2101922, lng: 3.2234527},
        range: 100
    },
    charlie_rockets: {
        center: {lat: 51.2098614, lng: 3.2289328},
        range: 500
    }
};

var radius = 2;
var initMap = function() {
    // Create the map.
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        center: {lat: 51.209348, lng: 3.2246995},
        mapTypeId: 'terrain',
        disableDefaultUI: true
    });





    for (var city in citymap) {
        // Add the circle for this city to the map.
        var cityCircle = new google.maps.Circle({
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35,
            map: map,
            center: citymap[city].center,
            radius: radius * 30 /*citymap[city].range*/
        });

    }
    google.maps.event.addDomListener(window, 'load', function(){
        var input = document.getElementById('locationTextField');
        var autocomplete = new google.maps.places.Autocomplete(input);
    });



};


