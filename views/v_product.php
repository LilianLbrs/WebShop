<?php require_once(PATH_VIEWS . 'header.php'); ?>
<?php require_once(PATH_VIEWS . 'menu.php'); ?>



<div class="home">
    <?php require_once(PATH_VIEWS . 'bar.php'); ?>


    <div class="content" id="product">
        <img src="<?= PATH_IMAGES . $resultProduct["image"] ?>" alt="">
        <div>
            <h1><b><?= $resultProduct["name"] ?></b></h1>
            <p><?= $resultProduct["description"] ?></p>
            <p><?= $resultProduct["price"] ?>€</p>

            <form action="index.php?page=cart&add=true&product=<?=$resultProduct["id"]?>" method="POST">
                <label for="quantity">Quantité</label>
                <input name="quantity" id="quantity" type="number" value="1" min="1">
                <input type="submit" value="Ajouter au panier">
            </form>

        </div>



    </div>
</div>