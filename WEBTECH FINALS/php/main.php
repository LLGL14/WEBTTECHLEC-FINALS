<!DOCTYPE html>
<meta charset="utf-8" />
<?php
session_start();
if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
    echo "<meta http-equiv='refresh' content='0;url=login.php'>";
    exit;
}
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
echo "<p>hello. $user_name($user_id).</p>";
echo "<p><a href='logout.php'>logout</a></p>";
?>