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
												<!-- <li><a class="dropdown-item" href="#">View</a></li> -->
												<li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="<?=$pro['id']?>" data-bs-what="<?=$pro['task']?>" data-bs-w="<?=$pro['start_date']?>" data-bs-wh="<?=$pro['end_date']?>" data-bs-wha="<?=$pro['description']?>" data-bs-projid="<?=$pro['project_id']?>">Edit</a></li>
											</ul>
											</div>
									<?php endif;?>
					
									
							`<?php include_once('templates/modal2.php');?>
`
									</td>
								
									
                                    
		                    	</tr>
<!-- edittask modal -->

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?=base_url()?>/edittask/<?= $uri->getSegment(2) ?>" method="post">
          <div class="mb-3">
            <input type="text" class="form-control" id="recipient-name" name="task_id" hidden>
            <input type="text" class="form-control" id="proj" name="id" hidden>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Task Name</label>
                        <input type="text" name="task" class="form-control" id="title" aria-describedby="emailHelp">
						<label for="exampleInputEmail1" class="form-label mt-2">Reassign Member</label>
						<select class="form-control form-control-sm select2"  name="members">
						<option value="<?=session()->get('studentID')?>"><?= $leader['firstname'].' '.$leader['lastname']?></option>
						<?php if($mem != null) : ?>
							<?php foreach ($mem as $stud) :?>
										<option value="<?=$stud['studentID']?>" ><?=$stud['firstname'],' ',$stud['lastname']?></option>
										<?php endforeach;?>
											<?php endif ;?>
									</select>
                <div class="col-mb-3 mt-2">
				<div class="form-group">
					<label for="">Status</label>

					<select name="task_status" id="status" class="custom-select custom-select-sm">
             
                        <option value="on-going" <?php if($pro['task_status'] == "on-going") { echo "SELECTED"; } ?>>on-going</option>
                        <option value="on-hold" <?php if($pro['task_status'] == "on-hold") { echo "SELECTED"; } ?>>on-hold</option>
                        <option value="stop" <?php if($pro['task_status'] == "stop") { echo "SELECTED"; } ?>>stop</option>
                        <option value="complete" <?php if($pro['task_status'] == "complete") { echo "SELECTED"; } ?>>complete</option>

                        </select>
                    </div>
                </div>
                        <label for="exampleInputEmail1" class="form-label" >Start Date</label>
                        <input type="date" name="start_date" class="form-control" id="start" aria-describedby="emailHelp">
						<label for="exampleInputEmail1" class="form-label">End Date</label>
                        <input type="date" name="end_date" class="form-control" id="end" aria-describedby="emailHelp">
                      
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Description</label>
                            <textarea name="description" id="desc" cols="30" rows="10" class="summernote form-control"></textarea>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
          </div>
        </form>
      </div>
     
    </div>
  </div>
</div>


								
                                <?php endforeach;?>
                                    <?php endif;?>
						</tbody>

	<!-- Add Task Modal -->
<div class="modal fade" id="addtask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
					
					
					
					
                        <h5 class="modal-title" id="exampleModalLabel">Add New Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
					
					</div>
                    <div class="modal-body">
                    <form action="<?=base_url()?>/addtask/<?= $uri->getSegment(2) ?>" method="post">
                    <div class="mb-3">
                        <input type="text" name="id" id="" value="<?= $project['id']?>" hidden="true">
                        <label for="exampleInputEmail1" class="form-label">Task Name</label>
                        <input type="text" name="task" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
						<label for="exampleInputEmail1" class="form-label">Assign Member</label>
						<select class="form-control form-control-sm select2"  name="members">
						<option value="<?=session()->get('studentID')?>"><?= $leader['firstname'].' '.$leader['lastname']?></option>
						<?php if($mem != null) : ?>
							<?php foreach ($mem as $stud) :?>
										<option value="<?=$stud['studentID']?>" ><?=$stud['firstname'],' ',$stud['lastname']?></option>
										<?php endforeach;?>
											<?php endif ;?>
									</select>

						<label for="exampleInputEmail1" class="form-label">Start Date</label>
                        <input type="date" name="start_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
						<label for="exampleInputEmail1" class="form-label">End Date</label>
                        <input type="date" name="end_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="summernote form-control">
											</textarea>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                        
                        
                    </form>
                    </div>
                   
                    </div>
                </div>
            	</div>
				
			

			
			</div>
		
		</div>
	</div>

	<!-- End TaskModal -->
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
								
							<!-- Get Task Modal -->
<div class="modal fade" id="gettask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
					
					
					
					
                        <h5 class="modal-title" id="exampleModalLabel">Task Progress</h5>
						
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							
					
					</div>
                  
                    
                        <div class="modal-body">
                    <form action="<?=base_url()?>/addproductivity/<?= $uri->getSegment(2) ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
					
					
                        <input type="text" name="project_id" id="" value="<?= $project['id']?>" hidden>
                        <label for="exampleInputEmail1" class="form-label">Select Task</label>
                        <select class="form-control form-control-sm select2" name="task_id">
			
                    		<?php foreach ($mytask as $tas) :?>
              	              	<option value="<?=$tas['id']?>" ><?=$tas['task']?></option>
              	              	
                                    <?php endforeach;?>
                                   
              	              </select>
							
                      
                        </div>

						<div class="col-mb-3">
							<div class="form-group">
							<label for="" class="control-label">Date</label>
							<input type="date" class="form-control form-control-sm" autocomplete="off" name="date" value="">
							</div>
						</div>

						<div class="col-mb-3">
							<div class="form-group">
							<label for="" class="control-label">Start Time</label>
							<input type="time" class="form-control form-control-sm" autocomplete="off" name="start_time" value="">
							</div>
						</div>

						<div class="col-mb-3">
							<div class="form-group">
							<label for="" class="control-label">End Time</label>
							<input type="time" class="form-control form-control-sm" autocomplete="off" name="end_time" value="">
							</div>
						</div>

						<div class="col-mb-3">
							<div class="form-group">
								<label for="exampleFormControlFile1">Add File</label>
								<input name = "file" type="file" class="form-control" id="exampleFormControlFile1">
							</div>
						</div>
					
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Progress Description</label>
                            <textarea name="comment" id="" cols="10" rows="10" class="summernote form-control">
											</textarea>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                        
                        
                    </form>
                    </div>
                   
                    </div>
             
                </div>
            	</div>
				<script>
					var exampleModal = document.getElementById('exampleModal')
						exampleModal.addEventListener('show.bs.modal', function (event) {
						// Button that triggered the modal
						var button = event.relatedTarget
						// Extract info from data-bs-* attributes
						var recipient = button.getAttribute('data-bs-whatever')
						// If necessary, you could initiate an AJAX request here
						// and then do the updating in a callback.
						//
						// Update the modal's content.
						var modalTitle = exampleModal.querySelector('.modal-title')
						var modalBodyInput = exampleModal.querySelector('.modal-body input')

						modalTitle.textContent = 'New message to ' + recipient
						modalBodyInput.value = recipient
						})
				</script>

				<!-- end modal -->

								
                                <?php endforeach;?>
                                    <?php endif;?>

									<!-- evaluation -->


						</tbody>
						</table>

				</div>
            </div>

		</div>
	</div> <!-- end all get task -->



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


