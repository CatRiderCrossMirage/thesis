<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--  <link rel="stylesheet" href="styles.css"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css2?family=Mali:wght@500&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Order Here</title>
</head>
<body>
    <div class="row">
        <div class="col">
            <div class="card" style="width: 25rem;">
                <div class="card-title">
                    <h3><center>กรอกรายระเอียดของคนขับ</h3>
                </div>
                <div class="card-body">
                    <form action="OrderFormProcess.php" medthod="POST">
                        <div class="form-group">
                            ชื่อ-สกุล ::
                            <input type="text" name="full_name" placeholder="นายขับดี แต่ไว"></input>
                        </div>
                        <div class="form-group">
                            ป้ายทะเบียนรถ ::
                            <input type="text" name="license" placeholder="กก 7777"></input>
                        </div>
                        <div class="form-group">
                            ห้องที่มาส่ง ::
                            <input type="text" name="roomRecive" placeholder="ตึก1 ห้อง333"></input>
                        </div>
                        <div class="form-group">
                            บริการที่มาส่ง ::
                            <input type="text" name="delivery_Platform" placeholder="Grab, Food Panda, etc"></input>
                        </div>
                        <div class="footer" >  
                            <input type="submit" name="save" value="ส่งข้อมูล"></input>
                            <input type="reset" name="reset" value="ล้างค่า"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>