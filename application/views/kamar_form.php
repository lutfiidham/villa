<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>KAMAR</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Id Kamar <?php echo form_error('id_kamar') ?></td>
            <td><input readonly type="text" class="form-control" name="id_kamar" id="id_kamar" placeholder="Id Kamar" value="<?php 
            if ($button == "Create") {
              echo gen_id("ka", "kamar", "id_kamar", "4", "4");
            }else{
              echo $id_kamar;
            }
             ?>" />
        </td>
	    <tr><td>Nama Kamar <?php echo form_error('nama_kamar') ?></td>
            <td><input type="text" class="form-control" name="nama_kamar" id="nama_kamar" placeholder="Nama Kamar" value="<?php echo $nama_kamar; ?>" />
        </td>
	    <tr><td>No Kamar <?php echo form_error('no_kamar') ?></td>
            <td><input type="text" class="form-control" name="no_kamar" id="no_kamar" placeholder="No Kamar" value="<?php echo $no_kamar; ?>" />
        </td>
	    <tr><td>Kapasitas <?php echo form_error('kapasitas') ?></td>
            <td><input type="text" class="form-control" name="kapasitas" id="kapasitas" placeholder="Kapasitas" value="<?php echo $kapasitas; ?>" />
        </td>
	    <tr><td>Status Kamar <?php echo form_error('status_kamar') ?></td>
            <td><input type="text" readonly class="form-control" name="status_kamar" id="status_kamar" placeholder="Status Kamar" value="<?php echo ($button=="Create")? "free" :$status_kamar; ?>" />
        </td>
	    <tr><td>Harga Kamar <?php echo form_error('harga_kamar') ?></td>
            <td><input type="text" class="form-control" name="harga_kamar" id="harga_kamar" placeholder="Harga Kamar" value="<?php echo $harga_kamar; ?>" />
        </td>
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kamar') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->