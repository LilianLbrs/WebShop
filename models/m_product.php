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



//Etape 1 : On récupère les infos du produit
$requete = "SELECT * FROM products WHERE id = ?";
$donnees = array(
	$productId,
);

try {
	$query = $bdd->prepare($requete);
	$query->execute($donnees);

	if(!($resultProduct = $query->fetch(PDO::FETCH_ASSOC))){
		//Redirection vers la page 404
		header("Location: ./index.php?page=404");
	}
	
} catch (PDOException $e) //Si le try ne fonctionne pas alors une erreur query est notifié
{
	if (DEBUG) die('Erreur : ' . $e->getMessage());
}

//Etape 2 : On récupère les avis du produit
$requete = "SELECT * FROM reviews WHERE id_product = ?";
$donnees = array(
	$productId,
);

try {
	$query = $bdd->prepare($requete);
	$query->execute($donnees);

	$reviewProduct = $query->fetchAll();

	
} catch (PDOException $e) //Si le try ne fonctionne pas alors une erreur query est notifié
{
	if (DEBUG) die('Erreur : ' . $e->getMessage());
}