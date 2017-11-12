
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'> DAFTAR CHECK_OUT <?php echo anchor('check_out/create/','Tambah',array('class'=>'btn btn-danger btn-sm'));?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="25px">No</th>
		    <th>Id Co</th>
		    <th>Id Pemesanan</th>
		    <th>Id Kw</th>
		    <th>Plan Co</th>
		    <th>Real Co</th>
		    <th>Charge Co</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($check_out_data as $check_out)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $check_out->id_co ?></td>
		    <td><?php echo $check_out->id_pemesanan ?></td>
		    <td><?php echo $check_out->id_kw ?></td>
		    <td><?php echo $check_out->plan_co ?></td>
		    <td><?php echo $check_out->real_co ?></td>
		    <td><?php echo $check_out->charge_co ?></td>
		    <td style="text-align:center" width="140px">
			<?php
            if ($check_out->id_cov == 0) {
                echo anchor(site_url('check_out/create_cek_inv/'.$check_out->id_co),'<i class="fa fa-spinner"></i>',array('title'=>'cek','class'=>'btn btn-danger btn-sm'));     
            } else {
                echo anchor(site_url('check_out/read/'.$check_out->id_co),'<i class="fa fa-check-circle"></i>',array('title'=>'cek','class'=>'btn btn-danger btn-sm')); 
            }
			
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->