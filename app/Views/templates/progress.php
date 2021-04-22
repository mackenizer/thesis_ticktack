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
				<?php endforeach;?>
			<?php endif;?>


			
		</div>

		
	</div>
</div>
</div>