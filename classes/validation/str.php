<?php 
namespace Route\online_shop\validation;
require_once 'validator.php';
use Route\online_shop\validation\validator;


class str implements validator {
    public function check($key,$value){

        if(!is_string($value)){
            return "$key must be a string";
        }else{
            return false;
        }
    }  
   
}



?>