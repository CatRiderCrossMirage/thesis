<?php
include('connect.php');

if(isset($_GET['orderNo'])){
    //$recived = $_GET['recived'];
    $statusD = 1;
    $orderNo = $_GET['orderNo'];
    $query = "UPDATE detailrider SET statusD = $statusD WHERE orderNo = $orderNo";
    $result = mysqli_query($conn, $query);

    //header("location: showOrder.php"); ไม่อัพเดตตตต แก้
}

?>
<center>
ห้อง <?php echo $_GET['roomRecive']; ?> กำลังรอคุณอยู่<br>
กลับไปหน้ายืนยันรายระเอียดข้อมูลที่มาส่ง <a href="riderConfirm.php">คลิก</a>