
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>

          <h3 class='box-title'>PEMESANAN</h3>
          <div class='box box-primary'>
            <?php 
            $lama = '05/10/2017 - 06/10/2017';
            $array  = explode('-',$lama); 
            print_r($array[1]);?>
            <form role="form" id="pemesanan_form"><table class='table table-bordered'>
               <tr><td>Id Pemesanan <?php echo form_error('id_pemesanan') ?></td>
                <td><input readonly type="text" class="form-control" name="id_pemesanan" id="id_pemesanan" placeholder="Id Pemesanan" value="<?php 
                if ($button == "Create") {
                    echo gen_id("bo", "pemesanan", "id_pemesanan", "4", "4");
              }else{
                  echo $id_pemesanan;
              }
              ?>" />
            </td>
            <tr><td>Waktu Pesan <?php echo form_error('waktu_pemesanan') ?></td>
            <td><div class='input-group date'>
                <input type="text" class="form-control" name="waktu_pemesanan" id="waktu_pemesanan" />
                <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </td></tr>

            <tr><td>Lama Menginap <?php echo form_error('id_channel') ?></td>
                <td><div class='input-group date'>
                    <input type="text" class="form-control" id="lama_menginap" name="lama_menginap"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                </td></tr>

            <tr><td>Channel <?php echo form_error('id_channel') ?></td>
                <td><?php echo cmb_dinamis('id_channel','channel', 'nama_channel','id_channel','id_channel') ?>
                </td></tr>

            <tr><td>Kamar <?php echo form_error('id_kamar') ?></td>
                <td><?php echo cmb_kamar('id_kamar','id_kamar') ?>
                </td></tr>

            <tr><td>Tamu <?php echo form_error('tamu_id') ?></td>
                <td>
                    <div class="input-group">
                    <?php echo cmb_tamu('tamu_id','tamu_id') ?> 
                    <span class="input-group-btn">
                    <button type="button" class="btn btn-success" onclick="add_tamu()"><i class="fa fa-plus-circle"></i></button>
                    </span>
                </div>
                </td></tr>

            <tr><td>Jumlah Dewasa <?php echo form_error('jumlah_dewasa') ?></td>
            <td><input type="text" class="form-control" name="jumlah_dewasa" id="jumlah_dewasa" placeholder="Jumlah Dewasa" />
            </td></tr>

            <tr><td>Jumlah Anak <?php echo form_error('jumlah_anak') ?></td>
                <td><input type="text" class="form-control" name="jumlah_anak" id="jumlah_anak" placeholder="Jumlah Anak" size="15px" />
                </td></tr>

            <tr><td>Permintaan Spesial <?php echo form_error('permintaan_spesial') ?></td>
                <td><textarea class="form-control" name="permintaan_spesial" id="permintaan_spesial" placeholder="Permintaan Spesial"></textarea>
                </td></tr>

            <tr><td>Promo <?php echo form_error('id_promo') ?></td>
                <td><?php echo cmb_promo('id_promo','id_promo') ?>
                </td></tr>

            <tr><td>Uang Muka <?php echo form_error('uang_muka') ?></td>
                <td><input type="text" class="form-control" name="uang_muka" id="uang_muka" placeholder="Uang Muka" />
                </td></tr>

            <tr><td>Sisa Bayar <?php echo form_error('sisa_bayar') ?></td>
                <td><input type="text" class="form-control" name="sisa_bayar" id="sisa_bayar" placeholder="Sisa Bayar" />
                </td></tr>

            <tr><td>Total Harga <?php echo form_error('total_harga') ?></td>
                <td><input type="text" class="form-control" name="total_harga" id="total_harga" placeholder="Total Harga" />
                </td></tr>

            <tr><td colspan='2'><button onclick="save_pemesanan()" class="btn btn-primary">Save</button> 
                   <a href="<?php echo site_url('pemesanan') ?>" class="btn btn-default">Cancel</a></td></tr>
        </table>
    </form>
    
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
            <form id="tamu_form" role="form">
            <table class='table table-bordered'>
        <tr><td>Id Tamu <?php echo form_error('id_tamu') ?></td>
            <td><input readonly type="text" class="form-control" name="id_tamu" id="id_tamu" placeholder="Id Tamu" value="<?php 
              echo gen_id("ta", "tamu", "id_tamu", "4", "4");
             ?>" />
        </td>
            
        <tr><td>Tanda Pengenal <?php echo form_error('tanda_pengenal') ?></td>
        <td>
            <select>
                <option value="ktp">KTP</option>
                <option value="sim">SIM</option>
                <option value="paspor">Paspor</option>
            </select>
        </td></tr>

        <tr><td>Nomor Pengenal <?php echo form_error('nomor_pengenal') ?></td>
        <td><input type="text" class="form-control" name="nomor_pengenal" id="nomor_pengenal" placeholder="Nomor Pengenal" />
        </td>

        <tr><td>Nama Tamu <?php echo form_error('nama_depan_tamu') ?>
        <?php echo form_error('nama_belakang_tamu') ?></td>
            <td><input type="text" class="form-control" name="nama_depan_tamu" id="nama_depan_tamu" placeholder="Nama Depan Tamu" />
                <input type="text" class="form-control" name="nama_belakang_tamu" id="nama_belakang_tamu" placeholder="Nama Belakang Tamu" />
        </td>
        <tr><td>Telepon Tamu <?php echo form_error('telepon_tamu') ?></td>
            <td><input type="text" class="form-control" name="telepon_tamu" id="telepon_tamu" placeholder="Telepon Tamu" />
        </td>
        <tr><td>Kebangsaan <?php echo form_error('kebangsaan') ?></td>
            <td><input type="text" class="form-control" name="kebangsaan" id="kebangsaan" placeholder="Kebangsaan"/>
        </td>
        
        <tr><td colspan='2'><button type="submit" class="btn btn-primary" onclick="save_tamu()">Save</button> 
        </td></tr>

          </div>
          <div class="modal-footer"></div>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                // $('#tamu_id').combobox({
                //     url:"<?php echo base_url('index.php?/Pemesanan/read_cb_tamu/') ?>",
                //     valueField:'id_tamu',
                //     textField:'tamu'
                // });
                // $.ajax({
                //     url: "<?php echo base_url('index.php?/Pemesanan/read_cb_tamu/') ?>",
                //     async: false,
                    
                //     //data: "provinsi="+selProv,//data yang akan dibawa di url
                //     dataType: "html",
                //     success: function(data) {
                //         $('#tamu_id').html(data);
                //     }
                // });
            });
           

            function save_pemesanan(){
                event.preventDefault();
                var id_pemesanan = $("#id_pemesanan").val();
                var waktu_pemesanan = $("#waktu_pemesanan").val();
                var uang_muka = $("#uang_muka").val();
                var sisa_bayar = $("#sisa_bayar").val();
                var total_harga = $("#total_harga").val();
                var id_channel = $("#id_channel").val();
                var id_promo = $("#id_promo").val();
                var id_kamar = $("#id_kamar").val();
                var tamu_id = $("#tamu_id").val();
                var jumlah_dewasa = $("#jumlah_dewasa").val();
                var jumlah_anak = $("#jumlah_anak").val();
                var permintaan_spesial = $("#permintaan_spesial").val();

                $.ajax({
                    type: "POST",
                    url : "<?php echo base_url('index.php/Pemesanan/create_action')?>",
                    data: { id_pemesanan:id_pemesanan,waktu_pemesanan:waktu_pemesanan,uang_muka:uang_muka,sisa_bayar:sisa_bayar,total_harga:total_harga,id_channel:id_channel,id_promo:id_promo,id_kamar:id_kamar,tamu_id:tamu_id,jumlah_dewasa:jumlah_dewasa,jumlah_anak:jumlah_anak,permintaan_spesial:permintaan_spesial},
                    success: function(data)
                    {
                        location.reload();
                    }
                });

            }

            function add_tamu(){
                $('#tamu_form')[0].reset();
                $('#myModal').modal('show');
                $('.modal-title').text('Tambah Tamu');
            }

            function save_tamu(){
                save_method='save';
                
                event.preventDefault();
                var id_tamu = $("#id_tamu").val();
                var tanda_pengenal = $("#tanda_pengenal").val();
                var nomor_pengenal = $("#nomor_pengenal").val();
                var nama_depan_tamu = $("#nama_depan_tamu").val();
                var nama_belakang_tamu = $("#nama_belakang_tamu").val();
                var telepon_tamu = $("#telepon_tamu").val();
                var kebangsaan = $("#kebangsaan").val();

                $.ajax({
                    type: "POST",
                    url : "<?php echo base_url('index.php/Pemesanan/create_action_tamu')?>",
                    data: { id_tamu:id_tamu,tanda_pengenal:tanda_pengenal,nomor_pengenal:nomor_pengenal,nama_depan_tamu:nama_depan_tamu,nama_belakang_tamu:nama_belakang_tamu,telepon_tamu:telepon_tamu,kebangsaan:kebangsaan},
                    success: function(data)
                    {
                        $('#tamu_form')[0].reset();
                        $('#myModal').modal('hide');
                        $.ajax({
                            url: "<?php echo base_url('index.php?/Pemesanan/read_cb_tamu/') ?>",
                            async: false,
                            type : "post",
                            dataType: "html",
                            success: function(data) {
                                $('#tamu_id').html(data);
                            }
                        });
                    }
                });
            };
        </script>
    
    </div><!-- /.box-body -->
    </div><!-- /.box -->
    </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content