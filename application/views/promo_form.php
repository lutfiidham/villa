<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>PROMO</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Id Promo <?php echo form_error('id_promo') ?></td>
            <td><input readonly type="text" class="form-control" name="id_promo" id="id_promo" placeholder="Id Promo" value="<?php 
            if ($button == "Create") {
              echo gen_id("pr", "promo", "id_promo", "4", "4");
            }else{
              echo $id_promo;
            }
             ?>" />
        </td>
	    <tr><td>Promo Awal <?php echo form_error('promo_awal') ?></td>
            <td><input type="text" class="form-control" name="promo_awal" id="promo_awal" placeholder="Promo Awal" value="<?php echo $promo_awal; ?>" />
        </td>
	    <tr><td>Promo Akhir <?php echo form_error('promo_akhir') ?></td>
            <td><input type="text" class="form-control" name="promo_akhir" id="promo_akhir" placeholder="Promo Akhir" value="<?php echo $promo_akhir; ?>" />
        </td>
	    <tr><td>Diskon Promo <?php echo form_error('diskon_promo') ?></td>
            <td><input type="text" class="form-control" name="diskon_promo" id="diskon_promo" placeholder="Diskon Promo" value="<?php echo $diskon_promo; ?>" />
        </td>
	    <tr><td>Ket  Promo <?php echo form_error('ket__promo') ?></td>
            <td><input type="text" class="form-control" name="ket__promo" id="ket__promo" placeholder="Ket  Promo" value="<?php echo $ket__promo; ?>" />
        </td>
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('promo') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->