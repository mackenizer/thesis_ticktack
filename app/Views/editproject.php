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
			<div class="col-md-12">
            <?php if($edit != null) :?>
				<div class="form-group">
					<label for="" class="control-label">Project Name</label>
					<input type="text" class="form-control form-control-sm" name="name" value="<?=$edit['name']?>">
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
            
            
          </div>
        <div class="col-md-6">
            
            
          </div>
          
         
        <div class="col-md-6">
            
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