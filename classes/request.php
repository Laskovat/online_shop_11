<?php
namespace Route\online_shop;

class request {
    public static function checkget($key){
      return isset($_GET["$key"]);
    }
    public static function checkPost($key){
      return isset($_POST["$key"]);
      
    }
    public static function get($key){
      return (isset($_GET["$key"]))? $_GET["$key"] : "key not correct" ;
    }
    public static function post($key){
      return (isset($_POST["$key"]))? trim(htmlspecialchars($_POST["$key"]))  : "key not correct" ;
      
    } 
    public static function files($key){
      return (isset($_FILES["$key"]))? $_FILES["$key"] : "key not correct" ;
    }
    public static function checkfiles($key){
      return (isset($_FILES["$key"]))? $_FILES["$key"] : false ;
    }

    public static function redirect($file){
      header("location:$file");
    }
}
     
    
    
