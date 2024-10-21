<?php
require_once '../inc/connection.php';
require_once '../App.php';
// check of submit 
if ($request->checkPost('submit')){
    // fetch data
    $name = $request->post("name"); 
    $price = $request->post("price"); 
    $desc = $request->post("desc"); 
    $image = $request->files("image"); 
    // validation
    $errors = $validation->validate("name",$name,["required","str"]);
    $errors = $validation->validate("price",$price,["required","numeric"]);
    $errors = $validation->validate("description",$desc,["required","str"]);
    $errors = $validation->validate("image",$image,["image","mimes","size"]);

    if(empty($errors)){
        // insert in db
    $ext=strtolower( pathinfo($image['name'],PATHINFO_EXTENSION));
    $newname = time().".$ext";
    
    $query = "insert into products (`name`,`price`,`desc`,`image`) values('$name','$price','$desc','$newname')";
    $runquery = $conn->query($query);
    
    if($runquery){
        move_uploaded_file($image['tmp_name'],"../images/$newname");
        $request->redirect("../index.php");
        $session->set("success","inserted successfuly");
    }else{    
        $request->redirect("../index.php");
        $session->set("error",["error while inserting"]);}

    }else{
        $session->set("error",$errors);
        $session->set("name",$name);
        $session->set("price",$price);
        $session->set("desc",$desc);
        $request->redirect("../add.php");
    }
}else{ 
    $request->redirect("../index.php");
    $session->set("error",["it's not allowed"]);
}
