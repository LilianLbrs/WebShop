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


$requete = "SELECT * FROM products p INNER JOIN categories c ON (p.cat_id = c.id) WHERE p.id IN (SELECT min(id) FROM products GROUP BY cat_id) ORDER BY p.cat_id";
$donnees = array();


try {
	$query = $bdd->prepare($requete);
	$query->execute($donnees);

	$resultatsProductHome = $query->fetchAll();
} catch (PDOException $e) //Si le try ne fonctionne pas alors une erreur query est notifié
{
	if (DEBUG) die('Erreur : ' . $e->getMessage());
}
