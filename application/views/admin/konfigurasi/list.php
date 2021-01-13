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
echo form_open(base_url('admin/konfigurasi'));
?>

<div class="col-md-6">
	<div class="form-group">
		<label>Nama Perusahaan/Organisasi</label>
		<input type="text" name="namaweb" class="form-control" placeholder="Nama Perusahaan/Organisasi" value="<?php echo $konfigurasi->namaweb ?>" required>
	</div>
	<div class="form-group">
		<label>Tagline</label>
		<input type="text" name="tagline" class="form-control" placeholder="Tagline" value="<?php echo $konfigurasi->tagline ?>">
	</div>
	<div class="form-group">
		<label>Nomor Telepon Resmi</label>
		<input type="text" name="telepon" class="form-control" placeholder="Telepon Resmi" value="<?php echo $konfigurasi->telepon ?>">
	</div>
	<div class="form-group">
		<label>Email Resmi</label>
		<input type="email" name="email" class="form-control" placeholder="Email Resmii" value="<?php echo $konfigurasi->email ?>">
	</div>
	<div class="form-group">
		<label>Website</label>
		<input type="url" name="website" class="form-control" placeholder="<?php echo base_url()?>" value="<?php echo $konfigurasi->website ?>">
	</div>
	<div class="form-group">
		<label>Facebook Account</label>
		<input type="url" name="facebook" class="form-control" placeholder="http://facebook.com/akun" value="<?php echo $konfigurasi->facebook ?>">
	</div>
	<div class="form-group">
		<label>Instagram Account</label>
		<input type="url" name="instagram" class="form-control" placeholder="http://instagram.com/akun" value="<?php echo $konfigurasi->instagram ?>">
	</div>
	<div class="form-group">
		<label>Twitter Account</label>
		<input type="url" name="twitter" class="form-control" placeholder="http://twitter.com/akun" value="<?php echo $konfigurasi->twitter ?>">
	</div>
	
	<div class="alert alert-success">
	<h2>Setting Peminjaman Buku</h2>
	<hr>
	<div class="form-group">
		<label>Durasi maksimal peminjaman (hari)</label>
		<input type="number" name="max_hari_peminjaman" class="form-control" placeholder="Maksimal hari peminjaman" value="<?php echo $konfigurasi->max_hari_peminjaman ?>">
	</div>
	<div class="form-group">
		<label>Jumlah maksimal peminjaman buku (hari)</label>
		<input type="number" name="max_jumlah_peminjaman" class="form-control" placeholder="Maksimal jumlah peminjaman" value="<?php echo $konfigurasi->max_jumlah_peminjaman ?>">
	</div>
	<div class="form-group">
		<label>Denda keterlambatan perhari(Rp)</label>
		<input type="number" name="denda_perhari" class="form-control" placeholder="Denda keterlambatan perhari(Rp)" value="<?php echo $konfigurasi->denda_perhari ?>">
	</div>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label>Deskripsi Perusahaan</label>
		<textarea name="deskripsi" placeholder="Deskripsi Perusahaan" class="form-control">
			<?php echo $konfigurasi->deskripsi?>
		</textarea>
	</div>
	<div class="form-group">
		<label>Alamat Perusahaan</label>
		<textarea name="alamat" placeholder="Alamat Perusahaan" class="form-control">
			<?php echo $konfigurasi->alamat?>
		</textarea>
	</div>
	<div class="form-group">
		<label>Keywords Website (untuk SEO Google)</label>
		<textarea name="keywords" placeholder="Keywords Website (untuk SEO Google)" class="form-control">
			<?php echo $konfigurasi->keywords?>
		</textarea>
	</div>
	<div class="form-group">
		<label>Kode Google Map (pilih format iframe)</label>
		<textarea name="map" placeholder="Kode Google Map (pilih format iframe)" class="form-control">
			<?php echo $konfigurasi->map ?>
		</textarea>
	</div>
	<div class="form-group">
		<label>Metatext (biasanya dari Google Analytics &amp; Webmaster)</label>
		<textarea name="metatext" placeholder="Kode Google Map (pilih format iframe)" class="form-control">
			<?php echo $konfigurasi->metatext ?>
		</textarea>
	</div>

	<h4>Google Map</h4>	
	<hr>
	<style type="text/css" media="screen">
			iframe{
				width: 100%;
				height: auto;
				min-height: 300px;
			}
	</style>
	<?php echo $konfigurasi->map ?>
	<hr>

	<div class="form-group">
		<button type="submit" name="submit" class="btn btn-success btn-lg">
			<i class="fa fa-save"></i> Simpan Konfigurasi
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