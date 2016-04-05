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

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
</head>
<style>
    body {
        padding: 0;
        margin: 0;
    }
    html, body, #map {
        height: 100%;
        max-width: 736px;
        max-height: 414px;
        position: relative;
        margin-left: auto;
        margin-right: auto;
    }
    @media only screen and (min-device-width: 415px) {
        html, body, #map {
            height: 100%;
            max-width: 1200px;
            max-height: 675px;
            position: relative;
            margin-left: auto;
            margin-right: auto;
        }
    }

    .leaflet-popup-content-wrapper {
        border: 2px solid rgb(18,48,84);
        border-radius: 0px;
        font: 12px Calibri;
    }

    .leaflet-popup-tip-container {
        visibility: hidden;
    }

</style>
<body>
<div id="map"</div>

<script>L_DISABLE_3D = true;
//CAN ALSO ADD 'L_PREFER_CANVAS = true;' TO SPEED UP LOAD TIME, BUT SLOWS DOWN ZOOMING
</script>

<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
<script>

L.Browser.webkit3d = false;
L.Browser.any3d = false;

//Create sequences for image arrays
var eastlakeSequence = new Array();
var arnoldSequence = new Array();
var SCCASequence = new Array();
var thomasSequence = new Array();
var yaleSequence = new Array();


//FOR ABOVE MAP STYLE (ORIGINAL): width: 960px; height: 315px

//get URLs for images
// this part holds "http://host_name"
var urlBegin = window.location.protocol + "//" + window.location.host;
if (window.location.protocol != "http:"){
    urlBegin = window.location.host;
}
// this part gets everything after host_name up until the individual folders holding the images
var pathArray = window.location.pathname.split( '/' );
var directoryFolder = pathArray[1];

//put them together with folder path ( http://localhost:888/wordpresstest/wp-content/uploads/2016 )
if (directoryFolder == "wordpresstest")
    urlBegin = urlBegin + "/" + directoryFolder + "/wp-content/uploads/2016";
else
    urlBegin = urlBegin + "/wp-content/uploads/2016";

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
// remove Leaflet attribution in bottom corner
map.attributionControl.setPrefix("");
// width and height of the image
var w = 1200,
    h = 675,
    url = urlBegin + '/03/FredHutch_Home-1200x675.png';

/*// calculate the edges of the image, in coordinate space
var southWest = map.unproject([0, h], map.getMaxZoom()-1);
var northEast = map.unproject([w, 0], map.getMaxZoom()-1);
var bounds = new L.LatLngBounds(southWest, northEast);*/

// setup map dimensions, change x in zoom * x if dimensions are off
var zoom = 1;
var center_h = h / (zoom * 4),
    center_w = w / (zoom * 4);

map.setView([center_h, center_w], zoom);

var initialView = new L.imageOverlay( url, [[ center_h * 2, 0 ], [ 0, center_w * 2]] );
map.addLayer(initialView);

// PRELOAD IMAGES
preloadImages();

function preloadImages(){
    // Eastlake preload
    for(i = 1; i < 46; i++) {
        if (i < 10)
            eastlakeSequence[i] = new L.ImageOverlay(urlBegin + '/03/FredHutch_EastlakePath0' + i + '-1200x675.png', [[ center_h * 2, 0 ], [ 0, center_w * 2]]);
        else
            eastlakeSequence[i] = new L.ImageOverlay(urlBegin + '/03/FredHutch_EastlakePath' + i + '-1200x675.png', [[ center_h * 2, 0 ], [ 0, center_w * 2]]);
    }
    for (a = 1; a < 46; a++){
        map.addLayer(eastlakeSequence[a]);
        map.removeLayer(eastlakeSequence[a]);
    }

    // Arnold preload
    for(i = 1; i < 41; i++) {
        if (i < 10)
            arnoldSequence[i] = new L.ImageOverlay(urlBegin + '/03/FredHutch_ArnoldPath0' + i + '-1200x675.png', [[ center_h * 2, 0 ], [ 0, center_w * 2]]);
        
        else
            arnoldSequence[i] = new L.ImageOverlay(urlBegin + '/03/FredHutch_ArnoldPath' + i + '-1200x675.png', [[ center_h * 2, 0 ], [ 0, center_w * 2]]);
    }
    for(i = 1; i < 41; i++){
        map.addLayer(arnoldSequence[i]);
        map.removeLayer(arnoldSequence[i]);
    }
    
    // SCCA preload
    for(i = 1; i < 33; i++) {
        if (i < 10)
            SCCASequence[i] = new L.ImageOverlay(urlBegin + '/03/FredHutch_SCCAPath0' + i + '-1200x675.png', [[ center_h * 2, 0 ], [ 0, center_w * 2]]);
        
        else
            SCCASequence[i] = new L.ImageOverlay(urlBegin + '/03/FredHutch_SCCAPath' + i + '-1200x675.png', [[ center_h * 2, 0 ], [ 0, center_w * 2]]);
    }
    for(i = 1; i < 33; i++){
        map.addLayer(SCCASequence[i]);
        map.removeLayer(SCCASequence[i]);
    }
    
    // Thomas preload
    for(i = 1; i < 41; i++) {
        if (i < 10)
            thomasSequence[i] = new L.ImageOverlay(urlBegin + '/03/FredHutch_ThomasPath0' + i + '-1200x675.png', [[ center_h * 2, 0 ], [ 0, center_w * 2]]);
        
        else
            thomasSequence[i] = new L.ImageOverlay(urlBegin + '/03/FredHutch_ThomasPath' + i + '-1200x675.png', [[ center_h * 2, 0 ], [ 0, center_w * 2]]);
    }
    for(i = 1; i < 41; i++){
        map.addLayer(thomasSequence[i]);
        map.removeLayer(thomasSequence[i]);
    }
    
    // Yale preload
    for(i = 1; i < 46; i++) {
        if (i < 10)
            yaleSequence[i] = new L.ImageOverlay(urlBegin + '/03/FredHutch_YalePath0' + i + '-1200x675.png', [[ center_h * 2, 0 ], [ 0, center_w * 2]]);
        
        else
            yaleSequence[i] = new L.ImageOverlay(urlBegin + '/03/FredHutch_YalePath' + i + '-1200x675.png', [[ center_h * 2, 0 ], [ 0, center_w * 2]]);
    }
    for(i = 1; i < 46; i++){
        map.addLayer(yaleSequence[i]);
        map.removeLayer(yaleSequence[i]);
    }
    
    // pause loading of the screen
    sleep(1000);
}

function createHotzones(){
    var hotzones = new Array();
    
    //add a hotzone for Eastlake
    // upper left and then clockwise around, format = [up/down, left/right]
    hotzones[1] = L.polygon([[210,55],[215,200],[190,205],[170,50],[190,35]], {
                          weight: 0,
                          opacity: 0,
                          color: 'green',
                          fillOpacity: 0,
                          dashArray: '4'
                          });
    
    //add a hotzone for Arnold
    hotzones[2] = L.polygon([[127,220],[175,360],[100,460],[35,450],[70,235]], {
                              weight: 0,
                              opacity: 0,
                              color: 'green',
                              fillOpacity: 0,
                              dashArray: '4'
                              });
    //add a hotzone for SCAA
    hotzones[3] = L.polygon([[205,245],[230,320],[235,350],[230,370],[220,385],[195,412],[188,410],
                            [175,360],[146,275]], {
                            weight: 0,
                            opacity: 0,
                            color: 'green',
                            fillOpacity: 0,
                            dashArray: '4'
                            });
    //add a hotzone for Thomas
    hotzones[4] = L.polygon([[170,50],[190,205],[205,245],[146,275],[127,220],[100,130],
                            [120,50]], {
                            weight: 0,
                            opacity: 0,
                            color: 'green',
                            fillOpacity: 0,
                            dashArray: '4'
                            });
    //add a hotzone for Yale
    hotzones[5] = L.polygon([[175,360],[188,410],[195,412],[200,415],[200,440],[148,575],
                            [60,490],[100,460]], {
                            weight: 0,
                            opacity: 0,
                            color: 'green',
                            fillOpacity: 0,
                            dashArray: '4'
                            });
    // return the hotzone to add to the map outside the function
    return hotzones;
}

//highlight for hotzones on mouseover
function highlightFeature(e) {
    var layer = e.target;
    
    layer.setStyle({
                   weight: 5,
                   color: 'green',
                   dashArray: '',
                   fillOpacity: 0.1
                   });
    
    if (!L.Browser.ie && !L.Browser.opera) {
        layer.bringToFront();
    }
}

//reset hotzone after mouseout
function resetStyle(e) {
    var layer = e.target;
    
    layer.setStyle({
                   weight: 0,
                   opacity: 0,
                   color: 'green',
                   fillOpacity: 0,
                   dashArray: '4'
                   });
    
    if (!L.Browser.ie && !L.Browser.opera) {
        layer.bringToFront();
    }
}

//switch to Eastlake angle when eastlakeZone is clicked
function changeEastlakeAngle(e){

    // Preload images (45 of them)
    /*if (eastlakeSequence == null){
        eastlakeSequence = new Array();
        for(i = 1; i < 46; i++) {
            if (i < 10)
                eastlakeSequence[i] = new L.ImageOverlay(urlBegin + '/03/FredHutch_EastlakePath0' + i + '-1200x675.png', [[ center_h * 2, 0 ], [ 0, center_w * 2]]);
            else
                eastlakeSequence[i] = new L.ImageOverlay(urlBegin + '/03/FredHutch_EastlakePath' + i + '-1200x675.png', [[ center_h * 2, 0 ], [ 0, center_w * 2]]);
        }
        // preload layers????
        for(i = 1; i < 46; i++){
            map.addLayer(eastlakeSequence[i]);
            map.removeLayer(eastlakeSequence[i]);
        }
    }*/
    
    //add a test hotspot to the new image
    var hotspot1 = L.marker([155, 360]);
    hotspot1.bindPopup("<b>Skybridge</b>");
    var miscellaneous = L.layerGroup([hotspot1]);
    
    //menu basics
    var filters = {
        "Miscellaneous": miscellaneous
    };
    
    var mapMenu = L.control.layers(null,filters,{collapsed: false});
    
    //define the back button
    var goBackIcon = L.icon({
                            iconUrl: urlBegin + '/03/edited_back_arrow.png',
                            iconSize: [80,80]
                            });
    
    //define back button marker for the map
    var backButton = L.marker([318, 15], {icon: goBackIcon});
    
    
    // add all layers for path to zoom in
    map.addLayer(eastlakeSequence[1]);
    var i = 2;
    setInterval(function(){
                map.addLayer(eastlakeSequence[i]);
                
                // pauses the system briefly while the layer is added
                sleep(15);
                
                if (i > 3 && map.hasLayer(eastlakeSequence[i])){
                    map.removeLayer(eastlakeSequence[i-2]);
                }
                
                i++;
                
                //when all layers have been added, add back the back button and menu
                if (i == 46){
                    mapMenu.addTo(map);
                    backButton.addTo(map);
                }
                
                sleep(15);
    }, 1, 43);
    
     
    //event to go back when the back button is clicked
    backButton.on('click', function(e){
        // removing the leftover layers from the additions above, and other features
        map.removeLayer(eastlakeSequence[44]);
        map.removeLayer(hotspot1);
        map.removeLayer(backButton);
        mapMenu.removeFrom(map);
                  
        //remove all layers and get back to the home image
        var k = 45;
        setInterval(function(){
                    map.removeLayer(eastlakeSequence[k]);
                    map.addLayer(eastlakeSequence[k-1]);
                    k--;
                    
                    // when the initial layer is finally added back on, put the defaults back
                    if(k == 1){
                        addLayersForGoBack();
                    }
        }, 40, 44);
    });
}

//switch to Arnold angle when arnoldZone is clicked
function changeArnoldAngle(e){
    
    // Preload images (40 of them)
    /*if(arnoldSequence == null){
        arnoldSequence = new Array();
        for(i = 1; i < 41; i++) {
            if (i < 10)
                arnoldSequence[i] = new L.ImageOverlay(urlBegin + '/03/FredHutch_ArnoldPath0' + i + '-1200x675.png', [[ center_h * 2, 0 ], [ 0, center_w * 2]]);
        
            else
                arnoldSequence[i] = new L.ImageOverlay(urlBegin + '/03/FredHutch_ArnoldPath' + i + '-1200x675.png', [[ center_h * 2, 0 ], [ 0, center_w * 2]]);
            }
        // preload layers????
        for(i = 1; i < 41; i++){
            map.addLayer(arnoldSequence[i]);
            map.removeLayer(arnoldSequence[i]);
        }
    }*/
    
    //add a test hotspot to the new image
    var hotspot1 = L.marker([155, 360]);
    hotspot1.bindPopup("<b>Test</b>");
    var miscellaneous = L.layerGroup([hotspot1]);
    
    //menu basics
    var filters = {
        "Miscellaneous": miscellaneous
    };
    var mapMenu = L.control.layers(null,filters,{collapsed: false});
    
    //define the back button
    var goBackIcon = L.icon({
                            iconUrl: urlBegin + '/03/edited_back_arrow.png',
                            iconSize: [80,80]
                            });
    
    //define back button marker for the map
    var backButton = L.marker([318, 15], {icon: goBackIcon});
    
    
    // add all layers for path to zoom in
    map.addLayer(arnoldSequence[1]);
    var i = 2;
    setInterval(function(){
                map.addLayer(arnoldSequence[i]);
                
                // pauses the system briefly while the layer is added
                sleep(15);
                
                if (i > 3 && map.hasLayer(arnoldSequence[i])){
                    map.removeLayer(arnoldSequence[i-2]);
                }
                
                i++;
                
                //when all layers have been added, add back the back button and menu
                if (i == 41){
                    mapMenu.addTo(map);
                    backButton.addTo(map);
                }
                
                sleep(15);
                
    }, 1, 38);
    
    
    //event to go back when the back button is clicked
    backButton.on('click', function(e){
                  // removing the leftover layers from the additions above, and other features
                  map.removeLayer(arnoldSequence[39]);
                  map.removeLayer(hotspot1);
                  map.removeLayer(backButton);
                  mapMenu.removeFrom(map);
                  
                  //remove all layers and get back to the home image
                  var k = 40;
                  setInterval(function(){
                              map.removeLayer(arnoldSequence[k]);
                              map.addLayer(arnoldSequence[k-1]);
                              k--;
                              
                              // when the initial layer is finally added back on, put the defaults back
                              if(k == 1){
                                addLayersForGoBack();
                              }
                  }, 40, 39);
    });
}

//switch to SCCA angle when SCCAZone is clicked
function changeSCCAAngle(e){
    
    // Preload images (32 of them)
    /*if (SCCASequence == null){
        SCCASequence = new Array();
        for(i = 1; i < 33; i++) {
            if (i < 10)
                SCCASequence[i] = new L.ImageOverlay(urlBegin + '/03/FredHutch_SCCAPath0' + i + '-1200x675.png', [[ center_h * 2, 0 ], [ 0, center_w * 2]]);
        
            else
                SCCASequence[i] = new L.ImageOverlay(urlBegin + '/03/FredHutch_SCCAPath' + i + '-1200x675.png', [[ center_h * 2, 0 ], [ 0, center_w * 2]]);
        }
        // preload layers????
        for(i = 1; i < 33; i++){
            map.addLayer(SCCASequence[i]);
            map.removeLayer(SCCASequence[i]);
        }
    }*/
    
    //add a test hotspot to the new image
    var hotspot1 = L.marker([155, 360]);
    hotspot1.bindPopup("<b>Test</b>");
    var miscellaneous = L.layerGroup([hotspot1]);
    
    //menu basics
    var filters = {
        "Miscellaneous": miscellaneous
    };
    var mapMenu = L.control.layers(null,filters,{collapsed: false});
    
    //define the back button
    var goBackIcon = L.icon({
                            iconUrl: urlBegin + '/03/edited_back_arrow.png',
                            iconSize: [80,80]
                            });
    
    //define back button marker for the map
    var backButton = L.marker([318, 15], {icon: goBackIcon});
    
    
    // add all layers for path to zoom in
    map.addLayer(SCCASequence[1]);
    var i = 2;
    setInterval(function(){
                map.addLayer(SCCASequence[i]);
                
                // pauses the system briefly while the layer is added
                sleep(15);
                
                if (i > 3 && map.hasLayer(SCCASequence[i])){
                    map.removeLayer(SCCASequence[i-2]);
                }
                
                i++;
                
                //when all layers have been added, add back the back button and menu
                if (i == 33){
                    mapMenu.addTo(map);
                    backButton.addTo(map);
                }
                
                sleep(15);
                
    }, 1, 30);
    
    
    //event to go back when the back button is clicked
    backButton.on('click', function(e){
                  // removing the leftover layers from the additions above, and other features
                  map.removeLayer(SCCASequence[31]);
                  map.removeLayer(hotspot1);
                  map.removeLayer(backButton);
                  mapMenu.removeFrom(map);
                  
                  //remove all layers and get back to the home image
                  var k = 32;
                  setInterval(function(){
                              map.removeLayer(SCCASequence[k]);
                              map.addLayer(SCCASequence[k-1]);
                              k--;
                              
                              // when the initial layer is finally added back on, put the defaults back
                              if(k == 1){
                                addLayersForGoBack();
                              }
                  }, 40, 31);
    });
}

//switch to Thomas angle when thomasZone is clicked
function changeThomasAngle(e){
    
    // Preload images (40 of them)
    /*if (thomasSequence == null){
        thomasSequence = new Array();
        for(i = 1; i < 41; i++) {
            if (i < 10)
                thomasSequence[i] = new L.ImageOverlay(urlBegin + '/03/FredHutch_ThomasPath0' + i + '-1200x675.png', [[ center_h * 2, 0 ], [ 0, center_w * 2]]);
        
            else
                thomasSequence[i] = new L.ImageOverlay(urlBegin + '/03/FredHutch_ThomasPath' + i + '-1200x675.png', [[ center_h * 2, 0 ], [ 0, center_w * 2]]);
        }
        // preload layers????
        for(i = 1; i < 41; i++){
            map.addLayer(thomasSequence[i]);
            map.removeLayer(thomasSequence[i]);
        }
    }*/
    
    //add a test hotspot to the new image
    var hotspot1 = L.marker([155, 360]);
    hotspot1.bindPopup("<b>Test</b>");
    var miscellaneous = L.layerGroup([hotspot1]);
    
    //menu basics
    var filters = {
        "Miscellaneous": miscellaneous
    };
    var mapMenu = L.control.layers(null,filters,{collapsed: false});
    
    //define the back button
    var goBackIcon = L.icon({
                            iconUrl: urlBegin + '/03/edited_back_arrow.png',
                            iconSize: [80,80]
                            });
    
    //define back button marker for the map
    var backButton = L.marker([318, 15], {icon: goBackIcon});
    
    
    // add all layers for path to zoom in
    map.addLayer(thomasSequence[1]);
    var i = 2;
    setInterval(function(){
                map.addLayer(thomasSequence[i]);
                
                // pauses the system briefly while the layer is added
                sleep(15);
                
                if (i > 3 && map.hasLayer(thomasSequence[i])){
                    map.removeLayer(thomasSequence[i-2]);
                }
                
                i++;
                
                //when all layers have been added, add back the back button and menu
                if (i == 41){
                    mapMenu.addTo(map);
                    backButton.addTo(map);
                }
                
                sleep(15);
                
    }, 1, 38);
    
    
    //event to go back when the back button is clicked
    backButton.on('click', function(e){
                  // removing the leftover layers from the additions above, and other features
                  map.removeLayer(thomasSequence[39]);
                  map.removeLayer(hotspot1);
                  map.removeLayer(backButton);
                  mapMenu.removeFrom(map);
                  
                  //remove all layers and get back to the home image
                  var k = 40;
                  setInterval(function(){
                              map.removeLayer(thomasSequence[k]);
                              map.addLayer(thomasSequence[k-1]);
                              k--;
                              
                              // when the initial layer is finally added back on, put the defaults back
                              if(k == 1){
                                addLayersForGoBack();
                              }
                  }, 40, 39);
    });
}

//switch to Yale angle when yaleZone is clicked
function changeYaleAngle(e){
    
    // Preload images (45 of them)
    /*if (yaleSequence == null){
        yaleSequence = new Array()
        for(i = 1; i < 46; i++) {
            if (i < 10)
                yaleSequence[i] = new L.ImageOverlay(urlBegin + '/03/FredHutch_YalePath0' + i + '-1200x675.png', [[ center_h * 2, 0 ], [ 0, center_w * 2]]);
        
            else
                yaleSequence[i] = new L.ImageOverlay(urlBegin + '/03/FredHutch_YalePath' + i + '-1200x675.png', [[ center_h * 2, 0 ], [ 0, center_w * 2]]);
        }
        // preload layers????
        for(i = 1; i < 46; i++){
            map.addLayer(yaleSequence[i]);
            map.removeLayer(yaleSequence[i]);
        }
    }*/
    
    //add a test hotspot to the new image
    var hotspot1 = L.marker([155, 360]);
    hotspot1.bindPopup("<b>Test</b>");
    var miscellaneous = L.layerGroup([hotspot1]);
    
    //menu basics
    var filters = {
        "Miscellaneous": miscellaneous
    };
    var mapMenu = L.control.layers(null,filters,{collapsed: false});
    
    //define the back button
    var goBackIcon = L.icon({
                            iconUrl: urlBegin + '/03/edited_back_arrow.png',
                            iconSize: [80,80]
                            });
    
    //define back button marker for the map
    var backButton = L.marker([318, 15], {icon: goBackIcon});
    
    
    // add all layers for path to zoom in
    map.addLayer(yaleSequence[1]);
    var i = 2;
    setInterval(function(){
                map.addLayer(yaleSequence[i]);
                
                // pauses the system briefly while the layer is added
                sleep(15);
                
                if (i > 3 && map.hasLayer(yaleSequence[i])){
                    map.removeLayer(yaleSequence[i-2]);
                }
                
                i++;
                
                //when all layers have been added, add back the back button and menu
                if (i == 46){
                    mapMenu.addTo(map);
                    backButton.addTo(map);
                }
                
                sleep(15);
                
    }, 1, 43);
    
    
    //event to go back when the back button is clicked
    backButton.on('click', function(e){
                  // removing the leftover layers from the additions above, and other features
                  map.removeLayer(yaleSequence[39]);
                  map.removeLayer(hotspot1);
                  map.removeLayer(backButton);
                  mapMenu.removeFrom(map);
                  
                  //remove all layers and get back to the home image
                  var k = 45;
                  setInterval(function(){
                              map.removeLayer(yaleSequence[k]);
                              map.addLayer(yaleSequence[k-1]);
                              k--;
                              
                              // when the initial layer is finally added back on, put the defaults back
                              if(k == 1){
                                addLayersForGoBack();
                              }
                  }, 40, 44);
    });
}

// add building names and other pins for default map view
function addDefaultPins(){
    var pins = new Array();
    
    // ADD THE FH LOGO TO THE BOTTOM LEFT CORNER
    var FredHutchLogoIcon = L.icon({
                                   iconUrl: urlBegin + '/04/FredHutchLogo.png',
                                   iconSize: [200, 48]
                                   });
    var FredHutchLogo = L.marker([20, 60], {icon: FredHutchLogoIcon}).addTo(map);
    pins[1] = FredHutchLogo;
    
    // 1144 Eastlake Pin
    var Eastlake1144Icon = L.icon({
                                  iconUrl: urlBegin + '/04/1144EastlakeName.png',
                                  iconSize: [66,34]
                                  });
    var Eastlake1144Pin = L.marker([195, 65], {icon: Eastlake1144Icon}).addTo(map);
    pins[2] = Eastlake1144Pin;
    
    // Eastlake Pin
    var EastlakeIcon = L.icon({
                              iconUrl: urlBegin + '/04/EastlakeName.png',
                              iconSize: [68,67]
                              });
    var EastlakePin = L.marker([210, 160], {icon: EastlakeIcon}).addTo(map);
    pins[3] = EastlakePin;
    
    // Weintraub Pin
    var WeintraubIcon = L.icon({
                              iconUrl: urlBegin + '/04/WeintraubName.png',
                              iconSize: [79,64]
                              });
    var WeintraubPin = L.marker([175, 120], {icon: WeintraubIcon}).addTo(map);
    pins[4] = WeintraubPin;
    
    // Thomas Pin
    var ThomasIcon = L.icon({
                            iconUrl: urlBegin + '/04/ThomasName.png',
                            iconSize: [56,64]
                            });
    var ThomasPin = L.marker([185, 245], {icon: ThomasIcon}).addTo(map);
    pins[5] = ThomasPin;
    
    // Hutchinson Pin
    var HutchinsonIcon = L.icon({
                                iconUrl: urlBegin + '/04/HutchinsonName.png',
                                iconSize: [79,64]
                                });
    var HutchinsonPin = L.marker([155, 180], {icon: HutchinsonIcon}).addTo(map);
    pins[6] = HutchinsonPin;
    
    // Fairview Pin
    var FairviewIcon = L.icon({
                              iconUrl: urlBegin + '/04/FairviewName.png',
                              iconSize: [65,18]
                              });
    var FairviewPin = L.marker([105, 265], {icon: FairviewIcon}).addTo(map);
    pins[7] = FairviewPin;
    
    // Arnold Pin
    var ArnoldIcon = L.icon({
                            iconUrl: urlBegin + '/04/ArnoldName.png',
                            iconSize: [58,65]
                            });
    var ArnoldPin = L.marker([130, 370], {icon: ArnoldIcon}).addTo(map);
    pins[8] = ArnoldPin;
    
    // Lea Pin
    var LeaIcon = L.icon({
                         iconUrl: urlBegin + '/04/LeaName.png',
                         iconSize: [30,19]
                         });
    var LeaPin = L.marker([150, 535], {icon: LeaIcon}).addTo(map);
    pins[9] = LeaPin;
    
    // Yale Pin
    var YaleIcon = L.icon({
                          iconUrl: urlBegin + '/04/YaleName.png',
                          iconSize: [38,67]
                          });
    var YalePin = L.marker([185, 455], {icon: YaleIcon}).addTo(map);
    pins[10] = YalePin;
    
    // Aloha Pin
    var AlohaIcon = L.icon({
                           iconUrl: urlBegin + '/04/AlohaName.png',
                           iconSize: [50,18]
                           });
    var AlohaPin = L.marker([185, 365], {icon: AlohaIcon}).addTo(map);
    pins[11] = AlohaPin;
    
    // Valley Pin
    var ValleyIcon = L.icon({
                           iconUrl: urlBegin + '/04/ValleyName.png',
                           iconSize: [55,21]
                           });
    var ValleyPin = L.marker([195, 395], {icon: ValleyIcon}).addTo(map);
    pins[12] = ValleyPin;
    
    // SCCA Pin
    var SCCAIcon = L.icon({
                            iconUrl: urlBegin + '/04/SCCAName.png',
                            iconSize: [40,64]
                            });
    var SCCAPin = L.marker([230, 350], {icon: SCCAIcon}).addTo(map);
    pins[13] = SCCAPin;
    
    // BUSES
    var busIcon = L.icon({
                         iconUrl: urlBegin + '/04/BusLogo.png',
                         iconSize: [27,25]
                         });
    // Bus 1 of 4
    var bus1of4 = L.marker([215, 310], {icon: busIcon}).addTo(map);
    pins[14] = bus1of4;
    // Bus 2 of 4
    var bus2of4 = L.marker([200, 225], {icon: busIcon}).addTo(map);
    pins[15] = bus2of4;
    // Bus 3 of 4
    var bus3of4 = L.marker([125, 25], {icon: busIcon}).addTo(map);
    pins[16] = bus3of4;
    // Bus 4 of 4
    var bus4of4 = L.marker([95, 145], {icon: busIcon}).addTo(map);
    pins[17] = bus4of4;
    
    // PARKING
    var parkingIcon = L.icon({
                             iconUrl: urlBegin + '/04/ParkingLogo.png',
                             iconSize: [22,27]
                             });
    // Parking 1 of 3
    var parking1of3 = L.marker([155, 415], {icon: parkingIcon}).addTo(map);
    pins[18] = parking1of3;
    // Parking 2 of 3
    var parking2of3 = L.marker([155, 275], {icon: parkingIcon}).addTo(map);
    pins[19] = parking2of3;
    // Parking 3 of 3
    var parking3of3 = L.marker([125, 220], {icon: parkingIcon}).addTo(map);
    pins[20] = parking3of3;
    
    // LIGHTRAIL
    var lightrailIcon = L.icon({
                             iconUrl: urlBegin + '/04/LightrailLogo.png',
                             iconSize: [21,30]
                             });
    var lightrail = L.marker([35, 365], {icon: lightrailIcon}).addTo(map);
    pins[21] = lightrail;
    
    // COMPASS
    var compassIcon = L.icon({
                               iconUrl: urlBegin + '/04/CompassLogo.png',
                               iconSize: [57,27]
                               });
    var compass = L.marker([215, 25], {icon: compassIcon}).addTo(map);
    pins[22] = compass;

    return pins;
}

// add pins back when you hit the back button to go to default map view
function addLayersForGoBack(){
    map.addLayer(HutchKidsPin);
    map.addLayer(Eastlake1144Pin);
    map.addLayer(EastlakePin);
    map.addLayer(WeintraubPin);
    map.addLayer(ThomasPin);
    map.addLayer(HutchinsonPin);
    map.addLayer(FairviewPin);
    map.addLayer(ArnoldPin);
    map.addLayer(LeaPin);
    map.addLayer(YalePin);
    map.addLayer(AlohaPin);
    map.addLayer(ValleyPin);
    map.addLayer(SCCAPin);
    map.addLayer(bus1of4);
    map.addLayer(bus2of4);
    map.addLayer(bus3of4);
    map.addLayer(bus4of4);
    map.addLayer(parking1of3);
    map.addLayer(parking2of3);
    map.addLayer(parking3of3);
    map.addLayer(lightrail);
    map.addLayer(compass);
}

// remove the pins when you hit a hotzone and zoom in
function removeLayersForZoom(){
    map.removeLayer(HutchKidsPin);
    map.removeLayer(HutchKidsPopup);
    map.removeLayer(Eastlake1144Pin);
    map.removeLayer(EastlakePin);
    map.removeLayer(WeintraubPin);
    map.removeLayer(ThomasPin);
    map.removeLayer(HutchinsonPin);
    map.removeLayer(FairviewPin);
    map.removeLayer(ArnoldPin);
    map.removeLayer(LeaPin);
    map.removeLayer(YalePin);
    map.removeLayer(AlohaPin);
    map.removeLayer(ValleyPin);
    map.removeLayer(SCCAPin);
    map.removeLayer(bus1of4);
    map.removeLayer(bus2of4);
    map.removeLayer(bus3of4);
    map.removeLayer(bus4of4);
    map.removeLayer(parking1of3);
    map.removeLayer(parking2of3);
    map.removeLayer(parking3of3);
    map.removeLayer(lightrail);
    map.removeLayer(compass);
}

//create the zones and add to map
var hotzones = createHotzones();
var eastlakeZone = hotzones[1];
var arnoldZone = hotzones[2];
var SCCAZone = hotzones[3];
var thomasZone = hotzones[4];
var yaleZone = hotzones[5];
map.addLayer(eastlakeZone);
map.addLayer(arnoldZone);
map.addLayer(SCCAZone);
map.addLayer(thomasZone);
map.addLayer(yaleZone);

// add all default pins to the global context for use in other functions
var pins = addDefaultPins();
FredHutchLogo = pins[1];
Eastlake1144Pin = pins[2];
EastlakePin = pins[3];
WeintraubPin = pins[4];
ThomasPin = pins[5];
HutchinsonPin = pins[6];
FairviewPin = pins[7];
ArnoldPin = pins[8];
LeaPin = pins[9];
YalePin = pins[10];
AlohaPin = pins[11];
ValleyPin = pins[12];
SCCAPin = pins[13];
bus1of4 = pins[14];
bus2of4 = pins[15];
bus3of4 = pins[16];
bus4of4 = pins[17];
parking1of3 = pins[18];
parking2of3 = pins[19];
parking3of3 = pins[20];
lightrail = pins[21];
compass = pins[22];


// TESTING POPUPS IN CUSTOM LOCATION FOR HUTCH KIDS
var popupOptions = {
    offset:  new L.Point(0, 70)
};
var HutchKidsPopup = L.popup(popupOptions)
    .setLatLng([ 135, 495 ])
    .setContent('<b>Hutch Kids</b>')
    ;
var HutchKidsPin = L.marker([135, 495]);
HutchKidsPin.addTo(map);
HutchKidsPin.on('click', function(){
                HutchKidsPopup.openOn(map);
});

// deallcate memory
hotzones = null;
pins = null;

// mouseover and mouseout for hotzones
eastlakeZone.on('mouseover', function(e){
        highlightFeature(e);
});
eastlakeZone.on('mouseout', function(e){
        resetStyle(e);
});
arnoldZone.on('mouseover', function(e){
        highlightFeature(e);
});
arnoldZone.on('mouseout', function(e){
        resetStyle(e);
});
SCCAZone.on('mouseover', function(e){
        highlightFeature(e);
});
SCCAZone.on('mouseout', function(e){
        resetStyle(e);
});
thomasZone.on('mouseover', function(e){
        highlightFeature(e);
});
thomasZone.on('mouseout', function(e){
        resetStyle(e);
});
yaleZone.on('mouseover', function(e){
        highlightFeature(e);
});
yaleZone.on('mouseout', function(e){
        resetStyle(e);
});

// open the FH website when the logo is clicked
FredHutchLogo.on('click', function(e){
        var win = window.open('https://www.fredhutch.org', '_blank');
        win.focus();
});

//Eastlake hotzone click
eastlakeZone.on('click', function(e){
        removeLayersForZoom();
        changeEastlakeAngle(e);
});

//Arnold hotzone click
arnoldZone.on('click', function(e){
        removeLayersForZoom();
        changeArnoldAngle(e);
});

//SCCA hotzone click
SCCAZone.on('click', function(e){
        removeLayersForZoom();
        changeSCCAAngle(e);
});

//Thomas hotzone click
thomasZone.on('click', function(e){
        removeLayersForZoom();
        changeThomasAngle(e);
});

//Yale hotzone click
yaleZone.on('click', function(e){
        removeLayersForZoom();
        changeYaleAngle(e);
});

// mimic system sleep
function sleep(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) > milliseconds){
            break;
        }
    }
}


window.onload = function(){
//    alert("Fully loaded");
}

</script>
</body>
</html>

