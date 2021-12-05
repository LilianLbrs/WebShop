<?php

//appel du modèle
require_once(PATH_MODELS . 'bar.php');

if (isset($_GET['product']) && isset($_POST['quantity'])) {
    $productId = htmlspecialchars($_GET['product']);
    $quantity = htmlspecialchars($_POST['quantity']);

    if (isset($_GET['add']))
        require_once(PATH_MODELS . 'addtocart.php');
    elseif (isset($_GET['remove']))
        require_once(PATH_MODELS . 'removefromcart.php');
}
require_once(PATH_MODELS . $page . '.php');
//appel de la vue
require_once(PATH_VIEWS . $page . '.php');
