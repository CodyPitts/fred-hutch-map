Outstanding Issues

When the browser window is maximized or un-maximized, the map image gets shifted partially outside the map view, so only part of the map is visible. This also occurs when switching between portrait and landscape mode on a mobile device or tablet. 
Hovering over pins that are not interactive (bus stops, light rail, etc.) still causes the cursor to switch to the pointing finger, incorrectly indicating that they are clickable.
None of the building names grey out on zoom-in.

Other Notes

Everything on the page besides the background image(s) is a pin, and can be linked with a popup.
The ArtPopup (in file wp-content ? themes ? twentysixteen-child ? leaflet-map.php, function createArnoldPins()) is currently the only popup not linked to the CMS. This is because that popup contains multiple sections, which the CMS is not currently set up to handle. 
All content within the popups is wrapped in a div called “post”, for ease of styling.
Multiple users unfamiliar with the map (user testing) had difficulties locating or did not notice the back button. Some noted it was because their eyes were drawn to the legend.
There is minimal error checking in the current code, which could be improved. There should be no issues if everything is setup properly, but if for some reason the Leaflet library attempts to access an undefined object, the program will break and the map will disappear. This is why at least one post needs to be created with the proper tag for the map to work properly (see FH WordPress Installation Guide).