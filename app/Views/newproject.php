<?php $uri = service('uri'); 

?>
<!-- start wrapper -->

<div class="wrapper">
<?php include('templates/nav.php')?>
<?php include('templates/sidenav.php')?>


<!-- Main content -->
<section class="content">
      <div class="container-fluid">
         
<div class="col-lg-12">
	<div class="card card-outline">
		<div class="card-body">
    
    <?php if(session()->get('success')): ?>
                    <div class="alert alert-success text-center" role="alert">
                        <?= session()->get('success') ?>
                    </div>
               
                <?php endif; ?>
		<form action="<?=base_url()?>/newproject" method="post" >

        <input type="hidden" name="id" value="">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="" class="control-label">Project Name</label>
					<input type="text" class="form-control form-control-sm" name="name" value="">
				</div>
			</div>
          	<!-- <div class="col-md-6">
				<div class="form-group">
					<label for="">Status</label>
					<select name="status" id="status" class="custom-select custom-select-sm">
						<option value="pending" >Pending</option>
						<option value="on-hold" >On-Hold</option>
						<option value="done" >Done</option>
					</select>
				</div>
			</div> -->
		</div>
		<div class="row">
			<div class="col-md-6">
            <div class="form-group">
              <label for="" class="control-label">Start Date</label>
              <input type="date" class="form-control form-control-sm" autocomplete="off" name="start_date" value="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="" class="control-label">End Date</label>
              <input type="date" class="form-control form-control-sm" autocomplete="off" name="end_date" value="">
            </div>
          </div>
		</div>
        <div class="row">
        <?php if(session()->get('adviserID') != null) :?>
        	<div class="col-md-6">
            <div class="form-group">
              <label for="" class="control-label">Project Leader</label>
              <select class="form-control form-control-sm select2" name="leader_id">
              	<option></option>
                  <?php if($students != null) : ?>
                    <?php foreach ($students as $stud) :?>
              	              	<option value="<?=$stud['studentID']?>" ><?=$stud['firstname'],' ',$stud['lastname']?></option>
              	              	
                                    <?php endforeach;?>
                                    <?php endif ;?>
              	              </select>
            </div>
          </div>
          <?php endif; ?>
          <?php if(session()->get('adviserID') == null) :?>
          <div class="col-md-6">
            <div class="form-group">
              <label for="" class="control-label">Adviser</label>
              <select class="form-control form-control-sm select2" name="adviser_id">
              	<option></option>
                  <?php if($adviser != null) : ?>
                    <?php foreach ($adviser as $adv) :?>
              	              	<option value="<?=$adv['adviserID']?>" ><?=$adv['firstname'],' ',$adv['lastname']?></option>
              	              	
                                    <?php endforeach;?>
                                    <?php endif ;?>
              	              </select>
            </div>
          </div>
          <?php endif; ?>
                <div class="col-md-6">
            <div class="form-group">
              <label for="" class="control-label">Team Members</label>
              <select class="form-control form-control-sm select2" multiple="multiple" name="user_ids[]">
              	<option></option>
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
					<textarea name="description" id="" cols="30" rows="10" class="summernote form-control">
											</textarea>
				</div>
			</div>
		</div>
        <div class="card-footer border-top border-info">
    		<div class="d-flex w-100 justify-content-center align-items-center">
    			<button class="btn btn-flat  bg-gradient-primary mx-2" type="submit" >Save</button>
    			<!-- <button class="btn btn-flat bg-gradient-secondary mx-2" type="button" href="index.php?page=project_list">Cancel</button> -->
    		</div>
    	</div>
            
        </form>
    	</div>
    	
	</div>
</div>

</div>
    </section>

  







  

  <!-- /.control-sidebar -->


</div>
<!-- ./wrapper -->


<?php include_once('templates/scripts.php'); ?>