<?php
/*
Plugin Name:  Call Button Py
Plugin URI:   https://github.com/LuisLeguizamon
Description:  Call button py
Version:      1.0
Author:       Luis Leguizamon 
Author URI:   https://github.com/LuisLeguizamon
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*/
function call_button_py_contact($content)
{
    $number = '0981921852';
    // Only do this when a single post is displayed
    if (is_single()) {
        // Message you want to display after the post
        $content .= 
            '<p class="follow-us">
                Si estás interesado contactanos al
                <a href="tel:'.$number.'">'.$number.'</a>
            </p>';
    }
    // Return the content
    return $content;
}
// Hook our function to WordPress the_content filter
add_filter('the_content', 'call_button_py_contact');
