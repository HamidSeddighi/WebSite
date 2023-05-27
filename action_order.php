<?php 
include("include/header.php");
if (!isset($_SESSION['state_login'])) {
    header("location:http://localhost/web/index.php");
}
    


$pro_code = $_POST["pro_code"];
$pro_name = $_POST["pro_name"];
$pro_qty = $_POST["pro_qty"];
$pro_price = $_POST["pro_price"];
$total_price = $_POST["total_price"];

$date = date("Y-m-d H:i:s");
$name = $_POST["name"];
$email = $_SESSION["email"];

$tell = $_POST["tell"];
$address = $_POST["address"];

if ($pro_qty == 0) {
    header("location:http://localhost/web/index.php");
}else {
    


$link = mysqli_connect("localhost", "root" , "" , "web");

    if (mysqli_connect_errno()) {
        exit("خطا با شرح زیر :" . mysqli_connect_error());
  
    }

    $query = "INSERT INTO orders(id, email, orderdate, pro_code, pro_qty,pro_price, tell, address, trackcode, state) VALUES ('0','$email','$date','$pro_code','$pro_qty','$pro_price','$tell','$address','000000000000000000000000','0')";
    
    if (mysqli_query($link , $query) === true) {
        echo "<p style='color:green;'><br><b>سفارش شما با موفقیت در سامانه ثبت گردید</b></p>";

        echo "<p style='color:brown;'><br><b> کاربر گرامی آقا/خانم $name</b></p>";
        $query = "SELECT * FROM orders WHERE orderdate='$date'";
        $result =mysqli_query($link , $query);
    if ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
    }
        echo "<p style='color:brown;'><br><b>محصول $pro_name با کد $pro_code به تعداد/مقدار $pro_qty با قیمت پایه $pro_price ریال را سفارش داده اید</b></p>";
        echo "<p style='color:brown;'><br><b>شناسه ی خرید شما : $id </b></p>";
        echo "<p style='color:red;'><br><b>مبلغ قابل پرداخت برای سفارش ثبت شده $total_price ریال است</b></p>";

        echo "<p style='color:blue;'><br><b>پس از برسی و تایید سفارس با شما تماس گرفته خواهد شد</b></p>";
        echo "<p style='color:blue;'><br><b>برای پیگیری خرید خود به ایمیل یا شماره ی زیر پیام بفرستید  09313706175    varzaneh22@gmail.com</b></p>";
        echo "<p style='color:blue;'><br><b>محصول خریداری شده از طریق پست جمهوری اسلامی ایران طبق آدرس درج شده ارسال خواهد شد</b></p>";


    }else {
        exit("مشگلی پیش آمده");
    }

    $quary = "UPDATE product SET pro_qty=pro_qty-$pro_qty WHERE pro_code ='$pro_code'";
    if (mysqli_query($link , $quary) === true) {
}else {
    echo "<p style='color:red;'><br><b>خطا در ثبت سفارش</b></p>";
}
    mysqli_close($link);
}
?>
            <br>
            <?php
include("include/footer.php");
            ?>