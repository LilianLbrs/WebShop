<?php




require_once(PATH_MODELS . 'cart.php');

if (count($resultatsItems)) {
    if ($_SESSION['customer_id'] != 0)
        require_once(PATH_MODELS . $page . '.php');

    //appel de la vue
    require_once(PATH_MODELS . 'navbar.php');
    require_once(PATH_VIEWS . $page . '.php');
} else {
    header("Location: ./index.php?page=cart");
}
