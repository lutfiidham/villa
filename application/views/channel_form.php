<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>CHANNEL</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Id Channel <?php echo form_error('id_channel') ?></td>
            <td><input readonly type="text" class="form-control" name="id_channel" id="id_channel" placeholder="Id Channel" value="<?php 
            if ($button == "Create") {
              echo gen_id("ch", "channel", "id_channel", "4", "4");
            }else{
              echo $id_channel;
            }
             ?>" />
        </td>
	    <tr><td>Nama Channel <?php echo form_error('nama_channel') ?></td>
            <td><input type="text" class="form-control" name="nama_channel" id="nama_channel" placeholder="Nama Channel" value="<?php echo $nama_channel; ?>" />
        </td>
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('channel') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->