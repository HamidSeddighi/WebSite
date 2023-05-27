<?php
include("include/header.php");
$email = $_GET['email'];

if (
    isset($_POST["pass"]) && !empty($_POST["pass"]) &&
    isset($_POST["repass"]) && !empty($_POST["repass"]) &&
    $_POST['pass'] === $_POST["repass"]
) {
    $pass = $_POST["pass"];

} else {
    header("location:68srd87267587cfh6dx767653soeirfh6568t6987fy9876c9fu767y9ft786gh65686kygikuygk.php?e=$email&c=slksetosiuovyoiutmbimvoynf68t79817r96b7ut276mdt97e96r8t77nf9/f&error=true");
}

$link = mysqli_connect("localhost" , "root" , "" , "web");
if (mysqli_connect_errno()) 
exit("خطایی با شرح زیر رخ داده است :" . mysqli_connect_error());

$query= "UPDATE user SET password= '$pass' , Ch_pass = '0' WHERE user.email = '$email'";

if(mysqli_query($link , $query)=== true){
    header("location:login.php?message=true");
}else {
    echo"خطایی رخ داده است";
}
?>
