<?php
session_start();
$link = mysqli_connect("localhost", "root", "", "web");
if (mysqli_connect_errno()) {
    exit("خطا با شرح زیر :" . mysqli_connect_error());
}
$query = "SELECT * FROM settings WHERE ID_setting=1";
$result = mysqli_query($link, $query);
if ($row = mysqli_fetch_array($result)) {
    $lock_web = $row['Lock_web'];
    $No_shopping = $row['No_shopping'];
    $No_state_login = $row['No_state_login'];
}
if (isset($lock_web) && $lock_web == '1') {
    header("location:repair.php");
} else {
?>
    <html>

    <head>
        <link rel="stylesheet" href="http://localhost/web/css/style.css">
        <script src="http://localhost/web/js/javascript.js"></script>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <title>Ariya Mobile | آریا موبایل</title> -->
    </head>

    <body dir="rtl">

        <div class="menu-burger">
            <div class="burger-inner"></div>
        </div>

        <ul class="list">
            <div class="div-list">
                <a href="http://localhost/web/index.php">
                    <li>خانه</li>
                </a>
                <a href="http://localhost/web/info-me.php">
                    <li>درباره ی ما</li>
                </a>
                <a href="http://localhost/web/contact.php">
                    <li>ارتباط با ما</li>
                </a>
                <?php
                if (!(isset($_SESSION['user_type']) && $_SESSION['user_type'] == "admin" && $_SESSION["state_login"] === true)) {
                } else {
                ?>
                    <li>
                        <a href="http://localhost/web/settings.php">
                            <div>تنظیمات وبسایت</div>
                        </a>
                    </li>
                    <li><a href="http://localhost/web/add-product.php">
                            <div>اضافه کردن محصول</div>
                        </a></li>
                <?php
                }
                ?>

                <?php if (!isset($_SESSION["state_login"]) || $_SESSION['state_login']) {
                ?>
                    <li><a href="http://localhost/web/login.php">
                            <div>ورود</div>
                        </a></li>
                    <li><a href="http://localhost/web/singin.php">
                            <div>ثبت نام</div>
                        </a></li>
                <?php
                } else {
                ?>
                    <li><a href="http://localhost/web/profile.php">
                            <div>پروفایل</div>
                        </a></li>
                <?php
                }
                ?>
                <select name="product" id="product" onchange="x();">
                    <option value="product">محصولات</option>
                    <option value="samsung">سامسونگ</option>
                    <option value="xiaomi">شیائومی</option>
                    <option value="nokia">نوکیا</option>
                    <option value="apple">اپل</option>
                    <option value="huawei">هواوی</option>
                </select>
            </div>
        </ul>

        <script src="http://localhost/web/js/javascript2.js"></script>
        <form action="http://localhost/web/search-box.php" method="get">
            <br>

            <div class="menu">
                <a href="http://localhost/web/index.php">
                    <div>خانه</div>
                </a>
                <a href="http://localhost/web/info-me.php">
                    <div>درباره ی ما</div>
                </a>
                <a href="http://localhost/web/contact.php">
                    <div>ارتباط با ما</div>
                </a>
                <div class="search2">
                    <button id="btnsearch">
                        <svg viewBox="0 0 1024 1024">
                            <path class="path1" d="M848.471 928l-263.059-263.059c-48.941 36.706-110.118 55.059-177.412 55.059-171.294 0-312-140.706-312-312s140.706-312 312-312c171.294 0 312 140.706 312 312 0 67.294-24.471 128.471-55.059 177.412l263.059 263.059-79.529 79.529zM189.623 408.078c0 121.364 97.091 218.455 218.455 218.455s218.455-97.091 218.455-218.455c0-121.364-103.159-218.455-218.455-218.455-121.364 0-218.455 97.091-218.455 218.455z"></path>
                        </svg>
                    </button>
                    <input type="search" name="search" id="search2" placeholder="جستجو">
                </div>

                <!-- <img src="http://localhost/web/img/search.png" width="15px" height="15px"> -->
        </form>
        <div id="select">
            <select name="product" id="product2" onchange="y();">
                <option value="product">محصولات</option>
                <option value="samsung">سامسونگ</option>
                <option value="xiaomi">شیائومی</option>
                <option value="nokia">نوکیا</option>
                <option value="apple">اپل</option>
                <option value="huawei">هواوی</option>
            </select>
            <script src="http://localhost/web/js/javascript3.js"></script>
        </div>
        </div>
    <?php
}
    ?>