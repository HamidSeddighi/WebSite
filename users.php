<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/web/css/style.css">
    <title>کاربران</title>
</head>
<body dir="rtl">

    <?php
session_start();
if (!($_SESSION['user_type'] == "admin" && $_SESSION["state_login"] === true)) {
    header("location:http://localhost/web/index.php");
}
    $link = mysqli_connect("localhost", "root", "", "web");
    if (mysqli_connect_errno()) {
        exit("خطا با شرح زیر :" . mysqli_connect_error());
    }


    ?>

    <h2>به صفحه ی کاربران خوش آمدید</h2>
    <a href='index.php'>برای رفتن به صفحه ی اصلی کلیک کنید</a>
    <hr>
<div class="login">
    <br>
    <form action="search-users.php" method="get">
        <label for="search">جستجو کاربر :</label>
        <br><br>
        <input type="search" name="search_user" id="search" placeholder="اسم ، فامیلی ، ایمیل یا شماره تماس">
        <br><br>
        <input type="submit" value="جستجو" id="submit">
        <br><br>
    </form>
    </div>
    <br>
    <hr>
    <h2>تمام کاربران وبسایت</h2>

    <div class="All_Users">
<?php
    $quary = "SELECT * FROM user WHERE 1";
    $result = mysqli_query($link, $quary);

    $counter = 0;
    while ($row = mysqli_fetch_array($result)) {
        $counter++;
        $email = $row['email'];
    ?>  
        <div class="Pack_Users">
            <p>نام : <?php echo $row['name']; ?></p>
            <p>نام خانوادگی : <?php echo $row['family']; ?></p>
            <p>ایمیل :<a href='http://localhost/web/setting-user.php?email=<?php echo $email; ?>'> <?php echo $row['email']; ?></a></p>
            <p>شماره تماس : <?php echo $row['tell']; ?></p>
            <p> نوع کاربر : <?php if($row['type'] == 0){ echo "معمولی"; }else{ echo "ادمین"; } ?></p>
        </div>
        <?php
    }
        ?>
    </div>
</body>
</html>