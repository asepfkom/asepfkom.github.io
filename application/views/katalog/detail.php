<div class="row">
  <div class="col-lg-12">
    
  <div class="panel panel-default">
  <div class="panel-body">
  <h2><?php echo $title ?></h2>
  
  <div class="row">  
    <p class="text-right">
      <a href="<?php echo base_url('katalog') ?>" class="btn btn-success"><i class="fa fa-backward"></i> Kembali cari buku lain</a>
    </p> 

    <div class="col-md-4">
      <?php if($buku->cover_buku !="") { ?> <img src="<?php echo base_url('assets/upload/image/'.$buku->cover_buku) ?>" class="img img-thumbnail img-responsive">
    <?php } else { echo "tidak ada cover"; } ?>
    </div>
    <div class="col-md-8">

    <?php if(count($file_buku) < 1) { ?>
      <p class="alert alert-success text-center">
        <i class="glyphicon glyphicon-warning-sign"></i> File buku tidak tersedia
      </p>
    <?php }else { ?>
      
      <table class="table table-striped table-bordered table-hover" >
      <thead>
          <tr>
              <th width="7%">#</th>
              <th>Judul File</th>
              <!-- <th>Keterangan</th> -->
              <th width="22%">Action</th>
          </tr>
      </thead>
      <tbody>
      <?php $i =1; foreach($file_buku as $file_buku) { 
          ?>
          <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $file_buku->judul_file ?></td>
              <!-- <td><?php echo $file_buku->keterangan ?></td> -->
              <td> 
                <a href="<?php echo base_url('katalog/baca/'.$file_buku->id_file_buku) ?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i>Baca</a>
                  
              </td>
          </tr>
      <?php $i++; } ?>
      </tbody>
    </table>

    <?php }?>

    <table class="table table-bordered table-hover">
      <tread>
        <tr>
          <th width="20%">Judul</th>
          <th><?php echo $buku->judul_buku ?></th>
        </tr>
      </tread>
      <tread>
        <tr>
          <td>Penulis</td>
          <td><?php echo $buku->penulis_buku ?></td>
        </tr>
        <tr>
          <td>Bahasa</td>
          <td><?php echo $buku->nama_bahasa ?></td>
        </tr>
        <tr>
          <td>Jenis Buku</td>
          <td><?php echo $buku->nama_jenis ?></td>
        </tr>
        <tr>
          <td>Subjek</td>
          <td><?php echo $buku->subjek_buku ?></td>
        </tr>
        <tr>
          <td>Kolasi</td>
          <td><?php echo $buku->kolasi ?></td>
        </tr>
        <tr>
          <td>Letak</td>
          <td><?php echo $buku->letak_buku ?></td>
        </tr>
        <tr>
          <td>Penerbit</td>
          <td><?php echo $buku->penerbit ?></td>
        </tr>
        <tr>
          <td>Tahun Terbit</td>
          <td><?php echo $buku->tahun_terbit ?></td>
        </tr>
        <tr>
          <td>No Seri</td>
          <td><?php echo $buku->nomor_seri ?></td>
        </tr>
        <tr>
          <td>Deskripsi</td>
          <td><?php echo $buku->ringkasan ?></td>
        </tr>
        <!-- <tr>
          <td>Jumlah Buku</td>
          <td><?php echo $buku->jumlah_buku ?></td>
        </tr> -->
      </tread>
    </table>

    </div>
  </div>
  </div>
  </div>  
  </div>
</div>