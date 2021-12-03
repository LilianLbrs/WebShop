<?php

// accès base de données
  // connection à la base de données
  try
  {
	$bdd = new PDO('mysql:host='.BD_HOST.'; dbname='.BD_DBNAME.'; charset=utf8', BD_USER, BD_PWD);
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e)
  { 
        if(DEBUG)
                die ('Erreur : '.$e->getMessage());
	$alert = 'connexion à la base de données';
  }



  	//Etape 1 : 
	$requete = "SELECT p.* FROM PRODUCTS p INNER JOIN CATEGORIES c ON (p.cat_id=c.id) WHERE c.id = ?";
	$donnees = array(
				$categoryId,
				);
  	
	try 
	{
		$query = $bdd->prepare($requete);
		$query->execute($donnees);
		
		$resultatsProducts = $query->fetchAll();
	}
	catch(PDOException $e) //Si le try ne fonctionne pas alors une erreur query est notifié
	{
        if(DEBUG)die ('Erreur : '.$e->getMessage());
		
	}