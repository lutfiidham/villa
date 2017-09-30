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
                <td><?php echo cmb_kamar('id_kamar','id_kamar') ?>
                </td></tr>

            <tr><td>Tamu <?php echo form_error('id_tamu') ?></td>
                <td>
                    <div class="input-group">
                    <?php echo cmb_tamu('id_tamu','id_tamu') ?> 
                    <span class="input-group-btn">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle"></i></button>
                    </span>
                </div>
                </td></tr>

            <tr><td>Jumlah Dewasa <?php echo form_error('jumlah_dewasa') ?></td>
            <td><input type="text" class="form-control" name="jumlah_dewasa" id="jumlah_dewasa" placeholder="Jumlah Dewasa" value="<?php echo $jumlah_dewasa; ?>" />
            </td></tr>

            <tr><td>Jumlah Anak <?php echo form_error('jumlah_anak') ?></td>
                <td><input type="text" class="form-control" name="jumlah_anak" id="jumlah_anak" placeholder="Jumlah Anak" value="<?php echo $jumlah_anak; ?>" size="15px" />
                </td></tr>

            <tr><td>Permintaan Spesial <?php echo form_error('permintaan_spesial') ?></td>
                <td><textarea class="form-control" name="permintaan_spesial" id="permintaan_spesial" placeholder="Permintaan Spesial" value="<?php echo $permintaan_spesial; ?>"></textarea>
                </td></tr>

            <tr><td>Promo <?php echo form_error('id_promo') ?></td>
                <td><?php echo cmb_promo('id_promo','id_promo') ?>
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

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
            <form action="<?php echo $action; ?>" method="post">
                <table class='table table-bordered'>
                <tr><td>Id Tamu <?php echo form_error('id_tamu') ?></td>
                <td><input readonly type="text" class="form-control" name="id_tamu" id="id_tamu" placeholder="Id Tamu" value="<?php 
                if ($button == "Create") {
                    echo gen_id("ta", "tamu", "id_tamu", "4", "4");
                }else{
                    echo $id_tamu;
                }
                ?>"/>
                </td></tr>
            
                <tr><td>Tanda Pengenal <?php echo form_error('tanda_pengenal') ?></td>
                <td>
                    <select>
                        <option value="ktp">KTP</option>
                        <option value="sim">SIM</option>
                        <option value="paspor">Paspor</option>
                    </select>
                </td></tr>

                <tr><td>Nomor Pengenal <?php echo form_error('nomor_pengenal') ?></td>
                <td><input type="text" class="form-control" name="nomor_pengenal" id="nomor_pengenal" placeholder="Nomor Pengenal" value="<?php echo $nomor_pengenal; ?>" />
                </td></tr>

                <tr><td>Nama <?php echo form_error('nama_depan_tamu') ?> <?php echo form_error('nama_belakang_tamu') ?></td>
                <div class="input-group">
                <span class="input-group">
                <td><input type="text" class="form-control" name="nama_depan_tamu" id="nama_depan_tamu" placeholder="nama_depan_tamu" value="<?php echo $nama_depan_tamu; ?>"/>
                </span>
                <span class="input-group">
                <input type="text" class="form-control" name="nama_belakang_tamu" id="nama_belakang_tamu" placeholder="nama_belakang_tamu" value="<?php echo $nama_belakang_tamu; ?>"/>
                </span>
                </div>
                </td></tr>

                <tr><td>Telepon <?php echo form_error('telepon_tamu') ?></td>
                <td><input type="text" class="form-control" name="telepon_tamu" id="telepon_tamu" placeholder="Telepon Tamu" value="<?php echo $telepon_tamu; ?>" />
                </td></tr>

                <tr><td>Kebangsaan <?php echo form_error('kebangsaan') ?></td>
                <td><input type="text" class="form-control" name="kebangsaan" id="kebangsaan" placeholder="Kebangsaan" value="<?php echo $kebangsaan; ?>" />
                </td></tr>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
    
    </div><!-- /.box-body -->
    </div><!-- /.box -->
    </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->