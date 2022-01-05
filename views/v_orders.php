<?php require_once(PATH_VIEWS . 'header.php'); ?>

<div class="d-flex justify-content-center p-3 bg-white menu">

    <p class="fs-5">ADMIN</p>
    

</div>

<div class="divider"></div>

<div class="m-5">
	
<table class="table table-striped">
	<thead>
		<tr>
			<th class="text-center" scope="col">ORDER ID</th>
			<th class="text-center" scope="col">CUSTOMER ID</th>
			<th class="text-center" scope="col">PAYMENT</th>
			<th class="text-center" scope="col">DATE</th>
			<th class="text-center" scope="col">STATUS</th>
			<th class="text-center" scope="col">TOTAL</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($resultatsOrders as $res) {
		?>
			<tr>
				<td class="text-center"><a href=""><?= $res['id'] ?></a></td>
				<td class="text-center"><?= $res['customer_id'] ?></td>
				<td class="text-center"><?= $res['payment_type'] ?></td>
				<td class="text-center"><?= $res['date'] ?></td>
				<td class="text-center"><?= $res['status'] ?></td>
				<td class="text-center"><?= $res['total'] ?> €</td>
				<td class="text-center"><a class="btn btn-dark" href="index.php?page=order&order_id=<?= $res['id'] ?>">Voir commande</a></td>
			</tr>
		<?php
		}
		?>
	</tbody>
</table>
</div>

<?php require_once(PATH_VIEWS . 'footer.php'); ?>