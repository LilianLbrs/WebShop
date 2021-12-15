<?php

//On neutralise
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['adress']) && isset($_POST['city']) && isset($_POST['country']) && isset($_POST['zipcode']) && isset($_POST['mail'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $adress = htmlspecialchars($_POST['adress']);
    $city = htmlspecialchars($_POST['city']);
    $country = htmlspecialchars($_POST['country']);
    $zipcode = htmlspecialchars($_POST['zipcode']);
    $mail = htmlspecialchars($_POST['mail']);
    $phoneNum = null;
    if (isset($_POST['phoneNum'])) {
        $phoneNum = htmlspecialchars($_POST['phoneNum']);
    }

    //appel du modèle
    require_once(PATH_MODELS . $page . '.php');
}
require_once(PATH_MODELS . 'bar.php');
require_once(PATH_VIEWS . $page . '.php');
