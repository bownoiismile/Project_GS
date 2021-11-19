<small>Disclaimer: This site is my own and will only be use as my project for my IPT2 class.</small>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

    <meta username="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>School Users List</title>
</head>
<body>
  <?php
    require_once "process.php";
  ?>
  <?php
    $result=$con->query("SELECT * FROM users")or die($con->error);
  ?>
  <?php
    if(isset($_POST['search'])){
            $search = $_POST['search'];
            $result=$con->query("SELECT * FROM users WHERE username LIKE '%$search%' OR email LIKE '%$search%' OR user_type LIKE '%$search%' OR subject LIKE '%$subject%' OR section LIKE '%$section%'") or die ($con->error());
        }
  ?>
  <!-- Search -->
  <nav class="navbar navbar-dark bg-light">
    <h3><a href="home.php"><i class="fa fa-home">&nbsp;&nbsp;</i>USER LIST</a></h3>
    <form action="adminindex.php" method="post">
          <div class="form-group">
            <input type="text" placeholder="Search" name="search" value="<?php echo $search; ?>">
            <button type="submit"><i class="fa fa-search"></i></button><br>
          </div>
    </form>
  </nav><br>
  <!-- End Search -->
  <!-- Input -->
  <div class="row justify-content-center">
  <form action="process.php" method="post">
    <?php if($update==true){?>
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <label>Username: </label>&nbsp;&nbsp;&nbsp;<input type="text" name="username" required value="<?php echo $username; ?>"><br>
      <label>Email: </label>&nbsp;&nbsp;&nbsp;<input type="email" name="email" required value="<?php echo $email; ?>"><br>
      <label>User Type: </label>&nbsp;&nbsp;&nbsp;<select name="user_type" required>
        <option value="<?php echo $user_type; ?>"><?php echo $user_type; ?></option>
        <option value="admin">Admin</option>
        <option value="teacher">Teacher</option>
        <option value="student">Student</option>
      </select><br>
      <label>Subject: </label>&nbsp;&nbsp;&nbsp;<select name="subject">
        <option value="<?php echo $subject; ?>"><?php echo $subject; ?></option>
        <option value="Math">Math</option>
        <option value="Science">Science</option>
        <option value="English">English</option>
        <option value="Filipino">Filipino</option>
        <option value="Social Studies">Social Studies</option>
        <option value="MAPEH">MAPEH</option>
      </select><br>
      <label>Section: </label>&nbsp;&nbsp;&nbsp;<select name="section">
        <option value="<?php echo $section; ?>"><?php echo $section; ?></option>
        <option value="Grade 1">Grade 1</option>
        <option value="Grade 2">Grade 2</option>
        <option value="Grade 3">Grade 3</option>
        <option value="Grade 4">Grade 4</option>
        <option value="Grade 5">Grade 5</option>
        <option value="Grade 6">Grade 6</option>
      </select><br>
      <label>Password: </label>&nbsp;&nbsp;&nbsp;<input type="password" name="password" required><br>
      <button type="submit" name="update" class="btn btn-warning">Update</button>
    <?php } ?>
      </div>
  </form><br>
  </div>
  <!-- End of Input -->
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
  <!-- TABLE -->
  <table class="table">
    <thread>
      <tr>
        <th>Username</th>
        <th>Email</th>
        <th>User Type</th>
        <th>Password</th>
        <th>Subject</th>
        <th>Section</th>
        <th colspan="6">Actions</th>
      </tr>
    </thread>
      <?php
        if($result->num_rows>0){  
              while($row=$result->fetch_assoc()){?>
    <tr>
      <?php $rowcount=$rowcount+1; ?>
        <td><?php echo $row['username'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['user_type'];?></td>
        <td><?php echo $row['password'];?></td>
        <td><?php echo $row['subject'];?></td>
        <td><?php echo $row['section'];?></td>
        <td>
                <a href="adminindex.php?edit=<?php echo $row['id'];?>" class="btn btn-primary">Edit</a>
                <a href="process.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
            </td>
      </tr>
        <?php } ?>
        <?php }else{ ?>
            <h1>SORRY NO RESULT!</h1>
        <?php } ?>
  </table>
<!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.3/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>