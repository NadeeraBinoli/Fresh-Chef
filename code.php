<?php 
    include 'connection.php';
    include 'funtion.php'

    ?>


 <!-- Update the user detail code -->


 <?php

if(isset($_POST['UpdateUser']))
{
  $name = validate($_POST['name']);
  $Address = validate($_POST['Address']);
  $Email = validate($_POST['Email']);
  $Phone = validate($_POST['Phone']);

  $userId = validate($_POST['userId']);
  $user = getById('r_user', $userId);
  if($user['status'] != 200)
  {
      redirect('User_edit.php?id='.$userId,'NO such ID found!');
  }
  
  if($name != '' || $Email != '' || $Phone != '' || $Phone != '')
  {
      $query = "UPDATE r_user SET 
      C_name = '$name',
      C_address = '$Address',
      C_email = '$Email',
      C_P_number = '$Phone'

      WHERE C_id='$userId'";

      $result = mysqli_query($conn, $query);

      if($result){
          redirect('User_edit.php?id='.$userId,'User Updated Successfully!');

      }else{
          redirect('User_edit.php','Something Went Wrong!');
      }
  }
  else{
      redirect('User_edit.php','Fill All the input feilds!');
  }

      
}


?>