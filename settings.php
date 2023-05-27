<?php
session_start();
if (!($_SESSION['user_type'] == "admin" && $_SESSION["state_login"] === true)) {
    header("location:http://localhost/web/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/web/css/style.css">
    <title>تنظیمات</title>
</head>

<body dir="rtl">
    <?php
    $link = mysqli_connect("localhost", "root", "", "web");
    if (mysqli_connect_errno()) {
        exit("خطا با شرح زیر :" . mysqli_connect_error());
    }

    $quary = "SELECT * FROM settings WHERE ID_setting = 1";
    $result = mysqli_query($link, $quary);
    $row = mysqli_fetch_array($result);
    ?>
    <h2>به تنظیمات خوش آمدید</h2>
    <a href='index.php'>برای رفتن به صفحه ی اصلی کلیک کنید</a>
    <hr>
    <div class="login">
        <form action="action_setting.php" method="post">
            <div class="name-form">
                <br>
                <h3>تنظیمات</h3>
            </div>
            <div class="form">
                <?php
                switch ($row['Lock_web']) {
                    case '0':
                ?>
                        <h4>حالت تعمیر وبسایت :</h4>
                        <label>
                            <input type="radio" name="Lock" value="1">فعال
                        </label>

                        <label>
                            <input type="radio" name="Lock" value="0" checked>غیرفعال
                        </label>
                    <?php
                        break;
                    case '1':
                    ?>
                        <h4>حالت تعمیر وبسایت :</h4>
                        <label>
                            <input type="radio" name="Lock" value="1" checked>فعال
                        </label>

                        <label>
                            <input type="radio" name="Lock" value="0">غیرفعال
                        </label>
                    <?php
                        break;
                    default:
                        break;
                }
                switch ($row['No_shopping']) {
                    case '0':
                    ?>
                        <h4>حالت خرید نکردن :</h4>
                        <label>
                            <input type="radio" name="Shop" value="1">فعال
                        </label>

                        <label>
                            <input type="radio" name="Shop" value="0" checked>غیرفعال
                        </label>
                    <?php
                        break;
                    case '1':
                    ?>
                        <h4>حالت خرید نکردن :</h4>
                        <label>
                            <input type="radio" name="Shop" value="1" checked>فعال
                        </label>

                        <label>
                            <input type="radio" name="Shop" value="0">غیرفعال
                        </label>
                    <?php
                        break;
                    default:
                        break;
                }
                switch ($row['No_state_login']) {
                    case '0':
                    ?>
                        <h4>حالت لاگین نشدن :</h4>
                        <label>
                            <input type="radio" name="Login" value="1">فعال
                        </label>

                        <label>
                            <input type="radio" name="Login" value="0" checked>غیرفعال
                        </label>
                    <?php
                        break;
                    case '1':
                    ?>
                        <h4>حالت لاگین نشدن :</h4>
                        <label>
                            <input type="radio" name="Login" value="1" checked>فعال
                        </label>

                        <label>
                            <input type="radio" name="Login" value="0">غیرفعال
                        </label>
                <?php
                        break;
                    default:
                        break;
                }
                ?>
                <br>
                <br>
                <input type="submit" value="ذخیره اطلاعات" id="submit">
                <br>
                <br>
            </div>

        </form>
    </div>
    <br>
    <?php
    include("include/footer.php");
    ?>