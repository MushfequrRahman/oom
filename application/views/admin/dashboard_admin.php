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
    font-size: 10px;
    text-align: center;
  }

  .info-box-number {
    display: block;
    font-weight: bold;
    font-size: 12px;
  }

  .fayellow {
    color: #FF6;
  }

  .fared {
    color: #900;
  }

  .faorange {
    color: #F90;
  }

  div.scrollable-table-wrapper {
    height: 500px;
    overflow: auto;
  }

  .header {
    position: sticky;
    top: 0;
  }

  .text-right-input {
    text-align: right;
    width: 100%;
    padding: 0 10px 0 0;
  }
</style>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content-header">
        <h1>DASHBOARD(version-2)</h1>
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="box box-danger">
                  <div class="box-header with-border">
                    <?php $this->session->userdata('userid'); ?>
                    <?php $this->session->userdata('user_type'); ?>
                    <h3 class="box-title"></h3>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="chart-container" style="position: relative;">
                            <canvas id="my_Chart"></canvas>
                        </div>
                      </div>
                    </div>
                    <br/>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="chart-container" style="position: relative;">
                          <canvas id="my_Chart1"></canvas>
                        </div>
                      </div>
                     </div>
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
			// Data define for bar chart
			var cData = JSON.parse(`<?php echo $chart_data; ?>`);
			var myData = {
				//labels: ["Std OP", "Ex OP", "Pr OP", "Run Mach", "Std Hel", "Ex Hel", "Pr Hel","Std WS","Pr Manpower","Ex WS","Lv OP","Lv Hel","Ab OP","Ab Hel","Op > Helper","Op Ab%","Hel Ab%","OP Rec","Op Sep"],
				labels: cData.label,
				datasets: [{
					label: "Monthly Unit Wise Bill",
					fill: false,
					backgroundColor: ['#01B0f1', '#FEC000', '#000000', '#01CC00', '#01B0f1', '#FEC000', '#000000', '#01B0f1', '#FEC000', '#000000','#FD0100','#FD0100','#FD0100','#FD0100'],
					borderColor: 'black',
					//data: [85, 60,70, 50, 18, 20, 45, 30, 20],
					data: cData.data,
				}]
			};
			// Options to display value on top of bars
			var myoption = {
				tooltips: {
					enabled: true
				},
				hover: {
					animationDuration: 1
				},
				animation: {
				duration: 1,
				onComplete: function () {
					var chartInstance = this.chart,
						ctx = chartInstance.ctx;
						ctx.textAlign = 'center';
						ctx.fillStyle = "rgba(0, 0, 0, 1)";
						ctx.textBaseline = 'bottom';
						this.data.datasets.forEach(function (dataset, i) {
							var meta = chartInstance.controller.getDatasetMeta(i);
							meta.data.forEach(function (bar, index) {
								var data = dataset.data[index];
								ctx.fillText(data, bar._model.x, bar._model.y - 5);
							});
						});
					}
				}
			};
			//Code to drow Chart
			var ctx = document.getElementById('my_Chart').getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'bar',    	// Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
		</script>

<script>
			// Data define for bar chart
			var cData = JSON.parse(`<?php echo $chart_data1; ?>`);
			var myData = {
				//labels: ["Std OP", "Ex OP", "Pr OP", "Run Mach", "Std Hel", "Ex Hel", "Pr Hel","Std WS","Pr Manpower","Ex WS","Lv OP","Lv Hel","Ab OP","Ab Hel","Op > Helper","Op Ab%","Hel Ab%","OP Rec","Op Sep"],
				labels: cData.label,
				datasets: [{
					label: "Monthly Department Wise Bill",
					fill: false,
					backgroundColor: ['#01B0f1', '#FEC000', '#000000', '#01CC00', '#01B0f1', '#FEC000', '#000000', '#01B0f1', '#FEC000', '#000000','#FD0100','#FD0100','#FD0100','#FD0100'],
					borderColor: 'black',
					//data: [85, 60,70, 50, 18, 20, 45, 30, 20],
					data: cData.data,
				}]
			};
			// Options to display value on top of bars
			var myoption = {
				tooltips: {
					enabled: true
				},
				hover: {
					animationDuration: 1
				},
				animation: {
				duration: 1,
				onComplete: function () {
					var chartInstance = this.chart,
						ctx = chartInstance.ctx;
						ctx.textAlign = 'center';
						ctx.fillStyle = "rgba(0, 0, 0, 1)";
						ctx.textBaseline = 'bottom';
						this.data.datasets.forEach(function (dataset, i) {
							var meta = chartInstance.controller.getDatasetMeta(i);
							meta.data.forEach(function (bar, index) {
								var data = dataset.data[index];
								ctx.fillText(data, bar._model.x, bar._model.y - 5);
							});
						});
					}
				}
			};
			//Code to drow Chart
			var ctx = document.getElementById('my_Chart1').getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'bar',    	// Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
		</script>


</body>

</html>