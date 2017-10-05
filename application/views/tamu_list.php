
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'> DAFTAR TAMU <?php echo anchor('tamu/create/','Tambah',array('class'=>'btn btn-danger btn-sm'));?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="25px">No</th>
		    <th>Id Tamu</th>
		    <th>Tanda Pengenal</th>
		    <th>Nomor Pengenal</th>
		    <th>Nama Depan Tamu</th>
		    <th>Telepon Tamu</th>
		    <th>Kebangsaan</th>
		    <th>Nama Belakang Tamu</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($tamu_data as $tamu)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $tamu->id_tamu ?></td>
		    <td><?php echo $tamu->tanda_pengenal ?></td>
		    <td><?php echo $tamu->nomor_pengenal ?></td>
		    <td><?php echo $tamu->nama_depan_tamu ?></td>
		    <td><?php echo $tamu->telepon_tamu ?></td>
		    <td><?php echo $tamu->kebangsaan ?></td>
		    <td><?php echo $tamu->nama_belakang_tamu ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('tamu/read/'.$tamu->id_tamu),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('tamu/update/'.$tamu->id_tamu),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('tamu/delete/'.$tamu->id_tamu),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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