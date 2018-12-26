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
$password = $_POST["pwd"];
//检查用户名是否重复
$sql = "select '1' from user where username='$username'";
$result = $conn->query($sql);
if($result->num_rows > 0){
    echo "<script>alert('username already signed'); window.location.href='SignUp.html';</script>";
}

//将用户注册信息放入数据库
$sql = "insert into user
values ('$username','$password')";
if($conn->query($sql) === TRUE){
    echo "<script>alert('Congratulations! You have successfully sign up!'); window.location.href='login.html';</script>";
}else{
    echo "<script>alert('error: $conn->error');</script>";
}

$conn->close();




