<html>
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
        <!-- MDB -->
        <link rel="stylesheet" href="css/mdb.min.css" />
        <!-- custom css -->
        <!--  <link rel="stylesheet" href="styles.css"> -->
        <!-- font -->
        <link href="https://fonts.googleapis.com/css2?family=Mali:wght@500&display=swap" rel="stylesheet">
        <title>Waiting Order</title>
        <style>
        body {
            background-color:#e3e6dc;
        }
        .form-control.is-invalid, .was-validated .form-control:invalid {
            margin-bottom: 0rem;
            
        }
        .form-control.is-valid, .was-validated .form-control:valid {
            margin-bottom: 0rem;
        }
        </style>
    </head>
    <body>
    <?php 
        session_start();
        include('connect.php');
        // print_r($_POST);
        if(isset($_POST['confirm'])){

            // $orderNo = 0;
            $full_name = $_POST["full_name"];
            $license = $_POST["license"];
            $roomRecive = $_POST["roomRecive"];
            $delivery_Platform = $_POST["delivery_Platform"];

            $sql = "INSERT INTO detailrider (full_name, license, roomRecive, delivery_Platform, statusD) 
                    VALUES (:full_name, :license, :roomRecive , :delivery_Platform ,:statusD)";
            $stmt = $conn -> prepare($sql);
            $params = array(
                'full_name' => $full_name,
                'license' => $license,
                'roomRecive' => $roomRecive,
                'delivery_Platform' => $delivery_Platform,
                'statusD' => 0
            );
            $stmt->execute($params);
            $_SESSION['msg'] = "Thank you! for use Rider is coming";
            header("Location:OrderForm.php");
        }
    ?>
        <div class="container justify-content-center">
            <div class="row">
                    <div class="col mt-2" align="center">
                        
                            <div class="card" style="width: 40rem;">
                                <div class="card-title">
                                    <h3>คนขับกำลังมาหา กรุณารอสักครู่</h3>
                                </div>
                                <div class="card-body">
                                <form action="OrderProcess.php" class="needs-validation" method="POST" novalidate>

                                    <div class="row m-4">
                                        
                                        <div class="form-outline">
                                            <input  type="text" 
                                                    name="full_name" class="form-control" 
                                                    value="<?php echo $_POST["full_name"]; ?>" 
                                                    id="formControlReadonly"
                                                    readonly></input>
                                            <label for="validation01" class="form-label">ชื่อ-สกุล</label>
                                            <!-- <div class="invalid-feedback">กรุณากรอกชื่อ-สกุล</div> -->
                                        </div>
                                    </div>

                                    <div class="row m-4">
                                        <div class="form-outline">
                                            <input  type="text" name="license" class="form-control" id="form02" 
                                                    value="<?php echo $_POST["license"]; ?>" readonly></input>
                                            <label for="validation02" class="form-label">ป้ายทะเบียนรถ</label>
                                            <!-- <div class="invalid-feedback">กรุณากรอกป้ายทะเบียนรถ</div> -->
                                        </div>
                                    </div>
                                    <div class="row m-4">
                                        <div class="form-outline">
                                            <input  type="text" name="roomRecive" class="form-control" id="form03" 
                                                    value="<?php echo $_POST["roomRecive"]; ?>" readonly></input>
                                            <label for="validation03" class="form-label">ห้องที่มาส่ง</label>
                                            <!-- <div class="invalid-feedback">กรุณากรอกห้องที่มาส่ง</div> -->
                                        </div>
                                    </div>
                                    <div class="row m-4">
                                        <div class="form-outline">
                                            <input  type="text" name="delivery_Platform" class="form-control" 
                                                    value="<?php echo $_POST["delivery_Platform"]; ?>" readonly></input>
                                            <label for="validation04" class="form-label">บริการที่มาส่ง</label>
                                            <!-- <div class="invalid-feedback">กรุณากรอกบริการที่มาส่ง</div> -->
                                        </div>
                                    </div>
                                    <div class="footer"><br>
                                        <button class="btn btn-success" name="confirm">ยืนยันการส่ง</button>
                                        <a href="OrderForm.php" class="btn btn-danger">ยกเลิกการส่ง</a>
                                    </div>
                                    </form>
                                           
                                </div> 
                            </div>
                        
                    </div>
                </div>
        </div>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    </body>
</html>
