<?php

namespace classes\model;

use Exception;

class PostPDO
{
    public function save(Post $p)
    {
        try {
            $sql = "INSERT INTO post (titulo,texto,imagem,usuarioid) VALUES (?,?,?,?)";
            $stm = Conexao::conectar()->prepare($sql);

            $stm->bindValue(1, $p->getTitulo());
            $stm->bindValue(2, $p->getTexto());
            $stm->bindValue(3, $p->getImagem());
            $stm->bindValue(4, $p->getUsuario());
            $stm->execute();

            return "Post Realizado com Sucesso";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function list()
    {
        try {
            $sql = "SELECT * FROM post ORDER BY idpost DESC";
            $stm = Conexao::conectar()->query($sql);
            $cont = $stm->rowCount();
            if ($cont > 0) {
                $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
                for ($i = 0; $i < $cont; $i++) {

                    $user  = new Usuario();
                    $user->setIdUsuario($result[$i]['usuarioid']);
                    $post = new Post();
                    //seta o Gênero para o objeto $genero
                    $post->setTitulo($result[$i]['titulo']);
                    $post->setImagem($result[$i]['imagem']);
                    $post->setTexto($result[$i]['texto']);
                    $post->setPostdata($result[$i]['postdata']);
                    $post->setUsuario($user->buscarUsuario($user));

                    $list[$i] = $post;
                }
                return $list;
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }
    public function userPost(int $id)
    {
        try {
            $sql = "SELECT * FROM post WHERE usuarioid=?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $id);
            $stm->execute();
            $cont = $stm->rowCount();

            if ($cont > 0) {
                $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
                for ($i = 0; $i < $cont; $i++) {

                    $user  = new Usuario();
                    $user->setIdUsuario($result[$i]['usuarioid']);
                    $post = new Post();
                    //seta o Gênero para o objeto $genero
                    $post->setTitulo($result[$i]['titulo']);
                    $post->setImagem($result[$i]['imagem']);
                    $post->setTexto($result[$i]['texto']);
                    $post->setPostdata($result[$i]['postdata']);
                    $post->setUsuario($user->buscarUsuario($user));

                    $list[$i] = $post;
                }
                return $list;
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }
}
