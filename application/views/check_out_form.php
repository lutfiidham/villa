<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>CHECK_OUT</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	   
	    <tr><td>Id Pemesanan <?php echo form_error('id_pemesanan') ?></td>
            <td>
              <div class="input-group">
                    <input type="text" class="form-control" name="id_pemesanan" id="id_pemesanan" placeholder="Id Pemesanan" value="<?php echo $id_pemesanan; ?>" />
                    <span class="input-group-btn">
                    <button type="button" class="btn btn-success" onclick="search_booking()"><i class="fa fa-search"></i></button>
                    </span>
        </td>
	    <tr><td>Nama Tamu <?php echo form_error('nama_tamu') ?>
        </td>
            <td><input type="text" class="form-control" name="nama_tamu" id="nama_tamu" placeholder="Nama Tamu" />
            </td>
        <tr><td>Jumlah Tamu <?php echo form_error('jumlah_tamu') ?>
        </td>
            <td><input type="text" class="form-control" name="jumlah_tamu" id="jumlah_tamu" placeholder="Jumlah Tamu" />
            </td>
        <tr><td>Kamar <?php echo form_error('kamar') ?>
        </td>
            <td><input type="text" class="form-control" name="kamar" id="kamar" placeholder="Kamar" />
            </td>
	    <tr><td>Plan Co <?php echo form_error('plan_co') ?></td>
            <td><input type="text" class="form-control" name="plan_co" id="plan_co" placeholder="Plan Co" value="<?php echo $plan_co; ?>" />
        </td>
	    <tr><td>Real Co <?php echo form_error('real_co') ?></td>
            <td><input type="text" class="form-control" name="real_co" id="real_co" placeholder="Real Co" value="<?php echo $real_co; ?>" />
        </td>
	    <tr><td>Charge Co <?php echo form_error('charge_co') ?></td>
            <td><input type="text" class="form-control" name="charge_co" id="charge_co" placeholder="Charge Co" value="<?php echo $charge_co; ?>" />
        </td>
        
        <input type="hidden" class="form-control" name="id_co" id="id_co">

        <input type="hidden" class="form-control" name="id_cv" id="id_cv" value="<?php 
            if ($button == "Create") {
              echo gen_id("cv", "cek_inventori", "id_cek_inventori", "4", "4");
            }else{
              echo $id_cv;
            }
             ?>" />

	    <tr><td colspan='2'><button type="submit" class="btn btn-primary" onclick="update_co()"><?php echo $button ?></button> 
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
        </section><!-- /.content -->