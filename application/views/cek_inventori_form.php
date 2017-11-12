<!-- Main content --> 
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>

          <h3 class='box-title'>CHECK_INVENTORI</h3>
          <div class='box box-primary'>
            <form action="check_out/create" method="post"><table class='table table-bordered'>

             <tr>
              <input type="hidden" class="form-control" name="id_cek_inventori" id="id_cek_inventori" value="<?php echo gen_id("cv", "cek_inventori", "id_cek_inventori", "4", "4"); ?>"
              />
            </td>
            <tr>
              <td><input type="hidden" class="form-control" name="id_co" id="id_co"/>
              </td>
              <tr><td>Kamar <?php //echo form_error('kamar') ?>
              </td>
              <td><input type="text" class="form-control" name="kamar" id="kamar" value="<?php //echo $kamar; ?>">
              </td>

              <tr><td>Inventori <?php //echo form_error('inventori') ?></td>
                <td>
                  <table class="table table-striped">
                    <?php 
                    foreach ($detil_inv_data as $cek_inv)
                      { ?>
                    <tr>
                      <td><label><input class="form-check-input" type="checkbox" value="<?php echo $cek_inv->nama_inventori; ?>"> <?php echo $cek_inv->nama_inventori ?> </label></td>
                      <td><div class="col-sm-4"><input class="form-control" type="text" value="<?php echo $cek_inv->jumlah_detil_inventori; ?>"></div></td>
                    </tr>
                    <?php } ?>
                  </table>
                </td>

                <tr><td>Charge Inventori <?php //echo form_error('charge_inv') ?></td>
                  <td><input type="text" class="form-control" name="charge_inv" id="charge_inv" value="<?php //echo $charge_co; ?>" />
                  </td>
                  <tr><td colspan='2'><button type="submit" class="btn btn-primary" onclick="update_co()">Save</button> 
                   <a href="<?php echo site_url('check_out') ?>" class="btn btn-default">Cancel</a></td></tr>

                 </table></form>

                 <script type="text/javascript">
                 $(document).ready(function(){

                  var now     = new Date(); 
                  var year    = now.getFullYear();
                  var month   = now.getMonth()+1; 
                  var day     = now.getDate();
                  var hour    = now.getHours();
                  var minute  = now.getMinutes();
                  var second  = now.getSeconds(); 
                  if(month.toString().length == 1) {
                    var month = '0'+month;
                  }
                  if(day.toString().length == 1) {
                    var day = '0'+day;
                  }   
                  if(hour.toString().length == 1) {
                    var hour = '0'+hour;
                  }
                  if(minute.toString().length == 1) {
                    var minute = '0'+minute;
                  }
                  if(second.toString().length == 1) {
                    var second = '0'+second;
                  }   
                  var dateTime = year+'-'+month+'-'+day+' '+hour+':'+minute+':'+second;   

                  $('#real_co').attr("value", dateTime);

                });

                function search_booking(){
                  var id = $("#id_pemesanan").val();

                  $.ajax({
                    type: "GET",
                    url : "<?php echo base_url('index.php/Check_out/search_booking/')?>/" + id,
                    dataType : "JSON",
                    success: function(data) {
                      $("#nama_tamu").val(data[0].tamu);
                      $("#jumlah_tamu").val(data[0].jumlah_tamu);
                      $("#kamar").val(data[0].kamar);
                      $("#plan_co").val(data[0].plan_co);
                      $("#charge_co").val(data[0].charge_co);
                      $("#id_co").val(data[0].id_co);
                    }
                  });
                }

                function update_co(){
                  event.preventDefault();
                  var id_pemesanan = $("#id_pemesanan").val();
                  var real_co = $("#real_co").val();
                  var charge_co = $("#charge_co").val();

                  $.ajax({
                    type: "POST",
                    dataType : "JSON",
                    url : "<?php echo base_url('index.php/Check_out/update_co/')?>",
                    data: {id_pemesanan:id_pemesanan,real_co:real_co,charge_co:charge_co},
                    success: function(data)
                    {
                      window.location.reload();
                    }
                  });
                }

                </script>

              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
                        </section><!-- /.content