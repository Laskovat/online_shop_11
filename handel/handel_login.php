<?php
require_once '../inc/connection.php';
require_once '../App.php';
// check of submit 
if ($request->checkPost('submit')){
    // fetch data 
    $email = $request->post("email");
    $password = $request->post("password");
    // validation
    $errors = $validation->validate("email",$email,["required","email"]);
    $errors = $validation->validate("password",$password,["required","str"]);
 
    if(empty($errors)){
        $query="select * from users where `email`='$email'";
        $runquery=$conn->query($query);
        $check = $runquery->execute();
        if ($check && $runquery->rowCount()==1){
            $user = $runquery->fetch(PDO::FETCH_ASSOC);

                $hashPassword=$user['password'];
                $user_id=$user['id'];
                $role=$user['role'];
                $name=$user['name'];
                $verify = password_verify($password, $hashPassword);
                if ($verify) {
                    $session->set("user_id",$user_id);
                    $session->set("role",$role);
                    $session->set("success","logged in successfuly welcome $name ");
                    $request->redirect("../index.php");
                    
                }else{
                    $session->set("errors","credentials not correct");
                    $request->redirect("../login.php");
                    }  
                }else{
                    $session->set("errors","credentials not correct");
                    $request->redirect("../login.php");
                }
    }else{
        $session->set("error",$errors);
        $session->set("email",$email);
        $request->redirect("../login.php");
    }
}else{ 
    $request->redirect("../index.php");
    $session->set("error",["it's not allowed"]);
}
