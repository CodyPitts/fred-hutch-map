<?php
    /*
     Template Name: Leaflet Map
     */
?>

<!DOCTYPE html>
<html>
<head>
<title>Leaflet Quick Start Guide Example</title>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
</head>
<body>
<div id="map" style="width: 960px; height: 315px"></div>

<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
<script>

//setup map
var map = L.map('map', {
                zoomControl: false,
                dragging: false,
                touchZoom: false,
                scrollWheelZoom: false,
                doubleClickZoom: false,
                boxZoom: false,
                crs: L.CRS.Simple
                });
var w = 1920,
    h = 631,
    url = 'http://localhost:8888/wordpresstest/wp-content/uploads/2016/01/FH_Angle_2.png';

// calculate the edges of the image, in coordinate space
var southWest = map.unproject([0, h], map.getMaxZoom()-1);
var northEast = map.unproject([w, 0], map.getMaxZoom()-1);
var bounds = new L.LatLngBounds(southWest, northEast);

// setup map dimensions
var zoom = 1;
var center_h = h / (zoom * 8),
    center_w = w / (zoom * 8);

map.setView([center_h, center_w], zoom);

L.imageOverlay( url, [[ center_h * 2, 0 ], [ 0, center_w * 2]] ).addTo( map );


//add a hotzone
var quad1 = L.polygon([[160,1],[160,175],[105,205],[70,1]], {
                        weight: 2,
                        opacity: 1,
                        color: 'green',
                        fillOpacity: 0.1,
                        dashArray: '4'
                        }).addTo(map);

//highlight for hotzones on mouseover
function highlightFeature(e) {
    var layer = e.target;
    
    layer.setStyle({
                   weight: 5,
                   color: 'green',
                   dashArray: '',
                   fillOpacity: 0.3
                   });
    
    if (!L.Browser.ie && !L.Browser.opera) {
        layer.bringToFront();
    }
}

//reset hotzone after mouseout
function resetStyle(e) {
    var layer = e.target;
    
    layer.setStyle({
                   weight: 2,
                   opacity: 1,
                   color: 'green',
                   fillOpacity: 0.1,
                   dashArray: '4'
                   });
    
    if (!L.Browser.ie && !L.Browser.opera) {
        layer.bringToFront();
    }
}

//switch angle when a hotzone is clicked
function changeAngle(e, map){
    var nmap = new L.ImageOverlay('http://localhost:8888/wordpresstest/wp-content/uploads/2016/01/FH_Angle_2.png');
    map.addLayer(nmap);
    //L.imageOverlay(nmap).addTo(map);
    map.removeLayer(nmap);
}

// mouseover and mouseout
quad1.on('mouseover', function(e){
         highlightFeature(e);
});
quad1.on('mouseout', function(e){
         resetStyle(e);
});
quad1.on('click', function(e){
         changeAngle(e, map);
});

</script>
</body>
</html>

