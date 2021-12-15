<?php require_once(PATH_VIEWS . 'header.php'); ?>
<table class="table">
	<thead>
		<tr>
			<th scope="col">order id</th>
			<th scope="col">customer id</th>
			<th scope="col">registered</th>
			<th scope="col">delivery address id</th>
			<th scope="col">payment type</th>
			<th scope="col">date</th>
			<th scope="col">status</th>
			<th scope="col">session</th>
			<th scope="col">total</th>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach ($resultatsOrders as $res) {
				?>
				<tr>
					<td><?= $res['id']?></td>
					<td><?= $res['customer_id']?></td>
					<td><?= $res['registered']?></td>
					<td><?= $res['delivery_add_id']?></td>
					<td><?= $res['payment_type']?></td>
					<td><?= $res['date']?></td>
					<td><?= $res['status']?></td>
					<td><?= $res['session']?></td>
					<td><?= $res['total']?></td>
				</tr>
				<?php
			} 
		?>
	</tbody>
</table>
<?php require_once(PATH_VIEWS . 'footer.php'); ?>