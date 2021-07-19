<!DOCTYPE html>
<?php
if ($_GET['id']==null) {
   header("location:index.php");
}
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
  <style>
     .custom-select{
   width:60px;   
   }
   .checkbox{
      height:50px; 
      width:30px;
   }
   .note{
      width:300px;
   }
  </style>
</head>
<script>
   function get(){
         var attend = [];
        var id=[]; 
        var beh=[];
         var grade=[];
         var note=[];
      $(".txt-id").each(function () {
      id.push($(this).val());//fill all ids in array
      });
      $(".ch-attend").each(function () {
            attend.push($(this).is(':checked'));
      });
      $(".behavior").each(function () {
         beh.push($(this).find('option:selected').val());
      });
      $(".grade").each(function () {
         grade.push($(this).find('option:selected').val());
      });
      $(".note").each(function () {
         note.push($(this).val());
      });
      for (let i = 0; i < attend.length; i++) {
        //alert(id[i]);
        //alert(attend[i]);
        //alert(beh[i]);
        //alert(grade[i]);
        //alert(note[i]);
        $.ajax ({
         url:"add.php",
         method:'post',
         data:{
            id: id[i],//set the selected value
            present:attend[i],
            beh:beh[i],
            grade:grade[i],
            note:note[i]
           
     },
     success:function(output){
      var out = JSON.parse(output);
      if(out['status'] == 'success'){
        /* document.getElementById('alert').style.visibility="visible";
        $(".alert").html('تمت المهمة بنجاح شكرا لك');*/
        if(i==attend.length-1){
         alert('تمت المهمة بنجاح شكرا لك'); 
        }
           
        }
     }
   });
         
      }


   }
</script>
<body dir="rtl">
<div class="container-fluid text-center">
    <br>
     <h1 class="">الدورة الصيفية القرآنية</h1>
     <br>
     <img src="salam.png" class="imgr" alt="" height="200" width="250">
     <div class="row">
     <div class="col-lg-6">
     <?php
       $sql="select * from coach where id=".$_GET['id']."";
       $res=   mysqli_query($link, $sql);
       $row = mysqli_fetch_array($res);
      
        echo "عريف الحلقة:".$row[1];
        ?>
     </div>
     <div class="col-lg-6">
     التاريخ:
     <?php
        echo date("Y-m-d");
        ?>
     </div>
     </div>
     <br>
     <div class='text-center alert alert-success' id="alert" style="visibility: hidden;"></div>
<div class="table-responsive">


     <table class="table table-bordered">
     <tr>
     <th>الاسم</th>
     <th>الحضور</th>
     <th>السلوك</th>
     <th>الحفظ</th>
     <th>ملاحظات</th>
     </tr>

     <?php
       $sql="select * from enroll,child where coachid=".$_GET['id']." and  child.id=childid";
       $res=mysqli_query($link, $sql);
       while($row = mysqli_fetch_assoc($res)){
         echo " <tr>
         <input type='hidden'  value='".$row['id']."' class='txt-id'> 
         <td>".$row['name']."</td>
         <td> <input type='checkbox' class='checkbox ch-attend' name='present'></td>
         <td><select name='grade' class='custom-select behavior'>
         <option value='1'>1</option>
         <option value='2'>2</option>
         <option value='3'>3</option>
         <option value='4'>4</option>
         <option value='5'>5</option>
         <option value='6'>6</option>
         <option value='7'>7</option>
         <option value='8'>8</option>
         <option value='9'>9</option>
         <option value='10' selected>10</option>
      </select></td>
         <td>
         <select name='grade' class='custom-select grade'>
         <option value='1'>1</option>
         <option value='2'>2</option>
         <option value='3'>3</option>
         <option value='4'>4</option>
         <option value='5'>5</option>
         <option value='6'>6</option>
         <option value='7'>7</option>
         <option value='8'>8</option>
         <option value='9'>9</option>
         <option value='10' selected>10</option>
      </select></td>
         <td> <input type='text' name='note' class='form-control note' placeholder='ملاحظات' > </td>
         </tr>
         ";
         }
      
        ?>
     </table>
     </div>
     <div class="text-center">
     <input type="button" class='btn btn-primary btn-block' value="حفظ" onclick="get()">
     </div>
    </div>
</body>
</html>