<?php require_once 'inc/header.php';
require_once 'App.php';
?>



<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">

            <?php 
            if($session->check("error")){
                foreach($session->get("error") as $error){ ?>
                <div class="alert alert-danger">
                    
                    <?php
                    echo "$error <br>";?>
                </div> 
                <?php
                }
                }
                $session->unnset("error"); ?>

            <h1>Register Form</h1>
            <form action="handel/handel_register.php" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name = "name"value="<?php echo $session->check('name') ? $session->get('name'):null; $session->unnset('name') ?>" >
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone:</label>
                    <input type="tel" class="form-control" id="phone" name="phone"value="<?php echo $session->check('phone') ? $session->get('phone'):null; $session->unnset('phone') ?>">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="name" name = "email"value="<?php echo $session->check('email') ? $session->get('email'):null; $session->unnset('email') ?>" >
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="name" name = "password" >
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Confirm Password:</label>
                    <input type="password" class="form-control" id="name" name = "confirmedpassword" >
                </div>
                <center><button on type="submit" class="btn btn-primary" name="submit">Register</button></center>
            </form>
        </div>
    </div>
</div>


<?php require_once 'inc/footer.php'; ?>