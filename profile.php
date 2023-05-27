<?php
include("include/header.php");
if (!isset($_SESSION["state_login"])) {
    header("location:http://localhost/web/index.php");
?>
<br>
<?php
    if (isset($_GET['edit'])) {
        switch ($_GET['edit']) {
            case 'true':
                ?>
        <span style="color:green;">ویرایش باموفقیت انجام شد</span>
        <?php
                break;
            case 'false':
                ?>
                <span style="color:red;">ویرایش با مشکل مواجه شد</span>
                <?php
                break;
            default:
                break;
        }
    }

}
?>
<br>
<br>
<title>پروفایل</title>
<br>
<div class="profile">
    <div class="img-prof">

    </div>

    <div class="data-prof">
        <h3>نام :</h3>
        <?php echo $_SESSION["name"]; ?>
    </div>

    <div class="data-prof">
        <h3>نام خانوادگی :</h3>
        <?php echo $_SESSION["family"]; ?>
    </div>

    <div class="data-prof">
        <h3>شماره تلفن :</h3>
        <?php echo $_SESSION["tell"]; ?>
    </div>

    <div class="data-prof">
        <h3>ایمیل :</h3>
        <?php echo $_SESSION["email"]; ?>
    </div>

    <a href="http://localhost/web/close.php">
        <div class="a">خروج</div>
    </a>


    <a href="http://localhost/web/edit.php">
        <div class="a">ویرایش</div>
    </a>

    <a href="http://localhost/web/orders.php">
        <div class="a">سفارشات</div>
    </a>
</div>
<br>
<?php
include("include/footer.php");
?>