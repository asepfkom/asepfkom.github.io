<?php
// Notifikasi kalau ada input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"> ','</div>'); 

//kalau ada error upload tampilkan
if (isset($error)) {
	echo '<div class="alert alert-warning">';
	echo $error;	
	echo '</div>';
}

//open form multipart untuk data dan upload
echo form_open_multipart(base_url('admin/buku/tambah'));
?>

<div class="col-md-12">
	<div class="form-group">
		<label>Judul Buku</label>
		<input type="text" name="judul_buku" class="form-control" placeholder="Judul Buku" value="<?php echo set_value('judul_buku')?>" required>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		<label>Penulis Buku</label>
		<input type="text" name="penulis_buku" class="form-control" placeholder="Penulis Buku" value="<?php echo set_value('penulis_buku')?>" required>
	</div>
	<div class="form-group">
		<label>Kode Buku</label>
		<input type="text" name="kode_buku" class="form-control" placeholder="Kode Buku" value="<?php echo set_value('kode_buku')?>">
	</div>
	<div class="form-group">
		<label>Nomor Seri</label>
		<input type="text" name="nomor_seri" class="form-control" placeholder="Nomor Seri Buku" value="<?php echo set_value('nomor_seri') ?>">
	</div>
	<div class="form-group">
		<label>Jenis Buku</label>
		<select name="id_jenis" class="form-control"><?php foreach($jenis as $jenis) { ?>
			<option value="<?php echo $jenis->id_jenis ?>">
				<?php echo $jenis->kode_jenis ?> - <?php echo $jenis->nama_jenis ?>
			</option>
			<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label>Bahasa Buku</label>
		<select name="id_bahasa" class="form-control">
			<?php foreach($bahasa as $bahasa){ ?>
			<option value="<?php echo $bahasa->id_bahasa ?>">
				<?php echo $bahasa->kode_bahasa ?> - <?php $bahasa->nama_bahasa ?>
			</option>
		<?php }?>
		</select>
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Kolas Buku</label>
		<input type="number" name="kolasi" class="form-control" placeholder="Kolasi Buku" value="<?php echo set_value('kolasi')?>">
	</div>
	<div class="form-group">
		<label>Penerbit Buku</label>
		<input type="text" name="penerbit" class="form-control" placeholder="Penerbit Buku" value="<?php echo set_value('penerbit')?>">
	</div>
	<div class="form-group">
		<label>Tahun Terbit</label>
		<input type="number" name="tahun_terbit" class="form-control" placeholder="Tahun Terbit Buku" value="<?php echo set_value('tahun_terbit')?>">
	</div>
	<div class="form-group">
		<label>Status Buku</label>
		<select name="status_buku" class="form-control">
			<option value="Publish">Publish</option>
			<option value="Not Publish">Not Publish</option>
			<option value="Mising">Missing</option>}
			option
		</select>
	</div>
	<div class="form-group">
		<label>Keterangan / Ringkasan</label>
		<textarea name="ringkasan" class="form-control" placeholder="Keterangan / Ringkasan"><?php echo set_value('ringkasan')?></textarea>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		<label>Subjek Buku</label>
		<input type="text" name="subjek_buku" class="form-control" placeholder="Subjek Buku" value="<?php echo set_value('subjek_buku')?>">
	</div>
	<div class="form-group">
		<label>Letak Buku</label>
		<input type="text" name="letak_buku" class="form-control" placeholder="Letak Buku" value="<?php echo set_value('letak_buku')?>">
	</div>
	<div class="form-group">
		<label>Jumlah Buku</label>
		<input type="number" name="jumlah_buku" class="form-control" placeholder="Jumlah Buku" value="<?php echo set_value('jumlah_buku')?>">
	</div>
	<div class="form-group">
		<label>Upload Cover Buku</label>
		<input type="file" name="cover_buku" class="form-control" placeholder="Cover Buku" value="<?php echo set_value('cover_buku')?>">
	</div>
</div>
<div class="col-md-12 text-center">
	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
		<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset" >
	</div>
</div>
<?php
//form close
echo form_close();
?>