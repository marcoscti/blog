<?php include_once "header.php";
isset($_SESSION['usuario']) ? : header("location:index.php");

?>
<div class="container">
    <section class="container2">
        <?php
        if ($pc->postar()) :
        ?>
            <div class="alert">
                <?php
                foreach ($pc->postar() as $msg) {
                ?>
                    <?= $msg ?><br>
                <?php
                }
                ?>
            </div>
        <?php
        endif;
        ?>
        <h1>Nova Postagem</h1>
        <div class="form">
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="usuario" value="<?=$_SESSION['usuario']['idusuario']?>">
                <label for="titulo">Título da Postagem</label>
                <div class="input-box">
                    <input type="text" id="titulo" name="titulo" placeholder="Título da Postagem">
                </div>
                <label for="foto" class="lblinput">Imagem do Post</label>
                <input id="foto" type="file" name="imagem">
                <label for="texto">Conteúdo da Postagem</label>
                <div class="input-box">
                    <textarea id="texto" name="texto" placeholder="Conteúdo da Postagem" rows="8"></textarea>
                </div>
                <button class="btn">Postar Agora</button>
            </form>
        </div>
    </section>
    <aside>
    <?php include_once "menu.php"?>
    </aside>
</div>
</body>

</html>