<?php

if(isset($_POST['submit']) AND $_SERVER['REQUEST_METHOD'] == 'POST') {
    echo $_POST['name'];
    echo $_POST['email'];
    echo $_POST['purpose'];
    echo $_POST['message'];
}









?>



















<!-- Navbar, Front end -->
<?php
    require 'includes/header.php';
?>
<div class="contact-body container">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 pt-4">
            <div class="container">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <h2 class="text-center"><strong>Contact</strong></h2>
                    <div class="form-group mt-4">
                        <label for="InputName">Name</label>
                        <input type="text" name="name" class="form-control" id="InputName" required/>
                    </div>
                    <div class="form-group mt-4">
                        <label for="InputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" id="InputEmail1" required/>
                    </div>
                    <div class="form-group mt-4">
                        <label for="FormControlSelect1">Purpose</label>
                        <select class="form-control" id="FormControlSelect1" name="purpose" required>
                            <option selected disabled>select</option>
                            <option>Account</option>
                            <option>Business</option>
                            <option>Report a bug</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="form-group mt-4">
                        <label for="validationTextarea">Message</label>
                        <textarea class="form-control" name="message" id="validationTextarea" placeholder="Enter you message here..." rows="4" required></textarea>
                    </div>
                    <div class="form-group mt-4 pt-2 mb-5">
                        <button type="button" name="submit" value="submit" class="btn btn-dark">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>
<?php
    require 'includes/footer.php';
?>