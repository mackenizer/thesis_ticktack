<section class="content">
      <div class="container-fluid">

	  	<div class="col-lg-12">
		  	
			<div class="row">
				<div class="col-md-12">
				<div class="callout callout-primary">
				<div class="col-md-12">
				<div class="row">
				<div class="col-sm-6"> <!-- project details left -->
                        <?php if($project != null) :?>
							<dl>
								<dt><b class="border-bottom border-primary">Project Name</b></dt>
								<dd><?= $project['name']?></dd>
								<dt><b class="border-bottom border-primary">Description</b></dt>
								<dd><?= $project['description']?></dd>
								<dt><b class="border-bottom border-primary">Members:</b></dt>
								<?php if($mem != null) :?>
                    				<?php foreach ($mem as $m) :?>
								<dd>
									<b><?=$m['firstname'].' '.$m['lastname']?></b>
								</dd>
									<?php endforeach;?>
								<?php endif;?>
								
							</dl>
  
				</div> <!-- end of left details -->
				<div class="col-md-6"> <!-- start right -->
							<dl>
								<dt><b class="border-bottom border-primary">Start Date</b></dt>
								<dd><?= date("F d, Y",strtotime($project['start_date']))?></dd>
							</dl>
							<dl>
								<dt><b class="border-bottom border-primary">End Date</b></dt>
								<dd><?= date("F d, Y",strtotime($project['end_date']))?></dd>
							</dl>
							
							<dl>
                <?php endif;?>
								
<!--  -->
				<dt><b class="border-bottom border-primary">Project Leader</b></dt>
							<dd>
                                
								<div class="d-flex align-items-center mt-1">
                                <?php if($leader != null) :?>

										<!-- <img class="img-circle img-thumbnail p-0 shadow-sm border-info img-sm mr-3" src="" alt="Avatar"> -->
										
                                        <b>
										<?= $leader['firstname'].' '.$leader['lastname']?>
                                        </b>
                                        <?php endif; ?>
								</div>
								</dd>
							</dl>

							<dt><b class="border-bottom border-primary">Status</b></dt>
								<dd>
										<?php
									if($project['status'] =='on-going'){
									echo "<span class='badge badge-secondary'>{$project['status']}</span>";
									}elseif($project['status'] =='stop'){
									echo "<span class='badge badge-info'>{$project['status']}</span>";
									}elseif($project['status'] =='on-hold'){
									echo "<span class='badge badge-warning'>{$project['status']}</span>";
									}elseif($project['status'] =='complete'){
									echo "<span class='badge badge-success'>{$project['status']}</span>";
									}
								?>							
                                </dd>


<!--  -->
						<div>
					</div>
				<div>
				</div>
	  		</div>					
			<div>
		</div>
	  </div>	
	</section>