<?php require_once(PATH_VIEWS . 'header.php'); ?>
<?php require_once(PATH_VIEWS . 'menu.php'); ?>



<div class="home">
    <?php require_once(PATH_VIEWS . 'bar.php'); ?>


    <div class="content">
        <?php foreach ($resultatsProducts as $product) {
        ?>

            <div class="product">
                <a href="index.php?page=product&product=<?= $product['id'] ?>">
                    <img src="<?= PATH_IMAGES . $product['image'] ?>" alt="Visiter la page de <?= $product['name'] ?>" >
                </a>

                <div>
                    <h1><?= $product['name'] ?></h1>
                    <p><?= $product['description'] ?></p>
                    <p><b>Notre prix: <?= $product['price'] ?>€</b></p>
                    <a href="index.php?page=product&product=<?= $product['id'] ?>">[acheter]</a>
                </div>
            </div>
        <?php
        } ?>

    </div>
</div>
<?php require_once(PATH_VIEWS . 'footer.php'); ?>