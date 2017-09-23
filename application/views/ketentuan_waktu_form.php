<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>KETENTUAN_WAKTU</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Id Kw <?php echo form_error('id_kw') ?></td>
            <td><input readonly type="text" class="form-control" name="id_kw" id="id_kw" placeholder="Id Kw" value="<?php 
            if ($button == "Create") {
              echo gen_id("ke", "ketentuan_waktu", "id_kw", "4", "4");
            }else{
              echo $id_kw;
            }
             ?>" />
        </td>
	    <tr><td>Toleransi Ci <?php echo form_error('toleransi_ci') ?></td>
            <td><input type="text" class="form-control" name="toleransi_ci" id="toleransi_ci" placeholder="Toleransi Ci" value="<?php echo $toleransi_ci; ?>" />
        </td>
	    <tr><td>Toleransi Co <?php echo form_error('toleransi_co') ?></td>
            <td><input type="text" class="form-control" name="toleransi_co" id="toleransi_co" placeholder="Toleransi Co" value="<?php echo $toleransi_co; ?>" />
        </td>
	    <tr><td>Presentase Eci <?php echo form_error('presentase_eci') ?></td>
            <td><input type="text" class="form-control" name="presentase_eci" id="presentase_eci" placeholder="Presentase Eci" value="<?php echo $presentase_eci; ?>" />
        </td>
	    <tr><td>Presentase Lco <?php echo form_error('presentase_lco') ?></td>
            <td><input type="text" class="form-control" name="presentase_lco" id="presentase_lco" placeholder="Presentase Lco" value="<?php echo $presentase_lco; ?>" />
        </td>
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('ketentuan_waktu') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->