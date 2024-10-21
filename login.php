<?php require_once 'inc/header.php';
require_once 'App.php';
if($session->check("success")){
    
    ?>
    <div class="alert alert-success">
        
        <?php
     echo $session->get("success");?>
    
    </div> 
<?php } $session->unnset("success"); ?>
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


<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">

        <h1>Login Form</h1>
            <form action="handel/handel_login.php" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="name" name = "email"value="<?php echo $session->check('email') ? $session->get('email'):null; $session->unnset('email') ?>" >
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Password:</label>
                    <input type="text" class="form-control" id="name" name = "password" >
                </div>
                <center><button on type="submit" class="btn btn-primary" name="submit">Login</button></center>
            </form>
        </div>
    </div>
</div>

<?php require_once 'inc/footer.php'; ?>