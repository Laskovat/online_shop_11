<?php
require_once '../inc/connection.php';
require_once '../App.php';
// check of submit 
if ($request->checkPost('submit') && $request->checkget('id')){
    // fetch data
    $id = $request->get("id");
    $name = $request->post("name"); 
    $price = $request->post("price"); 
    $desc = $request->post("desc"); 
    $image = $request->files("image"); 
    $runquery = $conn->prepare("select * from products where id=:id");
    $runquery->bindParam(":id",$id,PDO::PARAM_INT);
    $check = $runquery->execute();
    if ($check && $runquery->rowCount()==1){
        $product = $runquery->fetch(PDO::FETCH_ASSOC);
        $oldimage=$product['image'];

        $errors = $validation->validate("name",$name,["required","str"]);
        $errors = $validation->validate("price",$price,["required","numeric"]);
        $errors = $validation->validate("description",$desc,["required","str"]);
        
        if($request->checkfiles('image') && $image['name']){
            
            
            $errors = $validation->validate("image",$image,["image","mimes","size"]);
            $ext=strtolower( pathinfo($image['name'],PATHINFO_EXTENSION));
            $newname = time().".$ext";
            unlink("../images/$oldimage");
            move_uploaded_file($image['tmp_name'],"../images/$newname");
        }else{
            $newname = $oldimage;
        }
        if(empty($errors)){
            
            // update in db
    $runquery = $conn->query("update products set `name` = '$name',`price` = '$price',`desc` = '$desc',`image` = '$newname' where `id`='$id'");

    $check = $runquery->execute();
    if($check){

        $request->redirect("../show.php?id=$id");
        $session->set("success","updated successfuly");
    }else{    
        $request->redirect("../show.php?id=$id");
        $session->set("error",["error while updating"]);}

    }else{
        $session->set("error",$errors);
        $request->redirect("../edit.php");
    }
}else{        
    $request->redirect("../index.php");
    $session->set("error",["can't catch data"]);}
}else{
    $request->redirect("../index.php");
    $session->set("error",["it's not allowed"]);
}

