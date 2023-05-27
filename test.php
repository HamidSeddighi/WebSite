<?php
include("include/header.php");
?>
    <?php if (!isset($_SESSION["state_login"])) {
        ?>
    <h3>آیا هنوز ثبت نام نکرده اید؟؟ اگر ثبت نام نکرده اید <span><a href="http://localhost/web/singin.php">اینجا</a></span>کلیک کنید</h3>
        <?php
    }else {
        ?>
        
        <?php
    }
?>
<title> صفحه ی تایمر آریا موبایل</title>
<div class="timer">

<div id="Result"></div>
<div id="cen">:</div>
<div id="mu"></div>
</div>
<script>

var Result = document.getElementById("Result");
var mu = document.getElementById("mu");
var s = 0;
var m = 3;

function MyMessage(){

    while (s==0) {
        if (m==0 && s==0) {
            clearInterval(mytimer);
        }
        if (s==0) {
            m--;
            s=59;
        }

    }

    mu.innerHTML = m;
Result.innerHTML = s--;
}

var maytimer = setInterval(MyMessage, 1000);

</script>

</body>
</html>