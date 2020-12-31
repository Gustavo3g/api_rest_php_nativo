<?php

use Util\RotasUtil;
use Validator\RequestValidator;

include 'bootstrap.php';


try {
    $RequestValidator = new RequestValidator(RotasUtil::getRotas());
    $RequestValidator->processarRequest();
}catch (Exception $exeption){
    echo $exeption->getMessage();
}
