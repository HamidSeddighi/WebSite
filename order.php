<?php
include("include/header.php");
if (isset($No_shopping) && $No_shopping == "1") {
    echo "<h3>امکان خرید هیچ محصولی تا ساعات دیگر وجود ندارد</h3>";
}else {
    

$link = mysqli_connect("localhost", "root" , "" , "web");

if (mysqli_connect_errno()) {
    exit("خطا با شرح زیر :" . mysqli_connect_error());
}

$pro_code = 0;
if (isset($_GET['id'])) {
    $pro_code = $_GET['id'];
}

if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true)) {
?>
<title>خرید محصول</title>
<br>
<span style="color:red;"><b> برای خرید پستی محصول انتخاب شده باید وارد سایت شوید! </b></span>
<br>
<br>
در صورتی که در وبسایت عضو هستید برای ورود
<a href="login.php" style="text-decoration:none;"><span style="color:blue;">اینجا</span></a>
کلیک کنید
<br>
در صورتی که در وبسایت عضو نیستید برای ثبت نام
<a href="singin.php" style="text-decoration:none;"><span style="color:blue;">اینجا</span></a>
کلیک کنید
<br><br>
<?php

}
$quary = "SELECT * FROM product WHERE pro_code = '$pro_code'";
$result = mysqli_query($link , $quary);
?>



<div class="login">
<form action="http://localhost/web/action_order.php" method="post">
<?php
if ($row = mysqli_fetch_array($result)) {
    ?>   
<br>
<h3>کد کالا</h3>
<br>
<input type="text" name="pro_code" id="code" value="<?php echo($pro_code) ?>" style="background-color: #0000004a;" readonly>
<br>

<h3>نام کالا</h3>
<br>
<input type="text" name="pro_name" id="pro_name" value="<?php echo($row['pro_name']) ?>" style="background-color: #0000004a;" readonly>
<br>

<h3>تعداد یا مقدار در خواستی</h3>
<br>
<input type="number" name="pro_qty" id="pro_qty" onchange="calc_price();">
<br>

<h3>قیمت واحد کالا</h3>
<br>
<input type="nimber" name="pro_price" id="pro_price" value="<?php echo($row['pro_price']) ?>" style="background-color: #0000004a;" readonly>
<br>

<h3>مبلغ قابل پرداخت</h3>
<br>
<input type="number" name="total_price" id="total_price" id="total_price" value="0" style="background-color: #00ff2b40;" readonly>
<br>

<script>

    function calc_price() {
        var pro_qty= <?php echo($row['pro_qty']) ?>;
        var price = document.getElementById('pro_price').value ;
        var count = document.getElementById('pro_qty').value ;
        var total_price;

        if (count>pro_qty) {
            alert("تعداد موجودی انبار کمتر از درخواست شما میباشد!!");
            document.getElementById('pro_qty').value=0 ;
            count = 0;
        }

        if (count==0 || count=='') {
            total_price =0;
        }else{
            total_price=count*price;

            document.getElementById('total_price').value= total_price ;
        }
    }
    
</script>

    <?php
    $quary ="SELECT * FROM user WHERE email='{$_SESSION['email']}'";
    $result = mysqli_query($link , $quary);
    $user_row = mysqli_fetch_array($result);
?>
<h3>نام خریدار</h3>
<br>
<input type="text" name="name" id="name" value="<?php echo($user_row['name']." ".$user_row['family']); ?>"style="background-color: #0000004a;" readonly >
<br>

<h3>ایمیل</h3>
<br>
<input type="email" name="email" id="email" value="<?php echo($user_row['email']) ?>"style="background-color: #0000004a;" readonly >
<br>

<h3>شماره تماس</h3>
<br>
<input type="text" name="tell" id="tell" value="<?php echo($user_row['tell']) ?>"style="background-color: #0000004a;" readonly >
<br>

<h3>آدرس دقیق جهت دریافت محصول</h3>
<br>
<textarea name="address" id="address" cols="39" rows="10" wrap="virtual"></textarea>
<br>
<br>

<input type="submit" value="خرید محصول" id="submit">

<br>
<br>
<?php
}
?>
</form>
</div>
<br>
<?php
}
include("include/footer.php");

?>