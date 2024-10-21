<?php
// use Route\online_shop\validation;
use Route\online_shop\request;
use Route\online_shop\session;
use Route\online_shop\validation\validation;
// use Route\online_shop\validationImage;

require_once 'classes/request.php';
require_once 'classes/session.php';
// require_once 'classes/validation.php';
// require_once 'classes/validation_image.php';
require_once 'classes/validation/validation.php';
$request = new request;
$session = new session;
$validation = new validation;
// $validationImage = new validationImage;