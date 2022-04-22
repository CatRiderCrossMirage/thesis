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
    <style>
        body {
            background-color: #e3e6dc;
        }
        .wrapper {
            padding: 2px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }
    </style>
</head>
<body>
    <?php
            include('connect.php');
            // 0 = sending, 1 = sended
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
        <!-- top webpage -->
        <div class="col-md-12 text-center" >
            ตรวจสอบการเข้าออกภายในหอพัก
            <br>
            <button type="button" class="btn btn-primary" onclick="myButton0()">
                <i class="fas fa-shipping-fast fa-lg"></i>&nbsp;</i>กำลังจัดส่ง
            </button>
            <button type="button" class="btn btn-success" onclick="myButton1()">
                <i class="fas fa-check fa-lg"></i> &nbsp;จัดส่งเสร็จแล้ว
            </button><br>
            <!-- search box -->
            <form  method="GET">
                <div class="input-group" >
                    <div class="form-outline">
                        <input type="search" id="form1" class="form-control" name="roomNumbers" style="background-color:#fff;"/>
                        <label class="form-label" for="form1">เลขห้อง</label>                      
                    </div>
                    <button class="btn btn-success" name="searching" value="search" onclick="myButton()">
                        <i class="fas fa-search"></i>
                    </button> &nbsp;
                    <button type="reset" class="btn btn-danger" value="reset">
                        <i class="fas fa-redo"></i>
                    </button>
                </div>
            </form>
            <div class="col-md-12 text-center">
                <h1><a href="showOrderM.php">สรุปข้อมูลทั้งหมด</a></h1>
                จำนวนรายการที่กำลังส่ง <?php echo $countStatus0; ?> รายการ <br>
                จำนวนรายการที่ส่งแล้ว <?php echo $countStatus1; ?> รายการ <br>
            </div>
        </div>
        <div id="thisZero" style="display: none;">
              
            <!-- content show a result0 -->
            <div class="col-md-12 text-center">
                <h1>ข้อมูลที่กำลังจัดส่ง</h1>
            </div>
            <div class="wrapper" >                          
                <?php 
                    foreach( $result0 as $row) { ?>
                        
                        <div class='card' style='width: 25rem;padding:10px;text-align:left;'>
                        <div class='card-title' style="text-align:center;">
                            <h3>ลำดับออเดอร์ที่ <?php echo $row['orderNo']; ?></h3>
                        </div>
                        <div class='card-body'>
                                <div class='form-grop'>
                                        <div class='row'>
                                            <label class='col-sm control-label' >
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
                        <div class="card-footer" style="text-align:center;">
                            <small class="text-muted" style="margin:20px;"><?php echo $row['currentTimes']; ?></small>
                        </div>
                        </div>
                    
                <?php    
                    }
                ?>
            </div> 
        </div>

        <div id="thisOne" style="display: none;">
        
            <!-- content show a result1 -->
            <div class="col-md-12 text-center">
                <h1>ข้อมูลที่จัดส่งเสร็จแล้ว</h1>
            </div>
            <div class="wrapper" >                          
                <?php 
                    foreach( $result1 as $row) { ?>
                        
                        <div class='card' style='width: 25rem;padding:10px;text-align:left;'>
                        <div class='card-title' style="text-align:center;">
                            <h3>ลำดับออเดอร์ที่ <?php echo $row['orderNo']; ?></h3>
                        </div>
                        <div class='card-body'>
                                <div class='form-grop'>
                                        <div class='row'>
                                            <label class='col-sm control-label' >
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
                        <div class="card-footer" style="text-align:center;">
                            <small class="text-muted" style="margin:20px;"><?php echo $row['currentTimes']; ?></small>
                        </div>
                        </div>
                    
                <?php    
                    }
                ?>
            </div> 
        </div>
        
    
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script>
        function myButton() {
            var x = document.getElementById("thisZero");
            var y = document.getElementById("thisOne");
            if (x.style.display === "none") {
                x.style.display = "grid";
                y.style.display = "grid";
            } else {
                x.style.display = "none";
                y.style.display = "none";
            }
        }
        function myButton0() {
            var x = document.getElementById("thisZero");
            if (x.style.display === "none") {
                x.style.display = "grid";
            } else {
                x.style.display = "none";
            }
        }
        function myButton1() {
            var x = document.getElementById("thisOne");
            if (x.style.display === "none") {
                x.style.display = "grid";
            } else {
                x.style.display = "none";
            }
        }
    </script>    
</body>
</html>