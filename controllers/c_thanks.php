<?php

if (isset($_GET['address'])) {
    $address = $_GET['address'];
    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    $city = $_GET['city'];
    $country = $_GET['country'];
    $payment = $_GET['payment'];
    $email = $_GET['email'];
    $zipcode = $_GET['zipcode'];
    $total = $_GET['total'];

    //appel du modèle
    require_once(PATH_MODELS . $page . '.php');
}




//appel de la vue
require_once(PATH_VIEWS . $page . '.php');
