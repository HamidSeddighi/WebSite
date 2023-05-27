<?php
include("include/header.php");


?>
<title> ورود به آریا موبایل</title>
<div class="login">
    <form action="login-ok.php" method="post">
        <div class="name-form">
            <br>
            <h3>ورود</h3>
        </div>
        <?php
        if (isset($No_state_login) && $No_state_login  == '1') {
            echo "<h3> شما نمیتوانید وارد اکانتی شوید!! </h3>";
        } else {
        ?>
            <div class="form">
                <h4>ایمیل :</h4>
                <input type="email" name="email" placeholder="test@gmail.com" id="email">
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

                <h4>پسورد :</h4>
                <input type="password" name="pass" id="pass">
                <br>
                <input type="checkbox" onclick="show()">
                <p>نمایش پسورد</p>

            </div>
            <br>
            <?php
                if (isset($_GET['message']) && $_GET['message'] == true) {
                    echo "<span style='color:green'>پسورد با موفقیت تغییر یافت</span>";
                }
            ?>
            <br>
            <br>
            <span><a href='info_pass.php'>آیا رمز خود را فراموش کرده اید؟</a></span>

            <br>
            <br>
            <div class="form">
                <input type="submit" value="ورود" id="submit">
            </div>

        <?php
        }
        ?>
    </form>
</div>
<br>
<?php

include("include/footer.php");

?>