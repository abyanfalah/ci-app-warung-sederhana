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
						<div class="row">
								Transaksi:&nbsp;<strong><div id="viewIdTransaksi"></div></strong>
						</div>
						<div class="row">
							Pelanggan:&nbsp;<strong><div id="viewNamaPelanggan"></div></strong>
						</div>
						<div class="row">
							Kasir:&nbsp;<strong><div id="viewNamaKasir"></div></strong>
						</div>
					</div>
					<div class="col text-right">
						<button class="btn btn-danger" data-dismiss="modal">Tutup</button>		
					</div>
				</div>
				
				
				<table class="table table-borderless table-striped">
					<thead>
						<tr>
							<th class="col-1">#</th>
							<th class="col-2">ID</th>
							<th class="col-2">Nama</th>
							<th class="col-2">harga</th>
							<th class="col-1">qty</th>
							<th class="col-2">subtotal</th>
						</tr>
					</thead>

					<tbody id="tableDetailTransaksi">
						<!-- data di generate dengan js -->
					</tbody>
						<tr class="bg-primary text-white">
							<td colspan="5"><strong>Total:</strong></td>
							<td class="text-right">Rp&nbsp;<strong id="viewGrandTotal"></strong></td>
						</tr>
				</table>
			</div>
		</div>
	</div>
</div>			

<script type="text/javascript" src="<?php echo base_url("assets/script/transaksi.js") ?>"></script>