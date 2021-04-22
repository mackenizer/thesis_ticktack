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
					<?php if($leader['leader_id'] == session()->get('studentID')) :?>
						<button class="btn btn-primary bg-gradient-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#addtask"><i class="fas fa-plus-square"></i> Add Task</button>
					<?php endif; ?>
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
							<?php if(session()->get('role') == 'adviser' || session()->get('studentID') == $leader['leader_id']) :?> <th>Action</th><?php endif;?>
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
										}elseif($pro['task_status'] =='stop'){
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

									<td>
									<?php if(session()->get('role') == 'adviser' ) :?>
									<?php if($pro['task_status'] == 'complete'):?>
										
										<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-whatever="<?=$pro['id']?>">Evaluate</button>
										
									<?php endif;?>
									<?php else :?>
										<div class="dropdown">
											<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
												Action
											</a>

											<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
												<li><a class="dropdown-item" href="#">View</a></li>
												<li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="<?=$pro['id']?>" data-bs-what="<?=$pro['task']?>" data-bs-w="<?=$pro['start_date']?>" data-bs-wh="<?=$pro['end_date']?>" data-bs-wha="<?=$pro['description']?>" data-bs-projid="<?=$pro['project_id']?>">Edit</a></li>
											</ul>
											</div>
									<?php endif;?>
					
									
							`
`
									</td>
								

                                    
		                    	</tr>
								
                                <?php endforeach;?>
                                    <?php endif;?>
						</tbody>
						<?php include('templates/modal2.php')?>
					</table>
					
				</div>
            </div>

		</div>
	</div> <!-- end all task -->

 </div>						
 </div>
<!--  my list -->
<?php if(session()->get('adviserID') == null ) :?>
<div class="container">
 <div class="row">
	<div class="col-md-12"> <!-- all task -->
		<div class="card card-outline">
			<div class="card-header"> <!-- header -->
					<span><b>My List:</b></span>
					<div class="card-tools">
					
						<button class="btn btn-primary bg-gradient-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#gettask"><i class="fas fa-plus-square"></i> Add Progress</button>
				
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
						</thead>
						<tbody>
						<?php if($mytask != null) :?>
                            <?php foreach($mytask as $pro) :?>
								<tr>

			    
			                        <td class=""><b><?= $pro['task']?></b></td>
			                        <td class=""><p class="truncate"><?= $pro['Name']?></p></td>
			                        <td>
									<?php
										if($pro['task_status'] =='on-going'){
										echo "<span class='badge badge-secondary'>{$pro['task_status']}</span>";
										}elseif($pro['task_status'] =='stop'){
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

                                    
		                    	</tr>
								
								
								<?php include('templates/modals.php')?>
                                <?php endforeach;?>
                                    <?php endif;?>

									<!-- evaluation -->


						</tbody>
						</table>
				</div>
            </div>

		</div>
	</div> <!-- end all task -->



 </div>
										
 </div>
 <?php endif;?>


 <?php include('templates/progress.php')?>


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


