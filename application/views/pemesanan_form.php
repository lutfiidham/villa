<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>

          <h3 class='box-title'>PEMESANAN</h3>
          <div class='box box-primary'>
            <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
             <tr><td>No Pemesanan <?php echo form_error('id_pemesanan') ?></td> 
              <td><input readonly type="text" class="form-control" name="id_pemesanan" id="id_pemesanan" placeholder="No Pemesanan" value="<?php 
              if ($button == "Create") {
                echo gen_id("BO", "pemesanan", "id_pemesanan", "4", "4");
              }else{
                echo $id_pemesanan;
              }
              ?>" />
            </td>
            <tr><td>Id Jabatan <?php echo form_error('id_jabatan') ?></td>
              <td>
                <?php echo cmb_dinamis('id_jabatan','jabatan', 'nama_jabatan','id_jabatan','id_jabatan') ?>
              </td>
              <tr><td>Nama Pegawai <?php echo form_error('nama_pegawai') ?></td>
                <td><input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" placeholder="Nama Pegawai" value="<?php echo $nama_pegawai; ?>" />
                </td>
                <tr><td>Alamat Pegawai <?php echo form_error('alamat_pegawai') ?></td>
                  <td><input type="text" class="form-control" name="alamat_pegawai" id="alamat_pegawai" placeholder="Alamat Pegawai" value="<?php echo $alamat_pegawai; ?>" />
                  </td>
                  <tr><td>Telp Pegawai <?php echo form_error('telp_pegawai') ?></td>
                    <td><input type="text" class="form-control" name="telp_pegawai" id="telp_pegawai" placeholder="Telp Pegawai" value="<?php echo $telp_pegawai; ?>" />
                    </td>
                    <tr><td>Password Pegawai <?php echo form_error('password_pegawai') ?></td>
                      <td><input type="text" class="form-control" name="password_pegawai" id="password_pegawai" placeholder="Password Pegawai" value="<?php echo $password_pegawai; ?>" />
                      </td>
                      <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                       <a href="<?php echo site_url('pegawai') ?>" class="btn btn-default">Cancel</a></td></tr>

                     </table></form>
                   </div><!-- /.box-body -->
                 </div><!-- /.box -->
               </div><!-- /.col -->
             </div><!-- /.row -->
        </section><!-- /.content -->