<?php require_once 'inc/header.php';
require_once 'App.php';


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

           $id = $request->get("id");
       
        $query = "select * from products where id =$id";
        $runquery = $conn->query($query);
        $check = $runquery->execute();
        if ($check && $runquery->rowCount()==1){
            $product = $runquery->fetch(PDO::FETCH_ASSOC);
          ?>

    <div class="col-lg-6">
            <img src="images/<?php echo $product['image'] ; ?>" class="card-img-top">
            </div>
            <div class="col-lg-6">
            <h5 ><?php echo $product['name'] ; ?></h5>
            <p class="text-muted">Price:<?php echo $product['price'] ; ?> EGP</p>
            <p><?php echo $product['desc'] ;?></p>
            <a href="index.php" class="btn btn-primary">Back</a>
            <a href="edit.php?id= <?php echo $id ?>" class="btn btn-info">Edit</a>
            <form action="handel/handel_delete.php?id=<?php echo $product['id'] ; ?>" method="post">
                <button class="btn btn-danger" type="submit" name ="submit">Delete</button>
            </form>
        </div>
        <?php } ?>
    </div>
</div>



<?php require_once 'inc/footer.php'; ?>