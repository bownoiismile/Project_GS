<?php
$username=$section=$subject=$prelim=$midterm=$final=$total=$PassFail=$user_type=$search="";
$id=$rowcount=0;
$update=false;
$con=new mysqli('localhost','root','','multi_login') or die (mysqli_error($mysqli));
/*if($con->connect_error){
	echo "<p>Connection Failed</p>".$con->connect_error;
}else{
	echo "<p>Connected Successfully!</p>";
}*/

//Saving records
if(isset($_POST['save'])){
	$username=$_POST['username'];
	$section=$_POST['section'];
	$subject=$_POST['subject'];
	$prelim=$_POST['prelim'];
	$midterm=$_POST['midterm'];
	$final=$_POST['final'];
	$user_type = $_POST['user_type'];

	$total=round((($prelim/100)*30)+(($midterm/100)*40)+(($final/100)*30));

        if($total<75){
            $remarks="Failed";
        }else{
            $remarks="Passed";
        }

	$con->query("INSERT INTO records(username,section,subject,prelim,midterm,final,total,user_type,remarks)VALUES('$username','$section','$subject','$prelim','$midterm','$final','$total','$user_type','$remarks')") or die ($con->error());

	$_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";
    header("location: teacherindex.php");

}

//Delete records
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
	$con->query("DELETE FROM records WHERE id=$id") or die ($con->error());

	$_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: teacherindex.php");
}

//Edit
if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update=true;
	$result=$con->query("SELECT * FROM records WHERE id=$id") or die ($con->error());
	$row=$result->fetch_array();
	$username=$row['username'];
	$section=$row['section'];
	$subject=$row['subject'];
	$prelim=$row['prelim'];
	$midterm=$row['midterm'];
	$final=$row['final'];
}

//Update
if(isset($_POST['update'])){
	$id = $_POST['id'];
	$username=$_POST['username'];
	$section=$_POST['section'];
	$subject=$_POST['subject'];
	$prelim=$_POST['prelim'];
	$midterm=$_POST['midterm'];
	$final=$_POST['final'];

	$total=round((($prelim/100)*30)+(($midterm/100)*40)+(($final/100)*30));

        if($total<75){
            $remarks="Failed";
        }else{
            $remarks="Passed";
        }

	$con->query("UPDATE records SET prelim='$prelim', midterm='$midterm', final='$final', total='$total', remarks='$remarks' WHERE id=$id") or die ($con->error());

	$_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header("location: teacherindex.php");

}

?>