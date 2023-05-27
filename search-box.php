<?php
include("include/header.php");

$link = mysqli_connect("localhost", "root", "", "web");
$search = $_GET['search'];
if (mysqli_connect_errno()) {
    exit("خطا با شرح زیر :" . mysqli_connect_error());
}

$query = "SELECT * FROM product WHERE pro_name='$search' OR pro_detail = '$search'";

$result = mysqli_query($link, $query);

?>

<title><?php echo ("باتری موبایل" . " " . $search); ?></title>
<?php
$counter = 0;
while ($row = mysqli_fetch_array($result)) {
    $_SESSION['image'] = $row['pro_image'];
    $counter++;
?>
    <div class="search-box">
        <div class="product-search">
            <div class="pro-search">
                <a href="http://localhost/web/product_detail.php?id=<?php echo ($row['pro_code']) ?>">
                    <div class="image-product"><img src="images/products/<?php echo ($row['pro_image']) ?>" width="100%"></div>
                </a>
            </div>

            <div class="search-data">
                <h4 style="color:blue"><?php echo ($row['berand']) ?></h4>
                <h4 style="color:black"><?php echo ($row['pro_name']) ?></h4>
                قیمت :<?php echo ($row['pro_price']) ?> ریال
                <br>
                <div class="search-data2">
                    تعداد موجودی : <span style="color: red;"> <?php echo ($row['pro_qty']) ?></span>
                </div>
                <br>
                <div class="search-data2">
                    توضیحات : <span style="color: green;"> <?php echo (substr($row['pro_detail'], 0, 20)) ?>...</span>
                </div>
                <br>

                <b><a href="http://localhost/web/product_detail.php?id=<?php echo ($row['pro_code']) ?>" style="text-decoration: none;">توضیحات تکمیلی و خرید</a></b>
                <br>
            </div>
            <?php
            if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == "admin" && $_SESSION['state_login'] == true) {
            ?>
                <div class="pro-item">
                    <div class="item"><a href="http://localhost/web/delete.php?id=<?php echo ($row['pro_code']) ?>&action=DELETE">حذف کالا</a></div>
                    <div class="item"><a href="http://localhost/web/add-product.php?id=<?php echo ($row['pro_code']) ?>&action=EDIT">ویرایش کالا</a></div>
                </div>
            <?php
            } else {
            }

            ?>
        </div>

    </div>
<?php
}
?>
<br>
<?php
include("include/footer.php");
?>