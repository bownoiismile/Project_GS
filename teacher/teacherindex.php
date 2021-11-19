<small>Disclaimer: This site is my own and will only be use as my project for my IPT2 class.</small>
<?php include('../functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

    <meta username="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>GRADE BOOK</title>
</head>
<body>
  <?php
    require_once "tprocess.php";
  ?>
  <?php
    $subject=$_SESSION['user']['subject'];
    $result=$con->query("SELECT * FROM records WHERE user_type LIKE '%student' AND subject LIKE '%$subject'")or die($con->error);
    /*$result=$con->query("SELECT * FROM records")or die($con->error);*/
  ?>
  <?php
    $subject=$_SESSION['user']['subject'];
    if(isset($_POST['search'])){
            $search = $_POST['search'];
            if (empty($search)) { 
              $result=$con->query("SELECT * FROM records WHERE user_type LIKE '%student' AND subject LIKE '%$subject'")or die($con->error);
            }else{
              $result=$con->query("SELECT * FROM records WHERE username LIKE '%$search%' AND subject LIKE '%$subject' OR section LIKE '%$search%' AND subject LIKE '%$subject' OR prelim LIKE '%$search%' AND subject LIKE '%$subject' OR midterm LIKE '%$search%' AND subject LIKE '%$subject' OR final LIKE '%$search%' AND subject LIKE '%$subject' OR total LIKE '%$search%' AND subject LIKE '%$subject' OR remarks LIKE '%$search%' AND subject LIKE '%$subject'") or die ($con->error());
            }
        }
  ?>
  <!-- Search -->
  <nav class="navbar navbar-dark bg-light">
    <h3><a href="teacher.php"><i class="fa fa-home">&nbsp;&nbsp;</i>GRADE BOOK</a></h3>
    <form action="teacherindex.php" method="post">
          <div class="form-group">
            <input type="text" placeholder="Search" name="search" value="<?php echo $search; ?>">
            <button type="submit"><i class="fa fa-search"></i></button><br>
          </div>
    </form>
  </nav><br>
  <!-- End Search -->



  <!-- Input -->
    <div class="row">
      <div class="col-md-3">
        <h2 class="text-center">Add Record</h2>
        <hr>


  <form action="tprocess.php" method="post">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <input type="hidden" name="user_type" id="user_type" value="student">
      <label>Username: </label>&nbsp;&nbsp;&nbsp;<input type="text" name="username" required value="<?php echo $username; ?>"><br>
      <label>Section: </label>&nbsp;&nbsp;&nbsp;<select name="section" id="section" >
          <option value="<?php echo $section; ?>"><?php echo $section; ?></option>
          <option value="Grade 1">Grade 1</option>
          <option value="Grade 2">Grade 2</option>
          <option value="Grade 3">Grade 3</option>
          <option value="Grade 4">Grade 4</option>
          <option value="Grade 5">Grade 5</option>
          <option value="Grade 6">Grade 6</option>
        </select><br>
      <label>Subject: </label>&nbsp;&nbsp;&nbsp;<input type="text" name="subject" value="<?php echo $_SESSION['user']['subject'];?>" readonly><br>
      <label>Prelims: </label>&nbsp;&nbsp;&nbsp;<input type="number" name="prelim" required value="<?php echo $prelim; ?>" min="60" max="100"><br>
      <label>Midterms: </label>&nbsp;&nbsp;&nbsp;<input type="number" name="midterm" required value="<?php echo $midterm; ?>"min="60" max="100"><br>
      <label>Finals: </label>&nbsp;&nbsp;&nbsp;<input type="number" name="final" required value="<?php echo $final; ?>"min="60" max="100"><br>
    <?php if($update==true){?>
            <button type="submit" name="update" class="btn btn-warning">Update</button>
        <?php }else{ ?>
            <button type="submit" name="save" class="btn btn-primary">Add</button>
        <?php } ?>

  </form><br>
  </div>
  <!-- End of Input -->
  <!-- TABLE -->
  <div class="col-md-9">
    <h2 class="text-center">CLASS RECORD</h2>
      <hr>
  <div class="row justify-content-center">
  <table class="table">
    <thread>
      <tr>
        <th>Username</th>
        <th>Section</th>
        <th>Subject</th>
        <th>Prelims</th>
        <th>Midterms</th>
        <th>Finals</th>
        <th>Total</th>
        <th>Remarks</th>
        <th colspan="9">Actions</th>
      </tr>
    </thread>
      <?php
        if($result->num_rows>0){  
              while($row=$result->fetch_assoc()){?>
    <tr>
      <?php $rowcount=$rowcount+1; ?>
        <td><?php echo $row['username'];?></td>
        <td><?php echo $row['section'];?></td>
        <td><?php echo $row['subject'];?></td>
        <td><?php echo $row['prelim'];?></td>
        <td><?php echo $row['midterm'];?></td>
        <td><?php echo $row['final'];?></td>
        <td><?php echo $row['total'];?></td>
        <td><?php echo $row['remarks'];?></td>
        <td>
                <a href="teacherindex.php?edit=<?php echo $row['id'];?>" class="btn btn-primary">Edit</a>
                <a href="tprocess.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
            </td>
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