<?php $counter = 1;
	foreach ($pelanggan as $p):?>
		<tr>
			<td><?php echo $counter++; ?></td>
			<td><?php echo ucwords($p->nama); ?></td>
			<td><?php echo $p->telpon; ?></td>
			<td><?php echo ucwords($p->alamat); ?></td>
			<td class="col-2 text-center">

				<!-- button edit -->
				<button
				data-nama="<?php echo $p->nama; ?>"
				data-telpon="<?php echo $p->telpon; ?>"
				data-alamat="<?php echo $p->alamat; ?>"
				class="btn btn-warning btnUpdate"

				>
					<i class="fas fa-pen"></i>
				</button>

				<!-- button delete -->
				<button
				data-nama="<?php echo $p->nama ?>"
				data-telpon="<?php echo $p->telpon; ?>"
				class="btn btn-danger btnDelete"

				data-toggle="modal" data-target="#modalDeletePelanggan"
				>
					<i class="fas fa-trash"></i>
				</button>
			</td>
		</tr>

	<?php endforeach; ?>