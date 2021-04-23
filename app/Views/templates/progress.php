<div class="container">
 <div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<b>Members Progress/Activity</b>
				<div class="card-tools">
					
						<button class="btn btn-primary bg-gradient-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#comment"><i class="fas fa-plus-square"></i> Comment</button>
				
				</div>
			</div>
			
			<div class="card-body">
		
				

			<?php if($produc != null) :?>	
			<?php foreach ($produc as $prod) :?>
			<div class="post">
			
	
				
				<span class="username">
					<a href="<?=base_url()?>/edittask/<?=$prod['user_id']?>" ><?= $prod['firstname'].' '.$prod['lastname'].' '. $prod['task']?></a>
				</span>
				<span class="description">
					<span class="fa fa-calendar-day"></span>
					<span><b><?= date("F d, Y",strtotime($prod['date']))?></b></span>
					<span class="fa fa-user-clock"></span>
						<span>Start: <b><?= $prod['start_time']?></b></span>
					<span> | </span>
						<span>End: <b><?= $prod['end_time']?></b></span>
					<span> | </span>
						<span><a href="<?= base_url()?>/uploads/fileUpload/<?= $prod['file']?>" download= "<?= $prod['file']?>" class="link-black text-sm"><i class="fas fa-link mr-1"></i> <?= $prod['file']?></a></b></span>
				</span>

				

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
							<input type="text" name="user_id" value="<?=session()->get('userID')?>" >
              <input type="text" name="name" id="" value="<?= session()->get('firstname').' '.session()->get('lastname')?>" hidden>
             <?php if($prod != null) :?> <input type="text" name="id" id="" value="<?=$prod['project_id']?>"> <?php endif;?>
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
				



				<?php endforeach;?>
			<?php endif;?>
	


			
		</div>

		
	</div>
</div>
</div>