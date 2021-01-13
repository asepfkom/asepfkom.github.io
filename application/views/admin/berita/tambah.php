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
echo form_open_multipart(base_url('admin/berita/tambah'));
?>

<div class="col-md-12">
	<div class="form-group form-group-lg">
		<label>Judul Berita</label>
		<input type="text" name="judul_berita" class="form-control" placeholder="Judul Berita" value="<?php echo set_value('judul_berita')?>" required>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		<label>Status Berita</label>
		<select name="status_berita" class="form-control">
			<option value="Publish">Publish</option>
			<option value="Draft">Simpan Sebagai Draft</option>
		</select>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		<label>Jenis Berita</label>
		<select name="jenis_berita" class="form-control">
			<option value="Berita">Berita</option>
			<option value="Slider">Homepage Slider</option>
		</select>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		<label>Upload Gambar</label>
		<input type="file" name="gambar" class="form-control" placeholder="Gambar" required="required">
	</div>
</div>
<div class="col-md-12">
	<div class="form-group form-group-lg">
		<label>Isi Berita</label>
		<textarea name="isi" class="form-control editor" placeholder="Isi"><?php echo set_value('isi') ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
		<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset" >
	</div>
</div>
<?php
//form close
echo form_close();
?>