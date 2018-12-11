<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html> 

<html lang = "en"> 

   <head> 

      <title>User</title> 

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

   </head>

<body class="container">

        <div class="wrapper">

          <div class='form-group col-md-4'>
              <?php

                echo "<h2>Hello"."  ".$this->session->userdata('username')."!</h2><br>";



                echo "<h3>".$this->input->cookie('user')."</h3>";
        				
        if(!empty($data1)){
          
                  foreach($data1 as $item)

              {
          
                  echo "<h3>Username : </h3>".$item->username."";

                  echo "<h3>Email : </h3>".$item->email."";

                  echo "<h3>Picture : </h3><br>";

          //echo $item->picture;

         $imgpath=base_url().$item->picture;

         //echo $imgpath;

            echo "<img src='$imgpath'>"."<br>";
          
          }

        }

            echo '<a class="btn btn-danger" href="'.base_url().'login/logout">Logout</a>';

           ?>
        </div>

      </div>
</body>
</html>