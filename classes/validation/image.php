<?php 
namespace Route\online_shop\validation;
require_once 'validator.php';
use Route\online_shop\validation\validator;


class image implements validator {
    public function check($key,$value){

        if($value['error'] != 0 ){
            return "$key is required";
        }else{
            return false;
        }
    }  
   
}



?>