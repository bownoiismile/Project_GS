<?php
$search="";
$rowcount=0;
$con=new mysqli('localhost','root','','multi_login') or die (mysqli_error($mysqli));

$username=$_SESSION['user']['username'];
$result=$con->query("SELECT total FROM records WHERE username LIKE '%$username%'")or die($con->error);
$totalgrade=0;
$multiplier=1;
	while($row = $result->fetch_assoc()){
    	$totalgrade = $totalgrade + $row['total'];
    	$gwa=$totalgrade/$multiplier;
    	$multiplier=$multiplier+1;
    }

?>