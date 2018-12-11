<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html> 

<html lang = "en"> 


   <head>

      <meta charset = "utf-8"> 

      <title>Registration Form</title> 

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

   </head>

<body>

<div class="container">

	<h2>Registration<br><br></h2>


	<div class="wrapper">

	        <form action="<?php echo base_url();?>login/reg" enctype="multipart/form-data" method="post">

	            <div class='form-group col-md-4'>

	                <label>Username : </label>

	                	<input class='form-control' type="text" placeholder="Username" name="username" value="<?php echo set_value('username')?>" />

							<?php echo form_error('username');?>

				</div>

				<div class='form-group col-md-4'>

	                <label>Password : </label>

	                	<input class='form-control' type="password" placeholder="`Password" name="password"  value="<?php echo set_value('password')?>" />

							<?php echo form_error('password');?>
				</div>

				<div class='form-group col-md-4'>

	                <label>Email : </label>

	                	<input class='form-control' type="email" placeholder="Email" name="email" value="<?php echo set_value('email')?>" />

							<?php echo form_error('email');?>
				</div>

				<div class='form-group col-md-4'>

					<label>Image : </label>

						<input class='form-control' type="file" name="picture" />

							<?php echo form_error('picture');?>
				</div>
						<input class='btn btn-primary' type="submit"  name="dsubmit" value="Register">

						<a class="btn btn-danger" href="<?php echo base_url();?>login/loginpanel">Login</a>

							<br>

							<br>
						<?php

							echo $this->session->flashdata("msg");

							echo $this->session->flashdata("error");

						?>

			</div>
	</div>   

</div>

</body>

</html>

