<?php $uri = service('uri'); 

?>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand " style="background-color: #32be8f"> 
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
            <a class="nav-link text-white"  data-toggle="dropdown" aria-expanded="true" href="javascript:void(0)">
              <span>
                <div class="text-white d-felx badge-pill">
                  <span class="text-white fa fa-user mr-2"></span>
                  <span><b><?php echo session()->get('firstname').' '. session()->get('lastname') ?></b></span>
                  <span class="fa fa-angle-down ml-2"></span>
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
    <aside class="main-sidebar  elevation-4">
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
                <a href="./index.php?page=task_list" class="nav-link nav-task_list">
                  <i class="fas fa-tasks nav-icon"></i>
                  <p>Task</p>
                </a>
          </li>
                     <li class="nav-item">
                <a href="./index.php?page=reports" class="nav-link nav-reports">
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
      var page = 'new_project';
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
            <?php if(isset($validation)): ?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                            
                                
                                <?= $validation->listErrors() ?>
                           
                            </div>
                        </div>
                        <?php endif; ?>
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
	<div class="card card-outline">
		<div class="card-body">
		<form action="<?=base_url()?>/editproject/<?= $uri->getSegment(2) ?>" method="post" >
       
        <input type="hidden" name="id" value="<?= $edit['id']?>">
        <?php if($adviser != null) :?>
     
        <?php endif; ?>
		<div class="row">
			<div class="col-md-6">
            <?php if($edit != null) :?>
				<div class="form-group">
					<label for="" class="control-label">Name</label>
					<input type="text" class="form-control form-control-sm" name="name" value="<?=$edit['name']?>">
				</div>
			</div>
          	<div class="col-md-6">
				<div class="form-group">
					<label for="">Status</label>
					<select name="status" id="status" class="custom-select custom-select-sm">
                        <option value="on-going" <?php if($edit['status'] == "on-going") { echo "SELECTED"; } ?>>on-going</option>
                        <option value="on-hold" <?php if($edit['status'] == "on-hold") { echo "SELECTED"; } ?>>on-hold</option>
                        <option value="stop" <?php if($edit['status'] == "stop") { echo "SELECTED"; } ?>>stop</option>
                        <option value="complete" <?php if($edit['status'] == "complete") { echo "SELECTED"; } ?>>complete</option>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
            <div class="form-group">
              <label for="" class="control-label">Start Date</label>
              <input type="date" class="form-control form-control-sm" autocomplete="off" name="start_date" value="<?=$edit['start_date']?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="" class="control-label">End Date</label>
              <input type="date" class="form-control form-control-sm" autocomplete="off" name="end_date" value="<?=$edit['end_date']?>">
            </div>
          </div>
		</div>

        <div class="row">
        <div class="col-md-6">
            <div class="form-group">
           
              <label for="" class="control-label">Adviser</label>
              <select class="form-control form-control-sm select2" name="adviser_id">
              	<option></option>
                  <?php if($adviser != null) : ?>
                    <?php foreach ($adviser as $ad) :?>
              	              	<option value="<?=$ad['adviserID']?>" ><?=$ad['firstname'],' ',$ad['lastname']?></option>
              	              	
                                    <?php endforeach;?>
                                    <?php endif ;?>
              	              </select>
                                 
            </div>
            
          </div>
        	           <div class="col-md-6">
            <div class="form-group">
            <?php if($edit['leader_id'] != session()->get('studentID')) : ?>
              <label for="" class="control-label">Project Leader</label>
              <select class="form-control form-control-sm select2" name="leader_id">
              	<option></option>
                  <?php if($students != null) : ?>
                    <?php foreach ($students as $stud) :?>
              	              	<option value="<?=$stud['studentID']?>" ><?=$stud['firstname'],' ',$stud['lastname']?></option>
                      
                                    <?php endforeach;?>
                                    <?php endif ;?>
              	              </select>
                              <?php endif;?>      
            </div>
            
          </div>
          
         
                <div class="col-md-6">
            <div class="form-group">
              <label for="" class="control-label">Team Members</label>
              <select class="form-control form-control-sm select2" multiple="multiple" name="user_ids[]" value="<?=$edit['user_ids'] ?>">
                  <?php if($students != null) : ?>
                    <?php foreach ($students as $stud) :?>
              	              	<option value="<?=$stud['studentID']?>" ><?=$stud['firstname'],' ',$stud['lastname']?></option>
              	              	<?php endforeach;?>
                                    <?php endif ;?>
              	              </select>

            </div>
          </div>
        </div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="" class="control-label">Description</label>
					<textarea name="description" id="" cols="30" rows="10" value="<?=$edit['description']?>" class="summernote form-control"></textarea>
				</div>
			</div>
		</div>
        <?php endif ;?>
        <div class="card-footer border-top border-info">
    		<div class="d-flex w-100 justify-content-center align-items-center">
    			<button class="btn btn-flat  bg-gradient-primary mx-2" type="submit" >Update</button>
    			<!-- <button class="btn btn-flat bg-gradient-secondary mx-2" type="button" href="index.php?page=project_list">Cancel</button> -->
    		</div>
            
    	</div>
            
        </form>
    	</div>
    	
	</div>
</div>
<script>
	// $('#manage-project').submit(function(e){
	// 	e.preventDefault()
	// 	start_load()
	// 	$.ajax({
	// 		url:'ajax.php?action=save_project',
	// 		data: new FormData($(this)[0]),
	// 	    cache: false,
	// 	    contentType: false,
	// 	    processData: false,
	// 	    method: 'POST',
	// 	    type: 'POST',
	// 		success:function(resp){
	// 			if(resp == 1){
	// 				alert_toast('Data successfully saved',"success");
	// 				setTimeout(function(){
	// 					location.href = 'index.php?page=project_list'
	// 				},2000)
	// 			}
	// 		}
	// 	})
	// })
</script>      </div><!--/. container-fluid -->
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
// $(function () {
//   bsCustomFileInput.init();

//     $('.summernote').summernote({
//         height: 300,
//         toolbar: [
//             [ 'style', [ 'style' ] ],
//             [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
//             [ 'fontname', [ 'fontname' ] ],
//             [ 'fontsize', [ 'fontsize' ] ],
//             [ 'color', [ 'color' ] ],
//             [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
//             [ 'table', [ 'table' ] ],
//             [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
//         ]
//     })

//      $('.datetimepicker').datetimepicker({
// 		  format:'Y/m/d H:i',
// 		})
    

//   })
//  $(".switch-toggle").bootstrapToggle();
// $('.number').on('input keyup keypress',function(){
//         var val = $(this).val()
//         val = val.replace(/[^0-9]/, '');
//         val = val.replace(/,/g, '');
//         val = val > 0 ? parseFloat(val).toLocaleString("en-US") : 0;
//         $(this).val(val)
//     })
</script>
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