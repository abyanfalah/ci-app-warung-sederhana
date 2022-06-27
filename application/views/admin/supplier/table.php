<?php $counter = 1;
	foreach ($supplier as $s):?>
		<tr>
			<td><?php echo $counter++; ?></td>
			<td><?php echo $s->id; ?></td>
			<td><?php echo ucwords($s->nama); ?></td>
			<td><?php echo ucwords($s->asal); ?></td>
			<td><?php echo $s->telpon; ?></td>
			<td class="col-2 text-center">

				<!-- button edit -->
				<button
				data-id="<?php echo $s->id; ?>"
				data-nama="<?php echo $s->nama; ?>"
				data-telpon="<?php echo $s->telpon; ?>"
				data-asal="<?php echo $s->asal; ?>"
				class="btn btn-warning btnUpdate"

				>
					<i class="fas fa-pen"></i>
				</button>

				<!-- button delete -->
				<button
				data-id="<?php echo $s->id; ?>"
				data-nama="<?php echo $s->nama ?>"
				data-telpon="<?php echo $s->telpon; ?>"
				data-asal="<?php echo $s->asal; ?>"
				class="btn btn-danger btnDelete"

				data-toggle="modal" data-target="#modalDeleteSupplier"
				>
					<i class="fas fa-trash"></i>
				</button>
			</td>
		</tr>

	<?php endforeach; ?>