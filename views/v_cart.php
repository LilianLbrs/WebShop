<?php require_once(PATH_VIEWS . 'header.php'); ?>
<?php require_once(PATH_VIEWS . 'menu.php'); ?>



<div class="home">
    <?php require_once(PATH_VIEWS . 'bar.php'); ?>

    <div class="content">

        <table id="item">
            <thead>
                <tr>
                    <th></th>
                    <th>Article</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($resultatsItems as $item) {
                ?>
                    <tr>
                        <td>
                            <img src="<?= PATH_IMAGES . $item['image'] ?>" alt="<?= $item['name'] ?>">
                        </td>
                        <td>
                            <p><b><?= $item['name'] ?></b></p>
                        </td>
                        <td>
                            <p><?= $item['price'] ?>€</p>
                        </td>
                        <td>
                            <p><?= $item['quantity'] ?></p>
                        </td>
                        <td>
                            <a href="<?= "index.php?page=cart&up=true&product=".$item['id'] ?>"><button>+</button></a>
                            <a href="<?= "index.php?page=cart&down=true&product=".$item['id'] ?>"><button>-</button></a>
                        </td>

                        <td>
                            <a href="<?= "index.php?page=cart&remove=true&product=".$item['id'] ?>"><button>x</button></a>
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
</div>
<?php require_once(PATH_VIEWS . 'footer.php'); ?>