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
          <!-- <li class="nav-item">
                <a href="<?=base_url()?>/tasklist" class="nav-link nav-task_list">
                  <i class="fas fa-tasks nav-icon"></i>
                  <p>Task</p>
                </a>
          </li> -->
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
            			<div class="card-tools">
				<a class="btn btn-primary btn-sm btn-default btn-flat border-primary" href="<?=base_url()?>/newproject"><i class="fas fa-plus-square"></i> Add New project</a>
			</div>
            		</div>
		<div class="card-body">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
						<th class="text-center">#</th>
						<th>Project</th>
						<th>Date Started</th>
						<th>Due Date</th>
						<th>Status</th>
					<?php if(session()->get('adviserID') == null) :?><th>Action</th><?php endif;?>
					</tr>
        </thead>
        <tbody>
        <?php if($project != null):?>
          <?php foreach($project as $proj) :?>
            <tr>
                <td><?= $proj['id']?></td>
                <td><?= $proj['name']?></td>
                <td><?= date("M d, Y",strtotime($proj['start_date']))?></td>
                <td><?= date("M d, Y",strtotime($proj['end_date']))?></td>
                <td>
                        <?php
                            if($proj['status'] =='on-going'){
                              echo "<span class='badge badge-secondary'>{$proj['status']}</span>";
                            }elseif($proj['status'] =='stop'){
                              echo "<span class='badge badge-danger'>{$proj['status']}</span>";
                            }elseif($proj['status'] =='on-hold'){
                              echo "<span class='badge badge-warning'>{$proj['status']}</span>";
                            }elseif($proj['status'] =='complete'){
                              echo "<span class='badge badge-success'>{$proj['status']}</span>";
                            }
                          ?>
                </td>
                <td>
                <?php if(session()->get('adviserID') == null) :?>
                <button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		             </button>
                 <?php endif;?>
		                    <div class="dropdown-menu" style="">
                     
		                      <a class="dropdown-item view_project" href="<?=base_url()?>/viewproject/<?= $proj['id'] ?>" data-id="">View</a>
                          <?php if($proj['user_ids'] != session()->get('studentID') && $proj['leader_id'] == session()->get('studentID') || $proj['adviserID'] == session()->get('adviserID') ) :?>
		                      <div class="dropdown-divider"></div>
                          
		                      <a class="dropdown-item" href="<?=base_url()?>/editproject/<?= $proj['id'] ?>">Edit</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item delete_project" href="javascript:void(0)" data-id="">Delete</a>
                          <?php endif; ?>
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