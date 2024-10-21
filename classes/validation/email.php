<?php 
namespace Route\online_shop\validation;
require_once 'validator.php';
use Route\online_shop\validation\validator;


class email implements validator {
    public function check($key,$value){

        if(!filter_var($value,FILTER_VALIDATE_EMAIL) &&!empty($value)){
            return "$key is not valid";
        }else{
            return false;
        }
    }  
   
}



?>