<?php
namespace classes\model;

class Usuario
{
    private $idUsuario;
    private $nome;
    private $email;
    private $senha;
    private $genero;
    private $foto;
    private $ativo;
    private $registro;

    public function getRegistro()
    {
        return $this->registro;
    }
    public function setRegistro($value)
    {
        $this->registro = $value;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    public function setIdUsuario($value)
    {
        $this->idUsuario = $value;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($value)
    {
        if (isset($value) && !empty($value)) {
            $this->nome = $value;
        }
        return false;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($value)
    {
        $this->email = $value;
    }
    public function getSenha()
    {
        return $this->senha;
    }
    public function setSenha($value)
    {
        $this->senha = $value;
    }
    public function getGenero()
    {
        return $this->genero;
    }
    public function setGenero($value)
    {
        $this->genero = $value;
    }
    public function getFoto()
    {
        return $this->foto;
    }
    public function setFoto($value)
    {
        $this->foto = $value;
    }
    public function getAtivo()
    {
        return $this->ativo;
    }
    public function setAtivo($value)
    {
        $this->ativo = $value;
    }
    //Chamar os métodos do PDO
    
    public function salvarUsusario(Usuario $u)
    {
        $usuario = new UsuarioPDO();
        return $usuario->save($u);
    }
    public function listarUsuario()
    {
        $u = new UsuarioPDO();
        return $u->list();
    }
    public function buscarUsuario(Usuario $u){
        $usuario = new UsuarioPDO();
        return $usuario->find($u);
    }

    public function buscarEmail(Usuario $u){
        $usuario = new UsuarioPDO();
        return $usuario->findEmail($u);
    }
    
}
