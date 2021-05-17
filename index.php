<?php include_once "header.php" ?>
<div class="container">
    <section>
        <?php
        if ($p->listPost()) :
            foreach ($p->listPost() as $post) :
        ?>
                <article>
                    <div class="post-content">
                        <h1><?= $post->getTitulo() ?></h1>
                        <img src="images/<?= !is_null($post->getImagem()) ? $post->getImagem() : "post.png" ?>" class="image-post divider" title="<?= $post->getTitulo() ?>">
                        <p class="text"><?= $post->getTexto() ?></p>
                        <div class="post-footer">
                            <div class="post-react">
                                <div class="react-item">
                                    &#128077;
                                </div>
                                <div class="react-item">
                                    &#128078;
                                </div>
                            </div>
                            <div class="post-data">
                                <small>
                                    por <strong><?= $post->getUsuario()->getNome() ?></strong> <?= $post->getPostdata() ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </article>
            <?php
            endforeach;
        else :
            ?>
            <p style="text-align: center;">Não existem postagens ainda.</p>
        <?php endif; ?>
    </section>
    <aside>
        <?php include_once 'menu.php'; ?>
    </aside>
</div>
<script src="js/visualizar.js"></script>
</body>

</html>