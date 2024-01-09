<?php error_reporting(0);?>
<style>
  .wrapper {
    margin: 0 auto;
    width: 700px;

  }

  #tableData {
    width: 700px;
  }

  #tableData,
  th,
  td {
    text-align: center;
    border-collapse: collapse;
    border: 1px solid black;
    margin: auto;
  }

  th,
  td {
    font-size: 10px;
    text-align: center;
  }

  td {
    word-wrap: break-word;
    overflow-wrap: break-word;
  }

  .top {
    width: 700px;
    height: 220px;
    font-size: 22px;

  }

  .top1 {
    margin: auto;
    font-size: 12px;
    width: 700px;
    text-align: center;

  }

  /* .top2 {
    
    width: 600px;
    font-size: 18px;
    
  } */

  .text-left {
    float: left;
    width: 350px;
    font-size: 12px;
    text-align: left;


  }

  .text-right {
    float: left;
    width: 350px;
    font-size: 12px;
    text-align: right;

  }

  .text-bottom {
    font-size: 10px;
    margin: 0 0 30px 0;
  }

  .middle {
    margin: 10px 0 0 0;
    width: 700px;
  }

  .bottom {
    margin: 10px 0 0 0;
    width: 700px;
    font-size: 12px;
  }

  .bottom1 {
    float: left;
    width: 200px;
    text-align: left;
    text-decoration: overline;

  }

  .bottom2 {
    float: left;
    width: 200px;
    text-align: center;
    text-decoration: overline;

  }

  .bottom3 {
    float: left;
    width: 200px;
    text-align: right;
    text-decoration: overline;

  }

  /*.bottom4 {
    float:left;
    width:150px;
    text-align: right;
    text-decoration: overline;
    
  }*/
  /*.text-bottom span strong {
    border-bottom: 2px dotted black;
  }*/
  #background{
    position:absolute;
    z-index:0;
    background:white;
    display:block;
    min-height:50%; 
    min-width:50%;
	top:80%;
    left:-170%;
}
#tabledata{
    position:absolute;
    z-index:1;
}

#bg-text
{
    color:lightgrey;
    font-size:70px;
    transform:rotate(300deg);
    -webkit-transform:rotate(300deg);
}
</style>

<body>
  <div class="wrapper">
    <div class="top">
      <div class="top1">
        <h3><img style="width:80px; height:35px; margin:0 15px 0 0;" src="http://192.168.170.25/conveyance/assets/admin/images/babylon.png" alt="logo"></h3>
        <!-- <h3><?php echo $this->session->userdata('factoryid'); ?></h3> -->

        <span><strong>BABYLON GROUP</strong></span>
        <br />
        <span>2-B/1,Darus Salam Road</span>
        <br />
        <span>Mirpur,Dhaka-1216</span>
        <br />

        <p style="background-color:black; color:white;padding:5px;">OUT OF OFFICE BILL</p>
        <br />
        <?php
        $i = 1;
        foreach ($ul as $row) {
        ?>
          <?php $row['mid']; ?>
          <?php $row['userid']; ?>
          <?php $row['username']; ?>
          <?php $sdate = date("d-m-Y", strtotime($row['fdate'])); ?>
        <?php
        }
        ?>
        <div class="text-left">
          <span>Token:</span><span><?php echo $row['mid']; ?></span>
          <br />

          <span>Billing Unit:</span><span><?php echo $row['billingunit']; ?></span>
          <br />

          <span>Employee:</span><span><?php echo $row['username'] . "(" . $row['userid'] . ")"; ?></span>
          <br />

          <?php /*?><span>Department:</span><span><?php echo $row['departmentname'] . "(" . $row['designation'] . ")"; ?></span><?php */?>
          <!--<br />-->

          <?php /*?><span>Designation:</span><span><?php echo $row['designation']; ?></span>
          <br />
          <br /><?php */ ?>
          <span>Line Manager:</span><span><?php echo $row['lname']; ?></span>
          <br />

          <?php /*?><span>Accounts:</span><span><?php echo $row['aname']; ?></span><?php */?>
          <br />

         



        </div>
        <div class="text-right">
          <span>From Date:</span><span><?php echo date("d-m-Y", strtotime($row['fdate'])); ?></span>
          <br />
          <span>To Date:</span><span><?php echo date("d-m-Y", strtotime($row['tdate'])); ?></span>
          <br />
          <?php /*?><?php
          if ($row['mstatus'] == 4) {
          ?>
            <div id="background"><p id="bg-text">Re-Print</p></div>
          <?php
          } else {
          ?>
            <span>&nbsp;</span>
          <?php
          }
          ?><?php */?>
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
          $i = 1;
          $ttotal = 0;
          foreach ($ul as $row) { ?>
           
              <tr>
                <td style="vertical-align:middle; text-align: center;"><?php echo $row['fplace']; ?></td>
                <td style="vertical-align:middle; text-align: center;"><?php echo $row['ftime']; ?></td>
                <td style="vertical-align:middle; text-align: center;"><?php echo $row['tplace']; ?></td>
                <td style="vertical-align:middle; text-align: center;"><?php echo $row['ttime']; ?></td>
                <td style="vertical-align:middle; text-align: center;"><?php echo $row['transit']; ?></td>
                <td style="vertical-align:middle; text-align: center;"><?php echo $row['purpose']; ?></td>
                <?php /*?><td style="vertical-align:middle; text-align: center;"><?php echo round($row['taka']); ?></td><?php */?>
                <td style="vertical-align:middle; text-align: center;"><?php echo $row['taka']; ?></td>
                <td style="vertical-align:middle; text-align: center;"><?php echo $row['remarks']; ?></td>
              </tr>
            
              
            
        </tbody>
      <?php
            $ttotal += $row['taka'];
			$ttotal1=strrchr($ttotal,".");
			$ttotal1=str_replace(".","",$ttotal1);
          }
      ?>
      <tr>
        <td colspan="6" style="vertical-align:middle;"><strong>Total Taka:</strong></td>
        <?php /*?><td><strong><?php echo $ttotal=round(number_format((float)$ttotal, 2, '.', '')); ?></strong></td><?php */?>
        <td><strong><?php echo $ttotal; ?></strong></td>
        <td>&nbsp;</td>
      </tr>
      </table>

    </div>
    <div class="text-bottom">
      <?php /*?><p>Taka (In words) <span><strong><?php echo $this->numbertowordconvertsconver->convert_number($ttotal) . " Only"; ?></strong></span></p><?php */?>
      <p>Taka (In words) <span><strong><?php echo $this->numbertowordconvertsconver->convert_number($ttotal); ?> and <?php echo $this->numbertowordconvertsconver->convert_number($ttotal1) . " Only"; ?></strong></span></p>
    </div>
    <p style="text-align: center; font-size:10px;">Print Date:<?php echo date('d-m-Y');?></p>
    <p style="text-align:center; font-size:10px;">This Is System Generated Document</p>
    <!--<div class="bottom">-->
      <!--<div class="bottom1">
        <p>Requested By</p>
      </div>-->
     <!-- <div class="bottom2">
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
  <!--<script>
    history.pushState(null, document.title, location.href);
    history.back();
    history.forward();
    window.onpopstate = function() {
      history.go(1);
    };
  </script>-->

</body>

</html>