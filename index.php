<?php
    session_start();
    // $_SESSION['lock_web'] = false;
    $link = mysqli_connect("localhost", "root" , "" , "web");
    if (mysqli_connect_errno()) {
        exit("خطا با شرح زیر :" . mysqli_connect_error());
    }
    $query = "SELECT * FROM settings WHERE ID_setting=1";
    $result = mysqli_query($link , $query);
    if ($row= mysqli_fetch_array($result)) {
        $lock_web = $row['Lock_web'];
        $No_shopping = $row['No_shopping'];
        $No_state_login = $row['No_state_login'];
    }else {
        echo "مشکل پیش آمده است";
    }
    if (isset($lock_web) && $lock_web  == '1') {
        header("location:repair.php");
    }else {
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
        <span>Ariya Mobile | آریا موبایل</span>
    </div>

    <div class="text-header">
        <h1>Ariya Mobile | آریا موبایل</h1>
        <h2>سلام؛ به وبسایت ما خوش آمدید</h2>
        <h2>ارزانی ها ضمانت شده اند!!!!</h2>
        <!-- <h3>بهترین راه برای خرید <span><h1>باتری</h1></span> همین جاس</h3> -->
    </div>
    <br>
    <div class="search">
        <br>
        <form action="http://localhost/web/search-box.php" method="get">
            <input type="search" name="search" id="search" placeholder="جستجو">
            <img src="http://localhost/web/img/search.png" width="15px" height="15px">
        </form>
        <br>
    </div>

    <hr>

    <?php if (!isset($_SESSION["state_login"])) {
    ?>
        <h3>آیا هنوز ثبت نام نکرده اید؟؟ اگر ثبت نام نکرده اید <span><a href="http://localhost/web/singin.php">اینجا</a></span>کلیک کنید</h3>
    <?php
    } else {
    ?>

    <?php
    }
    ?>
    <title>آریا موبایل | فروش باتری</title>
    <hr>
    <div class="pishnahad">
        <h4>پیشنهاد ها</h4>

        <div class="pishnahad-org">

        </div>
        <br>
    </div>
    <br>
    <div class="menu-2">
        <div class="menu2">
            <?php
            if (!(isset($_SESSION['user_type']) && $_SESSION['user_type'] == "admin" && $_SESSION["state_login"] === true)) {
            } else {
            ?>
            <a href="http://localhost/web/settings.php">
                    <div>تنظیمات وبسایت</div>
                </a>
                <a href="http://localhost/web/add-product.php">
                    <div>اضافه کردن محصول</div>
                </a>
                <a href="http://localhost/web/users.php">
                    <div>کاربران</div>
                </a>
            <?php
            }
            ?>

            <?php if (!isset($_SESSION["state_login"])) {
            ?>
                <a href="http://localhost/web/login.php">
                    <div>ورود</div>
                </a>
                <a href="http://localhost/web/singin.php">
                    <div>ثبت نام</div>
                </a>
            <?php
            } else {
            ?>
                <a href="http://localhost/web/profile.php">
                    <div>پروفایل</div>
                </a>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="berand">
        <a href=".//product/samsung/samsung.php">
            <div class="berand-ha" id="samsung"></div>
        </a>
        <a href=".//product/xiaomi/xiaomi.php">
            <div class="berand-ha" id="xiaomi"></div>
        </a>
        <a href=".//product/apple/apple.php">
            <div class="berand-ha" id="apple"></div>
        </a>
        <a href=".//product/nokia/nokia.php">
            <div class="berand-ha" id="nokia"></div>
        </a>
        <a href=".//product/huawei/huawei.php">
            <div class="berand-ha" id="huawei"></div>
        </a>
    </div>
    <div class="support">
        <a href="http://localhost/web/support.php">
            <h3>پشتیبانی</h3>
        </a>
    </div>
    <br>
    <?php
    include("include/footer.php");
        }
?>