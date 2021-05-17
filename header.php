<?php
require "config.php";
use classes\model\Post;
use classes\controller\ControllerUsuario;
use classes\controller\PostController;
use classes\model\Genero;
use classes\model\Usuario;

$controller = new ControllerUsuario();
$genero = new Genero();
$usuario = new Usuario();
$pc = new PostController();
$p = new Post();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#75b529">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/layout.css">
    <title></title>
</head>

<body>
    <header>
        <div class="header-container">
            <a href="index.php" class="logotipo">
                <h1 style="color: white;">Post's</h1>
            </a>
            <div class="social">

            </div>
        </div>
    </header>