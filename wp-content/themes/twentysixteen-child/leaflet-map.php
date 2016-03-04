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

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
</head>
<style>
    body {
        padding: 0;
        margin: 0;
    }
    html, body, #map {
        height: 100%;
        max-width: 1200px;
        max-height: 675px;
        position: relative;
        margin-left: auto;
        margin-right: auto;
}
</style>
<body>
<div id="map"</div>

<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
<script>

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
    var mapMenu = L.control.layers(null,filters);
    
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
                    
                    // when the initial layer is finally added back on, put the name hotspot back
                    if(k == 1){
                        map.addLayer(hotspot2);
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
    var mapMenu = L.control.layers(null,filters);
    
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
                              
                              // when the initial layer is finally added back on, put the name hotspot back
                              if(k == 1){
                              map.addLayer(hotspot2);
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
    var mapMenu = L.control.layers(null,filters);
    
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
                              
                              // when the initial layer is finally added back on, put the name hotspot back
                              if(k == 1){
                                map.addLayer(hotspot2);
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
    var mapMenu = L.control.layers(null,filters);
    
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
                              
                              // when the initial layer is finally added back on, put the name hotspot back
                              if(k == 1){
                                map.addLayer(hotspot2);
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
    var mapMenu = L.control.layers(null,filters);
    
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
                              
                              // when the initial layer is finally added back on, put the name hotspot back
                              if(k == 1){
                              map.addLayer(hotspot2);
                              }
                  }, 40, 44);
    });
}


//create eastlakeZone and add to map
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

// deallcate memory
hotzones = null;

//TEST COLOR CHANGE
//var coloredEastlake = new L.ImageOverlay(urlBegin + '/03/FredHutch_EastlakeColor-1200x675.png', [[ center_h * 2, 0 ], [ 0, center_w * 2]]);

var hotspot2 = L.marker([165, 240]);
hotspot2.bindPopup("<b>Thomas Building</b>");
hotspot2.addTo(map);

// mouseover and mouseout for hotzones
eastlakeZone.on('mouseover', function(e){
        //map.addLayer(coloredEastlake);
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

//Eastlake hotzone click
eastlakeZone.on('click', function(e){
        map.removeLayer(hotspot2);
        changeEastlakeAngle(e);
});

//Arnold hotzone click
arnoldZone.on('click', function(e){
        map.removeLayer(hotspot2);
        changeArnoldAngle(e);
});

//SCCA hotzone click
SCCAZone.on('click', function(e){
        map.removeLayer(hotspot2);
        changeSCCAAngle(e);
});

//Thomas hotzone click
thomasZone.on('click', function(e){
        map.removeLayer(hotspot2);
        changeThomasAngle(e);
});

//Yale hotzone click
yaleZone.on('click', function(e){
        map.removeLayer(hotspot2);
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

</script>
</body>
</html>

