<?php $i = 1?>
<?php $uri = service('uri'); 

?>


<div class="wrapper">
  <?php include_once('templates/nav.php'); ?>
  <?php include_once('templates/sidenav.php'); ?>
  

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
         
          </div><!-- /.col -->

        </div><!-- /.row -->
            <hr class="border-primary">
         
            <?php 
            
              if(session()->get('adviserID') != null) {
                echo  "<h2>Welcome Adviser!</h2>";
              }
           else{
            echo  "<h2>Welcome Student!</h2>";
           }

                


            ?>
          
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
         <!-- Info boxes -->
 
          
      <div class="row">
        <div class="col-md-12">
        <div class="card card-outline">
          
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0 table-hover">
                <colgroup>
                  <col width="5%">
                  <col width="30%">
                  <col width="35%">
                  <col width="15%">
                  <col width="15%">
                </colgroup>
                <thead class="table-success">
                  <th>#</th>
                  <th>Projects</th>
                  <th>Progress</th>
                  <th>Total Tasks</th>
                  <th>Status</th>
                  <th></th>
                </thead>
                <tbody>
                
                <?php if($project != null) : ?>
                  <?php foreach ($project as $proj) :?>
                <tr>
                      <td>
                        <p><b><?= $proj['id']?><p>
                      </td>
                      
                      <td>
                        
                          <a>
                           <?= $proj['name']?>
                          </a>
                          <br>
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
                              echo "<span class='badge badge-secondary'>{$proj['status']}</span>";
                            }elseif($proj['status'] =='stop'){
                              echo "<span class='badge badge-danger'>{$proj['status']}</span>";
                            }elseif($proj['status'] =='on-hold'){
                              echo "<span class='badge badge-info'>{$proj['status']}</span>";
                            }elseif($proj['status'] =='complete'){
                              echo "<span class='badge badge-success'>{$proj['status']}</span>";
                            }
                          ?>
                      </td>
                 
  
                      <td>
                        <a class="" href="<?=base_url()?>/viewproject/<?=$proj['id'] ?>">
                        <i class="fas fa-eye"></i>
                              View
                        </a>
                      </td>
                  
                  </tr>
                </tbody>  
                <?php endforeach;?>
                  <?php endif; ?>
              </table>
            </div>
          </div>
        </div>
        </div>
       
         
      </div> 
        </div>
      </div>
      </div><!--/. container-fluid -->
    </section>
   
  <!-- /.content-wrapper -->

 
</div>
<!-- ./wrapper -->



<?php include_once('templates/scripts.php')?>
