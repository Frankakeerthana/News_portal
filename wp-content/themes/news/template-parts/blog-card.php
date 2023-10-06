<div class="blog-card">
    <a href="<?php the_permalink(); ?>" class="cards-blog">
        <?php
        if (has_post_thumbnail()) {
            $featured_image = get_the_post_thumbnail(get_the_ID(), 'large'); // 'thumbnail' is the image size; you can change it to other available sizes.
            echo $featured_image;
        }
        ?>
        <div class="publish-date">
            <?php
            $categories = get_the_category();
            $category_names = array();

            foreach ($categories as $category) {
                $category_names[] = '<span class="category">' . esc_html($category->name) . '</span>';
            }

            echo implode(', ', $category_names);
            ?>
            <span class="publish-day"><?php echo get_the_date('F j, Y'); ?></span>
        </div>
        <p class="blog-heading"><?php the_title(); ?></p>
        <!-- <img src="<?php //echo $featured_image 
                        ?>" alt="blog-img"/> -->
        <div class="post-content">
            <!-- <?php //the_excerpt(); 
                    ?> -->
            <?php the_content(); ?>
        </div>
    </a>
</div>