<small>Disclaimer: This site is my own and will only be use as my project for my IPT2 class.</small>
<?php include('functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

    <meta username="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>MY GRADES</title>
</head>
<body>
  <?php
    require_once "sprocess.php";
  ?>
  <?php
    $username=$_SESSION['user']['username'];
    $result=$con->query("SELECT * FROM records WHERE username LIKE '%$username%'")or die($con->error);
    /*$result=$con->query("SELECT * FROM records")or die($con->error);*/
  ?>

  <!-- Search -->
  <nav class="navbar navbar-dark bg-light">
    <h3><a href="index.php"><i class="fa fa-home">&nbsp;&nbsp;</i>MY GRADES</a></h3>
  </nav><br>
  <!-- End Search -->
  <!-- TABLE -->
  <div class="container">
  <div class="row justify-center">
  <table class="table">
    <thread>
      <tr>
        <th>Subject</th>
        <th>Grades</th>
        <th>Remarks</th>
      </tr>
    </thread>
      <?php
        if($result->num_rows>0){  
              while($row=$result->fetch_assoc()){?>
    <tr>
      <?php $rowcount=$rowcount+1; ?>
        <td><?php echo $row['subject'];?></td>
        <td><?php echo $row['total'];?></td>
        <td><?php echo $row['remarks'];?></td>
      </tr>
        <?php } ?>
        <?php }else{ ?>
            <h1>SORRY NO RESULT!</h1>
        <?php } ?>
  </table>
  </div>
  <?php 
  $descriptor="";
    if($gwa>=90&&$gwa<=100){
      $descriptor="Outstanding!";
    }elseif ($gwa>=85&&$gwa<=89) {
      $descriptor="Very Satisfactory!";
    }elseif ($gwa>=80&&$gwa<=84) {
      $descriptor="Satisfactory.";
    }elseif ($gwa>=75&&$gwa<=79) {
      $descriptor="Fairly Satisfactory.";
    }else{
      $descriptor="Did not meet expectations.";
    }
  ?>
  <h4>General Average : <?php echo round($gwa);?>%</h4><br>
  <?php if($gwa>=75){ ?>
    <h5 style="color: blue">Descriptor : <?php echo $descriptor;?></h5>
  <?php }else{ ?>
    <h5 style="color: red">Descriptor : <?php echo $descriptor;?></h5>
  <?php } ?>
</div>
<!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.3/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>