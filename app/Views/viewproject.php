<?php $i = 1?>
<?php $uri = service('uri'); 

?>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand" style="background-color: #32be8f">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
            <li class="nav-item">
        <a class="nav-link text-white" data-widget="pushmenu" href="" role="button"><i class="fas fa-bars"></i></a>
      </li>
         
    </ul>

    <ul class="navbar-nav ml-auto">
     
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
     <li class="nav-item dropdown">
            <a class="nav-link"  data-toggle="dropdown" aria-expanded="true" href="javascript:void(0)">
              <span>
                <div class="d-felx badge-pill">
                  <span class="text-white fa fa-user mr-2"></span>
                  <span class="text-white"><b><?php echo session()->get('firstname').' '. session()->get('lastname') ?></b></span>
                  <span class="text-white fa fa-angle-down ml-2"></span>
                </div>
              </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
              <a class="dropdown-item" href="javascript:void(0)" id="manage_account"><i class="fa fa-cog"></i> Manage Account</a>
              <a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- <script>
     $('#manage_account').click(function(){
        uni_modal('Manage Account','manage_user.php?id=1')
      })
  </script> -->
    <aside class="main-sidebar elevation-4">
    <div class="dropdown">
   	<a href="./" class="brand-link">
       <img src="<?=base_url()?>/assets/images/loggo.jpg" alt="" width="100%" height="200px">
    </a>
      
    </div>
    <div class="sidebar pb-4 mb-4">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item dropdown">
            <a href="<?=base_url()?>/dashboard" class="nav-link nav-home">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>  
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_project nav-view_project">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>
                Projects
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                          <li class="nav-item">
                <a href="<?=base_url()?>/newproject" class="nav-link nav-new_project tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Create Project</p>
                </a>
              </li>
                          <li class="nav-item">
                <a href="<?=base_url()?>/projectlist" class="nav-link nav-project_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li> 
          <li class="nav-item">
                <a href="<?=base_url()?>/tasklist" class="nav-link nav-task_list">
                  <i class="fas fa-tasks nav-icon"></i>
                  <p>Task</p>
                </a>
          </li>
                     <li class="nav-item">
                <a href="<?=base_url()?>/report" class="nav-link nav-reports">
                  <i class="fas fa-th-list nav-icon"></i>
                  <p>Report</p>
                </a>
          </li>
                              <!-- <li class="nav-item">
            <a href="#" class="nav-link nav-edit_user">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_user" class="nav-link nav-new_user tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=user_list" class="nav-link nav-user_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li> -->
            </ul>
          </li>
                </ul>
      </nav>
    </div>
  </aside>
  <!-- <script>
  	$(document).ready(function(){
      var page = 'view_project';
  		var s = '';
      if(s!='')
        page = page+'_'+s;
  		if($('.nav-link.nav-'+page).length > 0){
             $('.nav-link.nav-'+page).addClass('active')
  			if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
            $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
  				$('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
  			}
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

  		}
     
  	})
  </script> -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	 <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
	    <div class="toast-body text-white">
	    </div>
	  </div>
    <div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div><!-- /.col -->

        </div><!-- /.row -->
            <hr class="border-primary">
            <?php if(session()->get('success')): ?>
                    <div class="alert alert-success text-center" role="alert">
                        <?= session()->get('success') ?>
                    </div>
               
                <?php endif; ?>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <div class="col-lg-12">
	<div class="row">
		<div class="col-md-12">
			<div class="callout callout-primary">
				<div class="col-md-12">
					<div class="row">
						<div class="col-sm-6">
                        <?php if($project != null) :?>
							<dl>
								<dt><b class="border-bottom border-primary">Project Name</b></dt>
								<dd><?= $project['name']?></dd>
								<dt><b class="border-bottom border-primary">Description</b></dt>
								<dd><?= $project['description']?></dd>
								<dt><b class="border-bottom border-primary">Status</b></dt>
								<dd>
										<?php
									if($project['status'] =='on-going'){
									echo "<span class='badge badge-secondary'>{$project['status']}</span>";
									}elseif($project['status'] =='stop'){
									echo "<span class='badge badge-info'>{$project['status']}</span>";
									}elseif($project['status'] =='on-hold'){
									echo "<span class='badge badge-warning'>{$project['status']}</span>";
									}elseif($project['status'] =='complete'){
									echo "<span class='badge badge-success'>{$project['status']}</span>";
									}
								?>							
                                </dd>
							</dl>
							
							
                            
						</div>
						<div class="col-md-6">
							<dl>
								<dt><b class="border-bottom border-primary">Start Date</b></dt>
								<dd><?= date("F d, Y",strtotime($project['start_date']))?></dd>
							</dl>
							<dl>
								<dt><b class="border-bottom border-primary">End Date</b></dt>
								<dd><?= date("F d, Y",strtotime($project['end_date']))?></dd>
							</dl>
							
							<dl>
                            <?php endif;?>
								<dt><b class="border-bottom border-primary">Project Manager</b></dt>
								<dd>
                                
								<div class="d-flex align-items-center mt-1">
                                <?php if($leader != null) :?>

										<!-- <img class="img-circle img-thumbnail p-0 shadow-sm border-info img-sm mr-3" src="" alt="Avatar"> -->
										
                                        <b>
                                            <?= $leader['fullname']?>
                                        </b>
                                        <?php endif; ?>
									</div>
                                   
																	</dd>
							</dl>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<h4>Gannt Chart</h4>
		<div id="timeline" style="height: 180px;"></div>
	</div>
	<div class="row">

		<div class="col-md-4">
			<div class="card card-outline">
				<div class="card-header">
					<span><b>Team Members:</b></span>
					<div class="card-tools">
						<!-- <button class="btn btn-primary bg-gradient-primary btn-sm" type="button" id="manage_team">Manage</button> -->
					</div>
				</div>
				<div class="card-body">
					<ul class="users-list clearfix">
                    <?php if($mem != null) :?>
                    <?php foreach ($mem as $m) :?>
						<li>
			                <!-- <img src="assets/uploads/1606958760_47446233-clean-noir-et-gradient-sombre-image-de-fond-abstrait-.jpg" alt="User Image"> -->
			                <a class="users-list-name" href=""><?=$m['firstname'].' '.$m['lastname']?></a>
			                        <!-- <span class="users-list-date">Today</span> -->
		                </li>
                        <?php endforeach;?>
                    <?php endif;?>
													
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card card-outline">
				<div class="card-header">
					<span><b>Task List:</b></span>
					<div class="card-tools">
					<?php if($leader['leader_id'] == session()->get('studentID')) :?>
						<button class="btn btn-primary bg-gradient-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#addtask"><i class="fas fa-plus-square"></i> Add Task</button>
					<?php endif; ?>
					</div>
					
                </div>
                <!-- Modal -->
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
                        <label for="exampleInputEmail1" class="form-label">Task</label>
                        <input type="text" name="task" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
							<th>#</th>
							<th>Task</th>
							<th>Description</th>
							<th>Status</th>
							<th>Action</th>
						</thead>
						<tbody>

                        <?php if($task != null) :?>
                            <?php foreach($task as $tas) :?>
								<tr>

			                        <td class="text-center"><?= $i++?></td>
			                        <td class=""><b><?= $tas['task']?></b></td>
			                        <td class=""><p class="truncate"><?= $tas['description']?></p></td>
			                        <td>
									<?php
										if($tas['task_status'] =='on-going'){
										echo "<span class='badge badge-secondary'>{$tas['task_status']}</span>";
										}elseif($tas['task_status'] =='stop'){
										echo "<span class='badge badge-info'>{$tas['task_status']}</span>";
										}elseif($tas['task_status'] =='on-hold'){
										echo "<span class='badge badge-warning'>{$tas['task_status']}</span>";
										}elseif($tas['task_status'] =='complete'){
										echo "<span class='badge badge-success'>{$tas['task_status']}</span>";
										}
									?>
									</td>
			                        <td class="text-center">
                                        <button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
					                      Action
					                    </button>

					                    <div class="dropdown-menu" style="">
					                      <a class="dropdown-item view_task" href="" data-id="8"  data-task="Chapter 3">View</a>
					                      <div class="dropdown-divider"></div>
					                         <a class="dropdown-item edit_task" href="<?=base_url()?>/edittask/<?= $tas['id']?>" data-id="8">Edit</a>
					                      <div class="dropdown-divider"></div>
					                      <a class="dropdown-item delete_task" href="" data-id="8">Delete</a>
					                  	</div>
									</td>

                                    
		                    	</tr>
								
                                <?php endforeach;?>
                                    <?php endif;?>
							</tbody>
					</table>
					</div>
				</div>
			</div>
		
		</div>
	</div>

	<!-- Modal -->
	

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<b>Members Progress/Activity</b>
					<div class="card-tools">
						<button class="btn btn-primary bg-gradient-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#gettask"><i class="fas fa-plus-square"></i> Get Task</button>
					</div>
					
					 <!-- Modal -->
					 <div class="modal fade" id="gettask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
					
					
					
					
                        <h5 class="modal-title" id="exampleModalLabel">Get Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
					
					</div>
                    <div class="modal-body">
                    <form action="<?=base_url()?>/addproductivity/<?= $uri->getSegment(2) ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
					
                        <input type="text" name="project_id" id="" value="<?= $project['id']?>" hidden>
                        <label for="exampleInputEmail1" class="form-label">Select Task</label>
                        <select class="form-control form-control-sm select2" name="task_id">
			
                    		<?php foreach ($task as $tas) :?>
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

				<!-- end modal -->

				</div>
				<div class="card-body">
					<div class="post">
						<div class="user-block">
		                    <!-- <img class="img-circle img-bordered-sm" src="assets/uploads/no-image-available.png" alt="user image"> -->
		                    <?php foreach ($prod as $pro) :?>
							<span class="username">
		                        <a href="<?=base_url()?>/viewproject/<?= $uri->getSegment(2) ?>"><?=$pro['firstname'].' '.$pro['lastname']?></a>
		                    </span>
		                    <span class="description"><?=$pro['comment']?></span>
		                	<span class="fa fa-calendar-day"></span>
		                	<span><b><?= date("F d, Y", strtotime($pro['date']))?></b></span>
		                	<span class="fa fa-user-clock"></span>
              				<span>Start: <b><?= date('h:i A',strtotime($pro['start_time']))?></b></span>	                        	
							<span> | </span>
                      		<span>End: <b><b><?= date('h:i A',strtotime($pro['end_time']))?></b></span>
							<span> | </span>
							<span><b><a href="<?= base_url()?>/uploads/fileUpload/<?= $pro['file']?>" download= "<?= $pro['file']?>" class="link-black text-sm"><i class="fas fa-link mr-1"></i> <?= $pro['file']?></a></b></span>

	                        </span>
							<?php endforeach; ?>
						</div>
		            <div>
		        </div>

		                     
	        	</div>    
			</div>
		</div>
	</div>
</div>
<style>
	.users-list>li img {
	    border-radius: 50%;
	    height: 67px;
	    width: 67px;
	    object-fit: cover;
	}
	.users-list>li {
		width: 33.33% !important
	}
	.truncate {
		-webkit-line-clamp:1 !important;
	}
</style>
<!-- <script>
	$('#new_task').click(function(){
		uni_modal("New Task For Asdadas","manage_task.php?pid=7","mid-large")
	})
	$('.edit_task').click(function(){
		uni_modal("Edit Task: "+$(this).attr('data-task'),"manage_task.php?pid=7&id="+$(this).attr('data-id'),"mid-large")
	})
	$('.view_task').click(function(){
		uni_modal("Task Details","view_task.php?id="+$(this).attr('data-id'),"mid-large")
	})
	$('#new_productivity').click(function(){
		uni_modal("<i class='fa fa-plus'></i> New Progress","manage_progress.php?pid=7",'large')
	})
	$('.manage_progress').click(function(){
		uni_modal("<i class='fa fa-edit'></i> Edit Progress","manage_progress.php?pid=7&id="+$(this).attr('data-id'),'large')
	})
	$('.delete_progress').click(function(){
	_conf("Are you sure to delete this progress?","delete_progress",[$(this).attr('data-id')])
	})
	function delete_progress($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_progress',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>      </div>/. container-fluid -->
    </section>
    <!-- /.content -->
    <div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-right"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="viewer_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
              <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
              <img src="" alt="">
      </div>
    </div>
  </div>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
 
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- Bootstrap -->
<!-- SweetAlert2 -->
<script src="<?=base_url()?>/project/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?=base_url()?>/project/plugins/toastr/toastr.min.js"></script>
<!-- Switch Toggle -->
<script src="<?=base_url()?>/project/plugins/bootstrap4-toggle/js/bootstrap4-toggle.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url()?>/project/plugins/select2/js/select2.full.min.js"></script>
<!-- Summernote -->
<script src="<?=base_url()?>/project/plugins/summernote/summernote-bs4.min.js"></script>
<!-- dropzonejs -->
<script src="<?=base_url()?>/project/plugins/dropzone/min/dropzone.min.js"></script>
<script src="<?=base_url()?>/project/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- DateTimePicker -->
  <script src="<?=base_url()?>/project/dist/js/jquery.datetimepicker.full.min.js"></script>
  <!-- Bootstrap Switch -->
<script src="<?=base_url()?>/project/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
 <!-- MOMENT -->
<script src="<?=base_url()?>/project/plugins/moment/moment.min.js"></script>
<!-- <script>
	$(document).ready(function(){
	  $('.select2').select2({
	    placeholder:"Please select here",
	    width: "100%"
	  });
  })
	 window.start_load = function(){
	    $('body').prepend('<div id="preloader2"></div>')
	  }
	  window.end_load = function(){
	    $('#preloader2').fadeOut('fast', function() {
	        $(this).remove();
	      })
	  }
	 window.viewer_modal = function($src = ''){
	    start_load()
	    var t = $src.split('.')
	    t = t[1]
	    if(t =='mp4'){
	      var view = $("<video src='"+$src+"' controls autoplay></video>")
	    }else{
	      var view = $("<img src='"+$src+"' />")
	    }
	    $('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove()
	    $('#viewer_modal .modal-content').append(view)
	    $('#viewer_modal').modal({
	            show:true,
	            backdrop:'static',
	            keyboard:false,
	            focus:true
	          })
	          end_load()  

	}
	  window.uni_modal = function($title = '' , $url='',$size=""){
	      start_load()
	      $.ajax({
	          url:$url,
	          error:err=>{
	              console.log()
	              alert("An error occured")
	          },
	          success:function(resp){
	              if(resp){
	                  $('#uni_modal .modal-title').html($title)
	                  $('#uni_modal .modal-body').html(resp)
	                  if($size != ''){
	                      $('#uni_modal .modal-dialog').addClass($size)
	                  }else{
	                      $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
	                  }
	                  $('#uni_modal').modal({
	                    show:true,
	                    backdrop:'static',
	                    keyboard:false,
	                    focus:true
	                  })
	                  end_load()
	              }
	          }
	      })
	  }
	  window._conf = function($msg='',$func='',$params = []){
	     $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
	     $('#confirm_modal .modal-body').html($msg)
	     $('#confirm_modal').modal('show')
	  }
	   window.alert_toast= function($msg = 'TEST',$bg = 'success' ,$pos=''){
	   	 var Toast = Swal.mixin({
	      toast: true,
	      position: $pos || 'top-end',
	      showConfirmButton: false,
	      timer: 5000
	    });
	      Toast.fire({
	        icon: $bg,
	        title: $msg
	      })
	  }
$(function () {
  bsCustomFileInput.init();

    $('.summernote').summernote({
        height: 300,
        toolbar: [
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
            [ 'table', [ 'table' ] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
        ]
    })

     $('.datetimepicker').datetimepicker({
		  format:'Y/m/d H:i',
		})
    

  })
 $(".switch-toggle").bootstrapToggle();
$('.number').on('input keyup keypress',function(){
        var val = $(this).val()
        val = val.replace(/[^0-9]/, '');
        val = val.replace(/,/g, '');
        val = val > 0 ? parseFloat(val).toLocaleString("en-US") : 0;
        $(this).val(val)
    })
</script> -->
<script src="<?=base_url()?>/project/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url()?>/project/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>/project/dist/js/adminlte.js"></script>

<!-- PAGE assets/plugins -->
<!-- jQuery Mapael -->
<script src="<?=base_url()?>/project/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?=base_url()?>/project/plugins/raphael/raphael.min.js"></script>
<script src="<?=base_url()?>/project/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?=base_url()?>/project/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url()?>/project/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>/project/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url()?>/project/dist/js/pages/dashboard2.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?=base_url()?>/project/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url()?>/project/plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url()?>/project/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url()?>/project/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url()?>/project/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

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