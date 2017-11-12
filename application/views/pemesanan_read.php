
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Pemesanan Read</h3>
        <table class="table table-bordered">
	    <tr><td>Id Pemesanan</td><td><?php echo $id_pemesanan; ?></td></tr>
	    <tr><td>Waktu Pemesanan</td><td><?php echo $waktu_pemesanan; ?></td></tr>
	    <tr><td>Tamu</td><td><?php echo $tamu; ?></td></tr>
	    <tr><td>Jumlah Dewasa</td><td><?php echo $jumlah_dewasa; ?></td></tr>
	    <tr><td>Jumlah Anak</td><td><?php echo $jumlah_anak; ?></td></tr>
	    <tr><td>Channel</td><td><?php echo $channel; ?></td></tr>
      <tr><td>Lama Menginap</td><td><?php echo $lama_menginap; ?></td></tr>
      <tr><td>Kamar</td><td><?php echo $kamar; ?></td></tr>
      <tr><td>Promo</td><td><?php echo $promo; ?></td></tr>
      <tr><td>Sudah Bayar</td><td><?php echo $uang_muka; ?></td></tr>
      <tr><td>Sisa Bayar</td><td><?php echo $sisa_bayar; ?></td></tr>
      <tr><td>Total</td><td><?php echo $total_harga; ?></td></tr>
      <tr><td>Permintaan Spesial</td><td><?php echo $permintaan_spesial; ?></td></tr>
	    <tr><td>Status Pembayaran</td><td><?php echo $nama_status_pemesanan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pemesanan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->