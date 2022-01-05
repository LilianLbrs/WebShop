<?php require_once(PATH_VIEWS . 'header.php'); ?>
<?php require_once(PATH_VIEWS . 'menu.php'); ?>



<div class="container" id="product">
    <img src="<?= PATH_IMAGES . $resultProduct["image"] ?>" alt="">
    <div>
        <h1><b><?= $resultProduct["name"] ?></b></h1>
        <p class="pe-5"><?= $resultProduct["description"] ?></p>
        <div class="divider mt-4"></div>
        <p class="fs-2 fw-bolder p-2"><?= $resultProduct["price"] ?>€</p>
        <div class="divider mb-4"></div>

        <form class="d-flex flex-column" action="index.php?page=cart&add=true&product=<?= $resultProduct["id"] ?>" method="POST">
            <label class="fs-5 fw-bolder" for="quantity">Quantité:</label>
            <div class="d-flex m-0">
                <input class="form-control" name="quantity" id="quantity" type="number" value="1" min="1">
                <input class="btn btn-secondary" type="submit" value="Ajouter au panier">
            </div>

        </form>

    </div>



</div>

<div class="d-flex justify-content-center flex-wrap">
    
<?php 

foreach($reviewProduct as $review){
    ?>

<div class="bg-grey m-2 p-2 rounded w-25">
<div class="d-flex justify-content-between">
    <p class="fw-bolder"><?=$review['title']?></p>
    <p><?=$review['name_user']?></p>
</div>
<!-- <img src="<?= PATH_IMAGES."review_star.png"?>" alt="">
<img src="<?= PATH_IMAGES."review_gray.png"?>" alt="">
-->
<p><?=$review['description']?></p>
</div>

<?php
}

?>
</div>

<?php require_once(PATH_VIEWS . 'footer.php'); ?>