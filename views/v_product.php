<?php require_once(PATH_VIEWS . 'header.php'); ?>
<?php require_once(PATH_VIEWS . 'navbar.php'); ?>



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
<div class="d-flex ">
    <?php 
    for($i = 0; $i<$review['stars']; $i++) { ?>
        <img class="review-stars" src="<?= PATH_IMAGES."review_star.png"?>" alt="">
    <?php }
    for($i = 0; $i<5-$review['stars']; $i++) { ?>
        <img class="review-stars" src="<?= PATH_IMAGES."review_gray.png"?>" alt="">
    <?php } ?>
    </div>
<p><?=$review['description']?></p>
</div>

<?php
}
?>

</div>
<div class="d-flex justify-content-center">
    <form class="bg-grey w-25 d-flex flex-column rounded p-2 m-4" action="index.php?page=addReview&product=<?=$productId?>" method="POST">
        <label>Prénom: <input type="text" name="name" class="form-control" placeholder="Prénom" required></label>
        <div class="form-group d-flex justify-content-between">
            <label>Titre: <input type="text"  class="form-control" name="title" placeholder="Titre" required></label>
            <label>Note: <input type="number"  class="form-control" name="stars" value=5 min=1 max=5 required></label>
        </div>
        <label >Avis: <textarea name="review" class="form-control" placeholder="Description" required></textarea></label>
        <div class="form-group align-self-center">
            <button type="submit" class="btn btn-primary rounded">Publier</button>
        </div>
    </form>
</div>

<?php require_once(PATH_VIEWS . 'footer.php'); ?>