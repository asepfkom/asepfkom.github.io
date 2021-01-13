<?php 
//notifakasi
if($this->session->flashdata('sukses')) {
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}

//eror form
echo validation_errors('<div class="alert alert-warning">','</<div>');

//form open
echo form_open_multipart(base_url('admin/konfigurasi/icon'));
?>

<div class="col-md-4">
<?php if($konfigurasi->icon =="") {?>
	<div class="alert alert-success text-center">
		<i class="fa fa-warning"></i> Belum ada icon yang diupload
	</div>
<?php }else{ ?>

<img src="<?php echo base_url('assets/upload/image/'.$konfigurasi->icon) ?>" alt="<?php echo $konfigurasi->namaweb ?>" class="img img-thumbnail img-responsive">

<?php } ?>	
</div>
<div class="col-md-8">
	<input type="hidden" name="id_konfigurasi" value="<?php echo $konfigurasi->id_konfigurasi ?>">
	<div class="form-group">
		<label >Upload icon baru</label>
		<input type="file" name="icon" class="form-control" required="required">
	</div>
	<div class="form-group">
		<button type="submit" name="submit" class="btn btn-success btn-lg">
			<i class="fa fa-upload"></i> Upload Icon
		</button>
		<button type="reset" name="reset" class="btn btn-danger btn-lg">
			<i class="fa fa-times"></i> Reset
		</button>
	</div>
</div>

<?php
//form close
echo form_close(); 
?>