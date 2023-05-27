<?php
$link = mysqli_connect("localhost", "root", "", "web");
if (mysqli_connect_errno()) {
    exit("خطا با شرح زیر :" . mysqli_connect_error());
}

$quary = "SELECT * FROM settings WHERE ID_setting = 1";
$result = mysqli_query($link, $quary);
$row = mysqli_fetch_array($result);

if (
    isset($_POST['Lock']) &&
    isset($_POST['Shop']) &&
    isset($_POST['Login'])
) {
    $Lock = $_POST['Lock'];
    $Shop = $_POST['Shop'];
    $Login = $_POST['Login'];
    echo $Lock;
} else {
    exit("خطایی وجود دارد");
}
$query = "UPDATE settings SET Lock_web = '$Lock', No_shopping = '$Shop', No_state_login = '$Login' WHERE ID_setting = 1 ";

if (mysqli_query($link, $query) === true) {
?>
    <script>
        window.alert("تنظیمات شما با موفقیت انجام شد");
    </script>
<?php
} else {
    echo "خطایی رخ داده است";
}
header("location:http://localhost/web/settings.php");
?>