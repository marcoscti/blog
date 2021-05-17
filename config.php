<?php
session_start();

//Função para fazer o carregamento automático das classes
spl_autoload_register(function ($class) {
    require_once $class.".php";
});

