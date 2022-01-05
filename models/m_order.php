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

$requete = "SELECT P.id AS prodId, odd.delivery_type, P.name, P.price, P.image, O.quantity, odd.total, odd.id AS orderId, odd.status, D.* FROM products P JOIN orderitems O ON (P.id = O.product_id) JOIN orders odd ON (O.order_id = odd.id) JOIN delivery_addresses D ON (odd.delivery_add_id = D.id)  WHERE O.order_id = ?";
$donnees = array(
	$orderId
);

try {
	$query = $bdd->prepare($requete);
	$query->execute($donnees);

	$resultatsOrder = $query->fetchAll();
} catch (PDOException $e) //Si le try ne fonctionne pas alors une erreur query est notifié
{
	if (DEBUG) die('Erreur : ' . $e->getMessage());
}