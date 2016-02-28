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
<div id="map" style="width: 94.8%; height: 100vh"></div>


<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
<script>

//FOR ABOVE MAP STYLE: width: 960px; height: 315px

//get URLs for images
// this part holds "http://host_name"
var urlBegin = window.location.protocol + "//" + window.location.host;

// this part gets everything after host_name up until the individual folders holding the images
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
var w = (1200 * screen.width)/1280,
    h = (675 * screen.height)/800,
    url = urlBegin + '/02/FredHutch_Home-1200x675.png';

// calculate the edges of the image, in coordinate space
var southWest = map.unproject([0, h], map.getMaxZoom()-1);
var northEast = map.unproject([w, 0], map.getMaxZoom()-1);
var bounds = new L.LatLngBounds(southWest, northEast);

// setup map dimensions, change x in zoom * x if dimensions are off
var zoom = 1;
var center_h = h / (zoom * 4),
    center_w = w / (zoom * 4);

map.setView([center_h, center_w], zoom);

var initialView = new L.imageOverlay( url, [[ center_h * 2, 0 ], [ 0, center_w * 2]] );
map.addLayer(initialView);

function createHotzones(){
    //add a hotzone for eastlake
    var eastlakeZone = L.polygon([[210,30],[215,195],[190,200],[170,30]], {
                          weight: 2,
                          opacity: 1,
                          color: 'green',
                          fillOpacity: 0.1,
                          dashArray: '4'
                          });
    // return the hotzone to add to the map outside the function
    return eastlakeZone;
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

//switch to Eastlake angle when eastlakeZone is clicked
function changeEastlakeAngle(e, map, initialView, hotspot2){

    // Preload images
    var sequence = new Array()
    for(i = 1; i < 66; i++) {
        if (i < 10)
            sequence[i] = new L.ImageOverlay(urlBegin + '/02/FredHutch_EastLakePath0' + i + '-1200x675.png', [[ center_h * 2, 0 ], [ 0, center_w * 2]]);

        else
            sequence[i] = new L.ImageOverlay(urlBegin + '/02/FredHutch_EastLakePath' + i + '-1200x675.png', [[ center_h * 2, 0 ], [ 0, center_w * 2]]);
    }
    
    
    //add a test hotspot to the new image
    var hotspot1 = L.marker([155, 360]);
    hotspot1.bindPopup("<b>Skybridge</b>");
    var miscellaneous = L.layerGroup([hotspot1]);
    
    //menu basics
    var filters = {
        "Miscellaneous": miscellaneous
    };
    var mapMenu = L.control.layers(null,filters);
    
    //define the back button
    var goBackIcon = L.icon({
                            iconUrl: urlBegin + '/02/edited_back_arrow.png',
                            iconSize: [80,80]
                            });
    
    //define back button marker for the map
    var backButton = L.marker([318, 15], {icon: goBackIcon});
    
    
    // add all layers for path to zoom in
    map.addLayer(sequence[1]);
    var i = 2;
    setInterval(function(){
                map.addLayer(sequence[i]);
                map.removeLayer(sequence[i-1]);
                i++;
                
                //when all layers have been added, add back the back button and menu
                if (i == 65){
                    mapMenu.addTo(map);
                    backButton.addTo(map);
                }
                
                
    }, 50, 65);
    
     
    //event to go back when the back button is clicked
    backButton.on('click', function(e){
        map.removeLayer(hotspot1);
        map.removeLayer(backButton);
        mapMenu.removeFrom(map);
                  
        //remove all layers and get back to the home image
        var i = 65;
        setInterval(function(){
                    map.removeLayer(sequence[i]);
                    map.addLayer(sequence[i-1]);
                    i--;
                    
                    // when the initial layer is finally added back on, put the name hotspot back
                    if(i == 1){
                        map.addLayer(hotspot2);
                    }
        }, 50, 64);
    });
}

//create eastlakeZone and add to map
eastlakeZone = createHotzones();
map.addLayer(eastlakeZone);

var hotspot2 = L.marker([165, 240]);
hotspot2.bindPopup("<b>Thomas Building</b>");
hotspot2.addTo(map);

// mouseover and mouseout for hotzone
eastlakeZone.on('mouseover', function(e){
         highlightFeature(e);
});
eastlakeZone.on('mouseout', function(e){
         resetStyle(e);
});

//Eastlake Hotzone click
eastlakeZone.on('click', function(e){
         map.removeLayer(hotspot2);
         changeEastlakeAngle(e, map, initialView, hotspot2);
});


</script>
</body>
</html>

