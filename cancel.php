<?php
$link = mysqli_connect("localhost", "root", "", "web");
if (mysqli_connect_errno())
    exit("خطایی با شرح زیر رخ داده است :" . mysqli_connect_error());
$id = $_GET['id'];
$query = "UPDATE orders SET state = 3 WHERE id = '$id' ";

if (mysqli_query($link, $query) === true) {
?>
    <script>
        window.alert("سفارش شما با موفقیت لغو شد");
    </script>
<?php
} else {
    echo "خطایی رخ داده است";
}
header("location:http://localhost/web/orders.php");
?>