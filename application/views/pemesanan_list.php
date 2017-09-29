
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'> DAFTAR PEMESANAN <?php echo anchor('pemesanan/create/','Tambah',array('class'=>'btn btn-danger btn-sm'));?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="25px">No</th>
		    <th>Id Pemesanan</th>
		   	<th>Kamar</th>
		    <th>Harga</th>
		    <th>Tamu</th>
		    <th>Dewasa</th>
		    <th>Anak</th>
		    <th>Permintaan Spesial</th>
		    <th>Status Pemesanan</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($pemesanan_data as $pemesanan)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $pemesanan->id_pemesanan ?></td>
		    <td><?php echo $pemesanan->kamar ?></td>
		    <td><?php echo $pemesanan->total_harga ?></td>
		    <td><?php echo $pemesanan->nama_tamu ?></td>
		    <td><?php echo $pemesanan->jumlah_dewasa ?></td>
		    <td><?php echo $pemesanan->anak ?></td>
		    <td><?php echo $pemesanan->permintaan_spesial ?></td>
		    <td><?php echo $pemesanan->nama_status_pemesanan ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('pemesanan/read/'.$pemesanan->id_pemesanan),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('pemesanan/update/'.$pemesanan->id_pemesanan),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('pemesanan/delete/'.$pemesanan->id_pemesanan),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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