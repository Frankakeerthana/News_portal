jQuery(document).ready(function($) {
    // Add click event handler to category filters
    $('.categories-list .category-filter').on('click', function(e) {
        e.preventDefault();
        // Get the clicked category slug
        var categorySlug = $(this).text();
        // Send AJAX request to filter blog cards
        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: '/duplicator/wp-admin/admin-ajax.php',
            data: {
                action: 'filter_blog_cards',
                category: categorySlug,
                //nonce: ajax_params.nonce,
            },
            success: function(response) {
                // Replace the blog section content with the filtered content
                $('.blog-sect').html(response);
            },
            // error: function(xhr, textStatus, errorThrown) {
            //     console.error(xhr.statusText);
            // }
        });
    });
});
