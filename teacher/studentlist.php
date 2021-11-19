<small>Disclaimer: This site is my own and will only be use as my project for my IPT2 class.</small>
<?php 
  include('../functions.php'); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

    <meta username="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>STUDENT LIST</title>
</head>
<body>
  <?php
    require_once "tprocess.php";
  ?>
  <?php
    $result=$con->query("SELECT * FROM users WHERE user_type LIKE '%student'")or die($con->error);
  ?>
  <?php
    if(isset($_POST['search'])){
            $search = $_POST['search'];
            if (empty($search)) { 
              $result=$con->query("SELECT * FROM users WHERE user_type LIKE '%student'")or die($con->error);
            }else{
            $result=$con->query("SELECT * FROM users WHERE username LIKE '%$search%' AND user_type LIKE '%student' OR section LIKE '%$search%' AND user_type LIKE '%student'") or die ($con->error());
          }
        }
  ?>
  <!-- Search -->
  <nav class="navbar navbar-dark bg-light">
    <h3><a href="teacher.php"><i class="fa fa-home">&nbsp;&nbsp;</i>STUDENT LIST</a></h3>
    <form action="studentlist.php" method="post">
          <div class="form-group">
            <input type="text" placeholder="Search" name="search" value="<?php echo $search; ?>">
            <button type="submit"><i class="fa fa-search"></i></button><br>
          </div>
    </form>
  </nav><br>
  <!-- End Search -->
    <!-- SESSION -->
    <div class="d-flex justify-content-center">
    <?php
    if(isset($_SESSION['message'])){?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
      <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      ?>
    </div>
    <?php } ?>
    </div>
  </div><br>
    <!-- End of SESSION -->
    <div class="container">
    <div class="row justify-content-center">
    <div class="row justify-center">
  <!-- TABLE -->
  <table class="table">
    <thread>
      <tr>
        <th>Username</th>
        <th>Section</th>
      </tr>
    </thread>
      <?php
        if($result->num_rows>0){  
              while($row=$result->fetch_assoc()){?>
    <tr>
      <?php $rowcount=$rowcount+1; ?>
        <td><?php echo $row['username'];?></td>
        <td><?php echo $row['section'];?></td>
      </tr>
        <?php } ?>
        <?php }else{ ?>
            <h1>SORRY NO RESULT!</h1>
        <?php } ?>
  </table>
  </div>
  </div>
  </div>
<!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.3/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>