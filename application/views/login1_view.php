<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html> 

<html lang = "en">

   <head> 

      <meta charset = "utf-8"> 

      <title>LogIn</title> 

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

   </head>

<body class="container">

<div class="wrapper">

<br><br>

			<h1>Login Page</h1>
<br>

	<div class="wrapper">

	        <form action="<?php echo base_url();?>login/loginpanel" method="post">

	            <div class='form-group col-md-4'>

	                <label>Username : </label>

	                	<input class='form-control' type="text" placeholder="Username" name="user"  value="<?php echo set_value('user')?>" >

							<?php  echo form_error('user');?>

				</div>

				<div class='form-group col-md-4'>

	                <label>Password : </label>

	               		<input class='form-control' type="password" placeholder="Password" name="pass"  value="<?php echo set_value('pass')?>" >

							<?php echo form_error('pass');?><br></br>

				</div>

					<input class="btn btn-danger" type="submit"  name="dsubmit" value="Login">
					
					<a class="btn btn-primary" href="<?php echo base_url();?>login">Register</a>

						<br>
						<br>
					<div>
						<?php

							echo $this->session->flashdata("error");
						
						?>
					</div>
			</form>
					
	</div>

</div>

 

