<?php $counter = 1;
foreach ($supplier as $s):?>
	<tr>
		<td><?php echo $counter++; ?></td>
		<td><?php echo $s->id; ?></td>
		<td><?php echo ucwords($s->nama); ?></td>
		<td><?php echo ucwords($s->asal); ?></td>
		<td><?php echo $s->telpon; ?></td>
		<td class="col-2 text-center">

			<button
			class="btn btn-sm btn-success btnPilihSupplier"

			data-id="<?php echo $s->id; ?>"
			data-nama="<?php echo $s->nama; ?>"
			data-telpon="<?php echo $s->telpon; ?>"
			data-asal="<?php echo $s->asal; ?>"
			>
				<strong>
					Pilih
				</strong>
			</button>
		</td>
	</tr>

<?php endforeach; ?>