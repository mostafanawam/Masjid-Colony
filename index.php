<!DOCTYPE html>
<html lang="ar">
<head>
<?php
include('conn.php');
?>
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
    <div class="container text-center">
    <br>
     <h1 class="">الدورة الصيفية القرآنية</h1>
     <br>
     <img src="salam.png" class="imgr" alt="" height="200" width="250">
     <div class="row justify-content-center">
     <div class="col-lg-6">
       <?php 
      $sql="select * from coach";
        $res=   mysqli_query($link, $sql);
      while($row = mysqli_fetch_array($res)){
        echo "<a href='attendance.php?id=$row[0]' class='btn btn-success btn-block'>$row[1]</a>";
    }
       ?>
     
 
     </div>
    
     </div>
    </div>
</body>
</html>