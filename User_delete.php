
<?php

include 'connection.php';
require 'funtion.php';

$paramResult = checkParamId('id');
if(is_numeric($paramResult))
{
    $userId = validate($paramResult);

    $user = getById('r_user',$userId);

    if($user['status']){

        $userDelete = DeleteQuary('r_user',$userId);

        if($userDelete){
            redirect('Admin_user.php','User Deleted Successfully!');
        }else{
            redirect('Admin_user.php','Something went wrong!');
        }
    }else{
        redirect('Admin_user.php',$user['message']);
    }
}
else
{
    redirect('Admin_user.php',$paramResult);
}

   




?>

