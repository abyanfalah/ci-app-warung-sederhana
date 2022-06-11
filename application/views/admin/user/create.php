<!-- <div class="row">
	<div class="col-6 mx-auto">
		<div class="card">
			<div class="card-header">
				<h3>Registrasi user baru</h3>

			</div>
			<div class="card-body">
				<form action="api/user" method="post">
					<input type="text" class="form-control " placeholder="name" name="name">
				</form>
			</div>
		</div>
	</div>
</div>
 -->

 <h3>Registrasi user baru</h3>

 <div class="row">
	<div class="col-8 mx-auto">
	<form id="formCreateUser" method="post" action="<?php echo base_url('api/user') ?>">
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Nama</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="nama">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Alamat</label>
			<div class="col-sm-10">
				<textarea name="alamat" class="form-control" id="" cols="30" rows="5"></textarea>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Tanggal lahir</label>
			<div class="col-sm-4">
				<input type="date" class="form-control" name="lahir">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Username</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="username">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Password</label>
			<div class="col-sm-4">
				<input type="password" class="form-control" name="password">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Ketik ulang password</label>
			<div class="col-sm-4">
				<input type="password" class="form-control " name="password_confirm">
			</div>
			<div class="col-sm-4 col-form-label text-danger" id="passwordConfirmationMessage" style="display: none;">
				Password tidak cocok!
			</div>
		</div>


		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Jenis akses</label>
			<div class="col-sm-4">
				<select class="form-control" name="akses">
				<?php foreach($access as $a): ?>
					<option value="<?php echo $a->id ?>"><?php  echo ucfirst($a->nama) ?></option>
				<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="alert alert-danger" id="fieldAlert" style="display: none;">Semua kolom harus diisi!</div>

		<button class="btn btn-primary" id="btnSave">Simpan</button>

	</form>
		
	</div>
 </div>

<script type="text/javascript" src="<?php echo base_url('assets/script/user_create.js') ?>"></script>
