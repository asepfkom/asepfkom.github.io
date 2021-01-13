<div class="row">
  <div class="col-lg-12">
    
  <div class="panel panel-default">
  <div class="panel-body">
  <h2><?php echo $title ?></h2>

  <?php if ($this->session->flashdata('sukses')) { ?>

  <div class="alert alert-success text-center">
    <?php echo $this->session->flashdata('sukses'); ?>
  </div>

  <?php }else { ?>

	<p class="alert alert-success">Anda dapat mengusulkan judul koleksi buku terbaru melalui formulir ini. Silahkan masukan data data anda dengan lengkap</p>

  <?php 
  //validasi error
  echo validation_errors('<div class="alert alert-warning">','</div>');

  //buka form
  echo form_open('usulan');
  ?>
  
  <div class="form-group">
    <div class="col-md-3 text-right">
      Judul Buku<span class="text-danger">*</span>
    </div>
    <div class="col-md-9 text-left">
      <input type="text" name="judul" class="form-control" placeholder="Judul buku baru" value="<?php echo set_value('judul') ?>" required>
    </div>
  </div>
  <div class="col-md-12">
  </div>
  <div class="form-group">
  <div class="col-md-3 text-right">
      Nama Penulis<span class="text-danger">*</span>
    </div>
    <div class="col-md-9 text-left">
      <input type="text" name="penulis" class="form-control" placeholder="Nama penulis" value="<?php echo set_value('penulis') ?>" required>
    </div>
  </div>
   <div class="col-md-12">
  </div>
  <div class="form-group">
  <div class="col-md-3 text-right">
      Nama Penerbit<span class="text-danger">*</span>
    </div>
    <div class="col-md-9 text-left">
      <input type="text" name="penerbit" class="form-control" placeholder="Nama penerbit" value="<?php echo set_value('penerbit') ?>" required>
    </div>
  </div>
  <div class="col-md-12">
  </div>
  <div class="form-group">
  <div class="col-md-3 text-right">
      Keterangan<span class="text-danger">*</span>
    </div>
    <div class="col-md-9 text-left">
      <textarea name="keterangan" class="form-control" placeholder="Keterangan lain" value="<?php echo set_value('keterangan')?>"></textarea>
    </div>
  </div>
  <div class="col-md-12">
  </div>
  <div class="form-group">
  <div class="col-md-3 text-right">
      Nama Pengusul<span class="text-danger">*</span>
    </div>
    <div class="col-md-9 text-left">
      <input type="text" name="nama_pengusul" class="form-control" placeholder="Nama pengusul" value="<?php echo set_value('nama_pengusul') ?>" required>
    </div>
  </div>
  <div class="col-md-12">
  </div>
  <div class="form-group">
  <div class="col-md-3 text-right">
      Email Pengusul<span class="text-danger">*</span>
    </div>
    <div class="col-md-9 text-left">
      <input type="email" name="email_pengusul" class="form-control" placeholder="Email pengusul" value="<?php echo set_value('email_pengusul') ?>" required>
    </div>
  </div>
  <div class="col-md-12">
  </div>
  <div class="col-md-12">
  </div>
  <div class="form-group">
  <div class="col-md-3 text-right">
    <span class="text-danger">*</span>
    </div>
    <div class="col-md-9 text-left">
      <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Kirim Usulan">
      <input type="reset" name="reset" class="btn btn-danger btn-lg" value="Reset">
    </div>
  </div>

  <?php 
  //form close
  echo form_close();
  
  }//end if flashdata

  ?>
  </div>
  </div>

  </div>
</div>