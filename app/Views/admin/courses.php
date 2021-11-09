<?php include('header.php');?>

<div class="container">
	<div class="row">
		<div class="col-md-3 ml-5 mt-5">

	<?php
	$db      = \Config\Database::connect();
	// $builder = $db->table('courses');
	$query   = $db->query("SELECT * FROM courses ORDER BY ID DESC LIMIT 1");
	foreach ($query->getResult() as $row) {
	
	?>
	

			<div class="card" style="width: 18rem;">
			  <img class="card-img-top" src="<?php echo base_url('public/upload').'/'.$row->photo; ?>" alt="Card image cap">
			  <div class="card-body">
			    <h5 class="card-title" style="color:black;"><?php echo $row->heading; ?></h5>
			    <p class="card-text"><?php echo $row->info; ?></p>
			    <a href="<?php echo base_url('admindetail/edit') ?>" class="btn btn-primary">Edit</a>
			  </div>
			</div>
		<?php } ?>
		</div>
		<div class="col-md-5 ml-5 mt-5">
		 <?php $validation = \config\Services::validation(); ?>
			<form method="post" action="<?php echo base_url('admindetail/insert') ?>" enctype="multipart/form-data">
			  <div class="form-group mb-3">
				<input name="photo" type="file" class="form-control">
			</div>
			 	<div class="form-group">
					<label for="username" class="font-weight-bold">Heading:</label>
					<input type="text" name="heading" class="form-control" id="heading">
					<?php if($validation->getError('heading')) {?>
	            		<div class='alert alert-danger mt-2'>
	              			<?= $error = $validation->getError('heading'); ?>
	            		</div>
        			<?php }?>
				


				<div class="form-group">
					<label for="username" class="font-weight-bold">Details:</label>
					<input type="text" name="info" class="form-control" id="info">
					<?php if($validation->getError('info')) {?>
	            		<div class='alert alert-danger mt-2'>
	              			<?= $error = $validation->getError('info'); ?>
	            		</div>
        			<?php }?>
				</div>
			    
			  
			  <button type="submit" class="btn btn-primary">Insert</button>

			</form>
		</div>		
	</div>
</form>
</div>
</div>
</div>


<div class="container">
	<div class="row">
		<div class="col-md-3 ml-5 mt-5">

	<?php
	$db      = \Config\Database::connect();
	// $builder = $db->table('courses');
	$query   = $db->query("SELECT * FROM course ORDER BY ID DESC LIMIT 1");
	foreach ($query->getResult() as $row) {
	
	?>
	

			<div class="card" style="width: 18rem;">
			  <img class="card-img-top" src="<?php echo base_url('public/upload').'/'.$row->photo; ?>" alt="Card image cap">
			  <div class="card-body">
			    <h5 class="card-title" style="color:black;"><?php echo $row->heading; ?></h5>
			    <p class="card-text"><?php echo $row->info; ?></p>
			    <a href="<?php echo base_url('admindetail/edit') ?>" class="btn btn-primary">Edit</a>
			  </div>
			</div>
		<?php } ?>
		</div>
		<div class="col-md-5 ml-5 mt-5">
		 <?php $validation = \config\Services::validation(); ?>
			<form method="post" action="<?php echo base_url('admindetail/save') ?>" enctype="multipart/form-data">
			  <div class="form-group mb-3">
				<input name="photo" type="file" class="form-control">
			</div>
			 	<div class="form-group">
					<label for="username" class="font-weight-bold">Heading:</label>
					<input type="text" name="heading" class="form-control" id="heading">
					<?php if($validation->getError('heading')) {?>
	            		<div class='alert alert-danger mt-2'>
	              			<?= $error = $validation->getError('heading'); ?>
	            		</div>
        			<?php }?>
				


				<div class="form-group">
					<label for="username" class="font-weight-bold">Details:</label>
					<input type="text" name="info" class="form-control" id="info">
					<?php if($validation->getError('info')) {?>
	            		<div class='alert alert-danger mt-2'>
	              			<?= $error = $validation->getError('info'); ?>
	            		</div>
        			<?php }?>
				</div>
			    
			  
			  <button type="submit" class="btn btn-primary">Insert</button>

			</form>
		</div>
		
	</div>
</div>


<div class="container">
	<div class="row">
		<div class="col-md-3 ml-5 mt-5">

	<?php
	$db      = \Config\Database::connect();
	// $builder = $db->table('courses');
	$query   = $db->query("SELECT * FROM mcourse ORDER BY ID DESC LIMIT 1");
	foreach ($query->getResult() as $row) {
	
	?>
	

			<div class="card" style="width: 18rem;">
			  <img class="card-img-top" src="<?php echo base_url('public/upload').'/'.$row->photo; ?>" alt="Card image cap">
			  <div class="card-body">
			    <h5 class="card-title" style="color:black;"><?php echo $row->heading; ?></h5>
			    <p class="card-text"><?php echo $row->info; ?></p>
			    <a href="<?php echo base_url('admindetail/edit') ?>" class="btn btn-primary">Edit</a>
			  </div>
			</div>
		<?php } ?>
		</div>
		<div class="col-md-5 ml-5 mt-5">
		 <?php $validation = \config\Services::validation(); ?>
			<form method="post" action="<?php echo base_url('admindetail/inserts') ?>" enctype="multipart/form-data">
			  <div class="form-group mb-3">
				<input name="photo" type="file" class="form-control">
			</div>
			 	<div class="form-group">
					<label for="username" class="font-weight-bold">Heading:</label>
					<input type="text" name="heading" class="form-control" id="heading">
					<?php if($validation->getError('heading')) {?>
	            		<div class='alert alert-danger mt-2'>
	              			<?= $error = $validation->getError('heading'); ?>
	            		</div>
        			<?php }?>
				


				<div class="form-group">
					<label for="username" class="font-weight-bold">Details:</label>
					<input type="text" name="info" class="form-control" id="info">
					<?php if($validation->getError('info')) {?>
	            		<div class='alert alert-danger mt-2'>
	              			<?= $error = $validation->getError('info'); ?>
	            		</div>
        			<?php }?>
				</div>
			    
			  
			  <button type="submit" class="btn btn-primary">Insert</button>

			</form>
		</div>
		
	</div>
</div>