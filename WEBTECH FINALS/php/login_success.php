<?php
if(!isset($_POST['user_id']) || !isset($_POST['user_pw'])) exit;
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

$user_id = $_POST['user_id'];
$user_pw = $_POST['user_pw'];

$stmt = "SELECT * FROM useracc where UserID='$user_id'";
$result = $conn->query($stmt);

//if the member ID is not in the array
if($result->num_rows<1) {
    echo "<script>alert('wrong ID');history.back();</script>";
    exit;
}
$row = $result->fetch_array(MYSQLI_ASSOC);
//if the password assigned to is wrong
if(!($row['UserPassword']==$user_pw)) {
    echo "<script>alert('wrong password');history.back();</script>";
    exit;
}
$stmt2 = "SELECT LastName FROM person where PersonCode=$row[Person]";
//alright, go ahead
session_start();
$_SESSION['user_id'] = $user_id;
$_SESSION['user_name'] = $conn->query($stmt2);
?>

<meta http-equiv='refresh' content='0;url=main.php'>