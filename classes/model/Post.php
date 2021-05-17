<?php

namespace classes\model;

class Post
{
    private $idPost;
    private $titulo;
    private $imagem;
    private $texto;
    private $postdata;
    private $usuario;

    public function setIdPost($value)
    {
        $this->idPost = $value;
    }
    public function getIdPost()
    {
        return $this->idPost;
    }
    public function setTitulo($value)
    {
        $this->titulo = $value;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function setImagem($value)
    {
        $this->imagem = $value;
    }
    public function getImagem()
    {
        return $this->imagem;
    }
    public function setTexto($value)
    {
        $this->texto = $value;
    }
    public function getTexto()
    {
        return $this->texto;
    }
    public function setPostdata($value)
    {
        $this->postdata = $value;
    }
    public function getPostdata()
    {
        return $this->postdata;
    }
    public function setUsuario($value)
    {
        $this->usuario = $value;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }
    public function postar(Post $p)
    {
        $ps = new PostPDO();
        return $ps->save($p);
    }
    
    public function listPost()
    {
        $p = new PostPDO();
        return $p->list();
    }
}
