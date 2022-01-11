<?php 

if (isset($_GET['product']) && isset($_POST['name']) && isset($_POST['stars']) && isset($_POST['title']) && isset($_POST['review'])) {
	//appel du modèle
	$productId = htmlspecialchars($_GET['product']);
	$name = htmlspecialchars($_POST['name']);
	$stars = htmlspecialchars($_POST['stars']);
	$title = htmlspecialchars($_POST['title']);
	$review = htmlspecialchars($_POST['review']);
	require_once(PATH_MODELS.$page.'.php');
	header("Location: ./index.php?page=product&product=$productId");
} else {
	//Redirection vers 404
	header("Location: ./index.php?page=404");
}