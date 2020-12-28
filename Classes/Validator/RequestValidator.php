<?php

namespace Validator;

use Util\ConstantesGenericasUtil;
use Util\jsonUtil;

class RequestValidator
{
    private $request;
    private $dadosRequest;

    const GET = 'GET';
    const DELETE = 'DELETE';
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * @return string
     */
    public function processarRequest()
    {
        $this->request['metodo'] = 'POST';
        $retorno = utf8_encode(ConstantesGenericasUtil::MSG_ERRO_TIPO_ROTA);
        if(in_array($this->request['metodo'],ConstantesGenericasUtil::TIPO_REQUEST, true)){
            echo 'test';
            $retorno = $this->direcionarRequest();
        }
        return $retorno;
    }

    private function direcionarRequest()
    {
        if($this->request['metodo'] !== self::GET && $this->request !== self::DELETE ){
            $this->dadosRequest = JsonUtil::tratarCorpoRequisicaoJson();
        }
    }

}