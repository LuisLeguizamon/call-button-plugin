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
// Add a custom section to the WordPress admin panel (it will show inside Settings Section)
function call_button_py_admin_menu() {
    add_options_page(
        'Call Button Py Settings',
        'Call Button Py',
        'manage_options',
        'call_button_py',
        'call_button_py_settings_page',
    );
}
add_action( 'admin_menu', 'call_button_py_admin_menu' );

// Callback function for the custom section
function call_button_py_settings_page() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    if ( isset( $_POST['call_button_py_phone'] ) ) {
        $value = sanitize_text_field( $_POST['call_button_py_phone'] );
        update_option( 'call_button_py_phone', $value );
    }
    $value = get_option( 'call_button_py_phone', '' );
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form method="post">
            <label id="call_button_py_phone">Phone number</label>
            <input type="text" id="call_button_py_phone" name="call_button_py_phone" value="<?php echo esc_attr( $value ); ?>"/>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Add a call button to the end of single posts
function call_button_py_contact($content)
{
    $number = '';
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

add_filter('the_content', 'call_button_py_contact');
