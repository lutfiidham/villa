
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'> DAFTAR KETENTUAN_WAKTU <?php echo anchor('ketentuan_waktu/create/','Tambah',array('class'=>'btn btn-danger btn-sm'));?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Id Kw</th>
		    <th>Toleransi Ci</th>
		    <th>Toleransi Co</th>
		    <th>Presentase Eci</th>
		    <th>Presentase Lco</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($ketentuan_waktu_data as $ketentuan_waktu)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $ketentuan_waktu->id_kw ?></td>
		    <td><?php echo $ketentuan_waktu->toleransi_ci ?></td>
		    <td><?php echo $ketentuan_waktu->toleransi_co ?></td>
		    <td><?php echo $ketentuan_waktu->presentase_eci ?></td>
		    <td><?php echo $ketentuan_waktu->presentase_lco ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('ketentuan_waktu/read/'.$ketentuan_waktu->id_kw),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('ketentuan_waktu/update/'.$ketentuan_waktu->id_kw),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('ketentuan_waktu/delete/'.$ketentuan_waktu->id_kw),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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