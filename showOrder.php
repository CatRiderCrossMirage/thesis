<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- start bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <!-- https://icons.getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/ce3eedc3c2.js" crossorigin="anonymous"></script>
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

                // search
            ?>
                <h1><a href="showOrder.php">สรุปข้อมูลทั้งหมด</a></h1><br>
                <form action="showOrder.php" method="GET" class="mb-4">

                    <div class="input-group" style="margin-left:30%;">
                        <div class="form-outline mb-2">
                            <input type="search" id="form1" class="form-control" name="roomNumbers" style="background-color:#fff;"/>
                            <label class="form-label" for="form1">เลขห้อง</label>
                        </div>
                    </div>

                    <div class="input-group" style="margin-left:30%;">
                        <div class="form-outline mb-2">
                            <input type="search" id="form1" class="form-control" name="days" style="background-color:#fff;"/>
                            <label class="form-label" for="form1">วันที่</label>
                        </div>
                    </div>

                    <div class="input-group" style="margin-left:30%;">
                        <div class="form-outline mb-2">
                            <input type="search" id="form1" class="form-control" name="month" style="background-color:#fff;"/>
                            <label class="form-label" for="form1">เดือน</label>
                        </div>
                    </div>

                    <div class="input-group" style="margin-left:30%;">
                        <div class="form-outline mb-2">
                            <input type="search" id="form1" class="form-control" name="years" style="background-color:#fff;"/>
                            <label class="form-label" for="form1">ปี</label>
                        </div>
                    </div>

                    <button class="btn btn-success" name="searching" value="search">
                        <i class="fas fa-search"></i>
                    </button>
                    <button type="reset" class="btn btn-danger" value="reset">
                        <i class="fas fa-redo"></i>
                    </button>
                </form>
            <?php
                $monthArr = Array(
                    "01"=>"มกราคม",
                    "02"=>"กุมภาพันธ์",
                    "03"=>"มีนาคม",
                    "04"=>"เมษายน",
                    "05"=>"พฤษภาคม",
                    "06"=>"มิถุนายน", 
                    "07"=>"กรกฎาคม",
                    "08"=>"สิงหาคม",
                    "09"=>"กันยายน",
                    "10"=>"ตุลาคม",
                    "11"=>"พฤศจิกายน",
                    "12"=>"ธันวาคม"
                ); 
                // $splitDate = "SELECT * FROM detailrider WHERE statusD=0 ORDER BY statusD ASC";
                // $resSplitDate = $conn->prepare($splitDate);
                // $resSplitDate->execute();
                // $resultSplit = $resSplitDate -> fetchALL();
                // print_r($resultSplit[0][6]);
                // foreach($resultSplit as $res){
                //     $times = $res['currentTimes'];
                //     $spitTimes = explode("-",$times);
                //     $days = explode(" ",$spitTimes[2]);
                //     echo $days[0]."<br>";

                // }
                if(isset($_GET['roomNumbers'])){

                        $roomNumbers = $_GET['roomNumbers'];
                        $sqlStatus0 = "SELECT * FROM detailrider WHERE roomRecive LIKE :roomNumbers AND statusD=0 ORDER BY statusD ASC";
                        $resStatus0 = $conn->prepare($sqlStatus0);
                        $params = array(
                            'roomNumbers' => "%{$roomNumbers}%"
                        );
                        $resStatus0->execute($params);
                        $result0 = $resStatus0->fetchALL();
                        $countStatus0 = $resStatus0 -> rowCount();

                        $sqlStatus1 = "SELECT * FROM detailrider WHERE roomRecive LIKE :roomNumbers AND statusD=1 ORDER BY statusD ASC";
                        $resStatus1 = $conn->prepare($sqlStatus1);
                        $params = array(
                            'roomNumbers' => "%{$roomNumbers}%"
                        );
                        $resStatus1->execute($params);
                        $result1 = $resStatus1->fetchALL();
                        $countStatus1 = $resStatus1 -> rowCount();

                } elseif(isset($_GET['days'])){

                    $days = $_GET['days'];
                    $splitDate = "SELECT * FROM detailrider WHERE statusD=0 ORDER BY statusD ASC";
                    $resSplitDate = $conn->prepare($splitDate);
                    $resSplitDate->execute();
                    $resultSplit = $resSplitDate -> fetchALL();

                    foreach($resultSplit as $res){
                        $times = $res['currentTimes'];
                        $spitTimes = explode("-",$times);
                        $days = explode(" ",$spitTimes[2]);
                    }
                    $sqlDays0 = "SELECT * FROM detailrider WHERE currentTimes LIKE :days AND statusD=0 ORDER BY statusD ASC";
                    $resStatus0 = $conn->prepare($sqlDays0);
                    $params = array(
                        'days' => "%{$days}%"
                    );
                    $resStatus0->execute($params);
                    $result0 = $resStatus0->fetchALL();

                    $countStatus1 = $resStatus1 -> rowCount();
                    $sqlDays1 = "SELECT * FROM detailrider WHERE currentTimes LIKE :days AND statusD=1 ORDER BY statusD ASC";
                    $resStatus1 = $conn->prepare($sqlDays1);
                    $params = array(
                        'days' => "%{$days}%"
                    );
                    $resStatus1->execute($params);
                    $result1 = $resStatus1->fetchALL();
                    $countStatus1 = $resStatus1 -> rowCount();

                } elseif(isset($_GET['month'])){

                    $month = $_GET['month'];
                    $sqlMonth0 = "SELECT * FROM detailrider WHERE currentTimes LIKE :month AND statusD=0 ORDER BY statusD ASC";
                    $resStatus0 = $conn->prepare($sqlMonth0);
                    $params = array(
                        'days' => "%{$month}%"
                    );
                    $resStatus0->execute($params);
                    $result0 = $resStatus0->fetchALL();

                    $countMonth1 = $resStatus1 -> rowCount();
                    $sqlDays1 = "SELECT * FROM detailrider WHERE currentTimes LIKE :month AND statusD=1 ORDER BY statusD ASC";
                    $resStatus1 = $conn->prepare($sqlMonth1);
                    $params = array(
                        'days' => "%{$month}%"
                    );
                    $resStatus1->execute($params);
                    $result1 = $resStatus1->fetchALL();
                    $countStatus1 = $resStatus1 -> rowCount();
                } elseif(isset($_GET['years'])){

                    $years = $_GET['years'];
                    $sqlyears0 = "SELECT * FROM detailrider WHERE currentTimes LIKE :years AND statusD=0 ORDER BY statusD ASC";
                    $resStatus0 = $conn->prepare($sqlyears0);
                    $params = array(
                        'days' => "%{$month}%"
                    );
                    $resStatus0->execute($params);
                    $result0 = $resStatus0->fetchALL();

                    $countMonth1 = $resStatus1 -> rowCount();
                    $sqlyears1 = "SELECT * FROM detailrider WHERE currentTimes LIKE :years AND statusD=1 ORDER BY statusD ASC";
                    $resStatus1 = $conn->prepare($sqlyears1);
                    $params = array(
                        'days' => "%{$years}%"
                    );
                    $resStatus1->execute($params);
                    $result1 = $resStatus1->fetchALL();
                    $countStatus1 = $resStatus1 -> rowCount();
                } else {
                
                    $sqlStatus0 = "SELECT * FROM detailrider WHERE statusD=0 ORDER BY orderNo DESC";
                    $resStatus0 = $conn->prepare($sqlStatus0);
                    $resStatus0 -> execute();
                    $result0 = $resStatus0->fetchALL();
                    $countStatus0 = $resStatus0 -> rowCount();

                    $sqlStatus1 = "SELECT * FROM detailrider WHERE statusD=1 ORDER BY orderNo DESC";
                    $resStatus1 = $conn->prepare($sqlStatus1);
                    $resStatus1 -> execute();
                    $result1 = $resStatus1->fetchALL();
                    $countStatus1 = $resStatus1 -> rowCount();
                }
            ?>
            
            จำนวนรายการที่กำลังส่ง <?php echo $countStatus0; ?> รายการ <br>
            จำนวนรายการที่ส่งแล้ว <?php echo $countStatus1; ?> รายการ <br>
        </div>
        <div class="col-4 text-center" >
            <?php 
                        
                        // $sqlStatus0 = "SELECT * FROM detailrider WHERE statusD=0";
                        echo "<h1>รายระเอียดคนขับที่กำลังส่ง</h1>" ;
                        foreach( $result0 as $row) { ?>
                        
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
                                <div class="card-footer">
                                    <small class="text-muted" style="margin:20px;"><?php echo $row['currentTimes']; ?></small>
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
                    foreach($result1 as $row) { 
            ?>                             <br>
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
                <div class="card-footer">
                    <small class="text-muted" style="margin:20px;"><?php echo $row['currentTimes']; ?></small>
                </div>
                </div>  
                         
                <?php
                    }
                ?>
        </div>
    </div>
<script type="text/javascript" src="js/mdb.min.js"></script>      
</body>
</html>