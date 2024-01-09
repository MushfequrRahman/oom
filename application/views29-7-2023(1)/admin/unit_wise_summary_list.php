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
td{font-weight: 600; /*font-variant:small-caps;*/}
</style>

            
                <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <?php /*?><form action="<?php echo base_url() ?>Dashboard/date_wise_mpr_list_xls" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <div class="row padall">
      <div class="col-lg-12">
        <div class="float-right">
          <?php
          foreach ($ul as $row1) { ?>
            
            <input type="hidden" name="pd" value="<?php echo $pd; ?>" />
            <input type="hidden" name="wd" value="<?php echo $wd; ?>" />
          <?php
          }
          ?>
          <input type="radio" checked="checked" name="export_type" value="xlsx"> .xlsx
          <input type="radio" name="export_type" value="xls"> .xls
          <input type="radio" name="export_type" value="csv"> .csv
          <button type="submit" name="import" class="btn btn-primary btn-xs">Export</button>
        </div>
      </div>
    </div>
  </form><?php */?>
             	<table id="tableData" class="table table-hover table-bordered">
              <thead style="background:#91b9e6;">
                <tr>
                  <th>SL</th>
                  <th>Date</th>
                  <th>Token</th>
                  <th>Billing Unit</th>
                  <th>User</th>
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
                  
                  <td style="vertical-align:middle;"><?php echo $i++; ?></td>
                  <td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['fdate'])); ?></td>
                  <td style="vertical-align:middle;"><?php echo $row['mid']; ?></td>
                  <td style="vertical-align:middle;"><?php echo $row['billingunit']; ?></td>
                  <td style="vertical-align:middle;"><?php echo $row['username']; ?></td>
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
                 <?php } ?>
                </tbody>
              
               <tr>
               <td colspan="11" style="vertical-align:middle;"><strong>Total:</strong></td>
               <td style="vertical-align:middle;"><strong><?php echo $total; ?></strong></td>
               </tr>
                
              </table>
            </div>
            
         
