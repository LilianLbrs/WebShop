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

$requete = "SELECT P.name, P.price, P.image, O.quantity FROM products P JOIN orderitems O ON (P.id = O.product_id) WHERE O.order_id = (SELECT id FROM orders WHERE customer_id = ? AND session= ? AND status = 0)";
$donnees = array(
	$_SESSION['customer_id'],
	$_SESSION['id']
);

try {
	$query = $bdd->prepare($requete);
	$query->execute($donnees);

	$resultatsItems = $query->fetchAll();
	$total = 0;
	foreach ($resultatsItems as $item) {
		$total += $item['price'] * $item['quantity'];
	}
} catch (PDOException $e) //Si le try ne fonctionne pas alors une erreur query est notifié
{
	if (DEBUG) die('Erreur : ' . $e->getMessage());
}
