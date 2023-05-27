<?php
include("include/header.php");

$link = mysqli_connect("localhost", "root", "", "web");

if (mysqli_connect_errno()) {
    exit("خطا با شرح زیر :" . mysqli_connect_error());
}
?>

<?php
$pro_code = 0;
if (isset($_GET['id'])) {
    $pro_code = $_GET['id'];
}

$query = "SELECT * FROM product WHERE pro_code='$pro_code'";
$result = mysqli_query($link, $query);

?>

<?php

if ($row = mysqli_fetch_array($result)) {

?>
    <title><?php echo ("باتری موبایل" . " " . $row['pro_name']); ?></title>
    <div class="info-product">
        <h4 style="color:blue"><?php echo ($row['berand']) ?></h4>
        <h4 style="color:black"><?php echo ($row['pro_name']) ?></h4>
        <img src="images/products/<?php echo ($row['pro_image']) ?>" width="200px" height="150px">
        <hr>
        قیمت :<?php echo ($row['pro_price']) ?>&nbsp; ریال
        <br>
        تعداد موجودی : <span style="color: red;"> <?php echo ($row['pro_qty']) ?></span>
        <br>
        توضیحات : <span style="color: green;"> <?php echo ($row['pro_detail']) ?></span>

        <br><br>
        <?php
        if (isset($No_shopping) && $No_shopping == "1") {
            echo "<h3>امکان خرید هیچ محصولی تا ساعات دیگر وجود ندارد</h3>";
        } else {

        ?>
            <b><a href="order.php?id=<?php echo ($row['pro_code']) ?>" style="text-decoration: none;">سفارش وخرید پستی</a></b>
        <?php
        }
        ?>
        <br>
        <br>
    </div>
<?php
}
?>
<br>
<?php
include("include/footer.php");
?>