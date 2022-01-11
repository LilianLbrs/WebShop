<?php require_once(PATH_VIEWS . 'header.php'); ?>
<?php require_once(PATH_VIEWS . 'navbar.php'); ?>

<div class="container-fluid gris-claire">
    <p class="fs-1 p-5 fw-bolder">BIENVENUE</p>
</div>

<div class="container-fluid d-flex flex-wrap justify-content-around">
    <?php foreach ($resultatsProductHome as $product) {
    ?>

        <div class="product ms-2 me-2 mb-4 mt-4">

            <div class="position-relative">
                <a href="index.php?page=products&category=<?= $product['cat_id'] ?>">
                    <img class="opacity-75" src="<?= PATH_IMAGES . $product['image'] ?>">
                </a>
                <p class="bottom-0 start-0 position-absolute fs-3 m-1 "><?=strtoupper($product['name'])?></p>
            </div>


        </div>
    <?php
    } ?>
</div>
<?php require_once(PATH_VIEWS . 'footer.php'); ?>