<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>STATUS_PEMESANAN</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Id Status Pemesanan <?php echo form_error('id_status_pemesanan') ?></td>
            <td><input readonly type="text" class="form-control" name="id_status_pemesanan" id="id_status_pemesanan" placeholder="Id Status Pemesanan" value="<?php 
            if ($button == "Create") {
              echo gen_id("st", "status_pemesanan", "id_status_pemesanan", "4", "4");
            }else{
              echo $id_status_pemesanan;
            }
             ?>" />
        </td>
	    <tr><td>Nama Status Pemesanan <?php echo form_error('nama_status_pemesanan') ?></td>
            <td><input type="text" class="form-control" name="nama_status_pemesanan" id="nama_status_pemesanan" placeholder="Nama Status Pemesanan" value="<?php echo $nama_status_pemesanan; ?>" />
        </td>
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('status_pemesanan') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->