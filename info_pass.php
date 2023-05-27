<?php
include("include/header.php");


?>
<title>بازیابی رمز</title>
<div class="login">
<form action="reset_pass.php" method="post">
<div class="name-form">
    <br>
    <h3>بازیابی</h3>
</div>
<?php
    if (isset($No_state_login) && $No_state_login  == '1') {
        echo "<h3> شما نمیتوانید وارد اکانتی شوید!! </h3>";
    }else {
?>
<div class="form">
    <h4>ایمیل خود را وارد کنید :</h4>
    <input type="email" name="email" placeholder="test@gmail.com" id="email">
</div>



<br>
<br>
<div class="form">
<input type="submit" value="اعتبارسنجی" id="submit">
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