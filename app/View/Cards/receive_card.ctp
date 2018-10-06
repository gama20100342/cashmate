<?php ?>

<!--section class="content-header">
	<ol class="breadcrumb" >
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Dashboard</a></li>
	</ol>
</section><br/><br/-->

<div class="cards index col-md-12 m-t-10">
<div class="col-md-4 nopadding-left">
	<div class="panel panel-success noradius noradius">
		<div class="panel-heading">
			<div class="bold">Total Card per Status</div>
			<div class="fs-9">As of <?php echo date("F d, Y"); ?></div>
		</div>
		<div class="panel-body p-b-3 p-t-5">
			<ul class="list-group noradius nomargin nopadding">
				<li class="list-group-item noradius noborder nopadding">
					<div class="col-md-6 nopadding">Active</div>
					<div class="col-md-6 bold fs-12 text-right"><?php echo $active_card; ?></div>
					<div class="clear"></div>
				</li>
				<li class="list-group-item noradius noborder nopadding">
					<div class="col-md-6 nopadding">Inactive</div>
					<div class="col-md-6 bold fs-12 text-right"><?php echo $inactive_card; ?></div>
					<div class="clear"></div>
				</li>
				<li class="list-group-item noradius noborder nopadding">
					<div class="col-md-6 nopadding">Stolen</div>
					<div class="col-md-6 bold fs-12 text-right"><?php echo $suspended_card; ?></div>
					<div class="clear"></div>
				</li>
				<li class="list-group-item noradius noborder nopadding">
					<div class="col-md-6 nopadding">Lost</div>
					<div class="col-md-6 bold fs-12 text-right"><?php echo $lost_card; ?></div>
					<div class="clear"></div>
				</li>
				<li class="list-group-item noradius noborder nopadding">
					<div class="col-md-6 nopadding">Temporary Blocked</div>
					<div class="col-md-6 bold fs-12 text-right"><?php echo $lost_card; ?></div>
					<div class="clear"></div>
				</li>
				<li class="list-group-item noradius noborder nopadding">
					<div class="col-md-6 nopadding">Permanent Blocked</div>
					<div class="col-md-6 bold fs-12 text-right"><?php echo $lost_card; ?></div>
					<div class="clear"></div>
				</li>				
			</ul>
		</div>
	</div>
</div>

<div class="col-lg-2 nopadding">
	<div class="small-box bg-green noradius">
		<div class="inner noborder">
			<div class="fs-60 bold"><?php echo $count_pending; ?></div>
			<div  class="fs-11">For Approval Applications</div>
			<div class="fs-9 m-b-8">As of June 19, 2018</div>
		</div>
		<div class="icon">
			<i class="fa fa-credit-card"></i>
		</div>
		<?php 
			echo $this->Html->link('Show Details <i class="fa fa-arrow-circle-right"></i>', 
				array('controller' => 'cardapplications', 'action' => 'index'), 
				array('class' => 'small-box-footer', 'escape' => false)
			); 
		?> 	
	</div>
</div>

<div class="col-lg-2 nopadding">
	<div class="small-box bg-gray noradius">
		<div class="inner noborder">
			<div class="fs-60 bold"><?php echo $application_this_week; ?></div>
			
			<div class="fs-11">These Week Applications</div>
			<div class="fs-9 m-b-8"><?php echo date('Y M d', strtotime($monday)); ?> - <?php echo date('Y M d', strtotime($sunday)); ?></div>

		</div>
		<div class="icon">
			<i class="fa fa-id-card"></i>
		</div>
		<a href="#" class="small-box-footer">
			Show Details <i class="fa fa-arrow-circle-right"></i>
		</a>
	</div>
</div>

<div class="col-lg-2 nopadding">
	<div class="small-box bg-gray noradius">
		<div class="inner noborder">
			<div class="fs-60 bold"><?php echo $application_this_month; ?></div>			
			<div class="fs-11">These Month Applications</div>
			<div class="fs-9 m-b-8"><?php echo date('Y M d', strtotime($first_date)); ?> - <?php echo date('Y M d', strtotime($last_date)); ?></div>
		</div>
		<div class="icon">
			<i class="fa fa-id-card"></i>
		</div>
		<a href="#" class="small-box-footer">
			Show Details <i class="fa fa-arrow-circle-right"></i>
		</a>
	</div>
</div>
<div class="col-lg-2 nopadding">
	<div class="small-box bg-red noradius">
		<div class="inner noborder">
			<div class="fs-60 bold"><?php echo $application_this_month; ?></div>
			
		<div class="fs-11">Expired Cards</div>
		<div class="fs-9 m-b-8">As of <?php echo date('Y M d H:i:s A'); ?></div>
			
			
		</div>
		<div class="icon">
			<i class="fa fa-id-card-alt"></i>
		</div>
		<a href="#" class="small-box-footer">
			Show Details <i class="fa fa-arrow-circle-right"></i>
		</a>
	</div>
</div>
<div class="clear"></div>

<div id="container" class="col-md-12 nopadding m-t-10 m-b-10">
	<canvas id="canvas"></canvas>
	<div class="clear"></div>
</div>

<div class="clear"></div>
<div class="col-md-12 m-b-30">
	<h4 class="nopadding nomargin">Total Transaction Report ( <?php echo date('Y'); ?> ) </h4>
	<?php echo $this->App->tHead(
		array(
			'Cash Out', 
			'Purchase',
			'Balance Inquiries',
			'Load Cash',
			'Change PIN',
			'Bills Payment',
		));?>
		<tbody>
			<tr>
				<td><?php echo array_sum($_cashout); ?></td>
				<td><?php echo array_sum($_purchase); ?></td>
				<td><?php echo array_sum($_balance); ?></td>
				<td><?php echo array_sum($_load); ?></td>
				<td><?php echo array_sum($_changepin); ?></td>
				<td><?php echo array_sum($_billspayment); ?></td>			
			</tr>
		</tbody>
	<?php echo $this->App->tFoot(); ?>
</div>
<div class="clear"></div>

</div>
<div class="clear"></div>



<?php

	
	
	echo $this->Js->Buffer('
		$(document).ready( function(){
			
				
				function getTotalTransactions(mo, year, trans){
					$.ajax({
						
					});
				}	
				
				
				var MONTHS = [];	
				
				/*--------------------
				| Chart configuration
				--------------------*/
				var config = {
					type: "bar",
					data: {
					labels: [
						"January", 
						"February", 
						"March", 
						"April",
						"May", 
						"June", 
						"July", 
						"August", 
						"September", 
						"October", 
						"November", 
						"December"
					],					
					datasets: [
					{
						label: "Cash Out",
						backgroundColor: window.chartColors.red,
						borderColor: window.chartColors.red,
						data: [
							"'.implode('","', $_cashout).'"
						],
						fill: false,
					},
					{
						label: "Cash Load",
						fill: false,
						backgroundColor: window.chartColors.blue,
						borderColor: window.chartColors.blue,
						data: [
							"'.implode('","', $_load).'"
						],
					},
					{
						label: "Purchases",
						fill: false,
						backgroundColor: window.chartColors.green,
						borderColor: window.chartColors.green,
						data: [
							"'.implode('","', $_purchase).'"
						],
					},
					{
						label: "Change PIN",
						fill: false,
						backgroundColor: window.chartColors.purple,
						borderColor: window.chartColors.purple,
						data: [
							"'.implode('","', $_changepin).'"
						],
					},
					{
						label: "Bills Payment",
						fill: false,
						backgroundColor: window.chartColors.yellow,
						borderColor: window.chartColors.yellow,
						data: [
							"'.implode('","', $_billspayment).'"
						],
					},
					{
						label: "Balance Inquiries",
						fill: false,
						backgroundColor: window.chartColors.orange,
						borderColor: window.chartColors.orange,
						data: [
							"'.implode('","', $_balance).'"
						],
					}
					]
				},
				options: {
					responsive: true,
					title: {
						display: true,
						text: "Transactions Graph Report"
					},
					tooltips: {
						mode: "index",
						intersect: false,
					},
					hover: {
						mode: "nearest",
						intersect: false
					},
					scales: {
						xAxes: [{
							display: true,
							scaleLabel: {
								display: true,
								labelString: "Month"
							}
						}],
						yAxes: [{
							display: true,							
							ticks: {
								beginAtZero:true,
								min:0,
								suggestedMax:100,
							},
							scaleBeginAtZero: true,
							scaleLabel: {
								display: true,
								labelString: "2018"
							}
						}]
					}
				}
			};
			
			/*---------------------
			| End of configuration
			---------------------*/

			window.onload = function() {
				var ctx = document.getElementById("canvas").getContext("2d");
				window.myLine = new Chart(ctx, config);
			};

			/*document.getElementById("randomizeData").addEventListener("click", function() {
				config.data.datasets.forEach(function(dataset) {
					dataset.data = dataset.data.map(function() {
						return randomScalingFactor();
					});

				});

				window.myLine.update();
			});

			var colorNames = Object.keys(window.chartColors);
			
			document.getElementById("addDataset").addEventListener("click", function() {
				var colorName = colorNames[config.data.datasets.length % colorNames.length];
				var newColor = window.chartColors[colorName];
				var newDataset = {
					label: "Dataset " + config.data.datasets.length,
					backgroundColor: newColor,
					borderColor: newColor,
					data: [],
					fill: false
				};

				for (var index = 0; index < config.data.labels.length; ++index) {
					newDataset.data.push(randomScalingFactor());
				}

				config.data.datasets.push(newDataset);
				window.myLine.update();
			});

			document.getElementById("addData").addEventListener("click", function() {
				if (config.data.datasets.length > 0) {
					var month = MONTHS[config.data.labels.length % MONTHS.length];
					config.data.labels.push(month);

					config.data.datasets.forEach(function(dataset) {
						dataset.data.push(randomScalingFactor());
					});

					window.myLine.update();
				}
			});

			document.getElementById("removeDataset").addEventListener("click", function() {
				config.data.datasets.splice(0, 1);
				window.myLine.update();
			});

			document.getElementById("removeData").addEventListener("click", function() {
				config.data.labels.splice(-1, 1);

				config.data.datasets.forEach(function(dataset) {
					dataset.data.pop();
				});

				window.myLine.update();
			});*/
			
		});
		
	');
?>