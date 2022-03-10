<?php 
include('connect.php');
//print_r($_POST);
if(isset($_POST)){

    $orderNo = 0;
    $full_name = $_POST["full_name"];
    $license = $_POST["license"];
    $roomRecive = $_POST["roomRecive"];
    $delivery_Platform = $_POST["delivery_Platform"];

    $conn ->    query(" INSERT INTO detailrider (orderNo, full_name, license, roomRecive, delivery_Platform, statusD) 
                VALUES ('$orderNo','$full_name','$license','$roomRecive','$delivery_Platform', '0') ") or die($conn->error);
    
    //header("location: OrderForm.php");
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <!--  <link rel="stylesheet" href="styles.css"> -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="https://fonts.googleapis.com/css2?family=Mali:wght@500&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
                crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
                crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title>Waiting Order</title>
    </head>
    <body>
        <div class="container justify-content-center">
            <div class="row">
                    <div class="col" align="center">
                        
                            <div class="card" style="width: 40rem;">
                                <div class="card-title">
                                    <h3>คนขับกำลังมาหา กรุณารอสักครู่</h3>
                                </div>
                                <div class="card-body">
                                    <form action="####" method=POST>
                                        <div class="form-grop">
                                            <div class="row">
                                            <label class="col-sm-3 control-label">
                                                ชื่อ-สกุล :: 
                                            </label>
                                                <div class="col-md">
                                                    <?php echo $full_name; ?>
                                                </div>
                                            </div>
                                            
                                        </div>    
                                        <div class="form-grop">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">
                                                    ป้ายทะเบียนรถ ::
                                                </label>
                                                <div class="col-md">
                                                    <?php echo $license; ?>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-grop">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">
                                                ห้องที่มาส่ง ::
                                                </label>
                                                <div class="col-md">
                                                    <?php echo $roomRecive; ?>
                                                </div>
                                                
                                            </div>   
                                        </div>
                                        <div class="form-grop">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">
                                                บริการที่มาส่ง ::
                                                </label> 
                                                <div class="col-md">
                                                    <?php echo $delivery_Platform; ?>
                                                </div>
                                                
                                            </div>  
                                        </div>
                                        <div class="footer"><br>
                                            
                                            <button class="btn btn-success"><a href="OrderForm.php">ยืนยันการส่ง</a></button>

                                        </div>
                                    </form>
                                </div> 
                            </div>
                        
                    </div>
                </div>
        </div>
    </body>
</html>
