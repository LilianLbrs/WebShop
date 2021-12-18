<?php require_once(PATH_VIEWS . 'header.php'); ?>
<?php require_once(PATH_VIEWS . 'menu.php'); ?>



<div class="container-fluid gris-claire">
<p class="fs-1 p-5 font-black fw-bolder"><?= strtoupper($resultatsProducts[0]['catname']) ?></p>
</div>



<div class="container-fluid d-flex flex-wrap">
    <?php foreach ($resultatsProducts as $product) {
    ?>

        <div class="product ms-2 me-2 mb-4 mt-4">
            
            <div class="position-relative">
                <a href="index.php?page=product&product=<?= $product['id'] ?>">
                    <img src="<?= PATH_IMAGES . $product['image'] ?>" alt="Visiter la page de <?= $product['name'] ?>">
                </a>
                <button type="button" class="btn btn-dark bottom-0 end-0 position-absolute m-1">Acheter</button>
            </div>

            <div class="d-flex justify-content-between mt-2">
                <p class="fs-5"><?= $product['name'] ?></p>
                <p class="fs-5 fw-bolder"><?= $product['price'] ?>€</p>
            </div>
        </div>
    <?php
    } ?>

</div>

<?php require_once(PATH_VIEWS . 'footer.php'); ?>