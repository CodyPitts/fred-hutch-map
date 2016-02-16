<?php
    /*
     Template Name: Leaflet Map
     */
?>

<!DOCTYPE html>
<html>
<head>
<title>Fred Hutch Virtual Map</title>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
</head>
<body>
<div id="map" style="width: 960px; height: 315px"></div>


<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
<script>

//get URLs for images
// this part holds "http://host_name"
var urlBegin = window.location.protocol + "//" + window.location.host;

// this part gets everything after host_name
var pathArray = window.location.pathname.split( '/' );
var directoryFolder = pathArray[1];

//put them together with folder path ( http://localhost:888/wordpresstest/wp-content/uploads/2016 )
urlBegin = urlBegin + "/" + directoryFolder + "/wp-content/uploads/2016";

// setup map
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
    url = urlBegin + '/01/FH_Angle_2.png';

// calculate the edges of the image, in coordinate space
var southWest = map.unproject([0, h], map.getMaxZoom()-1);
var northEast = map.unproject([w, 0], map.getMaxZoom()-1);
var bounds = new L.LatLngBounds(southWest, northEast);

// setup map dimensions
var zoom = 1;
var center_h = h / (zoom * 8),
    center_w = w / (zoom * 8);

map.setView([center_h, center_w], zoom);

var initialView = new L.imageOverlay( url, [[ center_h * 2, 0 ], [ 0, center_w * 2]] );
map.addLayer(initialView);

function createHotzones(){
    //add a hotzone
    var quad1 = L.polygon([[160,1],[160,175],[105,205],[70,1]], {
                          weight: 2,
                          opacity: 1,
                          color: 'green',
                          fillOpacity: 0.1,
                          dashArray: '4'
                          });
    // return the hotzone to add to the map outside the function
    return quad1;
}

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
function changeAngle(e, map, initialView, hotspot2){

    //switch camera angle
    var initialView2 = new L.ImageOverlay(urlBegin + '/01/FH_Angle_7.png', [[ center_h * 2, 0 ], [ 0, center_w * 2]]);
    map.addLayer(initialView2);
    
    //add a test hotspot to the new image
    var hotspot1 = L.marker([105, 312]);
    hotspot1.bindPopup("<b>Employee Parking</b>");
    var parking = L.layerGroup([hotspot1]);
   
    //menu basics
    var filters = {
        "Parking": parking
    };
    var mapMenu = L.control.layers(null,filters).addTo(map);
    
    
    //define the back button
    var goBackIcon = L.icon({
        iconUrl: urlBegin + '/02/edited_back_arrow.png',
        iconSize: [40,40]
    });
    
    //add back button to the map
    var backButton = L.marker([145, 10], {icon: goBackIcon}).addTo(map);
    
    //event to go back when the back button is clicked
    backButton.on('click', function(e){
        //remove new layers
        map.removeLayer(initialView2);
        map.removeLayer(hotspot1);
        map.removeLayer(backButton);
        mapMenu.removeFrom(map);
                  
        //add back initial map angle layer
        map.addLayer(initialView);
        map.addLayer(hotspot2);
    });
}

//create quad1 and add to map
quad1 = createHotzones();
map.addLayer(quad1);

var hotspot2 = L.marker([105, 175]);
hotspot2.bindPopup("<b>Thomas</b>");
hotspot2.addTo(map);

// mouseover and mouseout for hotzone
quad1.on('mouseover', function(e){
         highlightFeature(e);
});
quad1.on('mouseout', function(e){
         resetStyle(e);
});

//hotzone click
quad1.on('click', function(e){
         map.removeLayer(hotspot2);
         changeAngle(e, map, initialView, hotspot2);
});


</script>
</body>
</html>

