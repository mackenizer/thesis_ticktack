<?php $uri = service('uri'); 

?>
<div class="wrapper">
<?php include_once('templates/nav.php'); ?>
<?php include_once('templates/sidenav.php'); ?>

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
					<label for="" class="control-label">Project Name</label>
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
              	              	<option selected value="<?=$stud['studentID']?>" ><?=$stud['firstname'],' ',$stud['lastname']?></option>
                      
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

</div>
    </section>
    

</div>
<!-- ./wrapper -->

<?php include_once('templates/scripts.php')?>