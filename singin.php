<?php
include("include/header.php");
?>
<title> ثبت نام در آریا موبایل</title>
<div class="login">
<form action="singin-ok.php" method="post">
<div class="name-form">
    <br>
    <h3>ثبت نام</h3>
</div>
<?php
    if (isset($No_state_login) && $No_state_login  == '1') {
        echo "<h3> شما نمیتوانید وارد اکانتی شوید!! </h3>";
    }else {
?>
<div class="form">
    <h4>نام :</h4>
    <input type="text" name="name" placeholder="نام" id="name">
</div>

<div class="form">
    <h4>نام خانوادگی :</h4>
    <input type="text" name="family" placeholder="نام خانوادگی" id="family">
</div>

<div class="form">
    <h4>شماره تماس :</h4>
    <input type="text" name="tell" placeholder="09131111111" id="tell">
</div>

<div class="form">
    <h4>ایمیل :</h4>
    <input type="email" name="email" placeholder="test@gmail.com" id="email">
</div>

<div class="form">
    <script>
        function show() {
            var x = document.getElementById("pass");
            if (x.type === "password") { x.type = "text";  } else { x.type = "password";  }
        }
    </script>

    <h4>پسورد :</h4>
        <input type="password" name="pass" id="pass">
        <br>
        <input type="checkbox" onclick="show()" >
<p>نمایش پسورد</p>
    
</div>

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