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

$requete = "UPDATE orderitems SET quantity=quantity-1 WHERE product_id = ? AND order_id = (SELECT id FROM orders WHERE customer_id = ? AND session= ? AND status = 0)";
$donnees = array(
	$productId,
	$_SESSION['customer_id'],
	$_SESSION['id']
);

try {
	$query = $bdd->prepare($requete);
	$query->execute($donnees);

	
} catch (PDOException $e) //Si le try ne fonctionne pas alors une erreur query est notifié
{
	if (DEBUG) die('Erreur : ' . $e->getMessage());
}