<?php
include("include/header.php");
if (!($_SESSION['user_type'] == "admin" && $_SESSION["state_login"] === true)) {
    header("location:http://localhost/web/index.php");
}
$link = mysqli_connect("localhost", "root", "", "web");

if (mysqli_connect_errno()) {
    exit("خطا با شرح زیر :" . mysqli_connect_error());
}
?>

<?php
$pro_code = 0;
if (isset($_GET['email'])) {
    $user_email = $_GET['email'];
}
    $_SESSION['email_user'] = $user_email;
$query = "SELECT * FROM user WHERE email='$user_email'";
$result = mysqli_query($link, $query);

if ($row = mysqli_fetch_array($result)) {

?>
<title><?php echo ("کاربر" . " " . $row['email']); ?></title>
<br>
<br>
    <div class="detail-user">
        <div class="detail-user-iner">
            <span>نام کاربر : <?php echo $row['name'];?></span>
            <br>
            <span>نام خانوادگی : <?php echo $row['family']; ?></span>
            <br>
            <span>شماره تماس : <?php echo $row['tell']; ?></span>
            <br>
            <span> ایمیل کاربر : <?php echo $row['email']; ?></span>
            <br>
            <span> نوع کاربر : <?php echo $row['type']; ?></span>
        </div>
        <hr>
        <form action="action_setting_user.php" method="post">
            <div class="form">
                <?php
                switch ($row['type']) {
                    case '0':
                ?>
                        <h4>تغییر نوع کاربر  :</h4>
                        <label>
                            <input type="radio" name="type" value="1">ادمین
                        </label>

                        <label>
                            <input type="radio" name="type" value="0" checked>معمولی
                        </label>
                    <?php
                        break;
                    case '1':
                    ?>
                        <h4>تغییر نوع کاربر :</h4>
                        <label>
                            <input type="radio" name="type" value="1" checked>ادمین
                        </label>

                        <label>
                            <input type="radio" name="type" value="0">معمولی
                        </label>
                    <?php
                        break;
                        case '3':
                            ?>
                                <h4>تغییر نوع کاربر :</h4>
                                <label>
                                    <input type="radio" name="type" value="3" checked >ادمین
                                </label>
                            <?php
                                break;
                    default:
                        break;
                }
                switch ($row['Ch_pass']) {
                    case '0':
                ?>
                        <h4>اجازه ی تغییر پسورد :</h4>
                        <label>
                            <input type="radio" name="ch_pass" value="1">اجازه دارد
                        </label>

                        <label>
                            <input type="radio" name="ch_pass" value="0" checked>اجازه ندارد
                        </label>
                    <?php
                        break;
                    case '1':
                    ?>
                        <h4>اجازه ی تغییر پسورد :</h4>
                        <label>
                            <input type="radio" name="ch_pass" value="1" checked>اجازه دارد
                        </label>

                        <label>
                            <input type="radio" name="ch_pass" value="0">اجازه ندارد
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
        </form>
    </div>
<?php
}
?>