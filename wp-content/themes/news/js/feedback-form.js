// jQuery(document).ready(function($) {
//     $('#feedback-form').submit(function(e) {
//         e.preventDefault();
        
//         $.ajax({
//             type: 'POST',
//             url: '/duplicator/wp-admin/admin-ajax.php',
//             data: {
//                 action: 'submit_feedback',
//                 name: $('#feedback-form input[name="name"]').val(),
//                 email: $('#feedback-form input[name="email"]').val(),
//                 phone: $('#feedback-form input[name="phone"]').val(),
//                 comment: $('#feedback-form textarea[name="comment"]').val(),
//             },
//             success: function(response) {
//                 // Update the feedback list
//                 $('#feedback-list').html(response);
                
//                 // Clear the form
//                 $('#feedback-form')[0].reset();
//             }
//         });
//     });
// });
