<?php 
    include 'connection.php';
    include 'Order_function.php'

    ?>


 <!-- Update the user detail code -->


 <?php

if(isset($_POST['UpdateOrder']))
{
  $MenuItem = validate($_POST['MenuItem']);
  $Date = validate($_POST['Date']);
  $Ostatus = validate($_POST['Ostatus']);
  $Description = validate($_POST['Description']);

  $userId = validate($_POST['userId']);
  $user = getById('r_order', $userId);
  if($user['status'] != 200)
  {
      redirect('User_edit.php?id='.$userId,'NO such ID found!');
  }
  
  if($MenuItem != '' || $Date != '' || $Ostatus != '' || $Description != '')
  {
      $query = "UPDATE r_order SET 
      menu_id = '$MenuItem',
      O_date = '$Date',
      O_stetus = '$Ostatus',
      order_description = '$Description'

      WHERE O_id='$userId'";

      $result = mysqli_query($conn, $query);

      if($result){
          redirect('Order_edit.php?id='.$userId,'User Updated Successfully!');

      }else{
          redirect('Order_edit.php','Something Went Wrong!');
      }
  }
  else{
      redirect('Order_edit.php','Fill All the input feilds!');
  }

      
}


?>