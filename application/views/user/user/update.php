 <div class="row">
	<div class="col-8 mx-auto">
	<form id="formUpdateUser" method="post">
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Nama</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="nama" value="<?php echo $user->nama; ?>">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Alamat</label>
			<div class="col-sm-10">
				<textarea name="alamat" class="form-control" id="" cols="0" rows="5"><?php echo $user->alamat; ?></textarea>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Tanggal lahir</label>
			<div class="col-sm-4">
				<input type="date" class="form-control" name="lahir"  value="<?php echo $user->lahir; ?>">
			</div>
		</div>

		<!-- <div class="form-group row">
			<label class="col-sm-2 col-form-label">Username</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="username"  value="<?php echo $user->username; ?>">
			</div>
		</div>
 -->
		<!-- <div class="form-group row">
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
		</div> -->


		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Jenis akses</label>
			<div class="col-sm-4">
				<select class="form-control" name="akses">
				<?php foreach($access as $a): ?>
					<option 
					value="<?php echo $a->id ?>" 
					<?php echo($a->id == $user->id_akses ? "selected" : "")  ?> 
					>
						<?php  echo ucfirst($a->nama) ?>		
					</option>
				<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-2"></div>
			<div class="col-sm-4">
				<a class="d-block my-3" href="<?php echo base_url('user/change_username_password') ?>">Change Username / Password</a>
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

<script type="text/javascript" src="<?php echo base_url('assets/script/user_update.js') ?>"></script>
