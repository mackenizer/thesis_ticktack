<?php $i = 1?>
<?php $uri = service('uri'); 

?>
<!-- start wrapepr -->
<div class="wrapper">
  <?php include('templates/nav.php')?>
  <?php include('templates/sidenav.php')?>
  <?php if(session()->get('success')): ?>
                    <div class="alert alert-success text-center" role="alert">
                        <?= session()->get('success') ?>
                    </div>
               
                <?php endif; ?>
  <?php include('templates/projectinfo.php')?>

 <div class="container">
	<h4>Gannt Chart</h4>
	<div id="timeline" style="height: 180px;"></div>
 </div>

<div class="container">
 <div class="row">
	<div class="col-md-12"> <!-- all task -->
		<div class="card card-outline">
			<div class="card-header"> <!-- header -->
					<span><b>Task List:</b></span>
					<div class="card-tools">
					
				</div>
			</div><!--  end header -->

			<div class="card-body p-0">
					<div class="table-responsive">
					<table class="table table-condensed m-0 table-hover">
						<colgroup>
							<col width="5%">
							<col width="25%">
							<col width="30%">
							<col width="15%">
							<col width="15%">
						</colgroup>
						<thead>
							<th>Task</th>
							<th>Assign Members</th>
							<th>Status</th>
							<th>Time Rendered</th>
							<th>Ratings</th>
							
						
						</thead>
						<tbody>
						<?php if($prod != null) :?>
                            <?php foreach($prod as $pro) :?>
								<tr>

			    
			                        <td class=""><b><?= $pro['task']?></b></td>
			                        <td class=""><p class="truncate"><?= $pro['Name']?></p></td>
			                        <td>
									<?php
										if($pro['task_status'] =='on-going'){
										echo "<span class='badge badge-secondary'>{$pro['task_status']}</span>";
										}elseif($pro['task_status'] =='revision'){
										echo "<span class='badge badge-info'>{$pro['task_status']}</span>";
										}elseif($pro['task_status'] =='on-hold'){
										echo "<span class='badge badge-warning'>{$pro['task_status']}</span>";
										}elseif($pro['task_status'] =='complete'){
										echo "<span class='badge badge-success'>{$pro['task_status']}</span>";
										}
									?>
									</td>
			                     
									<td>
									<p><?=($pro['total_time_rendered'])?$pro['total_time_rendered']:'0'?> Hrs</p>
						
									</td>
									</td>
									<td>
									<p><?=($pro['rate'])?$pro['rate']:'0'?> </p>
						
									</td>

								
								
									
									
									
							<?php include_once('templates/modal2.php');?>

									
								
									
                                    
		                </tr>

							



				


								
                                <?php endforeach;?>
                                    <?php endif;?>
						</tbody>

	
					</table>
					
				</div>
            </div>

		</div>
	</div> <!-- end all task -->

 </div>						
 </div>




 


</div><!-- end wrapper -->





<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['timeline']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var container = document.getElementById('timeline');
        var chart = new google.visualization.Timeline(container);
        var dataTable = new google.visualization.DataTable();

        dataTable.addColumn({ type: 'string', id: 'Duration' });
        dataTable.addColumn({ type: 'date', id: 'Start' });
        dataTable.addColumn({ type: 'date', id: 'End' });
		/* var bay = [
          [ 'Washington', new Date(1789, 3, 30), new Date(1797, 2, 4) ],
          [ 'Adams',      new Date(1797, 2, 4),  new Date(1801, 2, 4) ],
          [ 'Jefferson',  new Date(1801, 2, 4),  new Date(1809, 2, 4) ]];

 */	var bay =
			[<?php foreach($task as $tas):?>
				["<?=$tas['task']?>", new Date(<?=date("Y, n, j",strtotime($tas['start_date']))?>),new Date(<?=date("Y, n, j",strtotime($tas['end_date']))?>)],
			<?php endforeach?>]	;
        dataTable.addRows(bay);
        chart.draw(dataTable);
      }
    </script>






<?php include('templates/scripts.php')?>


