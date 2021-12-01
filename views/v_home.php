<?php require_once('./views/v_header.php'); ?>

<?php foreach ($resultatsCategories as $categorie ) {
    echo $categorie['name'];
}?>

<?php require_once('./views/v_footer.php'); ?>