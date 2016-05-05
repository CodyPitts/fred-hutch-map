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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v1.0.0-rc.1/leaflet.css" />

    </head>
    <style>
        body {
        padding: 0;
        margin: 0;
    }
    .stop-scrolling {
        height: 100%;
        overflow: hidden;
    }
    <!--SIZE FOR IPHONE 6 PLUS-->
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
            position: relative;
            margin-left: auto;
            margin-right: auto;
            top: 5px;
        }
    }
    @font-face {
        font-family: 'geogrotesque';
        src: url('http://localhost/wp-content/uploads/2016/05/Emtype-Foundry-Geogrotesque-Regular.eot');
        src: local('☺'), url('http://localhost/wp-content/uploads/2016/05/Emtype-Foundry-Geogrotesque-Regular.ttf') format('truetype'), url('http://localhost/wp-content/uploads/2016/05/Emtype-Foundry-Geogrotesque-Regular.svg') format('svg');
    }
    .leaflet-popup-content-wrapper {
        background: rgb(18,48,84);
        border-radius: 0px;
        font-family: 'geogrotesque';
        font-size: 12px;
        color: white;
        <!-- can add "width: _____;" to adjust popup sizes-->
    }
    .leaflet-popup-tip-container {
        visibility: hidden;
    }
    .leaflet-container {
        background: none;
    }
    *, *:before, *:after {
    margin: 0;
    padding: 0;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    body {
        text-align: center;
        line-height: 100vh;
    }
    .container {
        display: inline-block;
    }
    .dots {
        display: inline-block;
        position: relative;
    }
    .dots:not(:last-child) {
        margin-right: 9px;
    }
    .dots:before, .dots:after {
        content: "";
        display: inline-block;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        position: absolute;
    }
    .dots:nth-child(1):before {
        -webkit-transform: translateY(-200%);
        transform: translateY(-200%);
        -webkit-animation: animBefore 1s linear infinite;
        animation: animBefore 1s linear infinite;
        -webkit-animation-delay: -0.9s;
        animation-delay: -0.9s;
        background-color: #89c348;
    }
    .dots:nth-child(1):after {
        -webkit-transform: translateY(200%);
        transform: translateY(200%);
        -webkit-animation: animAfter 1s linear infinite;
        animation: animAfter 1s linear infinite;
        -webkit-animation-delay: -0.9s;
        animation-delay: -0.9s;
        background-color: #39b6b9;
    }
    .dots:nth-child(2):before {
        -webkit-transform: translateY(-200%);
        transform: translateY(-200%);
        -webkit-animation: animBefore 1s linear infinite;
        animation: animBefore 1s linear infinite;
        -webkit-animation-delay: -1.8s;
        animation-delay: -1.8s;
        background-color: #89c348;
    }
    .dots:nth-child(2):after {
        -webkit-transform: translateY(200%);
        transform: translateY(200%);
        -webkit-animation: animAfter 1s linear infinite;
        animation: animAfter 1s linear infinite;
        -webkit-animation-delay: -1.8s;
        animation-delay: -1.8s;
        background-color: #39b6b9;
    }
    .dots:nth-child(3):before {
        -webkit-transform: translateY(-200%);
        transform: translateY(-200%);
        -webkit-animation: animBefore 1s linear infinite;
        animation: animBefore 1s linear infinite;
        -webkit-animation-delay: -2.7s;
        animation-delay: -2.7s;
        background-color: #89c348;
    }
    .dots:nth-child(3):after {
        -webkit-transform: translateY(200%);
        transform: translateY(200%);
        -webkit-animation: animAfter 1s linear infinite;
        animation: animAfter 1s linear infinite;
        -webkit-animation-delay: -2.7s;
        animation-delay: -2.7s;
        background-color: #39b6b9;
    }
    .dots:nth-child(4):before {
        -webkit-transform: translateY(-200%);
        transform: translateY(-200%);
        -webkit-animation: animBefore 1s linear infinite;
        animation: animBefore 1s linear infinite;
        -webkit-animation-delay: -3.6s;
        animation-delay: -3.6s;
        background-color: #89c348;
    }
    .dots:nth-child(4):after {
        -webkit-transform: translateY(200%);
        transform: translateY(200%);
        -webkit-animation: animAfter 1s linear infinite;
        animation: animAfter 1s linear infinite;
        -webkit-animation-delay: -3.6s;
        animation-delay: -3.6s;
        background-color: #39b6b9;
    }
    .dots:nth-child(5):before {
        -webkit-transform: translateY(-200%);
        transform: translateY(-200%);
        -webkit-animation: animBefore 1s linear infinite;
        animation: animBefore 1s linear infinite;
        -webkit-animation-delay: -4.5s;
        animation-delay: -4.5s;
        background-color: #89c348;
    }
    .dots:nth-child(5):after {
        -webkit-transform: translateY(200%);
        transform: translateY(200%);
        -webkit-animation: animAfter 1s linear infinite;
        animation: animAfter 1s linear infinite;
        -webkit-animation-delay: -4.5s;
        animation-delay: -4.5s;
        background-color: #39b6b9;
    }
    .dots:nth-child(6):before {
        -webkit-transform: translateY(-200%);
        transform: translateY(-200%);
        -webkit-animation: animBefore 1s linear infinite;
        animation: animBefore 1s linear infinite;
        -webkit-animation-delay: -5.4s;
        animation-delay: -5.4s;
        background-color: #89c348;
    }
    .dots:nth-child(6):after {
        -webkit-transform: translateY(200%);
        transform: translateY(200%);
        -webkit-animation: animAfter 1s linear infinite;
        animation: animAfter 1s linear infinite;
        -webkit-animation-delay: -5.4s;
        animation-delay: -5.4s;
        background-color: #39b6b9;
    }
    .dots:nth-child(7):before {
        -webkit-transform: translateY(-200%);
        transform: translateY(-200%);
        -webkit-animation: animBefore 1s linear infinite;
        animation: animBefore 1s linear infinite;
        -webkit-animation-delay: -6.3s;
        animation-delay: -6.3s;
        background-color: #89c348;
    }
    .dots:nth-child(7):after {
        -webkit-transform: translateY(200%);
        transform: translateY(200%);
        -webkit-animation: animAfter 1s linear infinite;
        animation: animAfter 1s linear infinite;
        -webkit-animation-delay: -6.3s;
        animation-delay: -6.3s;
        background-color: #39b6b9;
    }
    .dots:nth-child(8):before {
        -webkit-transform: translateY(-200%);
        transform: translateY(-200%);
        -webkit-animation: animBefore 1s linear infinite;
        animation: animBefore 1s linear infinite;
        -webkit-animation-delay: -7.2s;
        animation-delay: -7.2s;
        background-color: #89c348;
    }
    .dots:nth-child(8):after {
        -webkit-transform: translateY(200%);
        transform: translateY(200%);
        -webkit-animation: animAfter 1s linear infinite;
        animation: animAfter 1s linear infinite;
        -webkit-animation-delay: -7.2s;
        animation-delay: -7.2s;
        background-color: #39b6b9;
    }
    .dots:nth-child(9):before {
        -webkit-transform: translateY(-200%);
        transform: translateY(-200%);
        -webkit-animation: animBefore 1s linear infinite;
        animation: animBefore 1s linear infinite;
        -webkit-animation-delay: -8.1s;
        animation-delay: -8.1s;
        background-color: #89c348;
    }
    .dots:nth-child(9):after {
        -webkit-transform: translateY(200%);
        transform: translateY(200%);
        -webkit-animation: animAfter 1s linear infinite;
        animation: animAfter 1s linear infinite;
        -webkit-animation-delay: -8.1s;
        animation-delay: -8.1s;
        background-color: #39b6b9;
    }
    .dots:nth-child(10):before {
        -webkit-transform: translateY(-200%);
        transform: translateY(-200%);
        -webkit-animation: animBefore 1s linear infinite;
        animation: animBefore 1s linear infinite;
        -webkit-animation-delay: -9s;
        animation-delay: -9s;
        background-color: #89c348;
    }
    .dots:nth-child(10):after {
        -webkit-transform: translateY(200%);
        transform: translateY(200%);
        -webkit-animation: animAfter 1s linear infinite;
        animation: animAfter 1s linear infinite;
        -webkit-animation-delay: -9s;
        animation-delay: -9s;
        background-color: #39b6b9;
    }
    @-webkit-keyframes animBefore {
        0% {
            -webkit-transform: scale(1) translateY(-200%);
            z-index: 1;
        }
        25% {
            -webkit-transform: scale(1.3) translateY(0);
            z-index: 1;
        }
        50% {
            -webkit-transform: scale(1) translateY(200%);
            z-index: -1;
        }
        75% {
            -webkit-transform: scale(0.7) translateY(0);
            z-index: -1;
        }
        100% {
            -webkit-transform: scale(1) translateY(-200%);
            z-index: -1;
        }
    }
    @keyframes animBefore {
        0% {
        transform: scale(1) translateY(-200%);
            z-index: 1;
        }
        25% {
        transform: scale(1.3) translateY(0);
            z-index: 1;
        }
        50% {
        transform: scale(1) translateY(200%);
            z-index: -1;
        }
        75% {
        transform: scale(0.7) translateY(0);
            z-index: -1;
        }
        100% {
        transform: scale(1) translateY(-200%);
            z-index: -1;
        }
    }
    @-webkit-keyframes animAfter {
        0% {
            -webkit-transform: scale(1) translateY(200%);
            z-index: -1;
        }
        25% {
            -webkit-transform: scale(0.7) translateY(0);
            z-index: -1;
        }
        50% {
            -webkit-transform: scale(1) translateY(-200%);
            z-index: 1;
        }
        75% {
            -webkit-transform: scale(1.3) translateY(0);
            z-index: 1;
        }
        100% {
            -webkit-transform: scale(1) translateY(200%);
            z-index: 1;
        }
    }
    @keyframes animAfter {
        0% {
        transform: scale(1) translateY(200%);
            z-index: -1;
        }
        25% {
        transform: scale(0.7) translateY(0);
            z-index: -1;
        }
        50% {
        transform: scale(1) translateY(-200%);
            z-index: 1;
        }
        75% {
        transform: scale(1.3) translateY(0);
            z-index: 1;
        }
        100% {
        transform: scale(1) translateY(200%);
            z-index: 1;
        }
    }
    .logo{
        content:url('https://pbs.twimg.com/profile_images/509056962743382016/jOKr-9bc.png');
        height: 60px;
        width: 60px;
        display:block;
        position: absolute;
        top: 40%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%);
    }
    </style>
    <body>
        <div id="loading">
            <div class="container">
                <span class="logo"></span>
                <span class="dots"></span>
                <span class="dots"></span>
                <span class="dots"></span>
                <span class="dots"></span>
                <span class="dots"></span>
                <span class="dots"></span>
                <span class="dots"></span>
                <span class="dots"></span>
                <span class="dots"></span>
                <span class="dots"></span>
            </div>
        </div>
        <div id="map"</div>
    </body>
</html>

<script>L_DISABLE_3D = true;
//CAN ALSO ADD 'L_PREFER_CANVAS = true;' TO SPEED UP LOAD TIME, BUT SLOWS DOWN ZOOMING
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="http://cdn.leafletjs.com/leaflet/v1.0.0-rc.1/leaflet.js"></script>
<script>

jQuery(window).load(function () {
    jQuery('#loading').hide();
});

L.Browser.webkit3d = false;
L.Browser.any3d = false;

//Create sequences for image arrays
var eastlakeSequence = new Array();
var arnoldSequence = new Array();
var SCCASequence = new Array();
var weintraubSequence = new Array();
var thomasSequence = new Array();
var yaleSequence = new Array();

var eastlakePins = new Array();
var arnoldPins = new Array();
var SCCAPins = new Array();
var weintraubPins = new Array();
var thomasPins = new Array();
var yalePins = new Array();
var currPins = new Array();

var hotzones = new Array();
var pins = new Array();
var zoomed = false;
var currSequence = new Array();
//var currZoomPins = new Array();
var backButton;

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
map.attributionControl.setPrefix("Leaflet");
// width and height of the image
var w = 1200,
    h = 675,
    url = urlBegin + '/04/Z2a_TPath01.png';

// setup map dimensions, change x in zoom * x if dimensions are off
var center_h = h / 4,
    center_w = w / 4;
var initialView;

responsive();

backButton = drawBack();


// PRELOAD IMAGES
preloadImages();

function preloadImages() {
    loadImages();

    for (i = 1; i < eastlakeSequence.length; i++){
        map.addLayer(eastlakeSequence[i]);
        map.removeLayer(eastlakeSequence[i]);
    }

    for(i = 1; i < arnoldSequence.length; i++){
        map.addLayer(arnoldSequence[i]);
        map.removeLayer(arnoldSequence[i]);
    }

    for(i = 1; i < SCCASequence.length; i++){
        map.addLayer(SCCASequence[i]);
        map.removeLayer(SCCASequence[i]);
    }

    for(i = 1; i < weintraubSequence.length; i++){
        map.addLayer(weintraubSequence[i]);
        map.removeLayer(weintraubSequence[i]);
    }
    
    for(i = 1; i < thomasSequence.length; i++){
        map.addLayer(thomasSequence[i]);
        map.removeLayer(thomasSequence[i]);
    }

    for(i = 1; i < yaleSequence.length; i++){
        map.addLayer(yaleSequence[i]);
        map.removeLayer(yaleSequence[i]);
    }
}

function loadImages(){
    var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    var p = w/1400;
    var j;

    // Eastlake preload
    for(i = 20; i < 71; i++) {
        j = i - 19;
        eastlakeSequence[j] = new L.ImageOverlay(urlBegin + '/04/Z1_ELPath' + i + '.png', [[ center_h * 2*p, 0 ], [ 0, center_w * 2*p]]);
    }

    // Arnold preload
    for(i = 20; i < 55; i++) {
        j = i - 19;
        arnoldSequence[j] = new L.ImageOverlay(urlBegin + '/04/Z3_APath' + i + '.png', [[ center_h * 2*p, 0 ], [ 0, center_w * 2*p]]);
    }
   
    
    // SCCA preload
    for(i = 20; i < 45; i++) {
        j = i - 19;
        SCCASequence[j] = new L.ImageOverlay(urlBegin + '/04/Z4_SCCAPath' + i + '.png', [[ center_h * 2*p, 0 ], [ 0, center_w * 2*p]]);
    }
    
    
    // Weintraub preload
    for(i = 20; i < 51; i++) {
        j = i - 19;
        weintraubSequence[j] = new L.ImageOverlay(urlBegin + '/04/Z2b_HWPath' + i + '.png', [[ center_h * 2*p, 0 ], [ 0, center_w * 2*p]]);
    }
    
    // Thomas preload
    for(i = 20; i < 54; i++) {
        j = i - 19;
        thomasSequence[j] = new L.ImageOverlay(urlBegin + '/04/Z2a_TPath' + i + '.png', [[ center_h * 2*p, 0 ], [ 0, center_w * 2*p]]);
    }
    
    
    // Yale preload
    for(i = 20; i < 67; i++) {
        j = i - 19;
        yaleSequence[j] = new L.ImageOverlay(urlBegin + '/04/Z5_YPath' + i + '.png', [[ center_h * 2*p, 0 ], [ 0, center_w * 2*p]]);
    }

    // pause loading of the screen
   // sleep(1000);
}


function createHotzones(){
    var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    var p = w/1400;
    
    if (hotzones.length > 1) {
        clearHotzones();
    }
    //add a hotzone for Eastlake
    // upper left and then clockwise around, format = [up/down, left/right]
    hotzones[1] = L.polygon([[210*p,109*p],[207*p,128*p],[209*p,140*p],[210*p,194*p],[209*p,194*p],[209*p,196*p],[207*p,196*p],[207*p,197*p],[188*p,199*p],[176*p,130*p],[175*p,102*p],[198*p,93*p],[199*p,96*p],[202*p,97*p],[203*p,100*p],[205*p,100*p]], {
                            weight: 0,
                            opacity: 0,
                            color: 'green',
                            fillOpacity: 0,
                            dashArray: '4'
                            });
    
    //add a hotzone for Arnold
    hotzones[2] = L.polygon([[153.5*p, 283*p],[153*p, 289*p],[165*p, 330*p],[169*p, 332*p],[171*p, 338*p],[174*p, 338*p],[175*p, 342*p],[172*p, 345*p],[173*p, 351*p],[177*p, 351*p],[178.5*p, 357*p],[177*p, 359*p],[174*p, 359*p],[137*p, 411*p],[138*p, 414*p],[132*p, 422*p],[123*p, 419*p],[107*p, 439.5*p],[95*p, 448*p],[95.5*p, 454*p],[85*p, 457*p],[74*p, 452*p],[70*p, 453*p],[47*p, 444*p],[45*p, 439*p],[46*p, 428*p],[73*p, 333*p],[136*p, 293*p],[133*p, 290*p],[132*p, 285*p],[134*p, 279.5*p],[138*p, 279*p],[141*p, 281*p],[142*p, 283*p],[148*p, 282*p],[150*p, 281*p]], {
                            weight: 0,
                            opacity: 0,
                            color: 'green',
                            fillOpacity: 0,
                            dashArray: '4'
                            });
    
    //add a hotzone for SCAA
    hotzones[3] = L.polygon([[213*p,322*p],[227*p,323*p],[229*p,326*p],[232*p,345*p],[229*p,369*p],[223*p,382*p],[199*p,378*p],[198.5*p,374*p],[199.5*p,373*p],[194*p,362*p],[195.5*p,358*p],[190*p,340*p],[209*p,319*p]], {
                            weight: 0,
                            opacity: 0,
                            color: 'green',
                            fillOpacity: 0,
                            dashArray: '4'
                            });
    
    //add a hotzone for Weintraub
    hotzones[4] = L.polygon([[163*p,62*p],[188*p,198*p],[155*p,210*p],[154*p,213*p],[137*p,215*p],[126*p,212*p],[104*p,146*p],[105*p,134*p],[127*p,122*p],[135*p,124*p],[122*p,65*p],[145*p,53*p]], {
                            weight: 0,
                            opacity: 0,
                            color: 'green',
                            fillOpacity: 0,
                            dashArray: '4'
                            });
    
    //add a hotzone for Thomas
    hotzones[5] = L.polygon([[192*p,214*p],[201*p,245*p],[161*p,270*p],[139*p,269*p],[138*p,258*p],[132*p,238*p],[131*p,235*p],[145*p,232*p],[145*p,224*p]], {
                            weight: 0,
                            opacity: 0,
                            color: 'green',
                            fillOpacity: 0,
                            dashArray: '4'
                            });
    
    //add a hotzone for Yale
    hotzones[6] = L.polygon([[197*p,414*p],[198*p,418*p],[196*p,422*p],[199*p,432*p],[174*p,497*p],[149*p,487*p],[151*p,500*p],[143*p,517*p],[132*p,511*p],[129*p,522*p],[121*p,540*p],[120*p,540.5*p],[71*p,491*p],[101.5*p,451*p],[111*p,439*p],[115*p,441*p],[119*p,446*p],[122*p,447*p],[125*p,453*p],[128.5*p,454*p],[135*p,464*p],[133*p,467*p],[134.5*p,468*p],[131*p,473*p],[144*p,478*p],[145*p,475*p],[140*p,464*p],[140*p,460*p],[165.5*p,418*p],[171.5*p,413.5*p],[176*p,408*p]], {
                            weight: 0,
                            opacity: 0,
                            color: 'green',
                            fillOpacity: 0,
                            dashArray: '4'
                            });
    
    for(var i = 1; i < hotzones.length; i++) {
        map.addLayer(hotzones[i]);
    }

    // mouseover and mouseout for hotzones
    hotzones[1].on('mouseover', function(e){
            highlightFeature(e);
    });
    hotzones[1].on('mouseout', function(e){
            resetStyle(e);
    });
    hotzones[2].on('mouseover', function(e){
            highlightFeature(e);
    });
    hotzones[2].on('mouseout', function(e){
            resetStyle(e);
    });
    hotzones[3].on('mouseover', function(e){
            highlightFeature(e);
    });
    hotzones[3].on('mouseout', function(e){
            resetStyle(e);
    });
    hotzones[4].on('mouseover', function(e){
            highlightFeature(e);
    });
    hotzones[4].on('mouseout', function(e){
            resetStyle(e);
    });
    hotzones[5].on('mouseover', function(e){
            highlightFeature(e);
    });
    hotzones[5].on('mouseout', function(e){
            resetStyle(e);
    });
    hotzones[6].on('mouseover', function(e){
            highlightFeature(e);
    });
    hotzones[6].on('mouseout', function(e){
            resetStyle(e);
    });

    //Eastlake hotzone click
    hotzones[1].on('click', function(){
            click(eastlakeSequence, eastlakePins);
    });

    //Arnold hotzone click
    hotzones[2].on('click', function(){
            click(arnoldSequence, arnoldPins);
    });

    //SCCA hotzone click
    hotzones[3].on('click', function(){
            click(SCCASequence, SCCAPins);
    });

    //Weintraub hotzone click
    hotzones[4].on('click', function(){
            click(weintraubSequence, weintraubPins);
    });

    //Thomas hotzone click
    hotzones[5].on('click', function(){
            click(thomasSequence, thomasPins);
    });

    //Yale hotzone click
    hotzones[6].on('click', function(){
            click(yaleSequence, yalePins);
    });
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

function changeAngle(sequence){
    var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    var p = w/1400;

    //add a test hotspot to the new image
    var hotspot1 = L.marker([155*p, 360*p]);
    hotspot1.bindPopup("<b>Skybridge</b>");
    var miscellaneous = L.layerGroup([hotspot1]);
    
    backButton = drawBack();

    // add all layers for path to zoom in
    map.addLayer(sequence[1]);
    var i = 2;
    var zoomIn = setInterval(function(){
                map.addLayer(sequence[i]);
                
                if (i > 3 && map.hasLayer(sequence[i])){
                    map.removeLayer(sequence[i-2]);
                }
                
                i++;
                
                //when all layers have been added, add back the back button and menu
                if (i == (sequence.length - 1)){ //=46
                    backButton.addTo(map);
                    
                    for (var j = 1; j < currPins.length; j++) {
                        map.addLayer(currPins[j]);
                    }
                    clearInterval(zoomIn);
                }

    }, 40, sequence.length - 2);

    //event to go back when the back button is clicked
    backButton.on('click', function(e){
        back(sequence);
    });

    zoomed = true;
}


function back(sequence) {
    // removing the leftover layers from the additions above, and other features
    //last = sequence.length - 1;
    //map.removeLayer(sequence[1]);
    //map.removeLayer(sequence[last - 1]);
    //map.removeLayer(sequence[last]);
    map.removeLayer(sequence[(sequence.length - 3)]);

    //map.removeLayer(hotspot1);
    map.removeLayer(backButton);
    //mapMenu.removeFrom(map);
    map.removeLayer(pins[1]);
    //for (var i = 1; i < currZoomPins.length; i++) {
        //map.removeLayer(currZoomPins[i]);
    //}
                  
    //remove all layers and get back to the home image
    var k = sequence.length - 1; //=45 sequence.length - 2
    var zoomOut = setInterval(function(){
        map.removeLayer(sequence[k]);
        map.addLayer(sequence[k-1]);
        k--;
                    
        // when the initial layer is finally added back on, put the defaults back
        if(k == 1){
            map.removeLayer(pins[23]);
            addLayersForGoBack();
            createHotzones();
            var last = sequence.length - 1;
            //map.removeLayer(sequence[1]);
            map.removeLayer(sequence[last - 1]);
            map.removeLayer(sequence[last]);
            clearInterval(zoomOut);
        }
    }, 40, sequence.length - 2);

    zoomed = false;    
}

function drawBack() {
    var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    var p = w/1400;

    if(backButton) {
        map.removeLayer(backButton);
    }

    var goBackIcon = L.icon({
            iconUrl: urlBegin + '/04/back_button.png',
            iconSize: [80*p,80*p]
    });
    
    //define back button marker for the map
    var back = L.marker([312*p, 25*p], {icon: goBackIcon});

    return back;
}

function createEastlakePins(){
    var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    var p = w/1400;
    // initialize variables
    var compassRose;
    
    compassRose = L.icon({
                         iconUrl: urlBegin + '/05/CompassLogoEastlake.png',
                         iconSize: [57*p,27*p]
                         });
    eastlakePins[1] = L.marker([270*p, 25*p], {icon: compassRose});
}

function createSCCAPins(){
    var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    var p = w/1400;
    // initialize variables
    var compassRose;

    compassRose = L.icon({
                         iconUrl: urlBegin + '/05/CompassLogoSCCA.png',
                         iconSize: [57*p,27*p]
                         });
    SCCAPins[1] = L.marker([270*p, 25*p], {icon: compassRose});
    // Bus
    var busIcon = L.icon({
                         iconUrl: urlBegin + '/04/BusLogo.png',
                         iconSize: [27*p,25*p]
                         });
    var bus = L.marker([235*p, 185*p], {icon: busIcon});
    SCCAPins[2] = bus;
}

function createThomasPins(){
    var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    var p = w/1400;
    // initialize variables
    var compassRose;
    
    compassRose = L.icon({
                         iconUrl: urlBegin + '/05/CompassLogoThomas.png',
                         iconSize: [48*p,63*p]
                         });
    thomasPins[1] = L.marker([268*p, 20*p], {icon: compassRose});
    // Parking
    var parkingIcon = L.icon({
                             iconUrl: urlBegin + '/04/ParkingLogo.png',
                             iconSize: [22*p,27*p]
                             });
    var parking1of2 = L.marker([175*p, 215*p], {icon: parkingIcon});
    thomasPins[2] = parking1of2;
    var parking2of2 = L.marker([70*p, 290*p], {icon: parkingIcon});
    thomasPins[3] = parking2of2;
    // Bus
    var busIcon = L.icon({
                         iconUrl: urlBegin + '/04/BusLogo.png',
                         iconSize: [27*p,25*p]
                         });
    var bus = L.marker([230*p, 170*p], {icon: busIcon});
    thomasPins[4] = bus;
}

function createWeintraubPins(){
    var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    var p = w/1400;
    // initialize variables
    var compassRose;
    
    compassRose = L.icon({
                         iconUrl: urlBegin + '/05/CompassLogoWeintraub.png',
                         iconSize: [59*p,59*p]
                         });
    weintraubPins[1] = L.marker([268*p, 20*p], {icon: compassRose});
    // Buses
    var busIcon = L.icon({
                         iconUrl: urlBegin + '/04/BusLogo.png',
                         iconSize: [27*p,25*p]
                         });
    var bus = L.marker([135*p, 484*p], {icon: busIcon});
    weintraubPins[2] = bus;
    var bus = L.marker([304*p, 267*p], {icon: busIcon});
    weintraubPins[3] = bus;
}

function createArnoldPins(){
    var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    var p = w/1400;
    // initialize variables
    var compassRose;
    
    compassRose = L.icon({
                         iconUrl: urlBegin + '/05/CompassLogoArnold.png',
                         iconSize: [63*p,51*p]
                         });
    arnoldPins[1] = L.marker([270*p, 23*p], {icon: compassRose});
}

function createYalePins(){
    var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    var p = w/1400;
    // initialize variables
    var compassRose;
    
    compassRose = L.icon({
                         iconUrl: urlBegin + '/05/CompassLogoYale.png',
                         iconSize: [59*p,59*p]
                         });
    yalePins[1] = L.marker([268*p, 20*p], {icon: compassRose});
    // Parking
    var parkingIcon = L.icon({
                             iconUrl: urlBegin + '/04/ParkingLogo.png',
                             iconSize: [22*p,27*p]
                             });
    var parking = L.marker([175*p, 215*p], {icon: parkingIcon});
    yalePins[2] = parking;
}


// add building names and other pins for default map view
function addDefaultPins(){
    var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    var p = w/1400;

    var POIicon = L.icon({
    iconUrl: urlBegin + '/05/POImarker.png',
    iconSize: [30,30]
    });
    
    // ADD THE FH LOGO TO THE BOTTOM LEFT CORNER
    var FredHutchLogoIcon = L.icon({
                                   iconUrl: urlBegin + '/04/FredHutchLogo.png',
                                   iconSize: [171*p, 46*p]
                                   });
    var FredHutchLogo = L.marker([20*p, 60*p], {icon: FredHutchLogoIcon}).addTo(map);
    pins[1] = FredHutchLogo;
    
    // 1144 Eastlake Pin
    var Eastlake1144Icon = L.icon({
                                  iconUrl: urlBegin + '/04/1144EastlakeName.png',
                                  iconSize: [66*p,34*p]
                                  });
    var Eastlake1144Pin = L.marker([213*p, 70*p], {icon: Eastlake1144Icon}).addTo(map);
    pins[2] = Eastlake1144Pin;
    
    // 1100 Eastlake Pin
    var EastlakeIcon = L.icon({
                              iconUrl: urlBegin + '/05/EastlakeName.png',
                              iconSize: [103*p,68*p]
                              });
    var EastlakePin = L.marker([210*p, 160*p], {icon: EastlakeIcon}).addTo(map);
    pins[3] = EastlakePin;
    
    // Weintraub Pin
    var WeintraubIcon = L.icon({
                               iconUrl: urlBegin + '/04/WeintraubName.png',
                               iconSize: [79*p,64*p]
                               });
    var WeintraubPin = L.marker([175*p, 120*p], {icon: WeintraubIcon}).addTo(map);
    pins[4] = WeintraubPin;
    
    // Thomas Pin
    var ThomasIcon = L.icon({
                            iconUrl: urlBegin + '/04/ThomasName.png',
                            iconSize: [56*p,64*p]
                            });
    var ThomasPin = L.marker([185*p, 245*p], {icon: ThomasIcon}).addTo(map);
    pins[5] = ThomasPin;
    
    // Hutchinson Pin
    var HutchinsonIcon = L.icon({
                                iconUrl: urlBegin + '/04/HutchinsonName.png',
                                iconSize: [79*p,64*p]
                                });
    var HutchinsonPin = L.marker([155*p, 180*p], {icon: HutchinsonIcon}).addTo(map);
    pins[6] = HutchinsonPin;
    
    // Fairview Pin
    var FairviewIcon = L.icon({
                              iconUrl: urlBegin + '/04/FairviewName.png',
                              iconSize: [65*p,18*p]
                              });
    var FairviewPin = L.marker([95*p, 270*p], {icon: FairviewIcon}).addTo(map);
    pins[7] = FairviewPin;
    
    // Arnold Pin
    var ArnoldIcon = L.icon({
                            iconUrl: urlBegin + '/04/ArnoldName.png',
                            iconSize: [58*p,65*p]
                            });
    var ArnoldPin = L.marker([130*p, 370*p], {icon: ArnoldIcon}).addTo(map);
    pins[8] = ArnoldPin;
    
    // Lea Pin
    var LeaIcon = L.icon({
                         iconUrl: urlBegin + '/04/LeaName.png',
                         iconSize: [30*p,19*p]
                         });
    var LeaPin = L.marker([150*p, 535*p], {icon: LeaIcon}).addTo(map);
    pins[9] = LeaPin;
    
    // Yale Pin
    var YaleIcon = L.icon({
                          iconUrl: urlBegin + '/04/YaleName.png',
                          iconSize: [38*p,67*p]
                          });
    var YalePin = L.marker([185*p, 455*p], {icon: YaleIcon}).addTo(map);
    pins[10] = YalePin;
    
    // Aloha Pin
    var AlohaIcon = L.icon({
                           iconUrl: urlBegin + '/04/AlohaName.png',
                           iconSize: [50*p,18*p]
                           });
    var AlohaPin = L.marker([185*p, 365*p], {icon: AlohaIcon}).addTo(map);
    pins[11] = AlohaPin;
    
    // Valley Pin
    var ValleyIcon = L.icon({
                            iconUrl: urlBegin + '/04/ValleyName.png',
                            iconSize: [55*p,21*p]
                            });
    var ValleyPin = L.marker([195*p, 395*p], {icon: ValleyIcon}).addTo(map);
    pins[12] = ValleyPin;
    
    // SCCA Pin
    var SCCAIcon = L.icon({
                          iconUrl: urlBegin + '/04/SCCAName.png',
                          iconSize: [40*p,64*p]
                          });
    var SCCAPin = L.marker([230*p, 334*p], {icon: SCCAIcon}).addTo(map);
    pins[13] = SCCAPin;
    
    // BUSES
    var busIcon = L.icon({
                         iconUrl: urlBegin + '/04/BusLogo.png',
                         iconSize: [27*p,25*p]
                         });
    // Bus 1 of 4
    var bus1of4 = L.marker([215*p, 310*p], {icon: busIcon}).addTo(map);
    pins[14] = bus1of4;
    // Bus 2 of 4
    var bus2of4 = L.marker([200*p, 225*p], {icon: busIcon}).addTo(map);
    pins[15] = bus2of4;
    // Bus 3 of 4
    var bus3of4 = L.marker([125*p, 25*p], {icon: busIcon}).addTo(map);
    pins[16] = bus3of4;
    // Bus 4 of 4
    var bus4of4 = L.marker([95*p, 145*p], {icon: busIcon}).addTo(map);
    pins[17] = bus4of4;
    
    // PARKING
    var parkingIcon = L.icon({
                             iconUrl: urlBegin + '/04/ParkingLogo.png',
                             iconSize: [22*p,27*p]
                             });
    // Parking 1 of 3
    var parking1of3 = L.marker([155*p, 415*p], {icon: parkingIcon}).addTo(map);
    pins[18] = parking1of3;
    // Parking 2 of 3
    var parking2of3 = L.marker([155*p, 275*p], {icon: parkingIcon}).addTo(map);
    pins[19] = parking2of3;
    // Parking 3 of 3
    var parking3of3 = L.marker([125*p, 220*p], {icon: parkingIcon}).addTo(map);
    pins[20] = parking3of3;
    
    // LIGHTRAIL
    var lightrailIcon = L.icon({
                               iconUrl: urlBegin + '/04/LightrailLogo.png',
                               iconSize: [21*p,30*p]
                               });
    var lightrail = L.marker([35*p, 365*p], {icon: lightrailIcon}).addTo(map);
    pins[21] = lightrail;
    
    // COMPASS
    var compassIcon = L.icon({
                             iconUrl: urlBegin + '/04/CompassLogo.png',
                             iconSize: [57*p,27*p]
                             });
    var compass = L.marker([215*p, 25*p], {icon: compassIcon}).addTo(map);
    pins[22] = compass;
    
    // LEGEND
    var legendIcon = L.icon({
                            iconUrl: urlBegin + '/04/Legend.png',
                            iconSize: [155*p,153*p]
                            });
    var legend = L.marker([290*p, 550*p], {icon: legendIcon}).addTo(map);
    pins[23] = legend;

    
    // CAMPUS TOUR DESCRIPTION ON DEFAULT VIEW
    var campusTourHeaderIcon = L.icon({
                                      iconUrl: urlBegin + '/05/CampusTourHeader.png',
                                      iconSize: [210*p,128*p]
                                      });
    var campusTourHeader = L.marker([290*p, 75*p], {icon: campusTourHeaderIcon}).addTo(map);
    pins[24] = campusTourHeader;
    
    // STREET NAMES
    // Fairview Avenue North
    var FairviewAvenueNorthIcon = L.icon({
                                         iconUrl: urlBegin + '/05/FairviewAvenueNorthName.png',
                                         iconSize: [84*p, 31*p]
                                         });
    var FairviewAvenueNorth = L.marker([70*p, 235*p], {icon: FairviewAvenueNorthIcon}).addTo(map);
    pins[25] = FairviewAvenueNorth;
    
    // Campus Drive
    var CampusDriveIcon = L.icon({
                                 iconUrl: urlBegin + '/05/CampusDriveName.png',
                                 iconSize: [67*p, 107*p]
                                 });
    var CampusDrive = L.marker([90*p, 310*p], {icon: CampusDriveIcon}).addTo(map);
    pins[26] = CampusDrive;
    
    // Aloha Street
    var AlohaStreetIcon = L.icon({
                                 iconUrl: urlBegin + '/05/AlohaStreetName.png',
                                 iconSize: [47*p, 41*p]
                                 });
    var AlohaStreet = L.marker([80*p, 470*p], {icon: AlohaStreetIcon}).addTo(map);
    pins[27] = AlohaStreet;
    
    // Eastlake Avenue East
    var EastlakeAvenueEastIcon = L.icon({
                                        iconUrl: urlBegin + '/05/EastlakeAvenueEastName.png',
                                        iconSize: [86*p, 28*p]
                                        });
    var EastlakeAvenueEast = L.marker([215*p, 270*p], {icon: EastlakeAvenueEastIcon}).addTo(map);
    pins[28] = EastlakeAvenueEast;
    
    // Minor Avenue North
    var MinorAvenueNorthIcon = L.icon({
                                      iconUrl: urlBegin + '/05/MinorAvenueNorthName.png',
                                      iconSize: [58*p, 60*p]
                                      });
    var MinorAvenueNorth = L.marker([50*p, 510*p], {icon: MinorAvenueNorthIcon}).addTo(map);
    pins[29] = MinorAvenueNorth;
    
    // Minor Pin
    var MinorIcon = L.icon({
                          iconUrl: urlBegin + '/05/MinorName.png',
                          iconSize: [42*p,59*p]
                          });
    var MinorPin = L.marker([120*p, 480*p], {icon: MinorIcon}).addTo(map);
    pins[30] = MinorPin;
    
    // Yale Avenue
    var YaleAvenueIcon = L.icon({
                                iconUrl: urlBegin + '/05/YaleAvenueName.png',
                                iconSize: [64*p, 33*p]
                                });
    var YaleAvenue = L.marker([176*p, 390*p], {icon: YaleAvenueIcon}).addTo(map);
    pins[31] = YaleAvenue;
    
    // Yale Avenue
    var ValleyStreetIcon = L.icon({
                                iconUrl: urlBegin + '/05/ValleyStreetName.png',
                                iconSize: [52*p, 32*p]
                                });
    var ValleyStreet = L.marker([205*p, 400*p], {icon: ValleyStreetIcon}).addTo(map);
    pins[32] = ValleyStreet;
    
    // DEFAULT POI
    var popupOptions = {
        autoPan: false,
        offset:  new L.Point(0*p, 0*p)
    };
    
    // Pelton Auditorium
    var PeltonPopup = L.popup(popupOptions)
        .setLatLng([ 175*p, 160*p ])
        .setContent('<b style="font-size: 17px;">PELTON AUDITORIUM</b><br><br>Text here.')
    ;
    pins[33] = L.marker([175*p, 160*p], {icon: POIicon}).addTo(map);
    pins[33].on('click', function(){
                PeltonPopup.openOn(map);
                });
    
    // Sze Conference Rooms
    var SzePopup = L.popup(popupOptions)
        .setLatLng([ 190*p, 220*p ])
        .setContent('<b style="font-size: 17px;">SZE CONFERENCE ROOMS</b><br><br>Text here.')
    ;
    pins[34] = L.marker([190*p, 220*p], {icon: POIicon}).addTo(map);
    pins[34].on('click', function(){
                SzePopup.openOn(map);
                });
    
    // Vessel
    var VesselPopup = L.popup(popupOptions)
        .setLatLng([ 152*p, 286*p ])
        .setContent('<b style="font-size: 17px;">VESSEL</b><br><br>Text here.')
    ;
    pins[35] = L.marker([152*p, 286*p], {icon: POIicon}).addTo(map);
    pins[35].on('click', function(){
                VesselPopup.openOn(map);
                });
    
    // Visitor Center
    var VisitorCenterPopup = L.popup(popupOptions)
        .setLatLng([ 160*p, 334*p ])
        .setContent('<b style="font-size: 17px;">VISITOR CENTER</b><br><br>Text here.')
    ;
    pins[36] = L.marker([160*p, 334*p], {icon: POIicon}).addTo(map);
    pins[36].on('click', function(){
                VisitorCenterPopup.openOn(map);
                });
    
    // Rain or Shine Gift Shop
    var GiftShopPopup = L.popup(popupOptions)
        .setLatLng([ 214*p, 335*p ])
        .setContent('<b style="font-size: 17px;">RAIN OR SHINE GIFT SHOP</b><br><br>Text here.')
    ;
    pins[37] = L.marker([214*p, 355*p], {icon: POIicon}).addTo(map);
    pins[37].on('click', function(){
                GiftShopPopup.openOn(map);
                });
    
    // HR Lobby and Reception
    var HRPopup = L.popup(popupOptions)
        .setLatLng([ 180*p, 415*p ])
        .setContent('<b style="font-size: 17px;">HR LOBBY AND RECEPTION</b><br><br>Text here.')
    ;
    pins[38] = L.marker([180*p, 415*p], {icon: POIicon}).addTo(map);
    pins[38].on('click', function(){
                HRPopup.openOn(map);
                });
    
    // Arnold Rooftop Deck
    var ArnoldRooftopPopup = L.popup(popupOptions)
        .setLatLng([ 93*p, 433*p ])
        .setContent('<b style="font-size: 17px;">ARNOLD ROOFTOP DECK</b><br><br>Text here.')
    ;
    pins[39] = L.marker([93*p, 433*p], {icon: POIicon}).addTo(map);
    pins[39].on('click', function(){
                ArnoldRooftopPopup.openOn(map);
                });
    
    // Hutch Kids
    var HutchKidsPopup = L.popup(popupOptions)
        .setLatLng([ 145*p, 500*p ])
        .setContent('<b style="font-size: 17px;">HUTCH KIDS</b><br><br>Text here.')
    ;
    pins[40] = L.marker([145*p, 500*p], {icon: POIicon}).addTo(map);
    pins[40].on('click', function(){
                    HutchKidsPopup.openOn(map);
                    });
    
    // Thomas Building Popup
    popupOptions = {
        offset:  new L.Point(0*p, -10*p),
        maxWidth: 250,
        autoPan: false,
        maxHeight: 185*p
    };
    var Pin5Popup = L.popup(popupOptions)
        .setLatLng([ 185*p, 245*p ])
        .setContent('<b style="font-size: 17px;">THOMAS</b><br><br>Named for Nobel Laureate Dr. E. Donnall Thomas, this building is home to the Clinical Research Division, a group with more than 100 faculty members and dozens of individual labs. Their focus has expanded to encompass 12 diverse areas of research including hematopoietic cell transplantation, immunotherapy, gene therapy, solid tumor biology and genetics.')
    ;
    pins[5].on('click', function(){
        Pin5Popup.openOn(map);
    });
    
}

// add pins back when you hit the back button to go to default map view
function addLayersForGoBack(){
    addDefaultPins();
    for (var i = 2; i < pins.length; i++){
        if (i != 23)
        map.addLayer(pins[i]);
    }
    for(var a = 1; a < hotzones.length; a++){
        map.addLayer(hotzones[a]);
        hotzones[a].setStyle({
              weight: 0,
              opacity: 0,
              color: 'green',
              fillOpacity: 0,
              dashArray: '4'
              });
    }
}

// remove the pins when you hit a hotzone and zoom in
// remove the pins when you hit a hotzone and zoom in (except FH Logo and legend)
function removeLayersForZoom(){
    for (var i = 2; i < pins.length; i++){
        if (i != 23)
            map.removeLayer(pins[i]);
    }
}


// open the FH website when the logo is clicked
pins[1].on('click', function(){
        var win = window.open('https://www.fredhutch.org', '_blank');
        win.focus();
});


function click(sequence, zoomPins) {
    clearHotzones();
    removeLayersForZoom();
    map.removeLayer(initialView); 
    currPins = zoomPins;//remove??
    changeAngle(sequence);
    currSequence = sequence;
}

$(document).ready(function(){
    $(window).resize(function(){
        clearPins();
        clearHotzones();
        responsive();
    });
});

function responsive() {
    var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    var percent = w/1400;
    map.setView([center_h * percent, center_w * percent], 1);

    loadImages();
    
    if (initialView){
        map.removeLayer(initialView);
    }

    initialView = new L.imageOverlay( url, [[ center_h * 2 * percent, 0 ], [ 0, center_w * 2 * percent]] );
    map.addLayer(initialView);

    createSCCAPins();
    createYalePins();
    createArnoldPins();
    createWeintraubPins();
    createThomasPins();
    createEastlakePins();

    if (zoomed) {
        //1, 44, 45, length: 46 (eastlake)
        last = currSequence.length - 1;
        map.removeLayer(currSequence[1]);
        map.removeLayer(currSequence[last - 1]);
        map.removeLayer(currSequence[last]);

        //loadImages();
        map.addLayer(currSequence[last]);

        for (var i = 1; i < zoomPins.length; i++) {
            map.addLayer(zoomPins[i]);
        }

        if(backButton) {
            map.removeLayer(backButton);
            backButton = drawBack();
            backButton.addTo(map);

            backButton.on('click', function(e){
            back(currSequence);
            });
        }
    }

    else {
        createHotzones();
        addDefaultPins();
    }

    $("#map").height(668*percent-1).width(1200*percent-2);
    map.invalidateSize(false);
}

/*map.on('click', function(e) {
    alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng)
});*/

function clearPins(){

    for (var i = 1; i < pins.length; i++) {
        map.removeLayer(pins[i]);
    }

    delete pins;
}

function clearHotzones(){

    for (var i = 1; i < hotzones.length; i++) {
        map.removeLayer(hotzones[i]);
    }

    delete hotzones;
}

</script>