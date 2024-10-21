<?php 
namespace Route\online_shop\validation;
require_once 'validator.php';
use Route\online_shop\validation\validator;

class numeric implements validator{
    public function check($key,$value){
        if(!is_numeric($value)&&!empty($value)){
            return "$key must be numeric";
        }else{
            return false;
        }
    }
}

?>