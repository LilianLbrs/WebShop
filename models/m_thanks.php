<?php

// accès base de données
// connection à la base de données
try {
    $bdd = new PDO('mysql:host=' . BD_HOST . '; dbname=' . BD_DBNAME . '; charset=utf8', BD_USER, BD_PWD);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    if (DEBUG)
        die('Erreur : ' . $e->getMessage());
    $alert = 'connexion à la base de données';
}

//On récupère l'order
$requete = "SELECT id, delivery_add_id FROM orders WHERE customer_id = ? AND session= ? AND status = 0";
$donnees = array(
    $_SESSION['customer_id'],
    $_SESSION['id']
);

try {
    $query = $bdd->prepare($requete);
    $query->execute($donnees);

    if ($resultats = $query->fetch(PDO::FETCH_ASSOC)) {
        $orderId = $resultats['id'];
        $deliveryId  = $resultats['delivery_add_id'];
    }
} catch (PDOException $e) //Si le try ne fonctionne pas alors une erreur query est notifié
{
    if (DEBUG) die('Erreur : ' . $e->getMessage());
}


if ($deliveryId == null) {

    //On ajoute la delivery address
    $requete = 'INSERT INTO DELIVERY_ADDRESSES (firstname,lastname,address,city,country,zipcode,phone,email) VALUES (?,?,?,?,?,?,null,?)';
    $donnees = array(
        $firstname,
        $lastname,
        $address,
        $city,
        $country,
        $zipcode,
        $email,
    );

    try {
        $query = $bdd->prepare($requete);
        $query->execute($donnees);
    } catch (PDOException $e) //Si le try ne fonctionne pas alors une erreur query est notifié
    {
        if (DEBUG) die('Erreur : ' . $e->getMessage());
    }

    //On récupére l'id 
    $requete = 'SELECT LAST_INSERT_ID();';
    $donnees = array();

    try {
        $query = $bdd->prepare($requete);
        $query->execute($donnees);

        if ($resultats = $query->fetch(PDO::FETCH_ASSOC)) {
            $deliveryId  = $resultats["LAST_INSERT_ID()"];
        }

    } catch (PDOException $e) //Si le try ne fonctionne pas alors une erreur query est notifié
    {
        if (DEBUG) die('Erreur : ' . $e->getMessage());
    }

} 

//On update l'order
try {
    $requete = 'UPDATE ORDERS SET status = 2, payment_type= ?, total=?, delivery_add_id=? WHERE customer_id = ? AND session= ? AND status = 0';
    $donnees = array(
        $payment,
        $total,
        $deliveryId,
        $_SESSION['customer_id'],
        $_SESSION['id']
    );
    $query = $bdd->prepare($requete);
    $query->execute($donnees);
} catch (PDOException $e) {
    if (DEBUG) die('Erreur : ' . $e->getMessage());
}
