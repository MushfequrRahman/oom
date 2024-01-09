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
                  
                  <th>Start Place</th>
                  <th>Start Time</th>
                  <th>End Place</th>
                  <th>End Time</th>
                  <th>Bill Type</th>
                  <th>Purpose</th>
                  <th>Taka</th>
                  <th>Remarks</th>
                </tr>
                </thead>
                <tbody>
                <?php 
				$i=1;
				$total=0;
				foreach($ul as $row)
				{ ?>
                
                <tr>
                  
                  
                  
                  <td style="vertical-align:middle;"><?php echo $row['fplace']; ?></td>
                  <td style="vertical-align:middle;"><?php echo $row['ftime']; ?></td>
                  <td style="vertical-align:middle;"><?php echo $row['tplace']; ?></td>
                  <td style="vertical-align:middle;"><?php echo $row['ttime']; ?></td>
                  <td style="vertical-align:middle;"><?php echo $row['transit'];?></td>
                    
                  <td style="vertical-align:middle;"><?php echo $row['purpose']; ?></td>
                  <td style="vertical-align:middle;"><?php echo $row['taka']; ?></td>
                  <?php $total+=$row['taka']; ?>
                  <td style="vertical-align:middle;"><?php echo $row['remarks']; ?></td>
                 
                </tr>
                
                </tbody>
               <?php } ?>
               <tr>
               <td colspan="6" style="vertical-align:middle;"><strong>Total:</strong></td>
               <td style="vertical-align:middle;"><strong><?php echo $total; ?></strong></td>
               </tr>
                
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
<script>
$(function () {
$('tbody').on('focus', ".timepicker", function() {
                $(this).timepicker({

                    format: 'LT'
                });
            });
			});
</script>
<script>
$(function () {
        $("input[class*='txtQty']").keydown(function (event) {


            if (event.shiftKey == true) {
                event.preventDefault();
            }

            if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

            } else {
                event.preventDefault();
            }
            
            if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
                event.preventDefault();

        });
    });
</script>
</body>
</html>
