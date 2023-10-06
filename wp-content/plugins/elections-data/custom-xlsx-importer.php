<?php 
/**
 * Plugin Name: Custom XLSX Importer
 * Description: Custom plugin to import XLSX data into a custom table.
 * Plugin URI: https://customxlsximporter.com
 * Author: Keerthana Thatikayala
 * Version:1.0
 */

defined('ABSPATH') or die;

include(plugin_dir_path(__FILE__) . 'telangana-table-data.php');
//custom_data_table_shortcode(); 
function telangana_data_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'telangana_election_data';
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
    stname VARCHAR(255),
    dtname VARCHAR(255),
    state_code INT,
    district_code INT,
    Parameter INT,
    Ac_code INT,
    Constituency VARCHAR(255),
    MLA VARCHAR(255),
    PARTY VARCHAR(255)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}
add_action( 'init', 'telangana_data_table' );

require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';

function insert_xlsx_data_into_custom_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'telangana_election_data';
    // Check if the plugin has already been activated
    $plugin_activated = get_option('custom_xlsx_importer_activated');
     if (!$plugin_activated) {
    // Get the absolute path to the plugin directory
    $plugin_dir = plugin_dir_path(__FILE__);
    // Specify the relative path to the XLSX file within the plugin directory
    $xlsx_file_path = $plugin_dir . 'xlsx_files/telangana_assembly_maps.xlsx';
    // Code to read the XLSX file and parse data
    $spreadsheet = PhpOffice\PhpSpreadsheet\IOFactory::load($xlsx_file_path);
    // Select the worksheet
    $worksheet = $spreadsheet->getActiveSheet();
    // Initialize an array to store the parsed data
    $xlsx_data = [];
    $is_first_row = true;
    // Iterate through rows and columns
    foreach ($worksheet->getRowIterator() as $row) {
        if ($is_first_row) {
            $is_first_row = false;
            continue; // Skip the first row
        }
        $cellIterator = $row->getCellIterator();
        $data_row = [];
        foreach ($cellIterator as $cell) {
            $data_row[] = $cell->getValue();
        }
        $xlsx_data[] = $data_row;
    }
    //var_dump($xlsx_data);

    // Insert data into the custom table
    foreach ($xlsx_data as $data_row) {
        $insert_data = array(
            'stname' => isset($data_row[0]) ? sanitize_text_field($data_row[0]) : '',
            'dtname' => isset($data_row[1]) ? sanitize_text_field($data_row[1]) : '',
            'state_code' => isset($data_row[2]) ? intval($data_row[2]) : '',
            'district_code' => isset($data_row[3]) ? intval($data_row[3]) : '',
            'Parameter' => isset($data_row[4]) ? intval($data_row[4]) : '',
            'Ac_code' => isset($data_row[5]) ? intval($data_row[5]) : '',
            'Constituency' => isset($data_row[6]) ? sanitize_text_field($data_row[6]) : '',
            'MLA' => isset($data_row[7]) ? sanitize_text_field($data_row[7]) : '',
            'Party' => isset($data_row[8]) ? sanitize_text_field($data_row[8]) : '',
        );
    
        $wpdb->insert($table_name, $insert_data);
    }
    // Set the plugin activation flag to avoid reinserting data on page refresh
    update_option('custom_xlsx_importer_activated', true);
}
}
add_action( 'init', 'insert_xlsx_data_into_custom_table' );

/**
 * Activate the plugin.
 */
function election_data_activate() { 
	telangana_data_table();
    insert_xlsx_data_into_custom_table();
}
register_activation_hook( __FILE__, 'election_data_activate' );

/**
 * Deactivation hook.
 */
function election_data_deactivate() {
    // Delete custom database tables
    global $wpdb;
    $table_name = $wpdb->prefix . 'telangana_election_data';
    $wpdb->query("DROP TABLE IF EXISTS $table_name");
    // Reset the plugin activation flag
    delete_option('custom_xlsx_importer_activated');
}
register_deactivation_hook( __FILE__, 'election_data_deactivate' );

?>