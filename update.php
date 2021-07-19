<!DOCTYPE html>
<?php
include('conn.php');
$id=$_GET['id'];
$sql="select * from child where id=$id";
$res=   mysqli_query($link, $sql);
$row = mysqli_fetch_array($res);

$name=$row['name'];
$age=$row['age'];
$address=$row['address'];
$phone=$row['phone'];
$grade=$row['grade'];
$school=$row['school'];


if (isset($_POST['btnsave'])) {
    $name=$_POST['name'];
    $age=$_POST['age'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $grade=$_POST['grade'];
    $school=$_POST['school'];
    $sql="update child set name='".$name."' ,age=".$age." ,address='".$address."' ,phone='".$phone."' ,grade='".$grade."',school='".$school."' where id=$id";
    $res=mysqli_query($link, $sql);
    if ($res) {
        echo "تم تعديل المعلومات";
    }else{
        echo "لم تم تعديل المعلومات";
    }
}
?>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مسجد السلام</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body dir="rtl">
    <form method="POST">
    <div class="container text-center">
    <br>
     <h1 class="">الدورة الصيفية القرآنية</h1>
     <br>
     <img src="salam.png" class="imgr" alt="" height="200" width="250">
     <div class="row justify-content-center">
     <div class="form-group col-lg-12">
         <label for="" class='float-right'>الاسم:</label>
        <input type="text" name="name" id="" class='form-control' value="<?php echo"$name"; ?>">
     </div>

     <div class="form-group col-lg-12">
     <label for="" class='float-right'>العمر:</label>
        <input type="number" name="age" id="" class='form-control'  value="<?php echo"$age"; ?>">
     </div>

     <div class="form-group col-lg-12">
     <label for="" class='float-right'>العنوان:</label>
        <input type="text" name="address"  class='form-control'  value="<?php echo"$address"; ?>">
     </div>
     
     <div class="form-group col-lg-12">
     <label for="" class='float-right'>الهاتف:</label>
        <input type="tel" name="phone" class='form-control'  value="<?php echo"$phone"; ?>">
     </div>

     <div class="form-group col-lg-12">
     <label for="" class='float-right'>الصف:</label>
        <input type="text" name="grade"  class='form-control'  value="<?php echo"$grade"; ?>">
     </div>

     <div class="form-group col-lg-12">
     <label for="" class='float-right'>المدرسة:</label>
        <input type="text" name="school"  class='form-control'  value="<?php echo"$school"; ?>">
     </div>
     <div class="form-group col-lg-12">
        <input type="submit" class="btn btn-primary btn-block" name="btnsave" value="حفظ">
     </div>
    
     </div>
    </div>
    </form>
</body>
</html>