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

//On ajoute la delivery address
$requete = 'INSERT INTO DELIVERY_ADDRESSES (forename,surname,add1,add2,add3,postcode,phone,email) VALUES ';
$donnees = array(
    $_SESSION['customer_id'],
    $_SESSION['id'],
);

try {
    $query = $bdd->prepare($requete);
    $query->execute($donnees);

    if ($resultats = $query->fetch(PDO::FETCH_ASSOC)) {
        $order_id = $resultats['id'];
    }
} catch (PDOException $e) //Si le try ne fonctionne pas alors une erreur query est notifié
{
    if (DEBUG) die('Erreur : ' . $e->getMessage());
}

//On passe le status de la commande à 2
try {
    $requete = 'UPDATE ORDERS SET status = 2 WHERE customer_id = ? AND session= ? AND status = 0)';
    $donnees = array(
        $_SESSION['customer_id'],
        $_SESSION['id']
    );
    $query = $bdd->prepare($requete);
    $query->execute($donnees);
} catch (PDOException $e) {
    if (DEBUG) die('Erreur : ' . $e->getMessage());
}

