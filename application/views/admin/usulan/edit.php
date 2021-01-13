<p class="alert alert-success">Anda dapat mengusulkan judul koleksi buku terbaru melalui formulir ini. Silahkan masukan data data anda dengan lengkap</p>

  <?php 
  //validasi error
  echo validation_errors('<div class="alert alert-warning">','</div>');

  //buka form
  echo form_open(base_url('admin/usulan/edit/'.$usulan->id_usulan));
  ?>
  
  <div class="form-group">
    <div class="col-md-3 text-right">
      Judul Buku<span class="text-danger">*</span>
    </div>
    <div class="col-md-9 text-left">
      <input type="text" name="judul" class="form-control" placeholder="Judul buku baru" value="<?php echo $usulan->judul?>" >
    </div>
  </div>
  <div class="col-md-12"><hr>
  </div>
  <div class="form-group">
  <div class="col-md-3 text-right">
      Nama Penulis<span class="text-danger">*</span>
    </div>
    <div class="col-md-9 text-left">
      <input type="text" name="penulis" class="form-control" placeholder="Nama penulis" value="<?php echo $usulan->penulis ?>" required>
    </div>
  </div>
   <div class="col-md-12"><hr>
  </div>
  <div class="form-group">
  <div class="col-md-3 text-right">
      Nama Penerbit<span class="text-danger">*</span>
    </div>
    <div class="col-md-9 text-left">
      <input type="text" name="penerbit" class="form-control" placeholder="Nama penerbit" value="<?php echo $usulan->penerbit ?>" required>
    </div>
  </div>
  <div class="col-md-12"><hr>
  </div>
  <div class="form-group">
  <div class="col-md-3 text-right">
      Keterangan<span class="text-danger">*</span>
    </div>
    <div class="col-md-9 text-left">
      <textarea name="keterangan" class="form-control" placeholder="Keterangan lain" value="<?php echo $usulan->keterangan ?>"></textarea>
    </div>
  </div>
  <div class="col-md-12"><hr>
  </div>
  <div class="form-group">
  <div class="col-md-3 text-right">
      Nama Pengusul<span class="text-danger">*</span>
    </div>
    <div class="col-md-9 text-left">
      <input type="text" name="nama_pengusul" class="form-control" placeholder="Nama pengusul" value="<?php echo $usulan->nama_pengusul ?>" required>
    </div>
  </div>
  <div class="col-md-12"><hr>
  </div>
  <div class="form-group">
  <div class="col-md-3 text-right">
      Email Pengusul<span class="text-danger">*</span>
    </div>
    <div class="col-md-9 text-left">
      <input type="email" name="email_pengusul" class="form-control" placeholder="Email pengusul" value="<?php echo $usulan->email_pengusul ?>" required>
    </div>
  </div>

  <div class="col-md-12"><hr>
  </div>
  <div class="form-group">
  <div class="col-md-3 text-right">
      Status Usulan<span class="text-danger">*</span>
    </div>
    <div class="col-md-9 text-left">
     <select name="status_usulan" class="form-control">
       <option value="Diterima">Diterima</option>
       <option value="Baru"<?php if ($usulan->status_usulan=="Baru")
       { 
         echo "selected"; 
       } ?>>Baru</option>
       <option value="Pending"<?php if ($usulan->status_usulan=="Pending")
       { 
         echo "selected"; 
       } ?>>Pending</option>
       <option value="Ditolak"<?php if ($usulan->status_usulan=="Ditolak")
       { 
         echo "selected"; 
       } ?>>Ditolak</option>
     </select>
    </div>
  </div>

  <div class="col-md-12"><hr>
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
  ?>