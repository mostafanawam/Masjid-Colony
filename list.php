<!DOCTYPE html>
<?php
include('conn.php');
if (isset($_GET['delete'])) {

    $sql="delete from child where id=".$_GET['id']."";
            $res= mysqli_query($link, $sql);
                if ($res) {
                echo "Record deleted successfully";
                }
}
?>
<html lang="en">

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

    <br>
     <h1 class="">الدورة الصيفية القرآنية</h1>
     <br>
     <img src="salam.png" class="imgr" alt="" height="200" width="250">
     <div class='text-center'>
    <table class="table table-bordered" id="table_id">
    <thead>
        <tr>
            <th>الاسم</th>
            <th>العمر</th>
            <th>عنوان</th>
            <th>الهاتف</th>
            <th>الصف</th>
            <th>المدرسة</th>
            <th>العريف</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
            $sql="select * from child,enroll where childid=id";
            $res= mysqli_query($link, $sql);
           
            while($row = mysqli_fetch_array($res)){

                $sql1="select * from coach where id=".$row[7]."";
                 $res1= mysqli_query($link, $sql1);
                 $row1 = mysqli_fetch_array($res1);

            echo "<tr><td>".$row[1]."</td><td>".$row[2]." </td>
            <td>".$row[3]."</td><td>".$row[4]." </td>
            <td>".$row[5]." </td><td>".$row[6]." </td><td>".$row1[1]." </td>
            <td><a href='list.php?delete=del&&id=$row[0]' class='btn btn-danger'>Delete</a>
            <a href='update.php?id=$row[0]' class='btn btn-success'>Update</a>
            </td></tr>";
            }
            
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