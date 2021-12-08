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

//Etape 1 : récupérer l'id de la commande
$requete = 'SELECT * FROM orders  WHERE customer_id = ? AND session = ? AND status = 0';
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

//Etape 2: créer une order si celle-ci n'existe pas
if (!isset($order_id)) {
    $date = new DateTime();
    $dateString = date_format($date, 'Y-m-d');

    $requete = 'INSERT INTO ORDERS (customer_id, registered, delivery_add_id, payment_type, date, status, session ,total) VALUES (?,1,null,null, ? ,0, ?,0)';
    $donnees = array(
        $_SESSION['customer_id'],
        $dateString,
        $_SESSION['id'],
    );

    try {
        $query = $bdd->prepare($requete);
        $query->execute($donnees);
    } catch (PDOException $e) {
        if (DEBUG) die('Erreur : ' . $e->getMessage());
    }

    //Etape 3 : récupérer order_id
    $requete = 'SELECT id FROM orders  WHERE customer_id = ? AND session= ? AND status = 0';
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
}

//Etape 4 : on vérifie si on a déja cet article dans le panier
$requete = 'SELECT quantity FROM ORDERITEMS WHERE order_id = ? AND product_id = ?';
$donnees = array(
    $order_id,
    $productId,
);

try {
    $query = $bdd->prepare($requete);
    $query->execute($donnees);
    if ($resultats = $query->fetch(PDO::FETCH_ASSOC)) { // Si on a un résultat
        $quantity += $resultats['quantity'];
        //On modifie l'ancienne quantité du produit par la nouvelle
        $requete = 'UPDATE ORDERITEMS SET quantity = ?  WHERE order_id = ? AND product_id = ?';
        $donnees = array(
            $quantity,
            $order_id,
            $productId,
        );
        $query = $bdd->prepare($requete);
        $query->execute($donnees);
        return;
    }

} catch (PDOException $e) {
    if (DEBUG) die('Erreur : ' . $e->getMessage());
}


//Etape 4 : sinon ajouter des items à la commande
$requete = 'INSERT INTO ORDERITEMS (order_id, product_id, quantity) VALUES (?,?,?)';
$donnees = array(
    $order_id,
    $productId,
    $quantity
);

try {
    $query = $bdd->prepare($requete);
    $query->execute($donnees);
} catch (PDOException $e) {
    if (DEBUG) die('Erreur : ' . $e->getMessage());
}
