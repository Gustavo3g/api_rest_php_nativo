<?php

use Util\ConstantesGenericasUtil;
use Util\jsonUtil;
use Util\RotasUtil;
use Validator\RequestValidator;

include 'bootstrap.php';


try {
    $RequestValidator = new RequestValidator(RotasUtil::getRotas());
    $retorno = $RequestValidator->processarRequest();

    $JsonUtil = new jsonUtil();
    $JsonUtil->processarArrayParaRetornar($retorno);

}catch (Exception $exeption){
    echo json_encode([
       ConstantesGenericasUtil::TIPO => ConstantesGenericasUtil::TIPO_ERRO,
       ConstantesGenericasUtil::RESPOSTA => utf8_encode($exeption->getMessage())
    ]);
    exit();
}
