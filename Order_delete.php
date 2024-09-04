
<?php

include 'connection.php';
require 'Order_function.php';

$paramResult = checkParamId('id');
if(is_numeric($paramResult))
{
    $userId = validate($paramResult);

    $user = getById('r_order',$userId);

    if($user['status']){

        $userDelete = DeleteQuary('r_order',$userId);

        if($userDelete){
            redirect('Admin_order.php','Order Deleted Successfully!');
        }else{
            redirect('Admin_order.php','Something went wrong!');
        }
    }else{
        redirect('Admin_order.php',$user['message']);
    }
}
else
{
    redirect('Admin_order.php',$paramResult);
}

   




?>

