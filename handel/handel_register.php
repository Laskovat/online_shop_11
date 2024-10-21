<?php
require_once '../inc/connection.php';
require_once '../App.php';
// check of submit 
if ($request->checkPost('submit')){
    // fetch data
    $name = $request->post("name"); 
    $phone = $request->post("phone"); 
    $email = $request->post("email");
    $password = $request->post("password");
    $confirmedpassword = $request->post("confirmedpassword");

    // validation
    $errors = $validation->validate("name",$name,["required","str"]);
    $errors = $validation->validate("phone",$phone,["required","str"]);
    $errors = $validation->validate("email",$email,["required","email"]);
    $errors = $validation->validate("password",$password,["required","str"]);
    $errors = $validation->validate("confirmedpassword",$confirmedpassword,["required","str"]);
    if ($password!=$confirmedpassword) {
        $errors[]="password doesn't match";
    }

    if(empty($errors)){
        // insert in db
	    $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "insert into users (`name`,`phone`,`email`,`password`) values('$name','$phone','$email','$password')";
        $runquery = $conn->query($query);
    
    if($runquery){
        $request->redirect("../login.php");
        $session->set("success","inserted successfuly");
    }else{    
        $request->redirect("../register.php");
        $session->set("error",["error while inserting"]);}

    }else{
        $session->set("error",$errors);
        $session->set("name",$name);
        $session->set("phone",$phone);
        $session->set("email",$email);
        $request->redirect("../register.php");
    }
}else{ 
    $request->redirect("../index.php");
    $session->set("error",["it's not allowed"]);
}
