Guide to Content Management for the Fred Hutch Virtual Tour

Contents:
Adding New Hotspot Content to an Existing Pin (Non-Technical)
Editing the Hotspot Content for an Existing Pin (Non-Technical)
Adding, Removing, or Editing a Hotzone (Technical)
Adding, Removing, or Editing a Pin (Technical)
Adding, Removing, or Editing a Pin’s Popup (Technical)

For further documentation on the Leaflet library, see http://leafletjs.com/reference-1.0.0.html 



Adding New Hotspot Content to an Existing Pin (Non-Technical)

On the WordPress Admin Page, click the Popups option from the menu in the left sidebar. 
Click Add New at the top of the page. The resulting page should look like this:
	 

At the top, in the space prompting a title, type the exact name of the point of interest, for example, “Arnold Rooftop Deck” or “HR Lobby and Reception”. This is important to make sure that the correct content gets assigned to the correct pin. Capitalization does not matter.
Type the exact text you wish to appear in the popup in the large text field below.
If you want to add an image, click “Set featured image” in the lower righthand corner, and choose between uploading an image from your computer and selecting an image from your WordPress Media Library.
In the Popup Tags section, on the right side of the page, type “info” and click Add.
Click Publish in the top right corner.




Editing the Hotspot Content for an Existing Hotspot Pin (Non-Technical)
On the WordPress Admin Page, click the Popups option from the menu in the left sidebar. 
Click the title of the popup you wish to edit.
Make any desired changes:
Change the text in the main text window
Add a new image by clicking “Set featured image” in the lower righthand corner, and choosing between uploading an image from your computer and selecting an image from your WordPress Media Library.
Change an existing image by clicking the original in the bottom right corner.
Remove an existing image by clicking “Remove featured image” below the current image.
Click Update in the top right corner.

NOTE: Do not change the title of the post, or the content will not be matched to the correct pin.




Adding, Removing, or Editing a Hotzone (Technical)
Navigate to the leaflet-map.php file (wp-content ? themes ? twentysixteen-child ? leaflet-map.php)
Locate the createHotzones function (see documentation at top of file for guide)
Each hotzone is defined as follows:
hotzones[1] = L.polygon([[210*p,109*p],[207*p,128*p],[209*p,140*p], [210*p,194*p],[209*p,194*p],[209*p,196*p],[207*p,196*p],[207*p,197*p],[188*p,199*p],[176*p,130*p],[175*p,102*p],[198*p,93*p],[199*p,96*p],[202*p,97*p],[203*p,100*p],[205*p,100*p]], {
                            weight: 0,
                            opacity: 0,
                            color: 'green',
                            fillOpacity: 0,
                            dashArray: '4'
                            });

Each pair of numbers is a set of latitude/longitude coordinates: with the bottom left corner of the map as a reference, the first number is the number of pixels up, and the second number is the number of pixels right.
The coordinates begin at the bottom left corner of the hotzone and move clockwise around it, with each point connected by a straight line. The result is a polygon.
“p” is a variable representing the ratio (current screen width)/(screen width of 1400), which allows the hotzones to scale responsively. At a screen size of 1400, the ratio will be 1, and the hotzone coordinates will be exactly as listed.
To determine the latitude/longitude coordinates of a given point, adjust your screen width to 1400 and uncomment the script in the leaflet-map.php file that prints out lat/long on click (see documentation at top of file for guide, or search “map.on('click', function(e)”). You can then click anywhere on the map that you want a polygon corner, and an alert will pop up with the appropriate coordinates.
“Weight” sets the thickness of the polygon/hotzone’s border.
“Opacity” sets the opacity of the polygon/hotzone’s border.
“Color” sets the color of the polygon/hotzone border and fill.
“fillOpacity” sets the opacity of the polygon/hotzone’s fill.




Adding, Removing, or Editing a Pin (Technical)
Navigate to the leaflet-map.php file (wp-content ? themes ? twentysixteen-child ? leaflet-map.php)
If you want to update the pins on the default view, locate the addDefaultPins function (see documentation at top of file for guide). If you want to update the pins on a zoomed in view, find the appropriate add pins function (addThomasPins, addWeintraubPins, etc.).
Each pin requires an icon (the visual representation of the pin), which is defined as follows:
var EastlakeIcon = L.icon({
                              iconUrl: urlBegin + '/EastlakeName.png',
                              iconSize: [103*p,68*p]
                              })

The first number in the iconSize pair is the width of the icon, the second is the height.
“p” is a variable representing the ratio (current screen width)/(screen width of 1400), which allows the pins to scale responsively. At a screen size of 1400, the ratio will be 1, and the pin coordinates will be exactly as listed.
After the icon is defined, the pin itself is defined and added to the map as follows:
	 	var EastlakePin = L.marker([210*p, 160*p], {icon: EastlakeIcon}).addTo(map);

You may also set icon to the existing POIicon, which is the generic, teardrop icon.
The pair of numbers is a set of latitude/longitude coordinates: with the bottom left corner of the map as a reference, the first number is the number of pixels up, and the second number is the number of pixels right.
To determine the latitude/longitude coordinates of a given point, adjust your screen width to 1400 and uncomment the script in the leaflet-map.php file that prints out lat/long on click (see documentation at top of file for guide, or search “map.on('click', function(e)”). You can then click anywhere on the map that you want a polygon corner, and an alert will pop up with the appropriate coordinates.
Finally, the pin needs to be placed into an array of pins, as follows:
		pins[2] = EastlakePin; 
	Or, in a zoomed in view:
		eastlakePins[2] = EastlakePin;
		thomasPins[2] = ThomasPin;
		etc.




Adding, Removing, or Editing a Pin’s Popup (Technical)
Navigate to the leaflet-map.php file (wp-content ? themes ? twentysixteen-child ? leaflet-map.php)
If you want to update the pin popups on the default view, locate the addDefaultPins function (see documentation at top of file for guide). If you want to update the pin popups on a zoomed in view, find the appropriate add pins function (addThomasPins, addWeintraubPins, etc.).
Popups are defined as follows:
		var VisitorCenterPopup = L.popup(popupOptions)
    			.setLatLng([ 160*p, 334*p ])
    			.setContent(getPost('VISITOR CENTER'));
The pair of numbers is a set of latitude/longitude coordinates: with the bottom left corner of the map as a reference, the first number is the number of pixels up, and the second number is the number of pixels right.
getPost is a call to a function that provides the content of the pin’s popup. Make sure the string passed is the precise name of the point of interest, so that the correct content is applied. This string is not case-sensitive.
Finally, add a click event calling the popup when the appropriate pin is clicked, as follows:
		pins[34].on('click', function(){
                		VisitorCenterPopup.openOn(map);
                	});


	
