<?php 
namespace Route\online_shop\validation;
require_once 'validator.php';
use Route\online_shop\validation\validator;

class length implements validator{
    public function check($key,$value){
        if(strlen($value)<=5){
            return "$key must be more than 5 chars";
        }else{
            return false;
        }
        
    }
}

?>