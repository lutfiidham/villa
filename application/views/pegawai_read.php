
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Pemesanan Read</h3>
        <table class="table table-bordered">
	    <tr><td>Id Pemesanan</td><td><?php echo $id_pemesanan; ?></td></tr>
	    <tr><td>Kamar</td><td><?php echo $kamar; ?></td></tr>
	    <tr><td>Tamu</td><td><?php echo $tamu; ?></td></tr>
	    <tr><td>Dewasa</td><td><?php echo $jumlah_dewasa; ?></td></tr>
      <tr><td>Anak</td><td><?php echo $jumlah_anak; ?></td></tr>
      <tr><td>Special Request</td><td><?php echo $permintaan_spesial; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status_pemesanan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pemesanan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->