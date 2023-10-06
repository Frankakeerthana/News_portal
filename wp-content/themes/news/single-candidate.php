<?php
/*
Template Name: Candidate Details
*/
get_header(); 
$candidate_posts = get_candidate_details();
?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/candidate-details.css">
<main>
    <section>
        <h1 class="candidate-name"><?php the_title(); ?></h1>
        <div class="candidate-info"><?php the_content(); ?></div>
        <div class="my-5 mx-5">
            <?php if (have_rows('candidate_details')) : ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Party</th>
                            <th>Criminal Cases</th>
                            <th>Education</th>
                            <th>Age</th>
                            <th>Total Assets</th>
                            <th>Liabilities</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while (have_rows('candidate_details')) : the_row();
                            $parties = get_sub_field('party');
                        ?>
                            <tr>
                                <td><?php the_title(); ?></td>
                                <td party-name="<?php echo $parties["value"]; ?>"><?php echo $parties["label"]; ?></td>
                                <td><?php echo get_sub_field('crimal_cases'); ?></td>
                                <td><?php echo get_sub_field('education'); ?></td>
                                <td><?php echo get_sub_field('age'); ?></td>
                                <td><?php echo get_sub_field('total_assests'); ?></td>
                                <td><?php echo get_sub_field('liabilities'); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </section>

    <section class="topMargin">
        <?php get_template_part('template-parts/candidate-details', null, $candidate_posts); ?>
    </section>
</main>
<?php get_footer(); ?>