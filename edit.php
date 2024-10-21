<?php  require_once 'inc/header.php';
        require_once 'App.php';
        if($session->check("error")){
            foreach($session->get("error") as $error){ ?>
        <div class="alert alert-danger">
            <?php echo "$error <br>";
?>
        </div> 
<?php }}
    $session->unnset("error"); 
    $id = $request->get("id");
    $query = "select * from products where id =$id";
    $runquery = $conn->query($query);
    $check = $runquery->execute();
    if ($check && $runquery->rowCount()==1){
        $product = $runquery->fetch(PDO::FETCH_ASSOC);
?>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">


            <form action="handel/handel_edit.php?id=<?php echo $product['id'];?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" value="<?php echo $product['name'];?>"name = "name">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" class="form-control" id="price" value="<?php echo $product['price'];?>" name="price">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "desc"><?php echo $product['desc'];?></textarea>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Image:</label>
                    <input class="form-control" type="file" id="formFile" name="image">
                </div>

                <div class="col-lg-3">
                    <img src="images/<?php echo $product['image'];?>" class="card-img-top">
                </div>
                        
                <center><button on type="submit" class="btn btn-primary" name="submit">Update</button></center>
            </form>
        </div>
    </div>
</div>


<?php } ?>

<?php require_once 'inc/footer.php'; ?>