<?php
ob_start();
include_once("include/header.php");

if (isset($_GET["action"]) && $_GET["action"]== false &&
    isset($_GET["name"]) && $_GET["family"] &&
    isset($_GET["tell"]) && $_GET["newpass"] &&
    isset($_GET["email"])) {
}else {
    $link = mysqli_connect("localhost", "root", "", "web");
if (mysqli_connect_errno())
    exit("خطایی با شرح زیر رخ داده است :" . mysqli_connect_error());
$name = $_GET['name'];
$family = $_GET['family'];
$tell = $_GET['tell'];
$pass = $_GET['newpass'];
$email = $_GET['email'];
$query ="UPDATE user SET name = '$name', family = '$family', tell = '$tell', password = '$pass' WHERE user.email = '$email'";

if (mysqli_query($link, $query)) {
    $_SESSION['name'] = $name;
    $_SESSION['family'] = $family;
    $_SESSION['tell'] = $tell;
    $_SESSION['email'] = $email;
    header("location:profile.php?edit=true");
}else {
    header("edit.php?edit=false");
}
}
?>

<br>