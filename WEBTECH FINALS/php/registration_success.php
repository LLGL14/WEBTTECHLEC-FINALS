<?php
//echo"<script>alert('under development :P'); history.back();</script>";
if(!isset($_POST['Person_FirstName']) || !isset($_POST['Person_LastName'])
    || !isset($_POST['Useracc_UserID']) || !isset($_POST['Useracc_PasswordA'])
    || !isset($_POST['Useracc_PasswordB']) || !isset($_POST['Useracc_email'])) {
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
if ($conn->connect_error){
    die("Connection failed" . $conn->connect_error);
    exit;
}
$estmt = "Select * from useracc where UserMail = '$_POST[Useracc_email]'";
if ((mysqli_query($conn,$estmt)->num_rows)>0){
    echo "<script>alert('email is already used')</script>";$conn->close();
    echo "<script>history.back();</script>";
    exit;
}


$FirstName = $_POST['Person_FirstName'];
$LastName = $_POST['Person_LastName'];

$stmt1 = "SELECT MAX(PersonCode)FROM person";
$PerCode_result = mysqli_query($conn,$stmt1);

$PerCode_row = $PerCode_result->fetch_row();
$PerCode = (int)$PerCode_row[0]+1;

$stmt2 = "INSERT INTO person (PersonCode ,FirstName ,LastName) Values('$PerCode','$FirstName','$LastName')";


$ID = $_POST['Useracc_UserID']; $PW = $_POST['Useracc_PasswordA']; $mail = $_POST[Useracc_email];
$stmt3 = "SELECT MAX(UserCode) FROM useracc";
$UserCode_result = mysqli_query($conn,$stmt3);
$UserCode_row = $UserCode_result->fetch_row();
$UserCode = (int)$UserCode_row[0]+1;

$stmt4 = "INSERT INTO useracc VALUES ('$PerCode' ,'$ID' ,'$PW' ,'$UserCode','$mail')";
mysqli_query($conn,$stmt2) or die('fail to add personal info');
mysqli_query($conn,$stmt4) or die('person info is added , fail to add Useracc');
$conn->close();
?>

<meta http-equiv='refresh' content='0;url=main.php'>