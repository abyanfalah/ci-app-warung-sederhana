<!-- <h3>Transaksi baru</h3> -->
<div class="row">
	<!-- col barang -->
	<div class="col">
		<div class="">
			<div class="card">
				<div class="card-body">
					<table class="table table-borderless table-striped">
					<thead>
						<tr>
							<h5 class="mt-3 bg-primary text-white text-center rounded  p-2">Barang</h5>
							<input type="text" placeholder="ketik disini untuk mencari" class="form-control">
						</tr>
						<tr>
							<th>#</th>
							<th>ID</th>
							<th>Nama</th>
							<th>Jenis</th>
							<th>Harga (Rp)</th>
							<th>Satuan</th>
							<th>Stok</th>
						</tr>
					</thead>

					<tbody>
						<?php $counter = 1;
						 foreach ($barang as $b):?>
							<tr>
								<td><?php echo $counter++; ?></td>
								<td><?php echo $b->id; ?></td>
								<td class="col-2"><?php echo ucwords($b->nama); ?></td>
								<td><?php echo ucwords($b->jenis); ?></td>
								<td class="col-1"><?php echo $b->harga; ?></td>
								<td><?php echo $b->satuan; ?></td>
								<td id="<?php echo $b->id."-stok" ?>"><?php echo $b->stok; ?></td>
								<td class="col-2 text-center">
									<button
									class="btn btn-sm btn-primary btnAddItem"
									data-id="<?php echo $b->id; ?>"
									data-nama="<?php echo ucwords($b->nama); ?>"
									data-harga="<?php echo $b->harga; ?>"

									>
										<strong>&plus;</strong>
									</button>
								</td>
							</tr>

						<?php endforeach; ?>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>

	<!-- col keranjang -->
	<div class="col-5">
		<div class="h-75 ">
			<div class=" h-75">
				<div class="card bg-primary shadow text-white">
					<div class="card-body">
						<button id="btnCheckout" class="ml-auto btn btn-secondary" disabled data-toggle="modal" data-target="#modalCheckout">Checkout</button>
						<table class="table table-borderless">
							<thead class="text-white">
								<tr>
									<div class="mt-3 bg-white text-primary text-center rounded  p-2">
											Keranjang
										</div>

									</div>
								</tr>
								<tr>
									<th class="col-1">#</th>
									<th>ID</th>
									<th>Nama</th>
									<th>Harga (Rp)</th>
									<th class="text-center">QTY</th>
								</tr>
							</thead>

							<tbody id="shoppingCart">
								<!-- data keranjang ditambah via transaksi_create.js -->
							</tbody>

						</table>
					</div>
				</div>
			</div>
		</div>

	</div>

<!-- modal checkout -->
<div id="modalCheckout" class="modal fade" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row">
					<div class="col">
						<h3>Detail transaksi</h3>
					</div>
					<div class="col text-right">
						<button data-dismiss="modal" class="btn btn-danger">Batal</button>		
					</div>
				</div>				
				<table class="table table-striped">
								<thead>
									<tr>
										<th class="col-1">#</th>
										<th>ID</th>
										<th>Nama</th>
										<th>Harga (Rp)</th>
										<th>QTY</th>
										<th>Subtotal</th>
									</tr>
								</thead>

								<tbody id="tableDetailTransaksi">
									<!-- diisi dengan js -->
								</tbody>
								<tr>
									<td colspan="5" class="text-right">Grand Total</td>
									<td class="bg-primary text-white text-right" id="grandTotal">
										
									</td>
								</tr>
					</table>

					<button id="btnProceedCheckout" class="btn btn-success">
						Bayar
					</button>
			</div>			
		</div>

	</div>
</div>


<script type="text/javascript" src="<?php echo base_url('assets/script/transaksi_create.js') ?>"></script>