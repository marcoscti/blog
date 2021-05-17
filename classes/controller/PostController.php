<?php

namespace classes\controller;

use classes\model\Post;
use classes\model\Usuario;
use classes\model\Validate;
use classes\model\Upload;

class PostController
{
    public $erro;

    public function postar()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $u = new Usuario();
            $post = new Post();

            if (Validate::validaInt($_POST['usuario'])) {
                $u->setIdUsuario($_POST['usuario']);
                $post->setUsuario($u->getIdUsuario());
            } else {
                $this->erro[0] = "Erro ao criar atribuir responsável pela postagem";
            }

            if (Validate::validaTxt($_POST['titulo'], 100)) {
                $post->setTitulo($_POST['titulo']);
            } else {
                $this->erro[1] = "Erro ao criar o título";
            }
            if (Validate::validaTxt($_POST['texto'], 1024)) {
                $post->setTexto($_POST['texto']);
            } else {
                $this->erro[3] = "Erro ao criar o Texto";
            }

            if ($_FILES['imagem']['error'] == 0) {
                $up = new Upload();
                $up->foto = $_FILES['imagem'];
                $up->size = 5000000;
                $up->dir = "images";
                if ($up->sendImage()) {

                    if (!is_null($up->getNome())) {
                        $post->setImagem($up->getNome());
                    } else {
                        print_r($up->getNome());
                        $this->erro[2] = $up->sendImage();
                    }
                }
            }
        } //Fim da verificação
        if (is_null($this->erro) && isset($post)) {
            return $this->erro[4] = $post->postar($post);
        }
        return $this->erro;
    }
}
