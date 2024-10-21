<?php
require_once '../inc/connection.php';
require_once '../App.php';
// check of submit 
if ($request->checkPost('submit')){
    // fetch data 
    $user_id = $request->get("user_id");
    $session->unnset("user_id");
    $session->unnset("role");
    $request->redirect("../login.php");
    $session->set("error",["you logged out please login to show"]);

}else{ 
    $session->set("error",["it's not allowed"]);
    $request->redirect("../index.php");
}
