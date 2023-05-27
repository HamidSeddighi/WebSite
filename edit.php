<?php
include("include/header.php");
if (!isset($_SESSION["state_login"])) {
    header("location:http://localhost/web/index.php");
}
?>
<div class="login">
    <form action="edit-ok.php" method="post">
        <h3>ویرایش کنید</h3>
        <title>ویرایش پروفایل</title>
        <br>
        <?php
        if (isset($_GET['pass'])) {
            switch ($_GET['pass']) {
                case "false":
                    ?>
                <span style="color:red;">پسوردها باهم برابر نیستند!!</span>
                <?php
                    break;
                case 'true':
                    ?>
                <span style="color:red;">پسورد جدید نمیتواند با پسورد قبلی برابر باشد!!</span>
                <?php
                    break;
                default:
                    break;
            }
        }elseif (isset($_GET['email'])) {
            switch ($_GET['email']) {
                case "false":
                    ?>
                <span style="color:red;">ایمیل شما مشکلی دارد!</span>
                <?php
                    break;
                case 'true':
                    ?>
                <span style="color:red;">!</span>
                <?php
                    break;
                default:
                    break;
            }
        }
        ?>
        <div class="form">
            <h4>نام :</h4>
            <input type="text" name="name" placeholder="نام" id="name" value="<?php echo ($_SESSION['name']) ?>">
        </div>

        <div class="form">
            <h4>نام خانوادگی :</h4>
            <input type="text" name="family" placeholder="نام خانوادگی" id="family" value="<?php echo ($_SESSION['family']) ?>">
        </div>

        <div class="form">
            <h4>شماره تماس :</h4>
            <input type="text" name="tell" placeholder="09131111111" id="tell" value="<?php echo ($_SESSION['tell']) ?>">
        </div>

        <div class="form">
            <h4>ایمیل :</h4>
            <input type="email" name="email" placeholder="" id="email" value="<?php echo ($_SESSION['email']) ?>" style="background-color: #0000004a;" readonly>
        </div>

        <div class="form">
            <script>
                function show() {
                    var x = document.getElementById("pass");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
            </script>

            <h4> پسورد قبلی :</h4>
            <input type="password" name="pass" id="pass" value="">
            <br>
            <input type="checkbox" onclick="show()">
            <p>نمایش پسورد</p>

        </div>

        <div class="form">
            <script>
                function show2() {
                    var x = document.getElementById("newpass");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
            </script>

            <h4> پسورد جدید :</h4>
            <input type="password" name="newpass" id="newpass" value="">
            <br>
            <input type="checkbox" onclick="show2()">
            <p>نمایش پسورد</p>

        </div>

        <div class="form">
            <input type="submit" value="ویرایش" id="submit">
        </div>
        <br>
        
        </div>
        <br>
        <?php
        include("include/footer.php");
        ?>