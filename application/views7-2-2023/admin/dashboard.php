<style type="text/css">
.paging-nav {
  text-align: right;
  padding-top: 2px;
}

.paging-nav a {
  margin: auto 1px;
  text-decoration: none;
  display: inline-block;
  padding: 1px 7px;
  background: #91b9e6;
  color: white;
  border-radius: 3px;
}

.paging-nav .selected-page {
  background: #187ed5;
  font-weight: bold;
}

.paging-nav,
#tableData {
  
 
  text-align:center;
}
th,td{font-size:10px;text-align:center;}
.info-box-number {
    display: block;
    font-weight: bold;
    font-size: 12px;
}
.fayellow{color:#FF6;}
.fared{color:#900;}
.faorange{color:#F90;}

div.scrollable-table-wrapper {
  height: 500px;
  overflow: auto;
}
  .header {
            position: sticky;
            top:0;
        }
		.text-right-input{text-align:right;  width:100%; padding:0 10px 0 0;}
</style>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<div class="content-wrapper">
			<section class="content-header">
				<h1>DASHBOARD</h1>
			</section>
			
				
                
                
				<!-- Main row -->
				<div class="row">
				<!-- Left col -->
					<div class="col-md-12">
						<div class="row">
						<!-- /.col -->
							<div class="col-md-12">
						
								<div class="box box-danger">
									<div class="box-header with-border">
										<?php $this->session->userdata('userid');?>
										
										<?php $this->session->userdata('user_type');?>
										<h3 class="box-title"></h3>
										<div class="row">
											<div class="col-sm-12 col-md-12 col-lg-12">
											<?php /*?><?php if($responce = $this->session->flashdata('Successfully')): ?>
											<div class="text-center">
												<div class="alert alert-success text-center"><?php echo $responce;?></div>
											</div>
											<?php endif;?><?php */?>
										</div>
									</div>
								</div>
								<!-- /.box-header -->
                                
                                
								
                                
                                
									
                                 </div>
								</div>
                                
							</div>
							
						</div>
					</div>
				</div>
			</section><!--content-->
		</div><!--content-wrapper-->
	</div><!--wrapper-->
</div>






</body>
</html>
