<?php 

if ($_SESSION['admin']) {
	//appel du modèle
	$orderId = htmlspecialchars($_GET['id']);
	require_once(PATH_MODELS.$page.'.php');
	header("Location: ./index.php?page=order&order_id=$orderId");
} else {
	//Redirection vers 404
	header("Location: ./index.php?page=404");
}