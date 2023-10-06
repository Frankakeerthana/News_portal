jQuery(document).ready(function($) {
    // Attach a submit handler to the form
    $('.feedback-form form').submit(function(event) {
        event.preventDefault(); // Prevent the default form submission  
        var formData = $(this).serialize(); // Serialize the form data        
        $.ajax({
            type: 'POST',
            url: ajaxurl, // WordPress AJAX URL
           // url: '/duplicator/wp-admin/admin-ajax.php',
            data: {
                action: 'submit_feedback', // WordPress action hook
                form_data: formData
            },
            success: function(response) {
                $('.feedback-success-message').html(response);
                // Reset the form
                $('.feedback-form form')[0].reset();
            }
        });
    });
});
