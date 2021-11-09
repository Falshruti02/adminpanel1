<?php include('header.php');?>

<div class="container">
	<div class="col-md-6 ml-5 mt-5">
		<div class="card shadow mb-4">
		    <div class="card-header py-3">
		        <h6 class="m-0 font-weight-bold text-primary">Admin Profile</h6>
		    </div>
		    <div class="card-body">
		        <div class="text-center">
		            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width:200px; height:160px; border-radius: 50%;" src="<?php echo base_url('public/assets/image/pic.jpg'); ?>">
		        </div><br>
		        <?php 
			        $db = \Config\Database::connect();
					$builder = $db->table('admin'); 
					$query = $builder->get();
					foreach ($query->getResult() as $row) {
				?>
		        <h5 style="color:black;" class="ml-5"><span style="color:black; font-weight: bold;">Name :</span> <?php echo $row->name; ?></h5>
		        <h5 style="color:black;" class="ml-5"><span style="color:black; font-weight: bold;">Email : </span> <?php echo $row->email; ?></h5>
		    <?php } ?>

		    <br><button type="button" class="btn btn-primary"><a href="<?php echo base_url('admin/logout'); ?>" style="color:white;">Logout</a></button>
		    </div>
		</div>
	</div>
</div>