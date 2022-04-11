<?php
include('connect.php');

if(isset($_GET['orderNo'])){
    //$recived = $_GET['recived'];
    $statusD = 1;
    $orderNo = $_GET['orderNo'];

    $updateSQL = "UPDATE detailrider SET statusD = :statusD WHERE orderNo = :orderNo";
    $updateStmt = $conn -> prepare($updateSQL);
    $params = array(
        'statusD' => $statusD,
        'orderNo' => $orderNo
    );
    $updateStmt->execute($params);

}

?>
<center>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thank you! for uses.</title>
    </head>
    <body>
        ห้อง <?php echo $_GET['roomRecive']; ?> กำลังรอคุณอยู่<br>
        กลับไปหน้ายืนยันรายระเอียดข้อมูลที่มาส่ง <a href="riderConfirm.php">คลิก</a>
        
    </body>
    </html>