
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'> DAFTAR CHECK_IN <?php echo anchor('check_in/create/','Tambah',array('class'=>'btn btn-danger btn-sm'));?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="25px">No</th>
		    <th>Id Ci</th>
		    <th>Id Kw</th>
		    <th>Plan Ci</th>
		    <th>Real Ci</th>
		    <th>Charge Ci</th>
		    <th>Id Pemesanan</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($check_in_data as $check_in)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $check_in->id_ci ?></td>
		    <td><?php echo $check_in->id_kw ?></td>
		    <td><?php echo $check_in->plan_ci ?></td>
		    <td><?php echo $check_in->real_ci ?></td>
		    <td><?php echo $check_in->charge_ci ?></td>
		    <td><?php echo $check_in->id_pemesanan ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('check_in/read/'.$check_in->id_ci),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('check_in/update/'.$check_in->id_ci),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('check_in/delete/'.$check_in->id_ci),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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