<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>TAMU</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Id Tamu <?php echo form_error('id_tamu') ?></td>
            <td><input readonly type="text" class="form-control" name="id_tamu" id="id_tamu" placeholder="Id Tamu" value="<?php 
            if ($button == "Create") {
              echo gen_id("ta", "tamu", "id_tamu", "4", "4");
            }else{
              echo $id_tamu;
            }
             ?>" />
        </td>
	    <tr><td>Tanda Pengenal <?php echo form_error('tanda_pengenal') ?></td>
            <td><input type="text" class="form-control" name="tanda_pengenal" id="tanda_pengenal" placeholder="Tanda Pengenal" value="<?php echo $tanda_pengenal; ?>" />
        </td>
	    <tr><td>Nomor Pengenal <?php echo form_error('nomor_pengenal') ?></td>
            <td><input type="text" class="form-control" name="nomor_pengenal" id="nomor_pengenal" placeholder="Nomor Pengenal" value="<?php echo $nomor_pengenal; ?>" />
        </td>
	    <tr><td>Nama Depan Tamu <?php echo form_error('nama_depan_tamu') ?></td>
            <td><input type="text" class="form-control" name="nama_depan_tamu" id="nama_depan_tamu" placeholder="Nama Depan Tamu" value="<?php echo $nama_depan_tamu; ?>" />
        </td>
	    <tr><td>Telepon Tamu <?php echo form_error('telepon_tamu') ?></td>
            <td><input type="text" class="form-control" name="telepon_tamu" id="telepon_tamu" placeholder="Telepon Tamu" value="<?php echo $telepon_tamu; ?>" />
        </td>
	    <tr><td>Kebangsaan <?php echo form_error('kebangsaan') ?></td>
            <td><input type="text" class="form-control" name="kebangsaan" id="kebangsaan" placeholder="Kebangsaan" value="<?php echo $kebangsaan; ?>" />
        </td>
	    <tr><td>Nama Belakang Tamu <?php echo form_error('nama_belakang_tamu') ?></td>
            <td><input type="text" class="form-control" name="nama_belakang_tamu" id="nama_belakang_tamu" placeholder="Nama Belakang Tamu" value="<?php echo $nama_belakang_tamu; ?>" />
        </td>
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tamu') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->