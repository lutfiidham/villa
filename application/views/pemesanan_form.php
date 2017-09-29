<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>

          <h3 class='box-title'>PEMESANAN</h3>
          <div class='box box-primary'>
            <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
               <tr><td>Id Pemesanan <?php echo form_error('id_pemesanan') ?></td>
                <td><input readonly type="text" class="form-control" name="id_pemesanan" id="id_pemesanan" placeholder="Id Pemesanan" value="<?php 
                if ($button == "Create") {
                    echo gen_id("bo", "pemesanan", "id_pemesanan", "4", "4");
              }else{
                  echo $id_pemesanan;
              }
              ?>" />
            </td>
            <tr><td>Waktu Pemesanan <?php echo form_error('waktu_pemesanan') ?></td>
            <td><input type="date" class="form-control" name="waktu_pemesanan" id="waktu_pemesanan" placeholder="Waktu Pemesanan" value="<?php echo $waktu_pemesanan; ?>" />
            </td></tr>
            <tr><td>Channel <?php echo form_error('id_channel') ?></td>
                <td><?php echo cmb_dinamis('id_channel','channel', 'nama_channel','id_channel','id_channel') ?>
                </td></tr>
            <tr><td>Kamar <?php echo form_error('id_kamar') ?></td>
                <td><?php echo cmb_dinamis('id_kamar','kamar', 'no_kamar','id_kamar','id_kamar') ?>
                </td></tr>
            <tr><td>Tamu <?php echo form_error('id_tamu') ?></td>
                <td><?php echo cmb_dinamis('id_tamu','tamu', 'nama_tamu','id_tamu','id_tamu') ?>
                </td></tr>
            <tr><td>Jumlah Dewasa <?php echo form_error('jumlah_dewasa') ?></td>
            <td><input type="text" class="form-control" name="jumlah_dewasa" id="jumlah_dewasa" placeholder="Jumlah Dewasa" value="<?php echo $jumlah_dewasa; ?>" />
            </td></tr>
            <tr><td>Jumlah Anak <?php echo form_error('jumlah_anak') ?></td>
                <td><input type="text" class="form-control" name="jumlah_anak" id="jumlah_anak" placeholder="Jumlah Anak" value="<?php echo $jumlah_anak; ?>" size="15px" />
                </td></tr>
            <tr><td>Umur Anak <?php echo form_error('umur_anak') ?></td>
                <td><input type="text" class="form-control" name="umur_anak" id="umur_anak" placeholder="Umur Anak" value="<?php echo $umur_anak; ?>" />
                </td></tr>
            <tr><td>Permintaan Spesial <?php echo form_error('permintaan_spesial') ?></td>
                <td><textarea class="form-control" name="permintaan_spesial" id="permintaan_spesial" placeholder="Permintaan Spesial" value="<?php echo $permintaan_spesial; ?>"></textarea>
                </td></tr>
            <tr><td>Promo <?php echo form_error('id_promo') ?></td>
                <td><input type="text" class="form-control" name="id_promo" id="id_promo" placeholder="Promo" value="<?php echo $id_promo; ?>" />
                </td></tr>
            <tr><td>Uang Muka <?php echo form_error('uang_muka') ?></td>
                <td><input type="text" class="form-control" name="uang_muka" id="uang_muka" placeholder="Uang Muka" value="<?php echo $uang_muka; ?>" />
                </td></tr>
            <tr><td>Sisa Bayar <?php echo form_error('sisa_bayar') ?></td>
                <td><input type="text" class="form-control" name="sisa_bayar" id="sisa_bayar" placeholder="Sisa Bayar" value="<?php echo $sisa_bayar; ?>" />
                </td></tr>
            <tr><td>Total Harga <?php echo form_error('total_harga') ?></td>
                <td><input type="text" class="form-control" name="total_harga" id="total_harga" placeholder="Total Harga" value="<?php echo $total_harga; ?>" />
                </td></tr>
            <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                   <a href="<?php echo site_url('pemesanan') ?>" class="btn btn-default">Cancel</a></td></tr>
        </table>
    </form>
    </div><!-- /.box-body -->
    </div><!-- /.box -->
    </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->