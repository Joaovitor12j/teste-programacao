<?php

namespace App\Models;

use config\Conexao;
use PDO;

require_once("../config/conexao.php");

class Usuario {

    private $atributos;

    public function __construct()
    {

    }

    public static function all()
    {
        $conexao = Conexao::getInstance();
        $stmt    = $conexao->prepare("SELECT * FROM usuarios;");
        $result  = array();
        if ($stmt->execute()) {
            while ($rs = $stmt->fetchObject(Usuario::class)) {
                $result[] = $rs;
            }
        }
        if (count($result) > 0) {
            return $result;
        }
        return false;
    }

    public static function find($id)
    {
        $conexao = Conexao::getInstance();
        $stmt    = $conexao->prepare("SELECT * FROM usuarios 
        INNER JOIN endereco ON usuarios.id = endereco.end_usuario_id 
        WHERE id='{$id}';");
       
        if ($stmt->execute()) {
            $usuario = $stmt->fetchAll();

            return $usuario;
        }

        return false;
    }

    public static function buscarCpf($cpf) {
        $conexao = Conexao::getInstance();

        if($cpf != "") {

            $query = "SELECT * FROM usuarios WHERE cpf = '$cpf'";

            $stmt = $conexao->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();

            return $result;

        }
        return false;
  
    }

    public function create(Usuario $usuario) {

        $conexao = Conexao::getInstance();

        $gravarUsuario = "INSERT INTO usuarios (
            cpf, nome, email, telefone, senha
        ) VALUES (
            '$usuario->cpf', '$usuario->nome', '$usuario->email', '$usuario->telefone', '$usuario->senha'
        )";
    
        $stmt = $conexao->prepare($gravarUsuario);
        $stmt->execute();

        $idUsuario = $conexao->lastInsertId();
        
        $endereco = "INSERT INTO endereco (
            end_usuario_id, end_logradouro, end_numero, end_bairro, end_cep, end_complemento, end_cidade, end_estado
        ) VALUES (
            $idUsuario, '$usuario->endereco', '$usuario->numero', '$usuario->bairro', '$usuario->cep', '$usuario->complemento', '$usuario->cidade', '$usuario->estado'
        )";

        $gravarEndereco = $conexao->prepare($endereco);
        $gravarEndereco->execute();

        return true;
    }

    public function update(Usuario $usuario) {

        $conexao = Conexao::getInstance();

        $gravarUsuario = "UPDATE usuarios SET (
            cpf, nome, email, telefone, senha
        ) VALUES (
            '$usuario->cpf', '$usuario->nome', '$usuario->email', '$usuario->telefone', '$usuario->senha'
        ) WHERE cpf = '$usuario->cpf'";
    
        $stmt = $conexao->prepare($gravarUsuario);
        $stmt->execute();

        $idUsuario = $conexao->lastInsertId();
        
        $endereco = "UPDATE endereco SET (
            end_logradouro, end_numero, end_bairro, end_cep, end_complemento, end_cidade, end_estado
        ) VALUES (
           '$usuario->endereco', '$usuario->numero', '$usuario->bairro', '$usuario->cep', '$usuario->complemento', '$usuario->cidade', '$usuario->estado'
        ) WHERE end_usuario_id = $idUsuario";

        $gravarEndereco = $conexao->prepare($endereco);
        $gravarEndereco->execute();

        return true;
    }

    public static function deletarUsuario($id)
    {
        $conexao = Conexao::getInstance();

        if (
            $conexao->exec("DELETE FROM endereco WHERE end_usuario_id='{$id}';") &&
            $conexao->exec("DELETE FROM usuarios WHERE id='{$id}';")) {
            return true;
        }
        return false;
    }

}
