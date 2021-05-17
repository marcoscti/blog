<?php require "header.php" ?>
<div class="container2">
    <h1>Cadastre-se</h1>
    <?php
    if ($controller->salvar()) :
    ?>
        <div class="alert">
            <?php
            foreach ($controller->salvar() as $msg) {
            ?>
                <?= $msg ?><br>
            <?php
            }
            ?>
        </div>
    <?php
    endif;
    ?>
    <form enctype="multipart/form-data" method="post">
        <label for="nome">Nome</label>
        <div class="input-box">
            <input type="text" name="nome" id="nome" placeholder="Seu nome Aqui">
        </div>
        <label for="email">E-mail</label>
        <div class="input-box">
            <input type="text" name="email" placeholder="email@email.com">
        </div>
        <label for="senha">Crie sua Senha</label>
        <div class="input-box">
            <input type="password" name="senha" id="password" accept="jpg" id="senha" placeholder="Sua Senha">
            <img src="img/eye.png" class="olho" id="eye" onclick="visualizar()">
        </div>
        <label for="genero">Seu Gênero</label>
        <div class="input-box">
            <select name="genero">
                <option disabled selected>Selecione</option>
                <?php
                foreach ($genero->list() as $gen) :
                ?>
                    <option value="<?= $gen->getIdGenero() ?>"><?= $gen->getGenero() ?></option>
                <?php
                endforeach; ?>
            </select>
        </div>
        <label for="foto" class="lblinput">Imagem do Perfil</label>
        <input id="foto" type="file" name="imagem" accept="image/*">
        <button class="btn">Cadastrar</button>
        <a href="index.php">Já sou cadastrado, faça login</a>
    </form>
</div>
<script src="js/visualizar.js"></script>
</body>

</html>