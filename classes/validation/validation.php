<?php 
namespace Route\online_shop\validation;
require_once 'required.php';
require_once 'str.php';
require_once 'numeric.php';
require_once 'length.php';
require_once 'image.php';
require_once 'mimes.php';
require_once 'size.php';
require_once 'email.php';
require_once 'size.php';

class validation{
    public $errors=[];
    public function validate($key,$value,$rules){

        foreach ($rules as $rule) {
            $rule= "Route\online_shop\\validation\\".$rule ;

            $object = new $rule ;

            $error = $object->check($key,$value);
            if($error != false){
                $this->errors[]=$error;
            }

        }
        return $this->errors;
        
    }
}



?>