</div>
<footer>
	<div class="divider "></div>
	<div class="ms-5 me-5 mt-4">

		<div class="d-flex">
			<div class="d-flex flex-column me-5">
				<p class="fs-5 fw-bolder mb-1">AIDE</p>
				<a href="">FAQ</a>
				<a href="">Information de Livraison</a>
				<a href="">Politique des Retours</a>
				<a href="">Effectuer un retour</a>
				<a href="">Commande</a>
				<a href="">Signaler une imitation</a>
			</div>
			<div class="d-flex flex-column me-5">
				<p class="fs-5 fw-bolder mb-1">MON COMPTE</p>
				<a href="index.php?page=account">Connexion</a>
				<a href="index.php?page=createAccount">S'inscrire</a>
			</div>
			<div class="d-flex flex-column">
				<p class="fs-5 fw-bolder mb-1">PAGES</p>
				<a href="index.php?page=home">Accueil</a>
				<a href="index.php?page=cart">Panier</a>
				<?php foreach ($resultatsCategories as $categorie) { ?>
					<a href="<?= 'index.php?page=products&category=' . $categorie['id'] ?>"> <?= ucfirst($categorie['name']) ?> </a>
				<?php
				} ?>
			</div>

		</div>
		<div class="d-flex justify-content-between mt-5 mb-4">
			<img src="<?= PATH_IMAGES . "creditCard.png" ?>" alt="">
			<img src="<?= PATH_IMAGES . "network.png" ?>" alt="">
		</div>
	</div>
	<div class="divider mt-2 mb-3 "></div>
	<div class="d-flex justify-content-between ms-5 me-5 mt-2 pb-3">
		<p>©2021 | ISIWEB4SHOP | Tous droits réservés | Eat more</p>
		<div>
			<a class="me-2" href="">Conditions Générales</a>
			<a class="me-2" href="">Politique de Confidentialité</a>
			<a href="">Politique des cookies</a>
		</div>
	</div>
</footer>

</body>

</html>