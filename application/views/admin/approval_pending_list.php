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


    text-align: center;
  }

  th,
  td {
    font-size: 12px;
    text-align: center;
  }
</style>

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
                    <h3 class="box-title">Approval Info</h3>
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
                  <div class="box-body table-responsive no-padding">
                    <table id="tableData" class="table table-hover table-bordered">
                      <thead style="background:#91b9e6;">
                        <tr>
                          <th>SL</th>
                          <th>Token</th>
                          <th>Employee</th>
                          <th>Line Manager</th>
                          <th>Department Head</th>
                          <!--<th>Accounts</th>-->
                          <!--<th>Accounts Head</th>-->
                          <th>From Date</th>
                          <th>To Date</th>
                          <!--<th>From Time</th>
                              <th>To Time</th>
                              <th>Purpose</th>
                              <th>Location</th>-->
                          <!--<th>Cost Details</th>-->
                          <th>Total</th>
                          <th colspan="2">Status</th>
                          <th colspan="2">Deatils</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        foreach ($ul as $row) { ?>
                          <tr>
                            <td style="vertical-align:middle;"><?php echo $i++; ?></td>
                            <?php /*?><?php
				                    if($row['mstatus']==1)
				                    {
				                    ?>
                            <td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/movement_bill_create/<?php echo $bn=$row['mid'];?>"><?php echo $row['mid'];?></a></td>
                            <?php
				                    }
				                    else
				                    {
				                    ?>
                            <td style="vertical-align:middle;"><?php echo $row['mid'];?></td>
                            <?php
				                    }
				                    ?><?php */ ?>
                            <td style="vertical-align:middle;"><?php echo $row['mid']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['username']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['lname']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['dname']; ?></td>
                            <?php /*?><td style="vertical-align:middle;"><?php echo $row['aname'];?></td><?php */ ?>
                            <?php /*?><td style="vertical-align:middle;"><?php echo $row['ahname'];?></td><?php */ ?>
                            <td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['fdate'])); ?></td>
                            <td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['tdate'])); ?></td>
                            <?php /*?><td style="vertical-align:middle;"><?php echo $row['ftime'];?></td>
                            <td style="vertical-align:middle;"><?php echo $row['ttime'];?></td>
                            <td style="vertical-align:middle;"><?php echo $row['purpose'];?></td>
                            <td style="vertical-align:middle;"><?php echo $row['location'];?></td><?php */ ?>

                            <?php /*?> <td style="vertical-align:middle; text-align: justify;"><?php echo "Transport:&nbsp;&nbsp;".$row['transport']."<br/>"."Tiffin:&nbsp;&nbsp;".$row['tiffin']."<br/>"."Accomodation:&nbsp;&nbsp;".$row['accomodation']."<br/>"."Gift:&nbsp;&nbsp;".$row['gift']."<br/>"."Others:&nbsp;&nbsp;".$row['others']."<br/>";?></td><?php */ ?>
                            <td style="vertical-align:middle;"><?php echo number_format((float)$row['ctotal'], 2, '.', ''); ?></td>
                            <?php
                            if ($row['mstatus'] == 2) {
                            ?>
                              <td style="vertical-align:middle;"><a href="<?php echo base_url(); ?>Dashboard/movement_bill_approved/<?php echo $row['mid']; ?>/<?php echo $row['userid']; ?>">Pending</a></td>
                            <?php
                            }
                            if ($row['mstatus'] == 2) {
                            ?>
                              <td style="vertical-align:middle;"><a href="<?php echo base_url(); ?>Dashboard/movement_bill_reject/<?php echo $bn = $row['mid']; ?>/<?php echo $row['userid']; ?>">Reject</a></td>
                            <?php
                            }
                            ?>
                            <?php /*?>else
				                    {
				                    ?>
                            <td style="vertical-align:middle;">Approved</td>
                            <?php
				                    }
				                    ?><?php */ ?>
                            <td style="vertical-align:middle;"><a href="<?php echo base_url(); ?>Dashboard/movement_bill_check/<?php echo $row['mid']; ?>/<?php echo $row['userid']; ?>">Details</a></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
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