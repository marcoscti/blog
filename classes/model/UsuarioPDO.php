<?php

namespace classes\model;

use Exception;

class UsuarioPDO
{
    public function save(Usuario $u)
    {

        try {

            $sql = "INSERT INTO usuario (nome,email,senha,foto,generoid) VALUES (?,?,?,?,?)";

            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $u->getNome());
            $stm->bindValue(2, $u->getEmail());
            $stm->bindValue(3, password_hash($u->getSenha(), CRYPT_BLOWFISH));
            $stm->bindValue(4, $u->getFoto());
            $stm->bindValue(5, $u->getGenero());
            $stm->execute();

            return "Usuário Cadastrado com Sucesso";
        } catch (Exception $e) {
            if ($e->errorInfo[1] == 1062) {
                return "Erro ao Cadastrar: O E-mail já está sendo Utilizado";
            }
            return $e->getMessage();
        }
    }
    public function list()
    {
        try {
            $sql = "SELECT idusuario,nome,email,ativo,foto,registro,generoid FROM usuario";
            $stm = Conexao::conectar()->query($sql);
            $cont = $stm->rowCount();
            if ($cont > 0) {
                $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
                for ($i = 0; $i < $cont; $i++) {
                    $user  = new Usuario();
                    $genero = new Genero();
                    //seta o Gênero para o objeto $genero
                    $genero->setIdGenero($result[$i]['generoid']);
                    $user->setIdUsuario($result[$i]['idusuario']);
                    $user->setNome($result[$i]['nome']);
                    $user->setEmail($result[$i]['email']);
                    $user->setAtivo($result[$i]['ativo']);
                    $user->setFoto($result[$i]['foto']);
                    $user->setRegistro($result[$i]['registro']);
                    $user->setGenero($genero->findGenero($genero));

                    $list[$i] = $user;
                }
                return $list;
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }
    public function find(Usuario $u)
    {
        try {
            $sql = "SELECT * FROM usuario WHERE idusuario=?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $u->getIdUsuario());
            $stm->execute();
            $cont = $stm->rowCount();

            if ($cont > 0) {
                $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
                $genero = new Genero();
                //seta o Gênero para o objeto $genero
                $genero->setIdGenero($result[0]['generoid']);
                $u->setIdUsuario($result[0]['idusuario']);
                $u->setNome($result[0]['nome']);
                $u->setEmail($result[0]['email']);
                $u->setSenha($result[0]['senha']);
                $u->setAtivo($result[0]['ativo']);
                $u->setFoto($result[0]['foto']);
                $u->setRegistro($result[0]['registro']);
                $u->setGenero($genero->findGenero($genero));

                return $u;
            }
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
    }
    public function findEmail(Usuario $u)
    {
        try {
            $sql = "SELECT * FROM usuario WHERE email=?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $u->getEmail());
            $stm->execute();
            $cont = $stm->rowCount();

            if ($cont > 0) {
                $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
                
                $genero = new Genero();
                //seta o Gênero para o objeto $genero
                $genero->setIdGenero($result[0]['generoid']);
                $u->setIdUsuario($result[0]['idusuario']);
                $u->setNome($result[0]['nome']);
                $u->setEmail($result[0]['email']);
                $u->setSenha($result[0]['senha']);
                $u->setAtivo($result[0]['ativo']);
                $u->setFoto($result[0]['foto']);
                $u->setRegistro($result[0]['registro']);
                $u->setGenero($genero->findGenero($genero));

                return $u;
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }
}
