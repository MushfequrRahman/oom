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
      dateFormat: 'yy-mm-dd'
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
                    <h3 class="box-title">User List</h3>
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
                    <?php /*?><form role="form" autocomplete="off" action="<?php echo base_url();?>Dashboard/user_task_complete_list" method="post" enctype="multipart/form-data"><?php */ ?>

                    <div class="form-group">
                      <label>Unit Name<em>*</em></label>
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
                  </div>

                  <div class="box-footer text-center">
                    <input type="submit" class="btn btn-primary" name="submit" id="btn" value="Submit" />
                  </div>
                  <!--</form>-->

                </div>

              </div>

            </div>




          </div>



        </div>
        <div id="ajax-content-container">
        </div>
      </section>

    </div>



  </div>

  <script>
    $(document).ready(function() {
      $("#btn").click(function(event) {
        event.preventDefault();
        var factoryid = $("#factoryid").val();

        $.ajax({
          type: 'post',
          url: '<?php echo base_url(); ?>Dashboard/factorywise_user_list',
          dataType: "text",
          data: {
            factoryid: factoryid
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