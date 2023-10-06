<?php
/*
Template Name: Elections
*/
get_header();
$states = get_field('states');
$page_id = isset($_POST['page_id']) ? $_POST['page_id'] : '';
?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/elections.css">
<main>
    <h1 class="heading my-3">Elections</h1>
    <section class="elections-sect">
        <select id="state">
            <option value="">Select State</option>
            <?php
            if ($states) {
                foreach ($states as $value) {
                    echo '<option value="' . esc_attr($value['value']) . '">' . esc_html($value['label']) . '</option>';
                }
            ?>
            <?php }
            ?>
        </select>

        <select id="district">
            <option value="">Select District</option>
            <!-- This will be populated via AJAX -->
        </select>

        <select id="constituency">
            <option value="">Select Constituency</option>
            <!-- This will be populated via AJAX -->
        </select>

    </section>
    <section class="candidate-data">
        <div id="candidate-list"></div>
    </section>
    <div>
        <!-- <select>
     <?php while (have_rows('cities')) {
            the_row();
            $cities = get_sub_field('andhra_pradesh');
            if ($cities) {
                foreach ($cities as $city) {
                    echo '<option value="' . esc_attr($city['value']) . '">' . esc_html($city['label']) . '</option>';
                }
            }
        } ?> 
    </select>     -->
    </div>
    <!-- <div class="row align-items-center">
                <?php
                //    if( have_rows('candidate_details') ): while ( have_rows('candidate_details') ) : the_row();  
                //    $parties = get_sub_field('party');
                // var_dump($parties);
                //while ( have_rows('candidate_details') ){ the_row(); 
                ?>
                <div>
                    <div>Party - <?php echo $parties["label"]; ?></div>
                    <div class="criminal-cases">Criminal Cases - <?php echo get_sub_field('crimal_cases'); ?></div>
                    <div class="education">Education - <?php echo get_sub_field('education'); ?></div>
                    <div class="age">Age - <?php echo get_sub_field('age'); ?></div>
                    <div class="total-assets">Total Assets - <?php echo get_sub_field('total_assests'); ?></div>
                    <div class="liabilities">Liabilities - <?php echo get_sub_field('liabilities'); ?></div>
                </div>
        <?php
        //endwhile; endif; 
        // }
        ?>
</div> -->
    <?php //echo do_shortcode('[feedback_form]'); 
    ?>
</main>
<?php
get_footer();
?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/elections.js"></script>