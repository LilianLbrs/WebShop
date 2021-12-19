<?php require_once(PATH_VIEWS . 'header.php'); ?>
<?php require_once(PATH_VIEWS . 'menu.php'); ?>




<div class="content">
    <p>Votre panier</p>
    <table id="item">
        <thead>
            <tr>
                <th>ARTICLE</th>
                <th>QUANTITÉ</th>
                <th>SOUS-TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($resultatsItems as $item) {
            ?>
                <tr>

                    <td class="d-flex">
                        <img src="<?= PATH_IMAGES . $item['image'] ?>" alt="<?= $item['name'] ?>">
                        <div class="mt-4">
                            <p><b><?= $item['name'] ?></b></p>
                            <p><?= $item['price'] ?>€</p>
                        </div>

                    </td>

                    <td>

                        <div class="d-flex editcart">
                            <a class="btn btn-outline-secondary" href="<?= "index.php?page=cart&down=true&product=" . $item['id'] ?>">-</a>
                            <button class="btn btn-outline-secondary" disabled><?= $item['quantity'] ?></button>
                            <a class="btn btn-outline-secondary" href="<?= "index.php?page=cart&up=true&product=" . $item['id'] ?>">+</a>
                        </div>
                        <a id="delete" href="<?= "index.php?page=cart&remove=true&product=" . $item['id'] ?>"><p  class="text-center ">Supprimer</p></a>
                    </td>

                    <td>
                        <p class="text-center"><?= $item['quantity'] * $item['price'] ?>€</p>
                    </td>


                    

                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <p><b> Total: <?= $total ?>€ </b></p>
    <a href="index.php?page=shipping"><button>Aller à la caisse</button></a>

</div>

<?php require_once(PATH_VIEWS . 'footer.php'); ?>