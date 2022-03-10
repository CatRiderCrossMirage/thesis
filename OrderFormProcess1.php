<?php

include('connect.php');

 print_r($_POST);

if (isset($_POST)){
    $orderNo = 0;
    $full_name = $_POST["full_name"];
    $license = $_POST["license"];
    $roomRecive = $_POST["roomRecive"];
    $delivery_Platform = $_POST["delivery_Platform"];
    $conn ->    query(" INSERT INTO detailrider (orderNo, full_name, license, roomRecive, delivery_Platform) 
                VALUES ('$orderNo','$full_name','$license','$roomRecive','$delivery_Platform') ") or die($conn->error);
    $orderNo = $orderNo + 1 ;
    header("location: OrderForm.php");
}


?>