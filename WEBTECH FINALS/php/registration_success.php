<?php
//echo"<script>alert('under development :P'); history.back();</script>";
if(!isset($_POST['Person_FirstName']) || !isset($_POST['Person_LastName'])
    || !isset($_POST['Useracc_UserID']) || !isset($_POST['Useracc_UserPassWordA'])
    || !isset($_POST['Useracc_UserPassWordB'])) {
    echo"<script>alert('Something Is Missing, FIll up all the blanks'); history.back();</script>";
    exit;
}
if(!($_POST['Useracc_UserPassWordA']==$_POST['Useracc_UserPassWordB'])) {
    echo "<script>alert('Passwords are not matched');history.back();</script>";
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$bdname = "userbase";

//create connection
$conn = new mysqli($servername,$username,$password,$bdname) or die(mysqli_error());

/*
if ($conn->connect_error){
    die("Connection failed" . $conn->connect_error);
    exit;
}
*/

$FirstName = $_POST['Person_FirstName'];
$LastName = $_POST['Person_LastName'];

$stmt = "SELECT MAX(PersonCode)FROM person";
$PerCode = $conn->query($stmt)+1;
$stmt = "INSERT INTO person(PersonCode,FirstName,LastName) Values('PerCode','FirstName','LastName')";
$conn->query($stmt);

$

$stmt = "SELECT  FROM person";
$result = $conn->query($stmt) or die(mysqli_error());

$row = $result->fetch_array(MYSQLI_ASSOC);
//if the password assigned to is wrong

$stmt2 = "SELECT LastName FROM person where PersonCode=$row[Person]";
//alright, go ahead
session_start();
$_SESSION['user_id'] = $user_id;
$_SESSION['user_name'] = $conn->query($stmt2);
?>

<meta http-equiv='refresh' content='0;url=main.php'>