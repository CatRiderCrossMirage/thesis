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
    <style>
        body {
            background-color:#e3e6dc;
        }
        .parent {
            padding: 2px;
            display: grid;
            max-width: 500px;
            grid-template-columns: repeat(autofit, minmax(180px, 1fr));
            /* grid-template-columns: 1fr 1fr 1fr 1fr; */
            gap: 5px;
        }
        .item {
            padding: 10px;
            justify-content:center;
            
        }
        img {
            height:75px; 
            width:75px;
            border-radius: 50%;
            margin-left: 20px;
        }
    </style>
    <title>Rider Confirm</title>
</head>
<body>
    <div class="row">
        <?php include('connect.php'); ?>
        <h3><a href="riderConfirm.php">ยืนยันรายระเอียดข้อมูลที่มาส่ง</a></h3>

        <div class="parent">
            <div class="item">
                <a href="riderConfirm.php?platform=Grab Food">
                    <img src="img/Grabfood.jpg" alt="Grab Food">
                </a>
                <a href="riderConfirm.php?platform=Line man">
                    <img src="img/Lineman.jpg" alt="Line man">
                </a>
                <a href="riderConfirm.php?platform=Food panda">
                    <img src="img/Foodpanda.jpg" alt="Food panda">
                </a><br>
                <a href="riderConfirm.php?platform=Express" style="margin:30px;">
                    <i class="fas fa-truck fa-4x" style="color:#ed9158;"></i>
                </a>
            </div>
        </div>
        
        <form action="riderConfirm.php" method="GET" class="mb-2">
            <div class="input-group" style="margin-left:20px;">
                <div class="form-outline">
                    <input type="search" id="form1" class="form-control" name="keywords" style="background-color:#fff;"/>
                    <label class="form-label" for="form1">เลขห้อง</label>
                </div>
                    <button class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
            </div>
        </form>
        <div class="col">
            <div class="parent">
            <?php 
                if(isset($_GET['keywords'])){

                    $keywords = $_GET['keywords'];
                    $sqlStatus0 = "SELECT * FROM detailrider WHERE roomRecive LIKE :keywords AND statusD=0 ORDER BY orderNo DESC";
                    $resStatus0 = $conn->prepare($sqlStatus0);
                    $params = array(
                        'keywords' => "%{$keywords}%"
                    );
                    $resStatus0->execute($params);
                    $result = $resStatus0->fetchALL();
                    
                }   elseif(isset($_GET['platform'])) {

                        $G = "Grab Food";
                        $L = "Line man";
                        $P = "Food panda";
                        $Ex = "Express";
                        $platform = "";

                        if($_GET['platform'] == $G){
                            $platform = $G;
                        } elseif($_GET['platform'] == $L) {
                            $platform = $L;
                        } elseif($_GET['platform'] == $P){
                            $platform = $P;
                        } elseif($_GET['platform'] == $Ex) {
                            $platform =$Ex;
                        }
                        
                        $sqlPlatform = "SELECT * FROM detailrider WHERE delivery_Platform LIKE :platform AND statusD=0 ORDER BY orderNo DESC";
                        $resPlatform = $conn->prepare($sqlPlatform);
                        $params = array(
                            'platform' => "%{$platform}%"
                        );
                        $resPlatform->execute($params);
                        $result = $resPlatform->fetchALL();

                }   else {
                    $sqlStatus0 = "SELECT * FROM detailrider WHERE statusD=0 ORDER BY orderNo DESC";
                    $resStatus0 = $conn->prepare($sqlStatus0);
                    $resStatus0 -> execute();
                    $result = $resStatus0->fetchALL();
                }

                foreach($result as $row) { 
                    if($row['statusD'] == 0){
            
                  ?>
                  <div class='card' style='width: 300px;'>
            
                    <div class='card-title'>
                        <h3></h3>
                    </div>
            
                    <div class='card-body'>
                        <div class='form-grop'>
                            <div class='row'>
                                <label class='col control-label'>
                                    ชื่อ-สกุล :: 
                                </label>
                                <label class='col control-label'>
                                    <?php echo $row['full_Name']; ?>
                                </label>
                            </div>
                        </div>    
                        <div class='form-grop'>
                            <div class='row'>
                                <label class='col control-label'>
                                    ป้ายทะเบียนรถ :: 
                                </label>
                                <label class='col control-label'>
                                    <?php echo $row['license']; ?>
                                </label>
                            </div> 
                        </div>
                        <div class='form-grop'>
                            <div class='row'>
                                <label class='col control-label'>
                                    ห้องที่มาส่ง :: 
                                </label>
                                <label class='col control-label'>
                                    <?php echo $row['roomRecive']; ?>
                                </label>
                            </div>  
                        </div>
                        <div class='form-grop'>
                            <div class='row'>
                                <label class='col control-label'>
                                    บริการที่มาส่ง ::
                                </label>
                                <label class='col control-label'>
                                    <?php echo $row['delivery_Platform']; ?>
                                </label>
                            </div>  
                        </div>
                    </div>
            
                    <div class='footer'>
                        <a class="btn" href="update.php?orderNo=<?php echo $row['orderNo'];?>&roomRecive=<?php echo $row['roomRecive']; ?>" 
                        name="recived" style="margin-left:36%;margin-bottom:10px;">
                        ยืนยัน</a>
                    </div>
            
                    </div>
            <?php 
                    }
                  } 
            
            ?>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/mdb.min.js"></script>     
</body>
</html>