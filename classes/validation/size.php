<?php 
namespace Route\online_shop\validation;
require_once 'validator.php';
use Route\online_shop\validation\validator;


class size implements validator {
    public function check($key,$value){

        if($value['size'] >= (1024*1024*20) ){
            return "$key size must be less than 1MB";
        }else{
            return false;
        }
    }  
   
}



?>