<?php
namespace classes\model;

class Genero
{
    private $idGenero;
    private $genero;

    public function getIdGenero()
    {
        return $this->idGenero;
    }
    public function setIdGenero($value)
    {
        $this->idGenero = $value;
    }
    public function getGenero()
    {
        return $this->genero;
    }
    public function setGenero($value)
    {
        $this->genero = $value;
    }

    /*
    / Abaixo a classe se conecta ao banco
    */

    public function list()
    {
        try {
            //Atribui a consulta SQL à variável
            $sql = "SELECT * FROM  genero";
            //Atribui Executa a Consulta armazenada na variável SQL
            $stm = Conexao::conectar()->query($sql);
            //Atribui a quantidade de linhas da consulta à vaiável $cont
            $cont = $stm->rowCount();
            //Se houverem linhas na consulta
            if($cont> 0){

                //atribui o resultado da consulta à variável $result
                $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
                //Cria o laço de repetição que cria um genero e instancia os valores a ela
                for($i=0; $i < $cont; $i++){
                    $ge = new Genero();
                    $ge->setIdGenero($result[$i]['idgenero']);
                    $ge->setGenero($result[$i]['genero']);
                    //Adiciona os objetos no Array chamado $list
                    $list[$i] = $ge;
                }
                //Retorna uma lista de Objetos
                return $list;
            }
        }catch(\Exception $e){
            return print_r($e->getMessage());
        }
    }
    public function findGenero(Genero $g)
    {
        try {
            $sql = "SELECT * FROM genero WHERE idgenero=?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $g->getIdGenero());
            $stm->execute();

            if ($stm->rowCount() > 0) {
                $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
                $genero = new Genero();
                $genero->setIdGenero($result[0]['idgenero']);
                $genero->setGenero($result[0]['genero']);
                return $genero;
            }
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
    }
}
