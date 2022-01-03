<?php require_once(PATH_VIEWS . 'header.php'); ?>

<div class="d-flex justify-content-center p-3 bg-white menu">

    <p class="fs-5">ADMIN</p>
    

</div>

<div class="divider"></div>

<div class="card col-4">
	<div class="card-header">
		<p>Adresse de livraison</p>		
	</div>
	<div class="card-body">
		<div>
			Prénom: <?=$resultatsOrder[0]['firstname']?>
		</div>
		<div>
			Nom:
			<?=$resultatsOrder[0]['lastname']?>
		</div>
		<div>
			Pays:
			<?=$resultatsOrder[0]['country']?>
		</div>
		<div>
			Ville:
			<?=$resultatsOrder[0]['city']?>
		</div>
		<div>
			Code postal:
			<?=$resultatsOrder[0]['zipcode']?>
		</div>
		<div>
			Adresse:
			<?=$resultatsOrder[0]['address']?>
		</div>
		<div>
			N° de téléphone:
			<?=$resultatsOrder[0]['phone']?>
		</div>
		<div>
			E-mail:
			<?=$resultatsOrder[0]['email']?>
		</div>
		<div>
			Mode de livraison:
			<?=$resultatsOrder[0]['delivery_type']?>
		</div>
	</div>
	</table>
</div>

<div class="content d-flex flex-column">
	<table id="item">
		<thead>
			<tr>
				<th>Article</th>
				<th class="text-center ">Quantité</th>
				<th class="text-center ">Sous-total</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($resultatsOrder as $item) { ?>
				<tr>
					<td class="d-flex grey-border article-checkout">
						<img class="imageItemCheckout" src="<?= PATH_IMAGES . $item['image'] ?>" alt="<?= $item['name'] ?>">
						<div class="mt-4">
							<p><b>Id: <?= $item['prodId']?></b></p>
							<p><b><?= $item['name'] ?></b></p>
							<p><?= $item['price'] ?>€</p>
						</div>

					</td>
					<td class="grey-border text-center"><?= $item['quantity'] ?></td>
					<td class="grey-border text-center"><?= $item['quantity'] * $item['price'] ?> €</td>
				</tr>
				<?php } ?>
				<tr class="grey-border">
                    <td class="d-flex justify-content-center"><a class="btn btn-success m-2 " href="">Valider la commande</a></td>
					<td class="d-flex justify-content-center"><a class="btn btn-secondary m-2 " href="http://localhost/web-shop/index.php?page=orders">Retour à la liste des commandes</a></td>
                    <td>
                        <p class=" fw-bolder fs-5"> TOTAL</p>
                    </td>
                    <td>
                        <p class="text-center fw-bolder fs-5"> <?= $resultatsOrder[0]['total'] ?>€ </p>
                    </td>
                </tr>
		</tbody>
	</table>
</div>

<?php require_once(PATH_VIEWS . 'footer.php'); ?>