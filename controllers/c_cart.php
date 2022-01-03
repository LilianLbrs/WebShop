<?php

//appel du modèle
require_once(PATH_MODELS . 'navbar.php');

if (isset($_GET['product'])) {
    $productId = htmlspecialchars($_GET['product']);

    if (isset($_POST['quantity']) && isset($_GET['add'])) {
        $quantity = htmlspecialchars($_POST['quantity']);
        require_once(PATH_MODELS . 'addtocart.php');
    } 
    elseif (isset($_GET['remove']))
        require_once(PATH_MODELS . 'removefromcart.php');
    elseif (isset($_GET['up']))
        require_once(PATH_MODELS . 'upcart.php');
    elseif (isset($_GET['down']))
        require_once(PATH_MODELS . 'downcart.php');
}

require_once(PATH_MODELS . $page . '.php');
//appel de la vue
require_once(PATH_VIEWS . $page . '.php');
