<?php
$username=$email=$user_type=$password=$search=$section=$subject="";
$id=$rowcount=0;
$update=false;
$con=new mysqli('localhost','root','','multi_login') or die (mysqli_error($mysqli));
/*if($con->connect_error){
	echo "<p>Connection Failed</p>".$con->connect_error;
}else{
	echo "<p>Connected Successfully!</p>";
}*/

//Delete records
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
	$con->query("DELETE FROM users WHERE id=$id") or die ($con->error());

	$_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: adminindex.php");
}

//Edit
if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update=true;
	$result=$con->query("SELECT * FROM users WHERE id=$id") or die ($con->error());
	$row=$result->fetch_array();
	$username=$row['username'];
	$email=$row['email'];
	$user_type=$row['user_type'];
	$password=$row['password'];
	$section=$row['section'];
	$subject=$row['subject'];
}

//Update
if(isset($_POST['update'])){
	$id = $_POST['id'];
	$username=$_POST['username'];
	$email=$_POST['email'];
	$user_type=$_POST['user_type'];
	$password=$_POST['password'];
	$password = md5($password);
	$section=$_POST['section'];
	$subject=$_POST['subject'];
	$con->query("UPDATE users SET username='$username', email='$email', user_type='$user_type', password='$password', subject='$subject', section='$section' WHERE id=$id") or die ($con->error());

	$_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header("location: adminindex.php");

}

?>