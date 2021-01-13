<!-- Example row of columns -->
<div class="row">
  <div class="col-lg-7">
    

    <div class="panel panel-default">
    <div class="panel-body">
    <h2>Pencarian Buku</h2>
    <p class="alert alert-success">
      <i class="glyphicon glyphicon-warning-sign">Ketik kata kunci</i>
    </p>
    <form action="<?php echo base_url('katalog') ?>" method="post" class="form-inline text-center">
      <input type="text" name="cari" class="form-control" placeholder="Kata kunci" required>
      <input type="submit" name="submit" class="btn btn-success" value="Cari Buku">
    </form>
    </div>
    </div>
    </div>

  <div class="col-lg-5">
  <div class="panel panel-default">
  <div class="panel-body">
    <h2>Buku Baru</h2>
    <?php $a=1; foreach($buku as $buku) {?>
    <!--Buku 1-->
    <div class="row buku">
      <div class="col-md-4">
        <a href="<?php echo base_url('katalog/read/'.$buku->id_buku) ?>">
        <img class="img-thumbnail img-rounded" src="<?php if($buku->cover_buku=="") { echo base_url('assets/perpus/image/motivasi.jpg'); }else { echo base_url('assets/upload/image/thumbs/'.$buku->cover_buku); } ?>" alt="<?php echo $buku->judul_buku ?>">
      </a>
      </div>
        <div class="col-md-8">
          <h4><a href="<?php echo base_url('katalog/read/'.$buku->id_buku) ?>"><?php echo $buku->judul_buku ?></a></h4>
          <p><?php echo character_limiter($buku->ringkasan,50) ?></p>
        </div>
      <div class="clearfix"></div>
      <hr>
      </div>
    <!--end buku-->
    <?php $a++; } ?>
    <p>
    <a href="<?php echo base_url('katalog')?>" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-book"></i>Lihat semua koleksi</a></p>
    </div>
    </div>
  </div>
</div>
