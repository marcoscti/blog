<?php
if (isset($_SESSION['usuario']) && !is_null($_SESSION['usuario'])) :
?>
    <div>

        <div class="foto">
            <img src="img/<?= !is_null($_SESSION['usuario']['foto']) ? $_SESSION['usuario']['foto'] : "perfil.png" ?>">
        </div>
        <p>Olá, <?= $_SESSION['usuario']['nome'] ?></p>
    </div>
    <div class="posts">
        <ul class="menu-lateral">
            <li><a href="posts.php">Nova Postagem</a></li>
            <li><a href="home.php">Minhas Postagens</a></li>
            <li><a href="logoff.php">Sair do Sistema</a></li>
        </ul>
    </div>
<?php else : ?>
    <div class="form">
        <?php
        if ($controller->logar()) :
        ?>
            <div class="alert">
                <?php
                foreach ($controller->logar() as $msg) {
                ?>
                    <?= $msg ?><br>
                <?php
                }
                ?>
            </div>
        <?php
        endif;
        ?>
        <h2>ENTRE PARA COMEÇAR A POSTAR</h2>
        <form method="POST">
            <label for="email">E-mail</label>
            <div class="input-box">
                <input type="email" name="email" placeholder="email@email.com" required>
            </div>
            <label for="senha">Senha</label>
            <div class="input-box">
                <input type="password" id="password" name="senha" placeholder="Sua Senha" required>
                <img src="img/eye.png" class="olho" onclick="visualizar()">
            </div>
            <a href="cadastro.php" class="a-link">Cadastre-se</a>
            <button class="btn">Entrar</button>
        </form>
    </div>
    <div class="posts">
    </div>
<?php endif; ?>