<style>
  .wrapper {
    margin: 0 auto;
    width:600px;
    
  }
  #tableData{width: 600px;}
  #tableData,
  th,
  td {
    text-align: center;
    border-collapse: collapse;
    border: 1px solid black;
    margin: auto;
  }

  th {
    font-size: 10px;
    text-align: center;
  }
td {
    font-size: 8px;
    text-align: center;
  }
  td {
    word-wrap: break-word;
    overflow-wrap: break-word;
  }

  .top {
    width: 600px;
    height:220px;
     font-size: 22px; 
    
  }

  .top1 {
    margin: auto;
    font-size: 12px;
    width: 600px;
    text-align: center;
    
  }

  /* .top2 {
    
    width: 600px;
    font-size: 18px;
    
  } */

  .text-left {
    float: left;
    width: 300px;
    font-size: 12px;
    text-align: left;
   
    
  }
  .text-right {
    float: left;
    width: 300px;
    font-size: 12px;
    text-align: right;
   
  }
  .text-bottom {
    font-size: 10px;
	margin:0 0 120px 0;
  }

  .middle {
     margin: 120px 0 0 0; 
    width:600px;
  }
  .bottom {
     margin: 20px 0 0 0; 
    width:600px;
    font-size: 12px;
  }
  .bottom1 {
    float:left;
    width:200px;
    text-align: left;
    text-decoration: overline;
    
  }
  .bottom2 {
    float:left;
    width:200px;
    text-align: center;
    text-decoration: overline;
    
  }
  .bottom3 {
    float:left;
    width:200px;
    text-align: right;
    text-decoration: overline;
    
  }
  /*.bottom4 {
    float:left;
    width:150px;
    text-align: right;
    text-decoration: overline;
    
  }*/
  .text-bottom span strong{border-bottom: 2px dotted black;}
</style>

<body>
  <div class="wrapper">
    <div class="top">
      <div class="top1">
        <h3><img style="width:80px; height:35px; margin:0 15px 0 0;" src="http://192.168.170.25/conveyance/assets/admin/images/babylon.png" alt="logo"></h3>
        <!-- <h3><?php echo $this->session->userdata('factoryid'); ?></h3> -->
        
      <span><strong>BABYLON GROUP</strong></span>
      <br/>
      <span>2-B/1,Darus Salam Road</span>
      <br/>
      <span>Mirpur,Dhaka-1216</span>
      <br/>
      
      <p style="background-color:black; color:white;padding:5px;">OUT OF OFFICE BILL</p>
      <br/>
      <?php
      $i = 1;
      foreach ($ul as $row) {
      ?>
        <?php $row['billingunit']; ?>
        <?php $row['userid']; ?>
        <?php $row['name']; ?>
        <?php /*?><?php $sdate = date("d-m-Y", strtotime($row['fdate'])); ?><?php */?>
      <?php
      }
      ?>
      <div class="text-left">
      	  <?php /*?><span>Token:</span><span><?php echo $row['mid']; ?></span><?php */?>
          <br />
          
          <span>Billing Unit:</span><span><?php echo $row['billingunit']; ?></span>
          <br />
          
          <span>Employee:</span><span><?php echo $row['name']."(".$row['userid'].")"; ?></span>
          <br />
          
          <span>Department:</span><span><?php echo $row['departmentname']."(".$row['designation'].")"; ?></span>
          <br />
          
          <?php /*?><span>Designation:</span><span><?php echo $row['designation']; ?></span>
          <br />
          <br /><?php */?>
          <span>Line Manager:</span><span><?php echo $row['lname']."(".$row['ldesignation'].")"; ?></span>
          <br />
          
          <?php /*?><span>Purpose:</span><span><?php echo $row['purpose']; ?></span>
          <br /><?php */?>
          
          <?php /*?><span>Location:</span><span><?php echo $row['location']; ?></span>
          <br /><?php */?>
          
          

        </div>
        <div class="text-right">
          <span>From Date:</span><span><?php echo date("d-m-Y", strtotime($row['fdate'])); ?></span>
          <br/>
           <?php /*?><span>From Time:</span><span><?php echo $row['ftime']; ?></span><?php */?>
          
		  <span>To Date:</span><span><?php echo date("d-m-Y", strtotime($row['tdate'])); ?></span>
          <br />
           <?php /*?><span>To Time:</span><span><?php echo $row['ttime']; ?></span><?php */?>
          <br/>
          
        </div>
      </div>
      

      <!-- <div class="top2">
        

      </div> -->
    </div>
    <div class="middle">
      			<p style="text-align:center;"><strong>Cost Details</strong></p>
        <table id="tableData">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Token</th>
                  <th>Employee</th>
                  <th>Line Manager</th>
                  <th>From Date</th>
                  <th>To Date</th>
                  <th>From Time</th>
                  <th>To Time</th>
                  <th>Purpose</th>
                  <th>Location</th>
                  <th>Cost Details</th>
                  <th>Total(Tk/)</th>
                  <!--<th>Status</th>-->
                  <!--<th>Print Status</th>-->
                </tr>
                </thead>
                <tbody>
                <?php 
				$i=1;
				$ttotal = 0;
				foreach($ul as $row)
				{ ?>
                <tr>
                  <td style="vertical-align:middle;"><?php echo $i++;?></td>
                  <td style="vertical-align:middle;"><?php echo $row['mid'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['userid']."<br/>".$row['name'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['lmauserid']."<br/>".$row['lname'];?></td>
                  <td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['fdate']));?></td>
                  <td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['tdate']));?></td>
                  <td style="vertical-align:middle;"><?php echo $row['ftime'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['ttime'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['purpose'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['location'];?></td>
                  
                  <td style="vertical-align:middle; text-align: justify;"><?php echo "Transport:&nbsp;&nbsp;".round($row['transport'])."<br/>"."Tiffin:&nbsp;&nbsp;".round($row['tiffin'])."<br/>"."Accomodation:&nbsp;&nbsp;".round($row['accomodation'])."<br/>"."Gift:&nbsp;&nbsp;".round($row['gift'])."<br/>"."Others:&nbsp;&nbsp;".round($row['others'])."<br/>";?></td>
                  <td style="vertical-align:middle;"><?php echo round($row['ctotal']);?></td>
                </tr>
                <?php
              $ttotal += $row['ctotal'];
            }
        ?>
                </tbody>
                
               
        <tr>
          <td colspan="11"><strong>Total Taka:</strong></td>
          <td><strong><?php echo $ttotal=round(number_format((float)$ttotal, 2, '.', '')); ?></strong></td>
          <!--<td>&nbsp;</td>-->
        </tr>
              </table>
      
    </div>
    <div class="text-bottom">
      <p>Taka (In words) <span><strong><?php echo $this->numbertowordconvertsconver->convert_number($ttotal)." Only";?></strong></span></p>
    </div>
    <!--<div class="bottom">-->
      <!--<div class="bottom1">
        <p>Requested By</p>
      </div>-->
      <!--<div class="bottom2">
        <p>Veryfied By</p>
      </div>-->
      <!--<div class="bottom3">
        <p>Audit By</p>
      </div>-->
      <!--<div class="bottom3">
        <p>Approved By</p>
      </div>-->
      
    <!--</div>-->
  </div>
  <script>
    history.pushState(null, document.title, location.href);
    history.back();
    history.forward();
    window.onpopstate = function () {
        history.go(1);
    };
</script>

</body>

</html>