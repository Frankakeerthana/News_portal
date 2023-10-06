<link rel="stylesheet" type="text/css" href="http://localhost/duplicator/wp-content/plugins/houzeo-feedback/css/feedbackform.css">
<div class="feedback-form mt-5">
    <h2>Feedback Form</h2>
    <form method="post" action="">
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Please Enter Name" name="name" id="name" required>
        </div>
        <div class="form-group">
        <input type="email" class="form-control"placeholder="Please Enter Email" name="email" id="email" required>
        </div>
        <div class="form-group">
        <input type="tel" class="form-control" placeholder="Enter Phone Format 123-456-7890" name="phone" id="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
        </div>
        <div class="form-group">
        <textarea class="form-control" placeholder="comments" name="comment" id="comment" required></textarea>
        </div>       
        <input type="submit" class="btn btn-success btn-lg" name="submit_feedback" value="Submit">
    </form>
    <div class="feedback-success-message"></div>
</div> 