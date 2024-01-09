<style>
    .error {
        color: red;
    }

    em {
        color: red;
    }

    label {
        font-size: 12px;
    }

    th {
        font-size: 12px;
    }
</style>
<?php
$transitmode = '';
foreach ($ml as $row) {
    $transitmode .= '<option value="' . $row["tmid"] . '">' . $row["transit"] . '</option>';
}
?>

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
                                        <h3 class="box-title">Bill Create</h3>
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
                                    <div class="box-body">
                                        <?php /*?><form role="form" autocomplete="off" action="<?php echo base_url();?>Dashboard/movement_bill_insert" method="post" enctype="multipart/form-data"><?php */ ?>
                                        <span style="text-align:center" id="error"></span>
                                        <div style="text-align:center" id="item_table"></div>
                                        <form role="form" name="insert_form" id="insert_form" autocomplete="off" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="mtoken" value="<?php echo $mtoken; ?>">
                                            </div>
                                            <div id="AuGroup">
                                                <div class="row">
                                                    <table class="table table-bordered" id="item_table1">
                                                        <thead>
                                                            <tr>
                                                                <!--<th style="text-align:center;">Bill Date</th>
                                                                <th style="text-align:center;">Billing Unit</th>-->
                                                                <!--<th style="text-align:center;">Bill For</th>-->
                                                                <th style="text-align:center;">Bill Type</th>
                                                                <th style="text-align:center;">From Place</th>
                                                                <th style="text-align:center;">From Time</th>
                                                                <th style="text-align:center;">To Place</th>
                                                                <th style="text-align:center;">To Time</th>
                                                                <th style="text-align:center;">Purpose</th>

                                                                <th style="text-align:center;">Taka</th>
                                                                <th style="text-align:center;">Remarks</th>
                                                                <th style="vertical-align:middle;text-align:center;"><button type="button" name="add" class="btn btn-success btn-xs add"><span class="glyphicon glyphicon-plus"></span></button></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="box-footer text-center">
                                                <input type="submit" class="btn btn-primary submit" name="submit" value="CREATE" />
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



    <script>
        $(document).ready(function() {

            var count = 0;

            $(document).on('click', '.add', function() {

                count++;
                var html = '';
                html += '<tr>';

                html += '<td><select name="mode[]" class="form-control billtype"><option value="">Select</option><?php echo $transitmode; ?></select></td>';
                html += '<td><input type="text" name="fplace[]" class="form-control fplace" /></td>';
                html += '<td><input type="text" readonly name="ftime[]" class="form-control ftime timepicker" /></td>';
                html += '<td><input type="text" name="tplace[]" class="form-control tplace" /></td>';
                html += '<td><input type="text" readonly name="ttime[]" class="form-control ttime timepicker" /></td>';
                html += '<td><textarea class="form-control purpose" rows="1" name="purpose[]" id="purpose"></textarea></td>';

                html += '<td><input type="text" name="taka[]" class="form-control taka" /></td>';
                html += '<td><textarea class="form-control remarks" rows="1" name="remarks[]" id="remarks"></textarea></td>';
                html += '<td style="vertical-align:middle;"><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-remove"></span></button></td>';
                $('tbody').append(html);
            });

            $(document).on('click', '.remove', function() {
                $(this).closest('tr').remove();
            });



            $('tbody').on('focus', ".timepicker", function() {
                $(this).timepicker({

                    format: 'LT'
                });
            });


            $('#insert_form').on('submit', function(event) {
                event.preventDefault();
                var error = '';


                //$('.billfor').each(function() {
                //                    var count = 1;
                //                    if ($(this).val() == '') {
                //                        error += '<p>Enter Bill for at ' + count + ' Row</p>';
                //                        return false;
                //                    }
                //                    count = count + 1;
                //                });

                $('.fplace').each(function() {
                    var count = 1;
                    if ($(this).val() == '') {
                        error += '<p>Enter From Place at ' + count + ' Row</p>';
                        return false;
                    }
                    count = count + 1;
                });

                $('.ftime').each(function() {
                    var count = 1;

                    if ($(this).val() == '') {
                        error += '<p>Enter From Time at ' + count + ' row</p>';
                        return false;
                    }

                    count = count + 1;

                });

                $('.tplace').each(function() {

                    var count = 1;

                    if ($(this).val() == '') {
                        error += '<p>Enter To Place at ' + count + ' Row</p> ';
                        return false;
                    }

                    count = count + 1;

                });

                $('.ttime').each(function() {

                    var count = 1;

                    if ($(this).val() == '') {
                        error += '<p>Enter To Time at ' + count + ' Row</p> ';
                        return false;
                    }

                    count = count + 1;

                });

                $('.purpose').each(function() {

                    var count = 1;

                    if ($(this).val() == '') {
                        error += '<p>Enter Purpose at ' + count + ' Row</p> ';
                        return false;
                    }

                    count = count + 1;

                });

                $('.billtype').each(function() {

                    var count = 1;

                    if ($(this).val() == '') {
                        error += '<p>Enter Bill Type at ' + count + ' Row</p> ';
                        return false;
                    }

                    count = count + 1;

                });

                $('.taka').each(function() {

                    var count = 1;

                    if ($(this).val() == '') {
                        error += '<p>Enter Taka at ' + count + ' Row</p> ';
                        return false;
                    }

                    count = count + 1;

                });

                var form_data = $(this).serialize();
                //alert(form_data);
                if (error == '') {
                    $('input[type="submit"]').attr('disabled', true);
                    //alert('hello');
                    $.ajax({
                        url: "<?php echo base_url(); ?>Dashboard/movement_bill_insert1",
                        //dataType:"json",
                        method: "get",
                        data: form_data,
                        success: function(data) {
                            //alert(data);
                            if (data == 'ok') {
                                document.forms['insert_form'].reset();
                                $('#item_table1').find('tr:gt(0)').remove();
                                $('#error').html('<div class="alert alert-success">Conveyance Bill Details Saved</div>');
                                // $('input[type="submit"]').attr('disabled', true);
		
                                window.setTimeout(function() {
                                    location.reload()
                                }, 3000)
                                window.location.href = "<?php echo base_url(); ?>Dashboard/movement_list";
                            }
                        }
                    });
                } else {
                    $('#error').html('<div class="alert alert-danger">' + error + '</div>');
                }

            });

        });
    </script>

    <script>
        $(function() {
            $("input[class*='taka']").keydown(function(event) {


                if (event.shiftKey == true) {
                    event.preventDefault();
                }

                if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

                } else {
                    event.preventDefault();
                }

                if ($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
                    event.preventDefault();

            });
        });
    </script>
</body>

</html>