<div class="feedback-list mt-5">
    <h2>Feedback List</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Comment</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            global $wpdb;
            $table_name = $wpdb->prefix . 'houzeo_feedback';
            $feedback_data = $wpdb->get_results("SELECT * FROM $table_name ORDER BY created_at DESC");

            foreach ($feedback_data as $feedback) {
                ?>
                <tr>
                    <td><?php echo esc_html($feedback->name); ?></td>
                    <td><?php echo esc_html($feedback->email); ?></td>
                    <td><?php echo esc_html($feedback->phone); ?></td>
                    <td><?php echo esc_html($feedback->comment); ?></td>
                    <td><?php echo esc_html($feedback->created_at); ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
