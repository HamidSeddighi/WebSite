<?php
$link = mysqli_connect("localhost", "root", "", "web");
if (mysqli_connect_errno()) {
    exit("خطا با شرح زیر :" . mysqli_connect_error());
}
session_start();
$email = $_SESSION['email_user'];

$quary = "SELECT * FROM user WHERE email ='$email'";
$result = mysqli_query($link, $quary);
$row = mysqli_fetch_array($result);

if (
    isset($_POST['type']) &&
    isset($_POST['ch_pass'])
) {
    $type = $_POST['type'];
    $ch_pass = $_POST['ch_pass'];
    echo $type;
} else {
    exit("خطایی وجود دارد");
}
$query = "UPDATE user SET type = '$type', Ch_pass = '$ch_pass' WHERE email = '$email' ";

if (mysqli_query($link, $query) === true) {
?>
    <script>
        window.alert("تنظیمات شما با موفقیت انجام شد");
    </script>
<?php
} else {
    echo "خطایی رخ داده است";
}
header("location:http://localhost/web/users.php");
?>