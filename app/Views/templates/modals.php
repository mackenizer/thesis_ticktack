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

	<!-- Modal -->




     <!-- /dashboard.content -->
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




<!-- Modal -->
<div class="modal fade" id="comment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
					
					
					
					
                        <h5 class="modal-title" id="exampleModalLabel">Comment Section</h5>
						
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							
					
					</div>
                  
                    
        <div class="modal-body">
        <div class="container-fluid p-0 m-0 d-flex" style="height: 300px" >
							<div class="overflow-auto" style="width: 500px">
              <?php if($comment != null):?>
              <?php foreach ($comment as $com):?>
                  <?=$com['name'].' : '.$com['comment']. ' : '?> <?php if($com['file'] != null):?><a href="<?= base_url()?>/uploads/fileUpload/<?= $com['file']?>" download= "<?= $com['file']?>" class="link-black text-sm"><i class="fas fa-link mr-1"></i> <?=$com['file']?></a><?php else:?><?php endif;?>
                  <br><hr>
              <?php endforeach;?>
              <?php else:?>
                <p class="text-center">No comment</p>
              <?php endif;?>
							</div>
              

						</div>

          <form action="<?=base_url()?>/comment/<?= $uri->getSegment(2) ?>" method="post" enctype="multipart/form-data">
                


						<div class="col-mb-3">
							<div class="form-group">
              <input type="text" name="name" id="" value="<?= session()->get('firstname').' '.session()->get('lastname')?>" hidden>
              <input type="text" name="id" id="" value="<?=$pro['project_id']?>" hidden>
								<label for="exampleFormControlFile1">Add File</label>
								<input name ="file" type="file" class="form-control" id="exampleFormControlFile1">
							</div>
						</div>
					
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Add Comment</label>
                            <textarea name="comment" id="" cols="10" rows="2" height="100" class="summernote form-control">
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




