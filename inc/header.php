<?php 


require_once 'connection.php';
require_once 'App.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
<div class="container-fluid">
<a class="navbar-brand" href="index.php">Online Shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">All Products</a>
            </li>
                <?php if($session->check("user_id") && $session->get("role") == "admin"  ) {?> 
                    <li class="nav-item">
                        <a class="nav-link" href="Add.php">Add Product</a>
                    </li>     
                <?php  } ?>
                <?php  if($session->checknot("user_id") ) {?> 

                <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
                </li>     
                <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
                </li>
                <?php  }else{ ?>

                <?php // if($session->check("user_id") ) {?> 
                <li class="nav-item">
                    <form action="handel/handel_logout.php?user_id=<?php echo $session->check('user_id') ? $session->get('user_id'):null; ?>" method="post">
                    <button class="btn btn-danger" type="submit" name ="submit">Logout</button>
                    </form>
                </li>
                <?php  } ?>

        
    </ul>

    </div>
</div>
</nav>
