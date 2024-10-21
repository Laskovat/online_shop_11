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

            
            <form action="handel/handel_add.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name = "name" value="<?php echo $session->check('name') ? $session->get('name'):null; $session->unnset('name') ?>">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" class="form-control" id="price" name="price"value="<?php echo $session->check('price') ? $session->get('price'):null; $session->unnset('price') ?>">
                </div>

                <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "desc"><?php echo $session->check('desc') ? $session->get('desc'):null; $session->unnset('desc') ?></textarea>
                </div>

                <div class="mb-3">
                <label for="formFile" class="form-label">Image:</label>
                <input class="form-control" type="file" id="formFile" name="image">
                </div>

                <center><button on type="submit" class="btn btn-primary" name="submit">Add Product</button></center>
            </form>
        </div>
    </div>
</div>


<?php require_once 'inc/footer.php'; ?>