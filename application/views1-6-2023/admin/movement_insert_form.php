<style>
.error{color:red;}
em{color:red;}
</style>
<script type="text/javascript">
  $(function() {
    jQuery(".pd").datepicker({
      dateFormat: 'dd-mm-yy'
    });
    jQuery(".wd").datepicker({
      dateFormat: 'dd-mm-yy'
    });
	jQuery(".ftime").timepicker({
      format: 'LT'
    });
	jQuery(".ttime").timepicker({
      format: 'LT'
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
                  <h3 class="box-title">Movement Create</h3>
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
							<?php if($responce = $this->session->flashdata('Successfully')): ?>
								<div class="text-center">
									<div class="alert alert-success text-center"><?php echo $responce;?></div>
								</div>
							<?php endif;?>
                            <?php if($responce = $this->session->flashdata('UnSuccessfully')): ?>
								<div class="text-center">
									<div class="alert alert-danger text-center"><?php echo $responce;?></div>
								</div>
							<?php endif;?>
						</div>
					</div>
              
                </div>
                <!-- /.box-header -->
                <div class="box-body">
				 <form role="form" autocomplete="off" action="<?php echo base_url();?>Dashboard/movement_insert" method="post" enctype="multipart/form-data">
                 	<div class="form-group">
						<input type="hidden" class="form-control" name="userid" value="<?php echo $this->session->userdata('userid');?>">
					</div>
                    <div class="form-group">
						<input type="hidden" class="form-control" name="lmauserid" value="<?php echo $this->session->userdata('lmauserid');?>">
					</div>
                    <div class="row">
                 	<div class="col-md-3 col-lg-3">
						<label>From Date<em>*</em></label>
						<input type="text" readonly class="form-control pd" name="fdate" id="pd" value="<?php echo date('d-m-Y'); ?>">
					</div>
                    <div class="col-md-3 col-lg-3">
						<label>To Date<em>*</em></label>
						<input type="text" readonly class="form-control wd" name="tdate" id="wd" value="<?php echo date('d-m-Y'); ?>">
					</div>
                    <div class="col-md-3 col-lg-3">
						<label>From Time<em>*</em></label>
						<input type="text" readonly class="form-control ftime timepicker" name="ftime">
					</div>
                    <div class="col-md-3 col-lg-3">
						<label>To Time<em>*</em></label>
						<input type="text" readonly class="form-control ftime timepicker" name="ttime">
					</div>
                    </div>
                    <br/>
                    <div class="row">
                    <div class="col-md-6 col-lg-6">
						<label>Purpose<em>*</em></label>
						<input type="text" class="form-control" name="purpose" placeholder="Enter Purpose">
					</div>
                    <div class="col-md-6 col-lg-6">
						<label>Location<em>*</em></label>
						<input type="text" class="form-control" name="location" placeholder="Enter Location">
					</div>
                    </div>
                    <br/>
                    <div class="form-group">
												<label>Billing Unit<em>*</em></label>
												<select class="form-control" name="factoryid" id="factoryid">
                    								<option value="">Select....</option>
                        							<?php
														foreach($fl as $row)
															{
													?>
                    											<option value="<?php echo $row['factoryid'];?>"><?php echo $row['factoryname'];?></option>
                    								<?php
															}
													?>
                    							</select>
                    								<?php echo form_error('factoryid', '<div class="error">', '</div>');  ?>
											</div>
               		<div class="box-footer text-center">
                  		<input type="submit" class="btn btn-primary" name="submit" value="Submit" />
                	</div>
                    
				 </form>
				</div>
                
                
                
              </div>
             
            </div>
            
          </div>
          

        
          
        </div>
        

        
      </div>
      
    </section>
    
  </div>
  

  
</div>


</body>
</html>


