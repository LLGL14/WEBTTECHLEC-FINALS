<?php
if(!isset($_POST['user_id']) || !isset($_POST['user_pw'])) exit;
#this part should be imported from the database
$user_id = $_POST['user_id'];
$user_pw = $_POST['user_pw'];
$members = array('user1'=>array('pw'=>'pw1', 'name'=>'guy'),
    'user2'=>array('pw'=>'pw2', 'name'=>'dude'),
    'user3'=>array('pw'=>'pw3', 'name'=>'booy'));

if(!isset($members[$user_id])) {
    echo "<script>alert('wrong ID');history.back();</script>";
    exit;
}
if($members[$user_id]['pw'] != $user_pw) {
    echo "<script>alert('wrong password');history.back();</script>";
    exit;
}
session_start();
$_SESSION['user_id'] = $user_id;
$_SESSION['user_name'] = $members[$user_id]['name'];
?>
<meta http-equiv='refresh' content='0;url=main.php'>