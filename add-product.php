<?php
include("include/header.php");
if (!($_SESSION['user_type'] == "admin" && $_SESSION["state_login"] === true )) {
    header("location:http://localhost/web/index.php");
}
$link = mysqli_connect("localhost", "root" , "" , "web");
if (mysqli_connect_errno()) {
    exit("خطا با شرح زیر :" . mysqli_connect_error());
}
$url = $pro_code = $pro_name = $pro_qty = $pro_price = $pro_image = $pro_detail= "";
$btn_caption = "افزودن کالا";
if (isset($_GET['action']) && $_GET['action'] == 'EDIT') {
    $id = $_GET["id"];
    $query = "SELECT * FROM product WHERE pro_code='$id'";
    $result = mysqli_query($link , $query);
    if ($row= mysqli_fetch_array($result)) {
        $pro_code = $row['pro_code'];
        $pro_name = $row['pro_name'];
        $pro_qty = $row['pro_qty'];
        $pro_price = $row['pro_price'];
        $pro_image = $_SESSION['image'];
        $pro_detail = $row['pro_detail'];
        $url = "?id=$pro_code&action=EDIT";
        $btn_caption = "ویرایش کالا";

    }
}

?>
<title> اضافه کردن محصول </title>
<div class="login">
<form action="admin-add-product.php<?php if (!empty($url)) echo($url); ?>" method="post" enctype="multipart/form-data">
<div class="name-form">
    <br>
    <h3>ثبت محصول</h3>
</div>


<div class="form">
    
    <h4>نام محصول :</h4>

    <input type="text" name="pro_name" placeholder="نام محصول" id="name" value="<?php echo($pro_name); ?>">
</div>

<div class="form">
    <h4>برند محصول :</h4>
    <input type="radio" name="berand" id="berand" value="samsung">
    <label for="samsung">سامسونگ</label>
    <input type="radio" name="berand" id="berand" value="xiaomi">
    <label for="xiaomi">شیائومی</label>
    <input type="radio" name="berand" id="berand" value="nokia">
    <label for="nokia">نوکیا</label>
    <input type="radio" name="berand" id="berand" value="huoawi">
    <label for="huoawi">هواوی</label>
    <input type="radio" name="berand" id="berand" value="apple">
    <label for="apple">اپل</label>
</div>

<div class="form">
    <h4>تعداد :</h4>
    <input type="number" name="pro_qty" placeholder="تعداد" id="qty" value="<?php echo($pro_qty); ?>">
</div>

<div class="form">
    <h4>قیمت محصول :</h4>
    <input type="number" name="pro_price" placeholder="قیمت محصول" id="price" value="<?php echo($pro_price); ?>">
</div>

<div class="form">
    <h4>بارگذاری عکس :</h4>
    <input type="file" name="pro_img" id="img">
<?php
    if (!empty($pro_image)) {
        echo("<img src='./images/products/$pro_image' width='200' height='100'>");
    }
?>
</div>

<div class="form">
    <h4>توضیحات :</h4>
    <textarea name="pro_detail" id="pro_detail" cols="39" rows="10" ><?php echo($pro_detail); ?></textarea>
</div>

<div class="form">
<input type="submit" value="<?php echo($btn_caption) ?>" id="submit">&nbsp;&nbsp;&nbsp; <input type="reset" value="جدید" id="submit"> 
</div>
</div>
<br>
            <?php
include("include/footer.php");
            ?>