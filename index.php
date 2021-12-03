<?php
session_start();

if(!isset($_SESSION['Id'])){
	$_SESSION['Id'] = uniqid();
	$_SESSION['admin'] = false;
	$_SESSION['connected'] = false;
}

require_once ('./config/configuration.php');

if(isset($_GET['page']))
{
	$page = htmlspecialchars($_GET['page']); 
	if(!is_file(PATH_CONTROLLERS.$_GET['page'].".php"))
	{ 
	$page = "404"; //page demandée inexistante
	}
}
else
$page="home"; //page d'accueil du site


require_once(PATH_CONTROLLERS.$page.'.php');
?>