<?php

$profile =$_POST['profile'];
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$mobile =$_POST['mobile'];
$address =$_POST['address'];

// Database Connection



$conn = new mysqli('localhost','root','','stu');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into form(profile, id, name, email, age, mobile, address)values(?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sissiis",$profile, $id, $name, $email, $age, $mobile, $address);
    $stmt->execute();
    echo "Student Details Stored Successfully..";
    $stmt->close();
    $conn->close();
}

?>