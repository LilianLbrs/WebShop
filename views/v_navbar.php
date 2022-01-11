<div class="d-flex justify-content-between p-3 bg-white menu">
    <a href="index.php?page=home" class="fs-5">ACCUEIL</a>

    <div class="categories">
        <?php foreach ($resultatsCategories as $categorie) { ?>
            <a class="fs-5 ms-2 me-2" href="<?= 'index.php?page=products&category=' . $categorie['id'] ?>"> <?= strtoupper($categorie['name']) ?> </a>
        <?php
        } ?>
    </div>

    <div >
        <?php
        if ($_SESSION['connected'] == true) { ?>
            <p class="fs-5">Bonjour <?= $_SESSION['name'] ?></p>
            <a href="index.php?page=logout">SE DÉCONNECTER</a>
        <?php
        } else { ?>
            <a class="fs-5" href="index.php?page=account">CONNEXION</a>
        <?php

        }
        ?>
        <a class="fs-5 ms-2" href="index.php?page=cart"><img class="cartImg" alt="" src="<?=PATH_IMAGES?>cart.png"></a>
    </div>

</div>

<div class="divider"></div>