<?php
$link = mysqli_connect("localhost", "root", "", "web");
if (mysqli_connect_errno()) {
    exit("خطا با شرح زیر :" . mysqli_connect_error());
}

$quary = "SELECT * FROM settings WHERE ID_setting = 1";
$result = mysqli_query($link, $quary);
$row = mysqli_fetch_array($result);
session_start();
if ($row['Lock_web'] == '1') {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>تعمیرات</title>
    </head>

    <body dir="rtl">
        <style>
            body {
                text-align: center;
            }

            h1 {
                margin: auto;
                margin-top: 250px;
            }
        </style>

        <h1>وبسایت درحال تعمیر است</h1>
        <p>لطفا ساعاتی دیگر دوباره امتحان کنید!!</p>
        <a href='#'>میتوانید با پشتیبانی تماس بگیرید</a>
        <br>

        <?php
            if ($_SESSION['user_type'] == "admin" && $_SESSION["state_login"] === true) {
                echo "<a href='settings.php'>تنظیمات</a>";
            }

        ?>

    </body>

    </html>
<?php

} else {
    header("location:index.php");
}
?>