<!DOCTYPE html>
<html lang="ar">
<?php
include('conn.php');
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مسجد السلام</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js">
</script>
</head>
<body dir='rtl'>
    
<div class="container text-center">
    <br><form action="" method="POST">
     <h1 class="">الدورة الصيفية القرآنية</h1>
     <br>
     <img src="salam.png" class="imgr" alt="" height="200" width="250">
     <div class="text-center">
        <table class='table table-bordered' id="table_id">
            <thead>
            <tr>
                <th>الاسم</th>
                <th>الحضور</th>
                <th>السلوك</th>
                <th>الحفظ</th>
             
                <th>ملاحظة</th>
                <th>التاريخ</th>
            </tr>
            </thead>
           <tbody>
            <?php
                    $sql="select * from child,present where childid=id";
                    $res= mysqli_query($link, $sql);
                   
                    while($row = mysqli_fetch_array($res)){
        
                       /* $sql1="select * from coach where id=".$row[7]."";
                         $res1= mysqli_query($link, $sql1);
                         $row1 = mysqli_fetch_array($res1);*/

                         if ($row['ispresent']==1) {
                             $pres='حاضر';
                         }
                         else $pres='غائب';
                    echo "<tr><td>".$row['name']."</td><td>".$pres." </td>
                    <td>".$row['behavior']."</td><td>".$row['grade']." </td>
                    <td>".$row['note']." </td><td>".$row['date']." </td>
                   </tr>";                    }
            ?>
            </tbody>
        </table>
     </div>
     </div>
     <script>
         $(document).ready( function () {
    $('#table_id').DataTable();
        } );
     </script>
</body>
</html>