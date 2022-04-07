<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--  <link rel="stylesheet" href="styles.css"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- start bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- custom css -->
    <!--  <link rel="stylesheet" href="styles.css"> -->
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Mali:wght@500&display=swap" rel="stylesheet">
    <title>Order Show</title>
</head>
<style>
    body {
        background-color:#e3e6dc;
    }
</style>
<body>
    <div class="row">
        <div class="col-4 text-center">
            <?php
                include('connect.php');
                $sqlStatus0 = "SELECT * FROM detailrider WHERE statusD=0 ORDER BY orderNo DESC";
                $resStatus0 = $conn->prepare($sqlStatus0);
                $resStatus0 -> execute();
                $countStatus0 = $resStatus0 -> rowCount();

                $sqlStatus1 = "SELECT * FROM detailrider WHERE statusD=1 ORDER BY orderNo DESC";
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
                                <div class='card' style='width: 25rem;padding:10px;'>
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
            ?>  <br>
                            <div class='card' style='width: 25rem;padding:10px;'>
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