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
	<title>Registration - Create user</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style>
		.header {
			background: #003366;
		}
		button[name=register_btn] {
			background: #003366;
		}
	</style>
</head>
<body>
	<div class="header">
		<h2><a href="home.php" style="color: white;">Admin - create user</a></h2>
	</div>
	
	<form method="post" action="create_user.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>

<!-- Email -->

		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>

<!-- User type -->

		<div class="input-group">
			<label>User type</label>
			<select name="user_type" id="user_type" >
				<option value=""></option>
				<option value="admin">Admin</option>
				<option value="teacher">Teacher</option>
				<option value="student">Student</option>
			</select>
		</div>

<!-- Subject -->

			<div class="input-group">
				<label>Subject</label>&nbsp;
				<select name="subject" id="subject" >
					<option value=""></option>
					<option value="Math">Math</option>
					<option value="Science">Science</option>
					<option value="English">English</option>
					<option value="Filipino">Filipino</option>
					<option value="Social Studies">Social Studies</option>
					<option value="MAPEH">MAPEH</option>
				</select>&nbsp;&nbsp;<small><p style="color:red;">(If Teacher)</p></small>
			</div>

 <!-- Section -->

    	<div class="input-group">
				<label>Section</label>&nbsp;
				<select name="section" id="section" >
					<option value=""></option>
					<option value="Grade 1">Grade 1</option>
					<option value="Grade 2">Grade 2</option>
					<option value="Grade 3">Grade 3</option>
					<option value="Grade 4">Grade 4</option>
					<option value="Grade 5">Grade 5</option>
					<option value="Grade 6">Grade 6</option>
				</select>&nbsp;&nbsp;<small><p style="color:red;">(If Student)</p></small>
		</div>

<!-- password -->
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
            	<button type="submit" class="btn" name="register_btn"> + Create user</button>
		</div>
	</form>
	<!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.3/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>