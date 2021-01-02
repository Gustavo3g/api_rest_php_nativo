<?php


namespace Repository;

use DB\MySQL;
use InvalidArgumentException;
use Util\ConstantesGenericasUtil;

class TokensAutorizadosRepository
{
    private object $MYSQL;
    public const TABELA = "tokens_autorizados";

    /**
     * TokensAutorizadosRepository constructor.
     */
    public function __construct()
    {
        $this->MYSQL = new MySQL();

    }

    /**
     * @param $token
     */
    public function validarToken($token)
    {
        $token = str_replace([' ', 'Bearer', ''],'', $token);
        if($token){
            $consultaToken = "SELECT id FROM " .self::TABELA . " WHERE token = :token AND status = :status";
            $stmt = $this->getMYSQL()->getDb()->prepare($consultaToken);
            $stmt->bindValue(':token', $token); // APELIDANDO
            $stmt->bindValue(':status', ConstantesGenericasUtil::SIM);
            $stmt->execute();

            if($stmt->rowCount() !== 1){
                header('HTTP/1.1 401 Unauthorized');
                throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_TOKEN_NAO_AUTORIZADO);
            }
        }else {
            throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_TOKEN_VAZIO);
        }
    }

    /**
     * @return MySQL|object
     */
    public function getMYSQL()
    {
        return $this->MYSQL;
    }
}