<style>
  .error {
    color: red;
  }

  em {
    color: red;
  }
</style>
<script type="text/javascript">
  $(function() {
    jQuery(".pd").datepicker({
      dateFormat: 'dd-mm-yy'
    });
    jQuery(".wd").datepicker({
      dateFormat: 'dd-mm-yy'
    });
  })
</script>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <!-- Main content -->
      <section class="content">
        <!-- Info boxes -->




        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-12">

            <div class="row">

              <!-- /.col -->

              <div class="col-md-12">
                <!-- USERS LIST -->
                <div class="box box-danger">
                  <div class="box-header with-border">
                    <h3 class="box-title">Bill Type Wise Summary List</h3>
                    <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-12">
                        <?php if ($responce = $this->session->flashdata('Successfully')) : ?>
                          <div class="text-center">
                            <div class="alert alert-success text-center"><?php echo $responce; ?></div>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>

                  </div>
                  <!-- /.box-header -->
                  <div class="box-body ">


                    <div class="col-sm-12 col-md-2 col-lg-2">
                      <label>Start Date<em>*</em></label>
                      <input type="text" class="form-control pd" readonly id="pd" value="<?php echo date('d-m-Y'); ?>">

                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2">
                      <label>End Date<em>*</em></label>

                      <input type="text" class="form-control wd" readonly id="wd" value="<?php echo date('d-m-Y'); ?>">
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                      <label>Factory Name<em>*</em></label>
                      <select class="form-control" name="factoryid" id="factoryid">
                        <option value="">Select....</option>
                        <?php
                        foreach ($fl as $row) {
                        ?>
                          <option value="<?php echo $row['factoryid']; ?>"><?php echo $row['factoryname']; ?></option>
                        <?php
                        }
                        ?>
                      </select>
                      <?php echo form_error('factoryid', '<div class="error">', '</div>');  ?>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                      <label>Bill Type<em>*</em></label>
                      <select class="form-control" name="ttid" id="ttid">
                        <option value="">Select....</option>
                        <?php
                        foreach ($ul as $row) {
                        ?>
                          <option value="<?php echo $row['ttid']; ?>"><?php echo $row['transittype']; ?></option>
                        <?php
                        }
                        ?>
                      </select>
                      <?php echo form_error('ttid', '<div class="error">', '</div>');  ?>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2">
                      <label>&nbsp;</label>
                      <input type="submit" class="btn btn-primary form-control" name="submit" id="btn" value="Submit" />
                    </div>
                  </div>
                  <!-- /.box-body -->

                  <!--</form>-->
                  <!-- /.box-footer -->
                </div>
                <!--/.box -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->


            <!-- /.box -->
          </div>
          <!-- /.col -->

          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div id="ajax-content-container">
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


  </div>
  <!-- ./wrapper -->
  <script>
    $(document).ready(function() {
      $("#btn").click(function(event) {
        event.preventDefault();
        var pd = $("#pd").val();
        var wd = $("#wd").val();
        var factoryid = $("#factoryid").val();
        var ttid = $("#ttid").val();
        //alert(tmid);
        $.ajax({
          type: 'post',
          url: '<?php echo base_url(); ?>Dashboard/bill_type_wise_summary_list',
          dataType: "text",
          data: {
            pd: pd,
            wd: wd,
            factoryid: factoryid,
            ttid: ttid
          },
          success: function(data) {
            $('#ajax-content-container').html(data);

          },
          error: function() {
            alert('error!');
          }

        });
      });
    });
  </script>


</body>

</html>