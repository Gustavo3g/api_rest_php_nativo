<?php


namespace Repository;

use DB\MySQL;


class UsuariosRepository
{
    private object $MYSQL;
    public const TABELA = "usuarios";

    /**
     * TokensAutorizadosRepository constructor.
     */
    public function __construct()
    {
        $this->MYSQL = new MySQL();

    }

    /**
     * @return MySQL|object
     */
    public function getMYSQL()
    {
        return $this->MYSQL;
    }
}