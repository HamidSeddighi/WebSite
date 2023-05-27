<?php
include("include/header.php");
$link = mysqli_connect("localhost", "root", "", "web");
if (mysqli_connect_errno())
    exit("خطایی با شرح زیر رخ داده است :" . mysqli_connect_error());
if (isset($_GET['e']) && isset($_GET['c']) && $_GET['c'] == "slksetosiuovyoiutmbimvoynf68t79817r96b7ut276mdt97e96r8t77nf9/f") {
    $email = $_GET['e'];
} else {
    header("location:login.php");
}
$query = "SELECT * FROM user WHERE email='$email' AND Ch_pass =  1";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
if ($row) {
?>
    <div class="login">
        <form action='action-restpass.php?email=<?php echo $email; ?>' method="post">
            <p>لطفا رمز جدید خود را وارد کنید</p>
            <br>
            <input type="password" name="pass" id="pass">
            <br>
            <p>لطفا رمز خود را مجدد وارد کنید</p>
            <br>
            <input type="password" name="repass" id="pass">
            <br>
            <br>
            <?php
            if (isset($_GET['error'])) {
                echo "<span style='color:red;'>پسورد ها با یکدیگر برابر نیستند!!</span>";
            }
            ?>
            <br>
            <br>
            <input type="submit" value="تایید" id="submit">
            <br>
            <br>

        </form>
    </div>
<?php
}
