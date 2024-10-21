<?php require_once 'inc/header.php';
require_once 'App.php';
if($session->check("error")){
    foreach($session->get("error") as $error){ ?>
    <div class="alert alert-danger">
        
        <?php
        echo "$error <br>";?>
    </div> 
    <?php
    }
    }
    $session->unnset("error"); 
if($session->check("success")){
    ?>
    <div class="alert alert-success">
        <?php
     echo $session->get("success");?>
    </div> 
<?php
      }
      $session->unnset("success");
      ?>
<div class="container my-5">
    <div class="row">
        <?php
        $query ="select * from products";
        $runquery = $conn->query($query);
        $check = $runquery->execute();
        if ($check && $runquery->rowCount()>0){
            $products = $runquery->fetchAll();
          
          foreach ($products as $product) {?>
        <div class="col-lg-4 mb-3">
                <div class="card">
                        <img src="images/<?php echo $product['image'] ; ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['name'] ; ?></h5>
                            <p class="text-muted"><?php echo $product['price'] ; ?> EGP</p>
                            <p class="card-text"><?php echo substr($product['desc'],1,50)."...." ; ?></p>

                            <?php if($session->check("user_id") && $session->get("role") == "user"  ) {?> 
                            <a href="show.php?id=<?php echo $product['id'] ; ?>" class="btn btn-primary">Show</a>
                            <?php  } ?>
                            <?php if($session->check("user_id") && $session->get("role") == "admin"  ) {?> 
                            <a href="show.php?id=<?php echo $product['id'] ; ?>" class="btn btn-primary">Show</a>
                            <a href="edit.php?id=<?php echo $product['id'] ; ?>" class="btn btn-info">Edit</a>
                            <form action="handel/handel_delete.php?id=<?php echo $product['id'] ; ?>" method="post">
                                <button class="btn btn-danger" type="submit" name ="submit">Delete</button>
                            </form>
                        <?php } ?>
                        </div>
                </div>
            </div>
            <?php }}else {?> <div class="alert alert-warning"><?php echo "no products to display";?> </div><?php }; ?>
    </div>
</div>
<?php  require_once 'inc/footer.php'; ?>