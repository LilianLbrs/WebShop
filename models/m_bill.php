<?php
require('assets/lib/fpdf/fpdf.php');

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

//On récupère l'order
$requete = "SELECT id, delivery_add_id, payment_type, date, total, delivery_type FROM orders WHERE customer_id = ? AND session= ? AND status = 2";
$donnees = array(
    $_SESSION['customer_id'],
    $sessionId
);

try {
    $query = $bdd->prepare($requete);
    $query->execute($donnees);

    if ($resultats = $query->fetch(PDO::FETCH_ASSOC)) {
        $orderId = $resultats['id'];
        $deliveryId  = $resultats['delivery_add_id'];
		$payment  = $resultats['payment_type'];
		$orderDate = $resultats['date'];
		$orderPrice = $resultats['total'];
		$deliveryType = $resultats['delivery_type'];
		$deliveryPrice = 0;
		if($deliveryType == "express") $deliveryPrice = 5;
    }
} catch (PDOException $e) //Si le try ne fonctionne pas alors une erreur query est notifié
{
    if (DEBUG) die('Erreur : ' . $e->getMessage());
}

//On récupère l'adresse de livraison
$requete = "SELECT firstname, lastname, address, country, city, zipcode, phone  FROM delivery_addresses WHERE id = ?";
$donnees = array(
    $deliveryId,
);

try {
    $query = $bdd->prepare($requete);
    $query->execute($donnees);

    if ($resultats = $query->fetch(PDO::FETCH_ASSOC)) {
        $firstname = $resultats['firstname'];
        $lastname  = $resultats['lastname'];
		$address  = $resultats['address'];
		$country  = $resultats['country'];
		$city  = $resultats['city'];
		$zipcode  = $resultats['zipcode'];
		$phone  = $resultats['phone'];
    }
} catch (PDOException $e) //Si le try ne fonctionne pas alors une erreur query est notifié
{
    if (DEBUG) die('Erreur : ' . $e->getMessage());
}

//On récupère le contenu de la commande
$requete = "SELECT P.name, P.price, O.quantity FROM products P JOIN orderitems O ON (P.id = O.product_id) WHERE O.order_id = ?";
$donnees = array(
	$orderId
);

try {
	$query = $bdd->prepare($requete);
	$query->execute($donnees);

	$resultatsItems = $query->fetchAll();
} catch (PDOException $e) //Si le try ne fonctionne pas alors une erreur query est notifié
{
	if (DEBUG) die('Erreur : ' . $e->getMessage());
}


//On édite la facture
$pdf = new FPDF();
$pdf->SetTitle("Facture_ISI");
$pdf->AddPage();
$pw = $pdf->GetPageWidth();

// Police Arial gras 12
$pdf->SetFont('Arial','B',12);
// Logo
$pdf->Image(PATH_IMAGES.'/logo.jpg',6,6,30);

// Nom entreprise
$pdf->Cell($pw-15,7,'ISI Web-Shop',0,1,'R');

// Date
// Police Arial 12
$pdf->SetFont('Arial','',12);
$pdf->Cell($pw-15,7,date("d/m/y"),0,1,'R');

// Num facture
$pdf->Cell($pw-15,7,utf8_decode('Facture n°').$orderId,0,1,'R');

$pdf->ln(20);
$pdf->Cell(10);
$pdf->SetFillColor(200,200,200);
//premiere ligne
$pdf->Cell(($pw-40)/3,10,utf8_decode("Numéro de commande"),1,0,'C',1);
$pdf->Cell(($pw-40)/3,10,"Date de commande",1,0,'C',1);
$pdf->Cell(($pw-40)/3,10,"Mode de payment",1,1,'C',1);
//Deuxieme ligne
$pdf->Cell(10);
$pdf->Cell(($pw-40)/3,10,$orderId,1,0,'C');
$pdf->Cell(($pw-40)/3,10,$orderDate,1,0,'C');
$pdf->Cell(($pw-40)/3,10,$payment,1,1,'C');
$pdf->ln(20);

//Contenu de la commande
$pdf->cell(10);
$pdf->cell(($pw-40)/2,10,utf8_decode("Produits à livrer"),1,0,'C',1);
$pdf->cell(($pw-40)/6,10,utf8_decode("Prix individuel"),1,0,'C',1);
$pdf->cell(($pw-40)/6,10,utf8_decode("Quantité"),1,0,'C',1);
$pdf->cell(($pw-40)/6,10,utf8_decode("Total ($)"),1,1,'C',1);
//Détail des produits
$line = 0;
foreach ($resultatsItems as $product) {
	if($line%2 == 0) $pdf->SetFillColor(255,255,255);
	else $pdf->SetFillColor(240,240,240);
	$pdf->cell(10);
	$pdf->cell(($pw-40)/2,10,utf8_decode($product['name']),1,0,'C',1);
	$pdf->cell(($pw-40)/6,10,utf8_decode($product['price']),1,0,'C',1);
	$pdf->cell(($pw-40)/6,10,utf8_decode($product['quantity']),1,0,'C',1);
	$pdf->cell(($pw-40)/6,10,$product['quantity'] * $product['price'],1,1,'C',1);
	$line++;
}
$pdf->ln(20);

$y = $pdf->GetY();
//Adresse de livraison
$pdf->SetFillColor(200,200,200);
$pdf->Cell(($pw-40)/3,10,"Adresse de livraison",1,1,'C',1);
$pdf->Cell(($pw-40)/3,5,"",'LR',1);
//Nom prénom
$pdf->Cell(($pw-40)/3,5,utf8_decode($firstname.' '.$lastname),'LR',1);
//Adresse
$pdf->MultiCell(($pw-40)/3,5,utf8_decode($address),'LR',0);
//Zipcode
$pdf->Cell(($pw-40)/3,5,utf8_decode($zipcode),'LR',1);
//Ville
$pdf->Cell(($pw-40)/3,5,utf8_decode($city),'LR',1);
//Pays	
$pdf->Cell(($pw-40)/3,5,utf8_decode($country),'LBR',1);

//Total commande
$pdf->SetY($y);
//prix des produits
$totalProducts = $orderPrice - $deliveryPrice;
$pdf->SetX($pw-30-($pw-40)/3);
$pdf->Cell(($pw-40)/3,10,"Total produits:",1,0,'R',1);
$pdf->Cell(20,10,$totalProducts." $",1,1,'L');
//prix de la livraison
$pdf->SetX($pw-30-($pw-40)/3);
$pdf->Cell(($pw-40)/3,10,utf8_decode("Frais d'expédition:"),1,0,'R',1);
$pdf->Cell(20,10,$deliveryPrice." $",1,1,'L');
//Total
$pdf->SetX($pw-30-($pw-40)/3);

$pdf->Cell(($pw-40)/3,10,utf8_decode("Total:"),1,0,'R',1);
$pdf->Cell(20,10,$orderPrice." $",1,1,'L');







$pdf->Output();