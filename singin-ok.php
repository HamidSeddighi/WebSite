<?php
include("include/header.php");

if (
    isset($_POST["name"]) && !empty($_POST["name"]) &&
    isset($_POST["family"]) && !empty($_POST["family"]) &&
    isset($_POST["tell"]) && !empty($_POST["tell"]) &&
    isset($_POST["email"]) && !empty($_POST["email"]) &&
    isset($_POST["pass"]) && !empty($_POST["pass"])
) {

    $name = $_POST["name"];
    $family = $_POST["family"];
    $tell = $_POST["tell"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
} else {
    exit("برخی فیلد ها مقدار دهی نشده اند");
}

if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    exit("ایمیل وارد شده اشتباه است");
}

$link = mysqli_connect("localhost", "root", "", "web");
if (mysqli_connect_errno())
    exit("خطایی با شرح زیر رخ داده است :" . mysqli_connect_error());

$query = "INSERT INTO user (name , family , tell ,password , email) VALUES ('$name' , '$family' , '$tell' ,'$pass' , '$email')";
if (mysqli_query($link, $query) === true) {
    $_SESSION["state_login"] = true;
    $_SESSION["name"] = $name;
    $_SESSION["family"] = $family;
    $_SESSION["tell"] = $tell;
    $_SESSION["email"] = $email;
}

?>
<br>
<?php
include("include/footer.php");
?>