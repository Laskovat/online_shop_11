<?php 
namespace Route\online_shop\validation;
require_once 'validator.php';
use Route\online_shop\validation\validator;


class mimes implements validator {
    public function check($key,$value){
        $ext=strtolower( pathinfo($value['name'],PATHINFO_EXTENSION));
        $exts = ["png","jepg","jpg","gif"];
        if(! in_array($ext, $exts) &&!empty($value['name'])){
            return "$key extension not supported";
        }else{
            return false;
        }
    }  
   
}



?>