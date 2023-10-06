<?php
/*
Template Name: Telangana data
*/
get_header();
?>
<link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script> 
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<main>
    <section class="topMargin">
        <div class="contain">
            <?php echo do_shortcode('[custom_data_table]'); ?>
        </div>
    </section>
</main>
<?php
get_footer();
?>
<script>
//let table = new DataTable('#myTable');
jQuery(document).ready(function() {
    $('#myTable').DataTable({
        columnDefs: [
            {
                targets: '_all', // Apply to all columns
                searchable: true, // Enable filtering
            }
        ]
    });
});
</script>