<?php

namespace App;

use App\Models\Usuario;

require("../config/conexao.php");

class UsuarioController extends Controller{

    public function login()	{

        return $this->view('login');
	}

    public function loginPost()	{

        $usuario = Usuario::buscarCpf($this->request->login);
        
        if($usuario) {
            
            if(password_verify($this->request->senha, $usuario->senha)) {
              
            }

        }
        return $this->index();
	}

    public function index()	{
        $usuarios = Usuario::all();

        return $this->view('usuarios', ['usuarios' => $usuarios]);
	}

    public function buscarUsuario($id) {
        $usuario = Usuario::find($id);

        $dados = json_encode($usuario);
       
        return $dados;
    }

    public function criarUsuario()
    {
        $encryptSenha = password_hash($this->request->senha, PASSWORD_DEFAULT);

        $usuario           = new Usuario;
        $usuario->cpf      = $this->request->cpf;
        $usuario->nome     = $this->request->nome;
        $usuario->telefone = $this->request->telefone;
        $usuario->email    = $this->request->email;
        $usuario->senha    = $encryptSenha;

        $usuario->endereco    = $this->request->endereco;
        $usuario->numero      = $this->request->numero;
        $usuario->bairro      = $this->request->bairro;
        $usuario->cep         = $this->request->cep;
        $usuario->complemento = $this->request->complemento;
        $usuario->cidade      = $this->request->cidade;
        $usuario->estado      = $this->request->estado;

        $usuario->create($usuario);
        
        if ($usuario->create()) {
            return $this->index();
        }
    }

    public function atualizar()
    {
        $encryptSenha = password_hash($this->request->senha, PASSWORD_DEFAULT);

        $usuario           = new Usuario;
        $usuario->cpf      = $this->request->cpf;
        $usuario->nome     = $this->request->nome;
        $usuario->telefone = $this->request->telefone;
        $usuario->email    = $this->request->email;
        $usuario->senha    = $encryptSenha;

        $usuario->endereco    = $this->request->endereco;
        $usuario->numero      = $this->request->numero;
        $usuario->bairro      = $this->request->bairro;
        $usuario->cep         = $this->request->cep;
        $usuario->complemento = $this->request->complemento;
        $usuario->cidade      = $this->request->cidade;
        $usuario->estado      = $this->request->estado;

        $usuario->update($usuario);
 
        return $this->index();
    }

    public function excluir($dados)
    {
        $contato = Usuario::deletarUsuario($dados);

        return $this->index();
    }

}
