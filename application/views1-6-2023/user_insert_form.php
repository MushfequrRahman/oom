<style>
.error{color:red;}
em{color:red;}
body{background:green;}
</style>
<body>
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Babylon Group</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">New User Registration Form</p>
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
	
				 						<form role="form" autocomplete="off" action="<?php echo base_url();?>Register/user_insert" method="post" enctype="multipart/form-data">
                  							<div class="form-group">
												<label>Factory Name<em>*</em></label>
												<select class="form-control" name="factoryid" id="factoryid">
                    								<option value="">Select....</option>
                        							<?php
														foreach($ul as $row)
															{
													?>
                    											<option value="<?php echo $row['factoryid'];?>"><?php echo $row['factoryname'];?></option>
                    								<?php
															}
													?>
                    							</select>
                    								<?php echo form_error('factoryid', '<div class="error">', '</div>');  ?>
											</div>
                 							<div class="form-group">
												<label>Department<em>*</em></label>
												<select class="form-control" name="departmentid" id="departmentid">
                    								<option value="">Select....</option>
                                                    <?php
														foreach($ul1 as $row)
															{
													?>
                    											<option value="<?php echo $row['deptid'];?>"><?php echo $row['departmentname'];?></option>
                    								<?php
															}
													?>
                    							</select>
                    								<?php echo form_error('departmentid', '<div class="error">', '</div>');  ?>
                        						</select>
											</div>
                							<div class="form-group">
												<label>Name<em>*</em></label>
												<input type="text" class="form-control" name="name" placeholder="Enter Name">
                    							<?php echo form_error('name', '<div class="error">', '</div>');  ?>
											</div>
                							<div class="form-group">
												<label>Designation<em>*</em></label>
												<select class="form-control" name="designationid" id="designationid">
                    								<option value="">Select....</option>
                        							<?php
														foreach($ul2 as $row)
															{
													?>
                    											<option value="<?php echo $row['desigid'];?>"><?php echo $row['designation'];?></option>
                    								<?php
															}
													?>
                    							</select>
                    							<?php echo form_error('designationid', '<div class="error">', '</div>');  ?>
											</div>
                							<?php /*?><div class="form-group">
												<label>Email</label>
												<input type="text" class="form-control" name="oemail" placeholder="Enter Office Email">
                    							<?php echo form_error('oemail', '<div class="error">', '</div>');  ?>
											</div><?php */?>
                                            <div class="form-group">
												<label>Email<em>*</em></label>
												<input type="text" class="form-control" name="email" placeholder="Enter Email">
                    							<?php echo form_error('email', '<div class="error">', '</div>');  ?>
											</div>
                							<div class="form-group">
												<label>Mobile<em>*</em></label>
												<input type="text" class="form-control" name="pmobile" placeholder="Enter Mobile">
                    							<?php echo form_error('pmobile', '<div class="error">', '</div>');  ?>
											</div>
                							<?php /*?><div class="form-group">
												<label>User Type</label>
												<select class="form-control" name="usertypeid" id="usertypeid">
                    								<option value="">Select....</option>
                        							<?php
														foreach($ul3 as $row)
															{
													?>
                    											<option value="<?php echo $row['usertypeid'];?>"><?php echo $row['usertype'];?></option>
                    								<?php
															}
														?>
                    							</select>
                    							<?php echo form_error('usertypeid', '<div class="error">', '</div>');  ?>
											</div><?php */?>
                							<?php /*?><div class="form-group">
												<label>User ID<em>*</em></label>
												<input type="text" class="form-control" name="userid" placeholder="Enter Factory+User ID">
                    							<?php echo form_error('userid', '<div class="error">', '</div>');  ?>
											</div><?php */?>
                							<div class="form-group">
												<label>Password<em>*</em></label>
												<input type="text" class="form-control" name="password" placeholder="Enter User Password">
                    							<?php echo form_error('password', '<div class="error">', '</div>');  ?>
											</div>
                							
											<div class="box-footer text-center">
												<input type="submit" class="btn btn-primary" name="submit" value="SUBMIT" />
											</div>
										</form>
                                        </div>
                                        </div>
									
</body>
</html>


