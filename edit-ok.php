<?php
ob_start();
include_once("include/header.php");

if (
    isset($_POST["name"]) && !empty($_POST["name"]) &&
    isset($_POST["family"]) && !empty($_POST["family"]) &&
    isset($_POST["tell"]) && !empty($_POST["tell"]) &&
    isset($_POST["email"]) && !empty($_POST["email"]) &&
    isset($_POST["pass"]) && !empty($_POST["pass"]) &&
    isset($_POST["newpass"]) && !empty($_POST["newpass"])
) {
    $name = $_POST["name"];
    $family = $_POST["family"];
    $tell = $_POST["tell"];
    $email = $_SESSION["email"];
    $pass = $_POST["pass"];
    $newpass = $_POST["newpass"];
} else {
    header("location:edit.php?error=fild");
}
$link = mysqli_connect("localhost", "root", "", "web");
if (mysqli_connect_errno())
    exit("خطایی با شرح زیر رخ داده است :" . mysqli_connect_error());

$query = "SELECT * FROM user WHERE email ='$email'";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);

if (!($row['password'] == $pass)) {
    header("location:edit.php?pass=false");
}
if($newpass === $pass) {
    header("location:edit.php?pass=true");  
}

header("location:edit-ok-2.php?action=true&name=$name&newpass=$newpass&family=$family&tell=$tell&email=$email");


include("include/footer.php");
?>