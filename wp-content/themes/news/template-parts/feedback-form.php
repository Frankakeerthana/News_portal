<?php
/*
Template Name: Feedback Form
*/
get_header();
?>
<section>
<div class="container">
<!-- Display the feedback form -->
<?php echo do_shortcode('[feedback_form]'); ?>
<!-- Display the feedback list -->
<?php echo do_shortcode('[houzeo_feedback_list]'); ?>
</div>
</section>
<?php
get_footer();
?>


