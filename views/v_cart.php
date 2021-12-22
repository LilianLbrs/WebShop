<?php require_once(PATH_VIEWS . 'header.php'); ?>
<?php require_once(PATH_VIEWS . 'menu.php'); ?>




<div class="content d-flex flex-column">
    <p class="text-center fs-1">Votre panier</p>
    <table id="item">
        <thead>
            <tr>
                <th>ARTICLE</th>
                <th class="text-center ">QUANTITÉ</th>
                <th class="text-center ">SOUS-TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($resultatsItems as $item) {
            ?>
                <tr>

                    <td class="d-flex grey-border article-checkout">
                        <img src="<?= PATH_IMAGES . $item['image'] ?>" alt="<?= $item['name'] ?>">
                        <div class="mt-4">
                            <p><b><?= $item['name'] ?></b></p>
                            <p><?= $item['price'] ?>€</p>
                        </div>

                    </td>

                    <td class="grey-border">

                        <div class="d-flex editcart justify-content-center">
                            <a class="btn btn-outline-secondary" href="<?= "index.php?page=cart&down=true&product=" . $item['id'] ?>">-</a>
                            <button class="btn btn-outline-secondary" disabled><?= $item['quantity'] ?></button>
                            <a class="btn btn-outline-secondary" href="<?= "index.php?page=cart&up=true&product=" . $item['id'] ?>">+</a>
                        </div>
                        <a id="delete" href="<?= "index.php?page=cart&remove=true&product=" . $item['id'] ?>">
                            <p class="text-center ">Supprimer</p>
                        </a>
                    </td>

                    <td class="grey-border">
                        <p class="text-center"><?= $item['quantity'] * $item['price'] ?>€</p>
                    </td>




                </tr>
            <?php
            }
            ?>
            <tr class="grey-border">
                <td><a href="index.php">Continuer vos achats</a></td>
                <td>
                    <p class=" fw-bolder fs-5"> TOTAL</p>
                </td>
                <td>
                    <p class="text-center fw-bolder fs-5"> <?= $total ?>€ </p>
                </td>
            </tr>
        </tbody>
    </table>

    
    <a href="index.php?page=shipping" > <button class="btn"> Aller à la caisse</button> </a>

</div>

<?php require_once(PATH_VIEWS . 'footer.php'); ?>