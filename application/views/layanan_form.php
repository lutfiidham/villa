<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>LAYANAN</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Id Layanan <?php echo form_error('id_layanan') ?></td>
            <td><input readonly type="text" class="form-control" name="id_layanan" id="id_layanan" placeholder="Id Layanan" value="<?php 
            if ($button == "Create") {
              echo gen_id("la", "layanan", "id_layanan", "4", "4");
            }else{
              echo $id_layanan;
            }
             ?>" />
        </td>
	    <tr><td>Nama Layanan <?php echo form_error('nama_layanan') ?></td>
            <td><input type="text" class="form-control" name="nama_layanan" id="nama_layanan" placeholder="Nama Layanan" value="<?php echo $nama_layanan; ?>" />
        </td>
	    <tr><td>Biaya Layanan <?php echo form_error('biaya_layanan') ?></td>
            <td><input type="text" class="form-control" name="biaya_layanan" id="biaya_layanan" placeholder="Biaya Layanan" value="<?php echo $biaya_layanan; ?>" />
        </td>
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('layanan') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->