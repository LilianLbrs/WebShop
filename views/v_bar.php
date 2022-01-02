<div class="bar">
    <p><b>NOTRE OFFRE</b></p>
    <ul>
        <?php foreach ($resultatsCategories as $categorie) {
            echo '<li>';
            echo '<a href="index.php?page=products&category=' . $categorie['id'] . '">' . $categorie['name'] . '</a>';
            echo '</li>';
        } ?>
    </ul>

    <div class="divider"></div>

    <?php
    if ($_SESSION['connected'] == true) { ?>
        <p>Bonjour <?= $_SESSION['name'] ?></p>
        <a href="index.php?page=logout">
            Se déconnecter</a>
    <?php
    } else { ?>
        <a href="index.php?page=account">Connexion</a>
    <?php

    }
    ?>


</div>