<?php $uri = service('uri'); 

?>
<div class="wrapper">
<?php include_once('templates/nav.php'); ?>
<?php include_once('templates/sidenav.php'); ?>



<!-- Main content -->
<section class="content">
      <div class="container-fluid">
	  <hr class="border-primary">
	  <?php if(session()->get('success')): ?>
                    <div class="alert alert-success text-center" role="alert">
                        <?= session()->get('success') ?>
                    </div>
               
                <?php endif; ?>
         
                <div class="col-lg-12">
	<div class="card card-outline">
		<div class="card-body">
		<form action="<?=base_url()?>/manageteam/<?= $uri->getSegment(2) ?>" method="post" >
       
        <input type="hidden" name="id" value="<?= $edit['id']?>">
     
		<div class="row">
          
		</div>
		<div class="row">
			<div class="col-md-12">
            <div class="form-group">
              <label for="" class="control-label">Members: </label>
              <select class="form-control form-control-sm select2" multiple="multiple" name="user_ids[]">
              	<option></option>
                  
                  <?php if($mem != null) : ?>
                    <?php foreach ($mem as $stud) :?>
                        
                       <option value="<?=$stud['studentID']?>" selected><?=$stud['firstname'],' ',$stud['lastname']?></option>
              	              	<?php endforeach;?>
                                      <?php endif;?>    
                                  
                             
                    
                   
                    <?php if($students != null) : ?>
                        <?php foreach ($students as $stud) :?>
                             <option value="<?=$stud['studentID']?>"><?=$stud['firstname'],' ',$stud['lastname']?></option>
                                    <?php endforeach;?>
                                        <?php endif ;?>
                   
                </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <dt><b class="border-bottom border-primary">Team Members:</b></dt>
            <dl>
                <?php if($mem != null) :?>
                    <?php foreach ($mem as $m) :?>
						<dd>
						    <b><?=$m['firstname'].' '.$m['lastname']?></b>
						</dd>
					<?php endforeach;?>
				<?php endif;?>
                </dl>
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
		
		</div>
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