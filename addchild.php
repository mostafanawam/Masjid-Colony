<!DOCTYPE html>
<?php
include('conn.php');
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
<body dir='rtl'>
    <?php
    if(isset($_POST['btnsave'])){
        
        $name=$_POST['name'];
        $age=$_POST['age'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        $grade=$_POST['grade'];
        $school=$_POST['school'];
        $coach=$_POST['coach'];
        
        /*$sql="insert into coach(name)values(
         '$coach')";
         mysqli_query($link, $sql);*/

       $sql="insert into child(name,age,address,phone,grade,school)values(
                '$name', $age, '$address', '$phone','$grade','$school')";
          mysqli_query($link, $sql);
          $id = mysqli_insert_id($link);
          if(mysqli_affected_rows($link) > 0){
            $sql="insert into enroll(coachid,childid)values($coach, $id)";
            mysqli_query($link, $sql);
            echo "<script>alert('تمت اضافة الاسم بنجاح شكرا لك');  </script>";
          }
       

    }
    ?>
<div class="container text-center">
    <br><form action="" method="POST">
     <h1 class="">الدورة الصيفية القرآنية</h1>
     <br>
     <img src="salam.png" class="imgr" alt="" height="200" width="250">
     <div class="row justify-content-center">
        
     <div class="form-group col-lg-12">
        <input type="text" name="name" id="" class='form-control' placeholder="الاسم">
     </div>

     <div class="form-group col-lg-12">
        <input type="number" name="age" id="" class='form-control' placeholder="العمر">
     </div>

     <div class="form-group col-lg-12">
        <input type="text" name="address" id="" class='form-control' placeholder="العنوان">
     </div>
     
     <div class="form-group col-lg-12">
        <input type="tel" name="phone" id="" class='form-control' placeholder="الهاتف">
     </div>

     <div class="form-group col-lg-12">
        <input type="text" name="grade" id="" class='form-control' placeholder="الصف">
     </div>

     <div class="form-group col-lg-12">
        <input type="text" name="school" id="" class='form-control' placeholder="المدرسة">
     </div>
     <div class="form-group col-lg-12">
        <select name="coach" id="" class='custom-select' >
        <option value="" disabled selected>العريف المسؤول</option>
        
        <?php
         $sql="select * from coach";
        $res=   mysqli_query($link, $sql);
        while($row = mysqli_fetch_array($res)){
        echo "<option value=".$row[0].">".$row[1]."</option>";
        }
        ?>
      
        </select>
     </div>

     
    
     </div>
     <div class="text-center">
     <input type="submit" class="btn btn-primary btn-block" value="حفظ" name="btnsave">
     </div>
     </form>
    </div>
</body>
</html>