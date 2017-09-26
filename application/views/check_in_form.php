<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>CHECK_IN</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Id Ci <?php echo form_error('id_ci') ?></td>
            <td><input readonly type="text" class="form-control" name="id_ci" id="id_ci" placeholder="Id Ci" value="<?php 
            if ($button == "Create") {
              echo gen_id("ch", "check_in", "id_ci", "4", "4");
            }else{
              echo $id_ci;
            }
             ?>" />
        </td>
	    <tr><td>Id Kw <?php echo form_error('id_kw') ?></td>
            <td><input type="text" class="form-control" name="id_kw" id="id_kw" placeholder="Id Kw" value="<?php echo $id_kw; ?>" />
        </td>
	    <tr><td>Plan Ci <?php echo form_error('plan_ci') ?></td>
            <td><input type="text" class="form-control" name="plan_ci" id="plan_ci" placeholder="Plan Ci" value="<?php echo $plan_ci; ?>" />
        </td>
	    <tr><td>Real Ci <?php echo form_error('real_ci') ?></td>
            <td><input type="text" class="form-control" name="real_ci" id="real_ci" placeholder="Real Ci" value="<?php echo $real_ci; ?>" />
        </td>
	    <tr><td>Charge Ci <?php echo form_error('charge_ci') ?></td>
            <td><input type="text" class="form-control" name="charge_ci" id="charge_ci" placeholder="Charge Ci" value="<?php echo $charge_ci; ?>" />
        </td>
	    <tr><td>Id Pemesanan <?php echo form_error('id_pemesanan') ?></td>
            <td><input type="text" class="form-control" name="id_pemesanan" id="id_pemesanan" placeholder="Id Pemesanan" value="<?php echo $id_pemesanan; ?>" />
        </td>
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('check_in') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->