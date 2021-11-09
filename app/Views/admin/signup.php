<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- fontaswsome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Signup Page</title>
   </head>
<body>
	<!-- <p>Fill all details to register</p> -->
	<div class="container">
		<div class="row ml-5">
			<div class="col-lg-9 col-lg-offset-2 ml-5">
				<br><br><h1 class="text-center">Signup Page</h1>
				<hr><br>
				  <?php $validation = \Config\Services::validation(); ?>
			
			<form action="<?php echo base_url('admin/insert'); ?>" method="POST">
				<div class="form-group">
					<label for="username" class="font-weight-bold">Name:</label>
					<input type="text" name="name" class="form-control" id="name">
					<?php if($validation->getError('name')) {?>
	            		<div class='alert alert-danger mt-2'>
	              			<?= $error = $validation->getError('name'); ?>
	            		</div>
        			<?php }?>
				</div>

				<div class="form-group">
					<label for="email" class="font-weight-bold">Email Id:</label>
					<input type="email" name="email" class="form-control" id="email">
					<?php if($validation->getError('email')) {?>
	            		<div class='alert alert-danger mt-2'>
	              			<?= $error = $validation->getError('email'); ?>
	            		</div>
        			<?php }?>
				</div>

				<div class="form-group">
					<label for="password" class="font-weight-bold">Password:</label>
					<input type="password" name="password" class="form-control" id="password">
					<?php if($validation->getError('password')) {?>
	            		<div class='alert alert-danger mt-2'>
	              			<?= $error = $validation->getError('password'); ?>
	            		</div>
        			<?php }?>
				</div>

				<button type="submit" id="signup" class="btn btn-primary" name="signup">Signup</button>
						
			</form>
		</div>
		</div>
	</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>
</html>