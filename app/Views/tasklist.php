<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand  " style="background-color: #32be8f">
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
  <script>
  	$(document).ready(function(){
      var page = 'task_list';
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
  </script>
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
				<a class="btn btn-primary btn-sm btn-default btn-flat border-primary" href="<?=base_url()?>/newproject"><i class="fa fa-plus"></i> Add New project</a>
			</div>
		</div>
		<div class="card-body">
			<table  id="example" class="table table-striped table-bordered" style="width:100%">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="20%">
					<col width="15%">
					<col width="15%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Project</th>
						<th>Task</th>
						<th>Project Started</th>
						<th>Project Due Date</th>
						<th>Project Status</th>
						<th>Task Status</th>
            <!-- <th>Action</th> -->
					</tr>
				</thead>
				<tbody>
        <?php if($viewall != null) :?>
        <?php foreach($viewall as $view) :?>
        <tr>
						<td class="text-center"><?= $view['id']?></td>
						<td>
							<p><b><?= $view['name']?></b></p>
						</td>
						<td>
							<p><b><?= $view['task']?></b></p>
							<p class="truncate"><?= $view['description']?></p>
						</td>
						<td><b><?=  date("M d, Y",strtotime($view['start_date'])) ?></b></td>
						<td><b><?=  date("M d, Y",strtotime($view['end_date'])) ?></b></td>
						<td class="text-center">
            <?php
                            if($view['status'] =='on-going'){
                              echo "<span class='badge badge-secondary'>{$view['status']}</span>";
                            }elseif($view['status'] =='stop'){
                              echo "<span class='badge badge-info'>{$view['status']}</span>";
                            }elseif($view['status'] =='on-hold'){
                              echo "<span class='badge badge-warning'>{$view['status']}</span>";
                            }elseif($view['status'] =='complete'){
                              echo "<span class='badge badge-success'>{$view['status']}</span>";
                            }
                          ?>
             </td>
						<td> 
            <?php
                            if($view['task_status'] =='on-going'){
                              echo "<span class='badge badge-secondary'>{$view['task_status']}</span>";
                            }elseif($view['task_status'] =='stop'){
                              echo "<span class='badge badge-info'>{$view['task_status']}</span>";
                            }elseif($view['task_status'] =='on-hold'){
                              echo "<span class='badge badge-warning'>{$view['task_status']}</span>";
                            }elseif($view['task_status'] =='complete'){
                              echo "<span class='badge badge-success'>{$view['task_status']}</span>";
                            }
                          ?>
            </td>
            <!-- <td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
			                    <div class="dropdown-menu" style="">
			                      <a class="dropdown-item new_productivity" data-pid = '' data-tid = ''  data-task = ''  href="javascript:void(0)">Add Productivity</a>
								</div>
						</td> -->
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


<!-- <script>
	$(document).ready(function(){
		$('#list').dataTable()
	$('.new_productivity').click(function(){
		uni_modal("<i class='fa fa-plus'></i> New Progress for: "+$(this).attr('data-task'),"manage_progress.php?pid="+$(this).attr('data-pid')+"&tid="+$(this).attr('data-tid'),'large')
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
</script>       -->
</div><!--/. container-fluid -->
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

 
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- Bootstrap -->
<!-- SweetAlert2 -->
<!-- <script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script> -->
<!-- Toastr -->
<!-- <script src="assets/plugins/toastr/toastr.min.js"></script> -->
<!-- Switch Toggle -->
<!-- <script src="assets/plugins/bootstrap4-toggle/js/bootstrap4-toggle.min.js"></script> -->
<!-- Select2 -->
<!-- <script src="assets/plugins/select2/js/select2.full.min.js"></script> -->
<!-- Summernote -->
<!-- <script src="assets/plugins/summernote/summernote-bs4.min.js"></script> -->
<!-- dropzonejs -->
<!-- <script src="assets/plugins/dropzone/min/dropzone.min.js"></script> -->
<!-- <script src="assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script> -->
<!-- DateTimePicker -->
  <!-- <script src="assets/dist/js/jquery.datetimepicker.full.min.js"></script> -->
  <!-- Bootstrap Switch -->
<!-- <script src="assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script> -->
 <!-- MOMENT -->
<!-- <script src="assets/plugins/moment/moment.min.js"></script>
<script>
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
<!-- <script src="<?=base_url()?>/project/dist/js/pages/dashboard2.js"></script> -->
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