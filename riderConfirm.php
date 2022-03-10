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
    <title>Rider Confirm</title>
</head>
<body>
    <div class="row">
        <div class="col" align="center">
            <h3>ยืนยันรายระเอียดข้อมูลที่มาส่ง</h3>
            <?php 
                include('connect.php');
                $query = "SELECT * FROM detailrider WHERE statusD = 0";
                $result = mysqli_query($conn, $query);
                while ($row = $result->fetch_assoc()) {
                        echo"
                        <div class='card' style='width: 25rem;'>
                        <div class='card-title'>
                            <h3></h3>
                        </div>
                        <div class='card-body'>
                                <div class='form-grop'>
                                        <div class='row'>
                                            <label class='col-sm control-label'>
                                                ชื่อ-สกุล :: 
                                            </label>
                                            <label class='col-sm-6 control-label'>
                                                {$row['full_Name']}
                                            </label>
                                        </div>
                                </div>    
                                <div class='form-grop'>
                                    <div class='row'>
                                            <label class='col-sm control-label'>
                                                ป้ายทะเบียนรถ :: 
                                            </label>
                                            <label class='col-sm-6 control-label'>
                                                {$row['license']}
                                            </label>
                                    </div> 
                                </div>
                                <div class='form-grop'>
                                    <div class='row'>
                                            <label class='col-sm control-label'>
                                                ห้องที่มาส่ง :: 
                                            </label>
                                            <label class='col-sm-6 control-label'>
                                                {$row['roomRecive']}
                                            </label>
                                    </div>  
                                </div>
                                <div class='form-grop'>
                                    <div class='row'>
                                            <label class='col-sm control-label'>
                                                บริการที่มาส่ง ::
                                            </label>
                                            <label class='col-sm-6 control-label'>
                                                {$row['delivery_Platform']}
                                            </label>
                                    </div>  
                                </div>
                                <div class='footer'><br>
                                    <button type='button' class='btn' name='recived'><a href='update.php?orderNo={$row['orderNo']}&roomRecive={$row['roomRecive']}'>ยืนยัน</a></button>
                                </div>
                        </div> 
                        </div>   
                    ";  
                    
                }
            ?>
        </div>
    </div>
        
</body>
</html>