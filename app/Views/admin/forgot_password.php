<!DOCTYPE html>
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


    <title>userlogin Page</title>
    <style type="text/css">
    	img
    	{
    		opacity: 0.7;
    	}
    </style>

   </head>
<body>


	<div class="container-fluid">
		<div class="row">
			<div class="col-7 col-lg-offset-2 ml-5 mt-5">
					<br><br><br><br><br><br><h1 class="text-center">Forgot Password</h1>
				<hr><br>
				<?php	$validation = \config\Services::validation();
					 if($validation){echo $validation->listErrors();} ?>	
			
			<form action="<?php echo base_url('admin/forgot');?>" method="post">

				<div class="form-group">
					<label for="email" class="font-weight-bold">Email Id:</label>
					<input type="email" name="email" class="form-control" id="email">
				
				</div>
				
				<br>
					<button class="btn btn-primary" name="login">Login</button>&nbsp;		
			</form>
			</div>
		</div>
	</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>
</html>