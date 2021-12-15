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

//Etape 1 : vérifier que l'on a pas déja un client avec la meme adresse mail
$requete = 'SELECT id FROM customers WHERE email LIKE ?';
$donnees = array(
    $mail,
);
try {
    $query = $bdd->prepare($requete);
    $query->execute($donnees);

    if ($resultats = $query->fetch(PDO::FETCH_ASSOC)) {
        header('Location: index.php?page=createAccount&mail=exists');
        return;
    }
} catch (PDOException $e) //Si le try ne fonctionne pas alors une erreur query est notifié
{
    if (DEBUG) die('Erreur : ' . $e->getMessage());
}

//Etape 2 : sinon, ajouter le client dans la bdd customers
$requete = 'INSERT INTO customers (firstname, lastname, address, city, country ,zipcode, phone, email,registered) VALUES (?,?,?,?,?,?,?,?,1)';
$donnees = array(
    $firstName,
    $lastName,
    $adress,
    $city,
    $country,
    $zipcode,
    $phoneNum,
    $mail,
);


try {
    $query = $bdd->prepare($requete);
    $query->execute($donnees);

    echo ('Compte client créé avec succès !');
} catch (PDOException $e) //Si le try ne fonctionne pas alors une erreur query est notifié
{
    if (DEBUG) die('Erreur : ' . $e->getMessage());
}

//Etape 3 : récupérer customer_id
$requete = 'SELECT id FROM customers WHERE email LIKE ?';
$donnees = array(
    $mail,
);

try {
    $query = $bdd->prepare($requete);
    $query->execute($donnees);

    if ($resultats = $query->fetch(PDO::FETCH_ASSOC)) {
        $customer_id = $resultats['id'];
    }
} catch (PDOException $e) //Si le try ne fonctionne pas alors une erreur query est notifié
{
    if (DEBUG) die('Erreur : ' . $e->getMessage());
}


//Etape 4 : ajouter le client dans la bdd logins
$requete = 'INSERT INTO logins (customer_id, username, password) VALUES (?,?,?)';
$donnees = array(
    $customer_id,
    $username,
    sha1($password),
);


try {
    $query = $bdd->prepare($requete);
    $query->execute($donnees);

    header('Location: index.php?page=account&creation=success');
} catch (PDOException $e) //Si le try ne fonctionne pas alors une erreur query est notifié
{
    if (DEBUG) die('Erreur : ' . $e->getMessage());
}
