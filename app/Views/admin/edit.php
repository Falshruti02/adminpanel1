<?php include('header.php');?>

<div class="container">
	<div class="row">
		<div class="col">
			<?php
	$db      = \Config\Database::connect();
	// $builder = $db->table('courses');
	$query   = $db->query("Update * courses");
	foreach ($query->getResult() as $row) {
	
	?>
			<form method="post" action="<?php echo base_url('admin/update') ?>">
			 <div class="form-group mb-3">
				<input name="photo" type="file" class="form-control">
			</div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Heading</label>
			    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter heading">    
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlTextarea1">Details</label>
			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
			  </div>
			  <button type="submit" class="btn btn-primary">Update</button>
<?php } ?>
			</form>
		</div>
	</div>
</div>