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
	$requete = "SELECT * FROM logins WHERE username = ? and password = ? ";
	$donnees = array(
				$username,
				sha1($password),
				);
  	
  	
	try 
	{
		$query = $bdd->prepare($requete);
		$query->execute($donnees);
		
		if($resultats = $query->fetch(PDO::FETCH_ASSOC)){
			$_SESSION['customer_id'] = $resultats['customer_id'];
			$_SESSION['name'] = $username;
			$_SESSION['admin'] = false;
			$_SESSION['connected'] = true;
			
			//On regarde si on a déja un panier
			echo $_SESSION['customer_id'];
			$requete = 'SELECT id FROM orders  WHERE customer_id = ? AND session = ? AND status = 0';
			$donnees = array(
				$_SESSION['customer_id'],
				$_SESSION['id'],
			);
			$query = $bdd->prepare($requete);
			$query->execute($donnees);
			
			if ($resultats = $query->fetch(PDO::FETCH_ASSOC)) { //On fusionne le panier temporaire et le panier de client
				$requete = "UPDATE orderitems SET order_id = ? WHERE order_id = (SELECT id FROM orders WHERE session = ? AND customer_id = 0)";
				$donnees = array(
					$resultats['id'],
					$_SESSION['id'],
				);
			
				$query = $bdd->prepare($requete);
				$query->execute($donnees);
				
				$requete = "DELETE FROM orders WHERE order_id = (SELECT id FROM orders WHERE session = ? AND customer_id = 0)";
				$donnees = array(
					$_SESSION['id'],
				);
			}
			else { //On passe le panier temporaire en panier de client
				$requete = "UPDATE orders SET customer_id = ? WHERE customer_id=0 AND status=0 AND session = ?";
				$donnees = array(
					$_SESSION['customer_id'],
					$_SESSION['id'],
				);
				
				$query = $bdd->prepare($requete);
				$query->execute($donnees);
			}
			
			header('Location: index.php?page=home');
		}
		
	}
	
	catch(PDOException $e) //Si le try ne fonctionne pas alors une erreur query est notifié
	{
		if(DEBUG)die ('Erreur : '.$e->getMessage());
		
	}
	