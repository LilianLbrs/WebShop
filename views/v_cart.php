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

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        
        <p><b> Total: <?= $total ?>€ </b></p>

    </div>
</div>