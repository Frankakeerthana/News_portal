<?php
if (count($args)) { ?>
    <div class="container">
        <?php foreach ($args as $key => $value) { ?>
            <p><b>Candidate Name - </b><?php echo the_title(); ?></p>
            <p><b>Candidate Details -</b><?php echo the_content(); ?></p>
            <div><b> Criminal Cases -</b>
                <?php echo $value['crimal_cases']; ?>
            </div>
            <!-- <div party-name="<?php echo isset($parties) ? $parties : ''; ?>">
                <b>Party - </b><?php echo isset($parties) ? $parties : ''; ?>
            </div> -->
            <div>
                <b>Party - </b>
                <?php
                // Assuming 'party' is an array, loop through it to display each party
                foreach ($value['party'] as $party) {
                    echo '<div party-name="' . $party . '">' . $party . '</div>';
                    // echo $party . ', ';
                }
                ?>
            </div>
            <p><b>Education - </b> <?php echo $value['education']; ?></p>
            <div><b>Age - </b><?php echo $value['age']; ?></div>
            <div><b>Total Assests -</b><?php echo $value['total_assests']; ?></div>
            <div><b>Total Liabilities -</b><?php echo $value['liabilities']; ?></div>
        <?php } ?>
    </div>
<?php } ?>