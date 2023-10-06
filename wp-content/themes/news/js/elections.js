jQuery(document).ready(function($) {
    $('#state').change(function() {
        var stateID = $(this).val();
        // var ajaxUrl = '<?php echo admin_url('admin-ajax.php'); ?>';
        // Send an AJAX request to a PHP function that fetches districts
        $.ajax({
           // url: ajaxurl,
           url: '/duplicator/wp-admin/admin-ajax.php',
            type: 'POST',
            data: {
                action: 'get_districts',
                state_id: stateID
            },
            success: function(response) {
                $('#district').html(response)
                $('#constituency').html('<option value="">Select Constituency</option>'); // Reset constituency dropdown
                // $("#candidate-list .state").text(stateID);
            }
        });
    });
    
    $('#district').change(function() {
        var districtID = $(this).val();
        
        // Send an AJAX request to a PHP function that fetches constituencies
        $.ajax({
            url: '/duplicator/wp-admin/admin-ajax.php',
            //url: ajaxurl,
            type: 'POST',
            data: {
                action: 'get_constituencies',
                district_id: districtID
            },
            success: function(response) {
                $('#constituency').html(response);
            }
        });
    });

    $('#constituency').change(function() {
        var constituencyID = $(this).val();
        var stateID = $('#state').val(); // Get the selected state value
        var districtID = $('#district').val();        
        // Send an AJAX request to fetch candidates based on the selected constituency
        $.ajax({
            url: '/duplicator/wp-admin/admin-ajax.php',
            type: 'POST',
            data: {
                action: 'get_candidates',
                constituency_id: constituencyID,
                state_id: stateID, // Pass the selected state
                district_id: districtID // Pass the selected district
            },
            success: function(response) {
                // Display the list of candidates in the desired HTML element
                $('#candidate-list').html(response);
                // Get the selected state and district
                // var selectedState = $('#state option:selected').text();
                // var selectedDistrict = $('#district option:selected').text();
                // // Display the selected state and district
                // $('#selected-state').text( selectedState);
                // $('#selected-district').text( selectedDistrict);
            }
        });
    });
    

});
