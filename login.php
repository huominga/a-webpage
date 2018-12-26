<?php
//mysql连接
$servername = "localhost";
$sql_username = "root";
$sql_password = "";
$dbname = "USERs";
$conn = new mysqli($servername, $sql_username, $sql_password, $dbname);
if ($conn->connect_error){
    die("connect error: ".$conn->connect_error);
}

$username = $_POST["username"];
$password = $_POST["password"];
$sql = "select '1' from user where username='$username'";
$result = $conn->query($sql);
if($result->num_rows == 0){
    echo "<script>alert('You have not signed up! Click to sign up NOW');window.location.href='SignUp.html';</script>";
}
$sql="select '1' from user where username='$username' and password='$password'";
$result = $conn->query($sql);
if($result->num_rows == 0){
    echo "<script>alert('wrong password');window.location.href='login.html';</script>";
}else{
    echo "<script>window.location.href='index.html';</script>";
}


$conn->close();