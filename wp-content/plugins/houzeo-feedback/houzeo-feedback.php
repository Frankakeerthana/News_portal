<?php
/*
Plugin Name: Houzeo Feedback
Description: Custom feedback form and list for Houzeo.
Version: 1.0
Author: Keerthana Thatikayala
*/

// Activate the plugin and create the table
register_activation_hook(__FILE__, 'houzeo_feedback_activate');

function houzeo_feedback_activate() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'houzeo_feedback';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name text NOT NULL,
        email text NOT NULL,
        phone text NOT NULL,
        comment text NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function houzeo_enqueue_scripts() {
    wp_enqueue_script('houzeo-ajax', plugin_dir_url(__FILE__) . 'js/houzeo-ajax.js', array('jquery'), '1.0', true);

    // Pass the necessary data to JavaScript
    wp_localize_script('houzeo-ajax', 'houzeo_ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('houzeo-feedback-nonce')
    ));
}

add_action('wp_enqueue_scripts', 'houzeo_enqueue_scripts');

add_action('wp_ajax_submit_feedback', 'submit_feedback');
add_action('wp_ajax_nopriv_submit_feedback', 'submit_feedback');

function submit_feedback() {
    global $wpdb;

    // Get the form data
    $form_data = $_POST['form_data'];
    parse_str($form_data, $data);

    // Insert data into the custom table
    $table_name = $wpdb->prefix . 'houzeo_feedback';
    $wpdb->insert(
        $table_name,
        array(
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'comment' => $data['comment']
        ),
        array('%s', '%s', '%s', '%s')
    );

    // Return a success message (you can customize this)
    echo 'Feedback submitted successfully!';
    wp_die(); // Always include this to terminate the AJAX request
}

function feedback_form_shortcode() {
    ob_start();
    //include 'path/to/your/feedback-form-template.php'; // Include your HTML form template file
    include('feedback-form-template.php');
    return ob_get_clean();
}

add_shortcode('feedback_form', 'feedback_form_shortcode');

//Shortcode to display the feedback list
function houzeo_feedback_list_shortcode() {
    // Fetch and display feedback data from the custom table
    include('feedback-list-template.php');
    return ob_get_clean();
}
add_shortcode('houzeo_feedback_list', 'houzeo_feedback_list_shortcode');

?>
