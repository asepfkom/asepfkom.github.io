<?php
//load konfigurasi disemua halaman web
$konfigurasi  = $this->konfigurasi_model->listing();
?>
 <!-- Site footer -->
      <footer class="footer">
        <p>&copy; <?php echo date('Y') ?>. <?php echo $konfigurasi->namaweb ?>|Email :<?php echo $konfigurasi->email ?>|Alamat :<?php echo $konfigurasi->alamat ?> |Telepn :<?php echo $konfigurasi->telepon ?></p>
      </footer>

    </div> <!-- /container -->
    <!--Javascript Boostrap-->
     <script src="<?php echo base_url() ?>assets/perpus/js/bootstrap.min.js"></script>

     <!-- DATA TABLE SCRIPTS -->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
  </body>
</html>
