<?php

namespace classes\controller;

use classes\model\Usuario;
use classes\model\Validate;
use classes\model\Upload;


class ControllerUsuario
{
    public $erro;

    public function salvar()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $usuario = new Usuario();

            if (Validate::validaTxt($_POST['nome'], 100)) {
                $usuario->setNome($_POST['nome']);
            } else {
                $this->erro[0] = "O campo NOME não deve estar vazio";
            }

            if (Validate::validaEmail($_POST['email'], 100)) {
                $usuario->setEmail($_POST['email']);
            } else {
                $this->erro[2] = "Por favor, informe um E-MAIL válido";
            }

            if (Validate::validaTxt($_POST['senha'], 15)) {
                $usuario->setSenha($_POST['senha']);
            } else {
                $this->erro[3] = "A SENHA não pode ultrapassar 15 caracteres ou estar vazia";
            }

            if ($_FILES['imagem']['error'] == 0) {
                $up = new Upload();
                $up->foto = $_FILES['imagem'];
                $up->size = 5000000;
                $up->dir = "img";

                if ($up->sendImage()) {

                    if (!is_null($up->getNome())) {
                        $usuario->setFoto($up->getNome());
                    } else {
                        print_r($up->getNome());
                        $this->erro[6] = $up->sendImage();
                    }
                }
            }

            if (isset($_POST['genero']) && !empty($_POST['genero']) && $_POST['genero'] != null) {
                $usuario->setGenero($_POST['genero']);
            } else {
                $this->erro[4] = "Por favor, selecione um GÊNERO";
            }
        } //fim da verificação
        if (is_null($this->erro) && isset($usuario)) {
            return $this->erro[5] = $usuario->salvarUsusario($usuario);
        }
        return $this->erro;
    }
    public function logar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $u = new Usuario();
            //Realiza a "Validação" do EMAIL e seta os dados para o usuário 
            if (Validate::validaEmail($_POST['email'], 100)) {
                $u->setEmail($_POST['email']);
            } else {
                $this->erro[0] = "Por favor, informe um E-MAIL válido";
            }
            //Realiza a "Validação" da SENHA e seta os dados para o usuário 
            if (Validate::validaTxt($_POST['senha'], 15)) {
                $u->setSenha($_POST['senha']);
            } else {
                $this->erro[1] = "Por favor, preencha o campo senha";
            }

            //Se não houverem erros, faz a busca do usuário na base de dados.
            if (is_null($this->erro)) {

                $usuario = $u->buscarEmail($u);

                if (!is_null($usuario)) {

                    if ($usuario->getAtivo()) {
                        if (password_verify($_POST['senha'], $usuario->getSenha())) {
                            session_start();
                            $_SESSION['usuario'] = [
                                'idusuario'=>$usuario->getIdUsuario(),
                                'nome'=>$usuario->getNome(),
                                'foto'=>$usuario->getFoto()
                            ];
                            header("location:home.php");
                        }
                        return $this->erro[2] = "Usuário ou senha incorretos tente novamente";
                    }
                    return $this->erro[3] = "O Usuário está Inativo consulte o administrador do sistema";
                }
                return $this->erro[4] = "Usuário não localizado consulte o administrador do sistema";
            }
            return $this->erro;
        }
    }
}
