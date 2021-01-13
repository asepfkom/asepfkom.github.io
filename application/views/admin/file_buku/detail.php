<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#Detail<?php  echo $buku->id_buku ?>">
<i class="fa fa-eye"></i>
    </button>
    <div class="modal fade" id="Detail<?php  echo $buku->id_buku ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Detail Data Buku : <?php echo $buku->judul_buku ?></h4>
                </div>
                <div class="modal-body">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th width="30%">Judul Buku</th>
                            <th>:<?php echo $buku->judul_buku?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Penulis</td>
                            <th>:<?php echo $buku->penulis_buku ?></th>
                        </tr>
                        <tr>
                            <td>Jenis Buku</td>
                            <th>:<?php echo $buku->nama_jenis ?></th>
                        </tr>
                        <tr>
                            <td>Bahasa</td>
                            <th>:<?php echo $buku->nama_bahasa ?></th>
                        </tr>
                        <tr>
                            <td>No Seri</td>
                            <th>:<?php echo $buku->nomor_seri ?></th>
                        </tr>
                        <tr>
                            <td>Penulis</td>
                            <th>:<?php echo $buku->penulis_buku ?></th>
                        </tr>
                        <tr>
                            <td>Kode Buku</td>
                            <th>:<?php echo $buku->kode_buku ?></th>
                        </tr>
                        <tr>
                            <td>Letak Buku</td>
                            <th>:<?php echo $buku->letak_buku ?></th>
                        </tr>
                        <tr>
                            <td>Kolasi</td>
                            <th>:<?php echo $buku->kolasi ?></th>
                        </tr>
                        <tr>
                            <td>Penerbit</td>
                            <th>:<?php echo $buku->penerbit ?></th>
                        </tr>
                        <tr>
                            <td>Tahun Terbit</td>
                            <th>:<?php echo $buku->tahun_terbit?></th>
                        </tr>
                        <tr>
                            <td>Subjek Buku</td>
                            <th>:<?php echo $buku->subjek_buku ?></th>
                        </tr>
                        <tr>
                            <td>Status Buku</td>
                            <th>:<?php echo $buku->status_buku ?></th>
                        </tr>
                        <tr>
                            <td>Ringkasan</td>
                            <th>:<?php echo $buku->ringkasan ?></th>
                        </tr>
                        <tr>
                            <td>Jumlah Buku</td>
                            <th>:<?php echo $buku->jumlah_buku ?></th>
                        </tr>
                        <tr>
                            <td>Tanggal Entry</td>
                            <th>: <?php echo date('d-m-Y H:i:s',strtotime($buku->tanggal_entri)) ?></th>
                        </tr>
                        <tr>
                            <td>Tanggal Update</td>
                            <th>: <?php echo date('d-m-Y H:i:s',strtotime($buku->tanggal)) ?></th>
                        </tr>
                    </tbody>
                </table>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo base_url('admin/buku/delete/'.$buku->id_buku) ?>" class="btn btn-danger">
                        <i class="fa fa-trash-o"></i>Hapus</a>
                    <a href="<?php echo base_url('admin/buku/edit/'.$buku->id_buku) ?>" class="btn btn-warning">
                    <i class="fa fa-edit"></i>Edit</a>
                    <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
                </div>
            </div>
        </div>
    </div>
