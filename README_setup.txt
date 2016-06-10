Installation & Setup Guide

1: Begin by installing WordPress on your server or local machine. The WordPress Codex has
multiple support articles that will walk you through installation on your environment
of choice.

2: Once you have verified that WordPress is running, replace the files with the modified
WordPress files we have supplied.

3: Note that your new wp-config contains the following lines at the top:

if ( file_exists( dirname( __FILE__ ) . '/wp-config-local.php' ) ) {
require_once dirname( __FILE__ ) . '/wp-config-local.php';
}

This allows you to create a file called wp-config-local with your actual database
information on the server, meaning that the database's username and password will not
be visible to anyone without direct access to the server, even if your normal
wp-config was publicly visible.

Make sure that either your new wp-config or your new wp-config-local contains the correct
information for your database, based on your original wp-config.

4: Under the Appearance tab, make sure that the theme "Twenty Sixteen Child" is activated.

5: Under the Settings tab, in the Media section, I recommend that you disable the
"Organize my uploads into month- and year-based folders" setting. This is optional,
but it can cause some confusion with image names if re-uploading is needed.

6: You can create and modify user information under the User settings to allow access
to other people as needed.

7: At the time of writing, no plugins were needed, and none should be activated.

8: To create the map page, go to the Pages section and add a new page. On the right-hand
side, make sure the Template is set to Leaflet Map. Publish the page, and it will
now work as expected.

9: The basic setup is now complete, and you may begin creating Popup posts to populate
the pins on the map.

NOTES:

If you experience database connection issues during setup, deleting wp-config and
allowing WordPress to prompt you through regenerating it is often helpful.

The current (6/2/16) version of the leaflet-map.php file
(wp-content --> themes --> twentysixteen-child --> leaflet-map.php)
references the temporary server, http://54.191.11.98/. These references will need to be
replaced with the new server address. There are 4 references: 1 in the getJSON call
(first script), and 3 in the @font-face style attribute.

If you attempt to interact with the map before creating any Popup posts, there will be
a bug causing a blank screen upon zooming out of a path. This is expected, and will not
occur once any Popups have been created. To do so, refer to the Guide to Content
Management documentation