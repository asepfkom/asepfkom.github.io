        
            <?php
            //jika ada error
            echo validation_errors('<div class="alert alert-warning">','</div>');

            //form open
            echo form_open(base_url('admin/peminjaman/edit/'.$peminjaman->id_peminjaman));
            ?>
            <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Judul Buku yang di pinjam</label>
                    <br>
                    <select name="id_buku" class="form-control js-example-basic-single" style="width: 100%; padding: 10px 20px !important;">
                        <option value="">Pilih Buku</option><?php foreach($buku as $buku) {?>
                        <option value="<?php echo $buku->id_buku?>" <?php if($buku->id_buku==$peminjaman->id_buku){ echo "selected"; } ?>>
                            <?php echo $buku->judul_buku ?> - <?php echo $buku->kode_buku ?>
                        </option>
                    <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nama Peminjam</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo $anggota->nama_anggota ?>" readonly disable>
                </div>
                <div class="form-group">
                    <label>Status Kembali</label>
                    <select name="status_kembali" class="form-control">
                        <option value="Belum">Belum (Baru Pinjam)</option>
                        <option value="Sudah">Sudah Kembali</option>
                        <option value="Hilang">Buku Hilang</option>
                    </select>
                </div>
                
            </div>

            <div class="col-md-8">
                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label>Tanggal Peminjaman</label>
                    <input type="date" name="tanggal_pinjam" class="form-control" value="<?php echo $peminjaman->tanggal_pinjam ?>" placeholder="YYYY-MM-DD" id="tanggal_pinjam" required>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label>Tanggal Kembali</label>
                    <input type="date" name="tanggal_kembali" class="form-control" value="<?php echo $peminjaman->tanggal_kembali ?>" placeholder="YYYY-MM-DD" id="tanggal_kembali" required>
                </div>
                </div>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" value="<?php echo $peminjaman->keterangan ?>"  placeholder="Keterangan">
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Simpan Data Peminjaman</button>
                <button type="reset" name="reset" class="btn btn-default btn-lg"><i class="fa fa-times"></i> Reset </button>
                <a href="<?php echo base_url('admin/peminjaman')?>" class="btn btn-danger btn-lg"><i class="fa fa-backward"> Kembali</i></a>
            </div>  

            </div>
            <?php
            //form close
            echo form_close();
            ?>
            <!-- end tambah -->

<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
