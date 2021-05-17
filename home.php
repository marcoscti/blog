<?php
include_once "header.php";
//verifica se existe a sessão do usuário e impede o acesso a páginas sem sessão
!isset($_SESSION['usuario'])? : header("location:index.php");
use classes\model\PostPDO;
$pdo = new PostPDO();
?>
<div class="container">
<section>
    <h1>Minhas Postagens</h1>
    <?php
        $postagens = $pdo->userPost($_SESSION['usuario']['idusuario']);
        
    if(!is_null($postagens) && count($postagens)>0):
    foreach($postagens as $userPost):
    ?>
   
    <div class="rowpost">
            <div class="miniatura">
            <img src="images/<?=$userPost->getImagem()?>">
            </div>
            <div class="conteudo">
            <h3><?=$userPost->getTitulo()?></h3>
            <p><?=$userPost->getPostdata()?></p>
            </div>
            <div class="links">
                <a href="#">Editar</a>
                <a href="#">Detalhar</a>
                <a href="#">Excluir</a>
            </div>
        </div>
        <?php
        endforeach;
        else:
        ?>
        Você ainda não criou nenhum post
        <?php
            endif;
        ?>
    </section>
    <aside>
        <?php include_once "menu.php" ?>
    </aside>
</div>
</body>
</html>