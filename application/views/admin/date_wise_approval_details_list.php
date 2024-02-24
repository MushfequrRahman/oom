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

  td {
    font-weight: 600;
    /*font-variant:small-caps;*/
  }
</style>
<script>
  $(function() {
    $("table").tablesorter({
      theme: 'blue',
      widgets: ['math', 'zebra', 'filter'],
      widgetOptions: {
        math_data: 'math', // data-math attribute
        math_ignore: [0, 1],
        math_none: 'N/A', // no matching math elements found (text added to cell)
        math_complete: function($cell, wo, result, value, arry) {
          var txt = '<span class="align-decimal">' +
            (value === wo.math_none ? '' : ' ') +
            result + '</span>';
          if ($cell.attr('data-math') === 'all-sum') {
            // when the "all-sum" is processed, add a count to the end
            return txt + ' (Sum of ' + arry.length + ' cells)';
          }
          return txt;
        },
        math_completed: function(c) {
          // c = table.config
          // called after all math calculations have completed
          console.log('math calculations complete', c.$table.find('[data-math="all-sum"]:first').text());
        },
        // see "Mask Examples" section
        math_mask: '#,##0.00',
        math_prefix: '', // custom string added before the math_mask value (usually HTML)
        math_suffix: '', // custom string added after the math_mask value
        // event triggered on the table which makes the math widget update all data-math cells (default shown)
        math_event: 'recalculate',
        // math calculation priorities (default shown)... rows are first, then column above/below,
        // then entire column, and lastly "all" which is not included because it should always be last
        math_priority: ['row', 'above', 'below', 'col'],
        // set row filter to limit which table rows are included in the calculation (v2.25.0)
        // e.g. math_rowFilter : ':visible:not(.filtered)' (default behavior when math_rowFilter isn't set)
        // or math_rowFilter : ':visible'; default is an empty string
        math_rowFilter: ''
      }
    });
  });
</script>

<!-- /.box-header -->
<div class="box-body no-padding">

  <div class="table-responsive">
    <table id="tableData" class="table table-hover table-bordered">
      <thead style="background:#91b9e6;">
        <tr>
          <th>SL</th>
          <th>Token</th>
          <th>Billing Unit</th>
          <th>Employee</th>
          <th>Department</th>
          <th>Line Manager</th>
          <th>Department Head</th>
          <th>Accounts</th>
          <th>From Date</th>
          <th>To Date</th>
          <th>Transit</th>
          <th>Transit Type</th>
          <th>Amount</th>
          <th>Month</th>
          <th>Year</th>
          <th>Status</th>
          <th>Accounted By</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th colspan="11">Totals</th>
          <th>&nbsp;</th>
          <th data-math="col-sum">col-sum</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr>
      </tfoot>
      <tbody>
        <?php
        $i = 1;
        foreach ($ul as $row) { ?>
          <tr>
            <td style="vertical-align:middle;"><?php echo $i++; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['mid']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['billingunit']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['username']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['departmentname']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['lname']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['dname']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['aname']; ?></td>
            <td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['fdate'])); ?></td>
            <td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['tdate'])); ?></td>
            <td style="vertical-align:middle;"><?php echo $row['transit']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['transittype']; ?></td>
            <td style="vertical-align:middle;"><?php echo number_format($row['taka'], 2, '.', ','); ?></td>
            <td style="vertical-align:middle;"><?php echo $row['smonth']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['syear']; ?></td>
            <?php
            if ($row['mstatus'] == 2) {
            ?>
              <td style="vertical-align:middle;">Pending</td>
            <?php
            } elseif ($row['mstatus'] == 0) {
            ?>
              <td style="vertical-align:middle;">Rejected</td>
            <?php
            } elseif ($row['mstatus'] == 3) {
            ?>
              <td style="vertical-align:middle;">Waiting For Accounts</td>
              <?php
            } elseif ($row['mstatus'] == 4) {
              ?>
              <td style="vertical-align:middle;">Approved By Accounts</td>
            <?php
            }
            ?>

            <td style="vertical-align:middle;"><?php echo $row['accappuser']; ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>