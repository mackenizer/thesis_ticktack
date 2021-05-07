<?php $uri = service('uri'); 

?>
<div class="wrapper">
<?php include('templates/nav.php');?>
  <script>
     $('#manage_account').click(function(){
        uni_modal('Manage Account','manage_user.php?id=1')
      })
  </script>
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
            <?php if(session()->get('role') != 'adviser') :?>
                          <li class="nav-item">
                <a href="<?=base_url()?>/newproject" class="nav-link nav-new_project tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Create Project</p>
                </a>
              </li>
              <?php endif;?>
                          <li class="nav-item">
                <a href="<?=base_url()?>/projectlist" class="nav-link nav-project_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>My List</p>
                </a>
              </li>
            </ul>
          </li> 
          <!-- <li class="nav-item">
                <a href="<?=base_url()?>/tasklist" class="nav-link nav-task_list">
                  <i class="fas fa-tasks nav-icon"></i>
                  <p>Task</p>
                </a>
          </li> -->
          <?php if(session()->get('studentID') == null):?>
                     <li class="nav-item">
                <a href="<?=base_url()?>/report" class="nav-link nav-reports">
                  <i class="fas fa-th-list nav-icon"></i>
                  <p>Report</p>
                </a>
          </li>
          <?php endif;?>
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
            <!-- <h1 class="m-0">Project List</h1> -->
          </div><!-- /.col -->
            
        </div><!-- /.row -->
            <hr class="border-primary">
    
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <div class="col-lg-12">
	<div class="card card-outline">
		<div class="card-header">
      <h2>My Projects</h2>
            			<div class="card-tools">
				  <?php if(session()->get('role') != 'adviser') :?> <a class="btn btn-primary btn-sm btn-default btn-flat border-primary" href="<?=base_url()?>/newproject"><i class="fas fa-plus-square"></i> Add New project</a><?php endif;?>
			</div>
            		</div>
		<div class="card-body">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead class="table-success">
                  <th>Project Name</th>
                  <th>Info</th>
                  <th>Progress</th>
                  <th>Total Tasks</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                <tbody>
                <tr>
                <?php if($project != null) : ?>
                  <?php foreach ($project as $proj) :?>
               
                <td>
                    
                        
                    <?= $proj['name']?>
                 
               </td>
                
               <td>
               <p>Project ID: <b><?= $proj['id']?><p>
              
                   <small>
                      Due: <?= $proj['end_date']?>
                   </small>
                   <br>
                   <small>
                      <b> Project Leader: <?= $proj['firstname'].' '.$proj['lastname']?>
                   </small>
               </td>
                      <td class="project_progress">
                          <div class="progress progress-sm">
                          <?php if(isset($progress)) : ?>
                              <div class="progress-bar bg-yellow" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: <?=$progress[$proj['id']]?>%">
                              </div>
                          </div>
                          <small>

                          <?=$progress[$proj['id']]?>% Complete
                          </small>
                          
                          <?php endif; ?>
                      </td>
                      <td>
                   
                        <p class="center  "><?=$total_task[$proj['id']]?></p>
                       
                      </td>
                      
                      <td class="project-state">
                      <?php
                            if($proj['status'] =='on-going'){
                              echo (session()->get('studentID') == $proj['leader_id'])?"<a href='' data-toggle='modal' data-target='#updateproj' data-whatever='".$proj['id']."'><span class='badge badge-secondary'>{$proj['status']}</span></a>":"<span class='badge badge-secondary'>{$proj['status']}</span>";
                            }elseif($proj['status'] =='stop'){
                              echo (session()->get('studentID') == $proj['leader_id'])?"<a href='' data-toggle='modal' data-target='#updateproj' data-whatever='".$proj['id']."'><span class='badge badge-danger'>{$proj['status']}</span></a>":"<span class='badge badge-danger'>{$proj['status']}</span>";
                            }elseif($proj['status'] =='on-hold'){
                              echo (session()->get('studentID') == $proj['leader_id'])?"<a href='' data-toggle='modal' data-target='#updateproj' data-whatever='".$proj['id']."'><span class='badge badge-info'>{$proj['status']}</span></a>":"<span class='badge badge-info'>{$proj['status']}</span>";
                            }elseif($proj['status'] =='complete'){
                              echo (session()->get('studentID') == $proj['leader_id'])?"<a href='' data-toggle='modal' data-target='#updateproj' data-whatever='".$proj['id']."'><span class='badge badge-success'>{$proj['status']}</span></a>":"<span class='badge badge-success'>{$proj['status']}</span>";
                              echo "<p><i>Grade: ".number_format($proj['grade'], 2)."</i></p>";
                            }
                          ?>

                        
                      </td>
                 
  
                     
                      <td>

                      <div class="dropdown">

                          <a type="button" class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                          </a>
                        
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                            <li><a href="<?=base_url()?>/viewproject/<?=$proj['id'] ?>" class="dropdown-item"  >View Project</a></li>
                            <?php if($proj['leader_id'] == session()->get('studentID')) :?>
                            <li><a href="<?=base_url()?>/editproject/<?=$proj['id'] ?>" class="dropdown-item"  >Edit Project</a></li>
                            <li><a href="<?=base_url()?>/manageteam/<?=$proj['id'] ?>" class="dropdown-item" >Manage Team</a></li>
                          <?php endif;?>
                          </ul>
                          </div>
                      </td>
                  
                  </tr>
                  <div class="modal fade" id="updateproj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Update Project</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="<?=base_url()?>/updateproject" method="post">
                            <div class="form-group">
                              <input type="text" name="id" value= "<?=$proj['id'] ?>" class="form-control" id="recipient-name" hidden>
                            </div>
                            <div class="col-mb-3 mt-2">
                            <div class="form-group">
                            <label for="">Status</label>

                            <select name="status" id="status" class="custom-select custom-select-sm">
                              
                                          <option value="on-going" <?php if($proj['status'] == "on-going") { echo "SELECTED"; } ?>>on-going</option>
                                          <option value="on-hold" <?php if($proj['status'] == "on-hold") { echo "SELECTED"; } ?>>on-hold</option>
                                          <option value="stop" <?php if($proj['status'] == "stop") { echo "SELECTED"; } ?>>stop</option>
                                          <option value="complete" <?php if($proj['status'] == "complete") { echo "SELECTED"; } ?>>complete</option>

                                          </select>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                  </div>
                          </form>
                        </div>
                        
                      </div>
                    </div>
                  </div>       
                  

                <?php endforeach;?>
                  <?php endif; ?>
                </tbody>  

               





    </table>
		</div>
	</div>
</div>
<style>
	table p{
		margin: unset !important;
	}
	table td{
		vertical-align: middle !important
	}
</style>


<script>
      $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<!-- <script>



	$(document).ready(function(){
		$('#list').dataTable()
	
	$('.delete_project').click(function(){
	_conf("Are you sure to delete this project?","delete_project",[$(this).attr('data-id')])
	})
	})
	function delete_project($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_project',
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

<?php include_once('templates/scripts.php'); ?>