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
                  <p>List</p>
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
      <?php if(session()->get('role') == 'adviser'):?>
              <h1>Welcome Adviser!</h1>
              <?php else:?>
              <h1>Welcome Student!</h1>
            <?php endif;?>
        <div class="row mb-2">
        
          <div class="col-sm-6">
          
            <!-- <h1 class="m-0">Project List</h1> -->
          </div><!-- /.col -->

        </div><!-- /.row -->
            <hr class="border-primary">

            <?php if(session()->get('success')): ?>
                    <div class="alert alert-success text-center" role="alert">
                        <?= session()->get('success') ?>
                    </div>
               
                <?php endif; ?>

                <?php if(session()->get('error')): ?>
                    <div class="alert alert-danger text-center mt-2" role="alert">
                        <?= session()->get('error') ?>
                    </div>
               
                <?php endif; ?>

        

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <div class="col-lg-12">
	<div class="card card-outline">
		<div class="card-header">
          <h2>All Projects</h2>
      <div class="card-tools">

			</div>
            		</div>
		<div class="card-body">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead class="table-success">
                  <!-- <th>#</th> -->
                  <th>Project Name</th>
                  <th>Info</th>
                  <th>Progress</th>
                  <th>Total Tasks</th>
                  <th>Status</th>
                  <th></th>
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
                              echo (session()->get('studentID') == $proj['leader_id'])?"<a href='' data-toggle='modal' data-target='#exampleModal' data-whatever='".$proj['id']."'><span class='badge badge-secondary'>{$proj['status']}</span></a>":"<span class='badge badge-secondary'>{$proj['status']}</span>";
                            }elseif($proj['status'] =='stop'){
                              echo (session()->get('studentID') == $proj['leader_id'])?"<a href='' data-toggle='modal' data-target='#exampleModal' data-whatever='".$proj['id']."'><span class='badge badge-danger'>{$proj['status']}</span></a>":"<span class='badge badge-danger'>{$proj['status']}</span>";
                            }elseif($proj['status'] =='on-hold'){
                              echo (session()->get('studentID') == $proj['leader_id'])?"<a href='' data-toggle='modal' data-target='#exampleModal' data-whatever='".$proj['id']."'><span class='badge badge-info'>{$proj['status']}</span></a>":"<span class='badge badge-info'>{$proj['status']}</span>";
                            }elseif($proj['status'] =='complete'){
                              echo (session()->get('studentID') == $proj['leader_id'])?"<a href='' data-toggle='modal' data-target='#exampleModal' data-whatever='".$proj['id']."'><span class='badge badge-success'>{$proj['status']}</span></a>":"<span class='badge badge-success'>{$proj['status']}</span>";
                              echo "<p><i>Grade: ".number_format($proj['grade'],2)."</i></p>";
                            }
                          ?>
                        
                      </td>
                 
  
                      <td>
                        <a class="" href="<?=base_url()?>/readprojects/<?=$proj['id'] ?>">
                        <i class="fas fa-eye"></i>
                              View
                        </a>
                      </td>
                      
                  
                  </tr>
                  
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