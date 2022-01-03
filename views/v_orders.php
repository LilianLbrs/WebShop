<?php require_once(PATH_VIEWS . 'header.php'); ?>

<div class="d-flex justify-content-center p-3 bg-white menu">

    <p class="fs-5">ADMIN</p>
    

</div>

<div class="divider"></div>

<table class="table">
	<thead>
		<tr>
			<th scope="col">order id</th>
			<th scope="col">customer id</th>
			<th scope="col">payment type</th>
			<th scope="col">date</th>
			<th scope="col">status</th>
			<th scope="col">total</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($resultatsOrders as $res) {
		?>
			<tr>
				<td><a href=""><?= $res['id'] ?></a></td>
				<td><?= $res['customer_id'] ?></td>
				<td><?= $res['payment_type'] ?></td>
				<td><?= $res['date'] ?></td>
				<td><?= $res['status'] ?></td>
				<td><?= $res['total'] ?> €</td>
				<td><a class="btn btn-primary" href="index.php?page=order&order_id=<?= $res['id'] ?>">Voir commande</a></td>
				<td><a class="btn btn-secondary" href="" >Valider commande</a></td>
			</tr>
		<?php
		}
		?>
	</tbody>
</table>
<?php require_once(PATH_VIEWS . 'footer.php'); ?>