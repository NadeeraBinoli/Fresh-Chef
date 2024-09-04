<?php

session_start();

require 'connection.php';

function validate($inputData){
    global $conn;

    $validatedData = mysqli_real_escape_string($conn, $inputData);
    return trim($validatedData);

}

function getAll($tableName){
    global $conn;

    $table = validate($tableName);

    $sql="SELECT * FROM $table";
    $result = mysqli_query($conn,$sql);
    return $result;
}

function checkParamId($paramType){
    if(isset($_GET[$paramType])){
        if($_GET[$paramType] != null){
            return $_GET[$paramType];

        }else{

            return 'No ID Found';

        }

    }else{
        return 'No ID is Given';
    }
}

function getById($tableName,$id)
{
    global $conn;

    $table = validate($tableName);
    $id = validate($id);

    $query = "SELECT * FROM $table WHERE comp_id ='$id' LIMIT 1 ";
    $result = mysqli_query($conn, $query);

    if($result)
    {
        if(mysqli_num_rows($result) == 1)
        {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $response = [
                'status' => 200,
                'message' => 'successful!',
                'data' => $row
            ];
    
            return $response;

        }
        else
        {
            $response = [
                'status' => 404,
                'message' => 'No record Found!'
            ];
    
            return $response;
        }

    }
    else
    {
        $response = [
            'status' => 500,
            'message' => 'Something Went Wrong'
        ];

        return $response;

    }

}

function redirect($url, $status)
{
    $_SESSION['status'] = $status;
    header('location:'.$url);
    exit(0);
}
function alterMessage()
{
    if(isset($_SESSION['status']))
    {
        echo '<div class= "alert"
        <h6>'.$_SESSION['status'].'</h6>
        </div>';
        unset($_SESSION['status']);
    }
}

function  DeleteQuary($tableName,$id)
{
    global $conn;

    $table = validate($tableName);
    $id = validate($id);

    $query = "DELETE FROM $table WHERE comp_id = '$id' LIMIT 1";
    $result = mysqli_query($conn, $query);
    return $result;

}




?>