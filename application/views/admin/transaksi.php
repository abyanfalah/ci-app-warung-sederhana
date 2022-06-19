<!-- <h3>Transaksi</h3> -->
<div class="card mt-3">
	<div class="card-body">
		<table class="table table-borderless table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>ID</th>
					<th>Total</th>
					<th>Kasir</th>
					<th>Pelanggan</th>
				</tr>
			</thead>

			<tbody id="tableTransaksi">
				<?php 
					$counter = 1;
					foreach($transaksi as $t):
				 ?>
				 		<tr>
				 			<td><?php echo $counter++; ?></td>
				 			<td><?php echo $t->id; ?></td>
				 			<td>Rp <?php echo number_format($t->total); ?></td>
				 			<td><?php echo ucwords($t->user);?></td>
				 			<td><?php echo $t->pelanggan?></td>
				 			<td>
				 				<button 
				 				class="btn btn-warning btnShowDetail"
				 				data-id="<?php echo $t->id; ?>"
				 				>
				 					<i class="fas fa-eye"></i>
				 				</button>
				 			</td>
				 		</tr>

				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<!-- modal view -->
<div class="modal fade" id="modalView">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content p-3">
			<div class="modal-body">
				<div class="row">
					<div class="col">
						<h5>Detail transaksi: <?php echo date("Ymd"); ?></h5>		
					</div>
					<div class="col text-right">
						<button class="btn btn-danger" data-dismiss="modal">Tutup</button>		
					</div>
				</div>
				
				
				<table class="table table-borderless">
					<thead>
						<tr>
							<th>#</th>
							<th>ID</th>
							<th>harga</th>
							<th>qty</th>
							<th>subtotal</th>
						</tr>
					</thead>

					<tbody id="tableDetailTransaksi">

						<tr class="bg-primary text-white">
							<td colspan="4"><strong>Total:</strong></td>
							<td><strong>15.000</strong></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>			

<script type="text/javascript" src="<?php echo base_url("assets/script/transaksi.js") ?>"></script>