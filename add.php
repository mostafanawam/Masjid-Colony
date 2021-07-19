<?php
  if(isset($_POST['id'], $_POST['present'], $_POST['beh'], $_POST['grade'], $_POST['note'])){
    require_once("conn.php");
    $sql="insert into present(childid,ispresent,behavior,grade,note)
        values({$_POST['id']},{$_POST['present']},{$_POST['beh']},
              {$_POST['grade']},'{$_POST['note']}')";

              mysqli_query($link, $sql);
              $output = array();
              if(mysqli_affected_rows($link) > 0){
            $output['status'] = 'success';
              }
              echo json_encode($output);
  }
  else{
    die("Invalid Parameters");
  }
?>    