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
    <div class="content-wrapper">
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="box box-danger">
                  <div class="box-header with-border">
                    <h3 class="box-title">Date Wise Approval List</h3>
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
                  <div class="box-body ">
                    <div class="col-sm-12 col-md-5 col-lg-5">
                      <label>Start Date<em>*</em></label>
                      <input type="text" class="form-control pd" readonly id="pd" value="<?php echo date('d-m-Y'); ?>">

                    </div>
                    <div class="col-sm-12 col-md-5 col-lg-5">
                      <label>End Date<em>*</em></label>

                      <input type="text" class="form-control wd" readonly id="wd" value="<?php echo date('d-m-Y'); ?>">
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2">
                      <label>&nbsp;</label>
                      <input type="submit" class="btn btn-primary form-control" name="submit" id="btn" value="Submit" />
                    </div>
                  </div>
                  <div id="ajax-content-container">
          </div>
                </div>
              </div>
            </div>
          </div>
          
      </section>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $("#btn").click(function(event) {
        event.preventDefault();
        var pd = $("#pd").val();
        var wd = $("#wd").val();
        //var factoryid= $("#factoryid").val();
        $.ajax({
          type: 'post',
          url: '<?php echo base_url(); ?>Dashboard/date_wise_approval_details_list',
          dataType: "text",
          data: {
            pd: pd,
            wd: wd
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