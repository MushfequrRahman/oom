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
th,td{font-size:12px;text-align:center;}
</style>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

 
  <!-- Left side column. contains the logo and sidebar -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      
        
		

      

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
                  <h3 class="box-title">Movement Bill Info</h3>
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
            <div class="box-body table-responsive no-padding">
             	<table id="tableData" class="table table-hover table-bordered">
              <thead style="background:#91b9e6;">
                <tr>
                  <th>Token</th>
                  <th>Transport</th>
                  <th>Tiffin</th>
                  <th>Accomodation</th>
                  <th>Gift</th>
                  <th>Others</th>
                  <th>Submit</th>
                </tr>
                </thead>
                <tbody>
                <?php 
				$i=1;
				foreach($ul as $row)
				{ ?>
                <form role="form" action="<?php echo base_url();?>Dashboard/movement_bill_update" method="post" enctype="multipart/form-data">
                <tr>
                  
                  
                  <td style="vertical-align:middle;"><input type="text" readonly class="form-control" name="mtoken" value="<?php echo $row['mtoken']; ?>"></td>
                  <td style="vertical-align:middle;"><input type="text" class="form-control" name="transport" value="<?php echo $row['transport']; ?>"></td>
                  <td style="vertical-align:middle;"><input type="text" class="form-control" name="tiffin" value="<?php echo $row['tiffin']; ?>"></td>
                  <td style="vertical-align:middle;"><input type="text" class="form-control" name="accomodation" value="<?php echo $row['accomodation']; ?>"></td>
                  <td style="vertical-align:middle;"><input type="text" class="form-control" name="gift" value="<?php echo $row['gift']; ?>"></td>
                  <td style="vertical-align:middle;"><input type="text" class="form-control" name="others" value="<?php echo $row['others']; ?>"></td>
                  <td style="vertical-align:middle;"><input type="submit" class="btn btn-primary" name="submit" value="Submit" /></td>
                </tr>
                </form>
                </tbody>
               <?php } ?>
              </table>
            </div>
          </div>
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
</div>
<!-- ./wrapper -->

</body>
</html>
