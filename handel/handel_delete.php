<?php
require_once '../inc/connection.php';
require_once '../App.php';

if ($request->checkget('id')){
    $id = $request->get("id");
    $runquery = $conn->prepare("select * from products where id=:id");
    $runquery->bindParam(":id",$id,PDO::PARAM_INT);
    $check = $runquery->execute();
    if ($check && $runquery->rowCount()==1){
        $product = $runquery->fetch(PDO::FETCH_ASSOC);
		unlink("../images/{$product['image']}");
    $runquery = $conn->prepare("delete from products where id=:id");
    $runquery->bindParam(":id",$id,PDO::PARAM_INT);
    if ($runquery->execute()) {
        $session->set("success","product deleted successfuly");
        $request->redirect("../index.php");

       
    }else {
        $request->redirect("../index.php");
        $session->set("error",["error while delete"]);
    }
    }else {
        $request->redirect("../index.php");
        $session->set("error",["product not found"]);
    }
}else {
$request->redirect("../index.php");
$session->set("error",["not allowed"]);
}
