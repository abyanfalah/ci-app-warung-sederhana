 <h3>Edit informasi barang <?php echo $barang->id; ?></h3>

 <div class="row">
	<div class="col-8 mx-auto">
	<form id="formUpdateBarang" method="post">
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Nama</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="nama" value="<?php echo $barang->nama; ?>">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Jenis</label>
			<div class="col-sm-4">
				<select class="form-control" name="jenis">
					<?php $counter = 1;
					foreach($jenis as $jb): ?>
						<option 
						value="<?php echo $jb->id ?>"
						<?php echo ($barang->jenis == $jb->id ? "selected" : "") ?>
						>
							<?php echo ucwords($jb->nama); ?>	
						</option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Harga</label>
			<div class="col-sm-4">
				<input type="number" class="form-control" name="harga" min="0" value="<?php echo $barang->harga; ?>">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Satuan</label>
			<div class="col-sm-4">
				<select class="form-control" name="satuan">
				<?php foreach($satuan as $s): ?>
					<option 
					value="<?php echo $s->nama ?>"
					<?php echo ($barang->satuan == $s->nama ? "selected" : "") ?>
					>
						<?php  echo ($s->nama) ?></option>
				<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="alert alert-danger" id="fieldAlert" style="display: none;">
			Semua kolom harus diisi!
			<button data-dismiss="alert" class="close">&times;</button>
		</div>

		<button class="btn btn-primary" id="btnSave">Simpan</button>

	</form>
		
	</div>
 </div>

<script type="text/javascript" src="<?php echo base_url('assets/script/barang_update.js') ?>"></script>
