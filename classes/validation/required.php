<?php 
namespace Route\online_shop\validation;
require_once 'validator.php';
use Route\online_shop\validation\validator;

class required implements validator{
    public function check($key,$value){
        if(empty($value)){
            return "$key is required";
        }else{
            return false;
        }
    }
}

?>