<?php 
function custom_data_table_shortcode() {
    ob_start(); // Start an output buffer

    // Retrieve data from your custom table using one of the methods mentioned earlier
    global $wpdb;
    $table_name = $wpdb->prefix . 'telangana_election_data';
    $results = $wpdb->get_results("SELECT * FROM $table_name");
    //var_dump($results);
    if ($results) {
        echo '<table id="myTable" class="cell-border display stripe" width="100%">';
        echo '<thead><tr><th>State</th><th>District</th><th>State Code</th><th>District Code</th><th>Parameter</th><th>AC Code</th><th>Constituency</th><th>MLA</th><th>Party</th></tr></thead>';
        
        foreach ($results as $row) {
            echo '<tr>';
            echo '<td>' . esc_html($row->stname) . '</td>';
            echo '<td>' . esc_html($row->dtname) . '</td>';
            echo '<td>' . esc_html($row->state_code) . '</td>';
            echo '<td>' . esc_html($row->district_code) . '</td>';
            echo '<td>' . esc_html($row->Parameter) . '</td>';
            echo '<td>' . esc_html($row->Ac_code) . '</td>';
            echo '<td>' . esc_html($row->Constituency) . '</td>';
            echo '<td>' . esc_html($row->MLA) . '</td>';
            echo '<td>' . esc_html($row->PARTY) . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'No data found.';
    }

    return ob_get_clean(); // Return the buffered output
}
add_shortcode('custom_data_table', 'custom_data_table_shortcode');


?>