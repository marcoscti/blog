<?php
namespace classes\model;

class Upload
{
    public $foto;
    public $size;
    public $dir;
    private $nome;

    public function setNome($value){
        $this->nome = $value;
    }
    public function getNome(){
        return $this->nome;
    }

    public function sendImage()
    {
        #Verifica se o tamanho da imagem é aceito
        if ($this->foto['size'] <= $this->size) {

            #Verifica se a pasta existe se não ela cria
            if (!is_dir($this->dir)) {
                mkdir($this->dir);
            }

            //Executa e verifica se o Upload aconteceu, em caso de sucesso retorna o novo nome da imagem
            if (move_uploaded_file($this->foto["tmp_name"],

            $this->dir . DIRECTORY_SEPARATOR . date("ms") . str_replace(' ','', $this->foto["name"]))) {

                $this->setNome(date("ms") . str_replace(' ', '', $this->foto["name"])); 
                return $this->getNome();
            }
            return false;
            
        } else {
            return "O Tamanho da foto é de " . number_format($this->foto['size'], 0, ",", ".") . " e excede o limite de " . number_format($this->size, 0, ",", ".") . " KB";
        }
    }
}
