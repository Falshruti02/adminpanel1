<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- style CSS -->
   
    <!-- Bootstrap JS -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- fontaswsome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>adminlogin Page</title>
    <style type="text/css">
    	.container
    	{
    		align-items: center;
    		position: absolute;
    		top: 13%;
    	}
    	#head
    	{
    		border-right: 1px solid white;
    	}
    	#login
    	{
    		width: 270px;
    		font-weight: bold;
    		font-size: 20px;
    	}
    	span
    	{
			  position: absolute;
			  margin-left: -16px;
			  padding: 3px;
			  height: 40px;
			  display: flex;
			  align-items: center;
			  background: white;
			  border-right: 1px solid black;
			  border-radius: 3px;
			}
			input
			{
			  height: 40px;
			}
    
    </style>

   </head>
<body>
	<img src="<?php echo base_url('public/assets/image/4.jpg'); ?>" width="100%" height="770px">
	<div class="container">
		<div class="row" style="margin-left: 40%;">
				<h1 class="text-white">Welcome To Admin Login</h1>
			</div>
			<div class="row" style="margin-left: 30%;">
			<div class="col-lg-8 col-lg-offset-2 ml-5 pl-5" align="center">
				<br><br><h1 class="text-center"><i class="fa fa-users fa-3x" aria-hidden="true" style="color: white;"></i></h1>
				<hr><br>
				 <?php $validation = \Config\Services::validation(); ?>
				 <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                <?php endif;?>
			
			<form action="<?php echo base_url('admin/loginuser'); ?>" method="POST">
				<div class="form-group">
					<span>
        	<i class="fa fa-user-o" aria-hidden="true"></i>
    			</span>
					<input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
					<?php if($validation->getError('email')) {?>
	          <div class='alert alert-danger mt-2'>
	              <?= $error = $validation->getError('email'); ?>
	          </div>
        	<?php }?>			
				</div>

				<div class="form-group">
					<span>
						<i class="fa fa-unlock-alt" aria-hidden="true"></i>
					</span>
					<input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
					<?php if($validation->getError('password')) {?>
	            		<div class='alert alert-danger mt-2'>
	              			<?= $error = $validation->getError('password'); ?>
	            		</div>
        			<?php }?>				
				</div>
				<a href="<?php echo base_url('admin/forgot_password');?>" style="color: white; margin-left: -80%; font-size: 17px;">Forgot Password ?</a>
				<br><br>
					<button class="btn btn-primary" name="login" id="login">Login</button>	
			</form>
			<br>
		
			<h4 style="color:white;">OR</h4><br>
			<?php
				$this->facebook = new\Facebook\Facebook([
            'app_id'=> '902799380337555',
            'app_secret' => '321bebecd7a0cd225b4d4843514c3c98',
            'default_graph_version' =>'v2.3'
        ]);
        $fb_permission = ['email'];
				$this->fb_helper = $this->facebook->getRedirectLoginHelper();
				 $fb = $this->fb_helper->getLoginUrl('http://localhost/login_fb/admin/authWithFB?',$fb_permission);
			if($fb)
			{
				echo "<a href='".$fb."'><img src='http://localhost/cii4/public/assets/image/1.jpg'></a>";
			} 
		?>
			</div>
		</div>
	</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>
</html>