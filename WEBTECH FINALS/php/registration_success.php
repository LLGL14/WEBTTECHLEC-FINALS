<?php
//echo"<script>alert('under development :P'); history.back();</script>";
if(!isset($_POST['Person_FirstName']) || !isset($_POST['Person_LastName'])
    || !isset($_POST['Useracc_UserID']) || !isset($_POST['Useracc_PasswordA'])
    || !isset($_POST['Useracc_PasswordB'])) {
    echo"<script>alert('Something Is Missing, FIll up all the blanks'); history.back();</script>";
    exit;
}
if(!($_POST['Useracc_PasswordA']==$_POST['Useracc_PasswordB'])) {
    echo "<script>alert('Passwords are not matched');history.back();</script>";
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$bdname = "userbase";

//create connection
$conn = new mysqli($servername,$username,$password,$bdname);

/*
if ($conn->connect_error){
    die("Connection failed" . $conn->connect_error);
    exit;
}
*/

$FirstName = $_POST['Person_FirstName'];
$LastName = $_POST['Person_LastName'];

$stmt = "SELECT MAX(PersonCode)FROM person";
$PerCode_result = mysqli_query($conn,$stmt);
$PerCode_row = $PerCode_result->fetch_row();
$PerCode = (int)$PerCode_row[0]+1;

$stmt = "INSERT INTO person (PersonCode ,FirstName ,LastName) Values('$PerCode','$FirstName','$LastName')";
mysqli_query($conn,$stmt);

$user_ID = $_POST['Useracc_UserID'];
$user_PassWord = $_POST['Useracc_PasswordA'];
$stmt = "SELECT MAX(UserCode)FROM useracc";
$UserCode_result = $conn->query($stmt);
$UserCode_row = $UserCode_result->fetch_row();
$UserCode = (int)$UserCode_row[0]+1;
$stmt = "INSERT INTO useracc (UserCode, UserID, UserPassword, Person, DateOfRegistration) VALUES ('$UserCode','$user_ID','$user_PassWord','$PerCode',NOW())";
mysqli_query($conn,$stmt);

if(mysqli_error()) echo " error happened";

?>

<meta http-equiv='refresh' content='0;url=main.php'>