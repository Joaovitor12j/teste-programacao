<?php

namespace config;

class Conexao
{
    private static $conexao;
 
    private function __construct(
        string $dsn,
        ?string $username = null,
        ?string $password = null
    ) {}
 
    public static function getInstance()
    {
        if (is_null(self::$conexao)) {
            self::$conexao = new \PDO('mysql:host=localhost;dbname=teste_ns', 'root', '');
            self::$conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$conexao->exec('set names utf8');
            
        }
        return self::$conexao;
    }
}