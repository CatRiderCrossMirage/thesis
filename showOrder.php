<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--  <link rel="stylesheet" href="styles.css"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css2?family=Mali:wght@500&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
            crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Order Show</title>
</head>
<body>
    <div class="row">
        <div class="col-4 text-center">
            <?php
                include('connect.php');
                $sqlStatus0 = "SELECT * FROM detailrider WHERE statusD=0";
                $resStatus0 = $conn->prepare($sqlStatus0);
                $resStatus0 -> execute();
                $countStatus0 = $resStatus0 -> rowCount();

                $sqlStatus1 = "SELECT * FROM detailrider WHERE statusD=1";
                $resStatus1 = $conn->prepare($sqlStatus1);
                $resStatus1 -> execute();
                $countStatus1 = $resStatus1 -> rowCount();

            ?>
            <h1>สรุปข้อมูลทั้งหมด</h1><br>
            จำนวนรายการที่กำลังส่ง <?php echo $countStatus0; ?> รายการ <br>
            จำนวนรายการที่ส่งแล้ว <?php echo $countStatus1; ?> รายการ <br>
        </div>
        <div class="col-4 text-center" >
            <?php 
                        
                        // $sqlStatus0 = "SELECT * FROM detailrider WHERE statusD=0";
                        echo "<h1>รายระเอียดคนขับที่กำลังส่ง</h1>" ;
                        foreach( $conn->query($sqlStatus0) as $row) { ?>
                        
                            <br>
                                <div class='card' style='width: 25rem;'>
                                <div class='card-title'>
                                    <h3>ลำดับออเดอร์ที่ <?php echo $row['orderNo']; ?></h3>
                                </div>
                                <div class='card-body'>
                                        <div class='form-grop'>
                                                <div class='row'>
                                                    <label class='col-sm control-label'>
                                                        ชื่อ-สกุล :: 
                                                    </label>
                                                    <label class='col-sm-6 control-label'>
                                                        <?php echo $row["full_Name"]; ?>
                                                    </label>
                                                </div>
                                        </div>    
                                        <div class='form-grop'>
                                            <div class='row'>
                                                    <label class='col-sm control-label'>
                                                        ป้ายทะเบียนรถ :: 
                                                    </label>
                                                    <label class='col-sm-6 control-label'>
                                                        <?php echo $row['license']; ?>
                                                    </label>
                                            </div> 
                                        </div>
                                        <div class='form-grop'>
                                            <div class='row'>
                                                    <label class='col-sm control-label'>
                                                        ห้องที่มาส่ง :: 
                                                    </label>
                                                    <label class='col-sm-6 control-label'>
                                                        <?php echo $row['roomRecive']; ?>
                                                    </label>
                                            </div>  
                                        </div>
                                        <div class='form-grop'>
                                            <div class='row'>
                                                    <label class='col-sm control-label'>
                                                        บริการที่มาส่ง ::
                                                    </label>
                                                    <label class='col-sm-6 control-label'>
                                                        <?php echo $row['delivery_Platform']; ?>
                                                    </label>
                                            </div>  
                                        </div>
                                        
                                </div> 
                                </div>     
                    <?php    
                        }
                    ?>
        </div>
        <div class="col-4 text-center">
            <?php 
                    // $sqlStatus1 = "SELECT * FROM detailrider WHERE statusD=1";
                    echo "<h1>รายระเอียดคนขับที่ส่งเสร็จแล้ว</h1>" ;
                    foreach($conn->query($sqlStatus1) as $row) { 
            ?>
                            <div class='card' style='width: 25rem;'>
                            <div class='card-title'>
                                <h3>ลำดับออเดอร์ที่ <?php echo $row['orderNo']; ?></h3>
                            </div>
                            <div class='card-body'>
                                    <div class='form-grop'>
                                            <div class='row'>
                                                <label class='col-sm control-label'>
                                                    ชื่อ-สกุล :: 
                                                </label>
                                                <label class='col-sm-6 control-label'>
                                                    <?php echo $row['full_Name'];?>
                                                </label>
                                            </div>
                                    </div>    
                                    <div class='form-grop'>
                                        <div class='row'>
                                                <label class='col-sm control-label'>
                                                    ป้ายทะเบียนรถ :: 
                                                </label>
                                                <label class='col-sm-6 control-label'>
                                                    <?php echo $row['license'];?>
                                                </label>
                                        </div> 
                                    </div>
                                    <div class='form-grop'>
                                        <div class='row'>
                                                <label class='col-sm control-label'>
                                                    ห้องที่มาส่ง :: 
                                                </label>
                                                <label class='col-sm-6 control-label'>
                                                    <?php echo $row['roomRecive'];?>
                                                </label>
                                        </div>  
                                    </div>
                                    <div class='form-grop'>
                                        <div class='row'>
                                                <label class='col-sm control-label'>
                                                    บริการที่มาส่ง ::
                                                </label>
                                                <label class='col-sm-6 control-label'>
                                                    <?php echo $row['delivery_Platform'];?>
                                                </label>
                                        </div>  
                                    </div>
                                    
                            </div> 
                            </div>   
                         
                <?php
                    }
                ?>
        </div>
    </div>
        
</body>
</html>