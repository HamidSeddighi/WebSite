<?php
include("include/header.php");

if (isset($_POST["email"]) && !empty($_POST["email"])) {

    $email = $_POST["email"];
} else {
    exit("لطفا ایمیل خود را وارد کنید");
}

$link = mysqli_connect("localhost", "root", "", "web");
if (mysqli_connect_errno())
    exit("خطایی با شرح زیر رخ داده است :" . mysqli_connect_error());

$query = "SELECT * FROM user WHERE email='$email' AND Ch_pass =  1";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);

if ($row) {
    header("location:68srd87267587cfh6dx767653soeirfh6568t6987fy9876c9fu767y9ft786gh65686kygikuygk.php?e=$email&c=slksetosiuovyoiutmbimvoynf68t79817r96b7ut276mdt97e96r8t77nf9/f");
} else {
    exit("با ادمین وبسایت تماس بگیرید تا اجازه ی دسترسی به بازیابی رمزشما را بدهد                   09374053067");
}

?>
<br>
<?php
include("include/footer.php");
?>