
<?php

include 'connection.php';
require 'reviews_funtion.php';

$paramResult = checkParamId('id');
if(is_numeric($paramResult))
{
    $userId = validate($paramResult);

    $user = getById('r_compliant',$userId);

    if($user['status']){

        $userDelete = DeleteQuary('r_compliant',$userId);

        if($userDelete){
            redirect('Admin_reviews.php','Review Deleted Successfully!');
        }else{
            redirect('Admin_reviews.php','Something went wrong!');
        }
    }else{
        redirect('Admin_reviews.php',$user['message']);
    }
}
else
{
    redirect('Admin_reviews.php',$paramResult);
}

   




?>

