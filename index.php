<?php

use Util\ConstantesGenericasUtil;
use Util\RotasUtil;
use Validator\RequestValidator;

include 'bootstrap.php';


try {
    $RequestValidator = new RequestValidator(RotasUtil::getRotas());
    $RequestValidator->processarRequest();
}catch (Exception $exeption){
    echo json_encode([
       ConstantesGenericasUtil::TIPO => ConstantesGenericasUtil::TIPO_ERRO,
       ConstantesGenericasUtil::RESPOSTA => utf8_encode($exeption->getMessage())
    ]);
    exit();
}
