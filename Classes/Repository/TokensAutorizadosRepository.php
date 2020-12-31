<?php


namespace Repository;

use DB\MySQL;

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

    public function validarToken()
    {

    }

    /**
     * @return MySQL|object
     */
    public function getMYSQL()
    {
        return $this->MYSQL;
    }
}