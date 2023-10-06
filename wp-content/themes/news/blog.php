<?php
/*
Template Name: Blog Homepage
*/
get_header();
?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/blog-home.css">
<main>
    <section class="blog-posts-section">
        <div class="container-class">
            <h3 class="section-title">Categories</h3>
            <?php
            ////$slug_names = array('technology', 'health', 'sports','international');
            $taxonomy = 'category';
            // Fetch category terms
            $categories = get_terms(
                array(
                    'taxonomy' => $taxonomy,
                    'hide_empty' => false, // Include even empty categories
                    'exclude' => 1, // Exclude the Uncategorized category
                )
            );
            $slug_names = array();
            // Loop through the categories and extract their slugs
            if (!empty($categories)) {
                foreach ($categories as $category) {
                    $slug_names[] = $category->slug;
                }
            }
            // Check if there are slugs in $slug_names
            if (!empty($slug_names)) {
                echo '<div class="categories-list">';
                echo '<p class="clear-filters-text">ALL FILTERS</p>';
                foreach ($slug_names as $slug) {
                    echo '<div class="filter-item">';
                    echo '<span class="category-filter">' . $slug . '</span>'; // Display each slug in a <span>
                    echo '</div>';
                }
                echo '</div>';
            } else {
                echo 'No categories found.';
            }

            ?>
            <div class="blog-sect">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => -1, // Number of posts to display
                    //'cat' => $category_id,
                    // 'tax_query' => array(
                    //     array(
                    //         'taxonomy' => $taxonomy,
                    //         'field' => 'slug',
                    //         'terms' => $slug_names,
                    //         'operator' => 'IN', // Fetch posts in any of the specified categories (use 'AND' for all categories)
                    //     ),
                    // ),
                );

                // Create a new custom query
                $custom_query = new WP_Query($args);

                // Loop through the posts
                if ($custom_query->have_posts()) :
                    while ($custom_query->have_posts()) :
                        $custom_query->the_post();
                        get_template_part('template-parts/blog-card');
                    endwhile;
                    wp_reset_postdata(); // Reset the post data
                else :
                    echo 'No posts found';
                endif;
                ?>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();
?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/blog-filter.js"></script>