<?php
include("include/header.php");
if (!($_SESSION['user_type'] == "admin" && $_SESSION["state_login"] === true)) {
    header("location:http://localhost/web/index.php");
}
if (
    isset($_POST['pro_name']) && !empty($_POST['pro_name']) &&
    isset($_POST['pro_qty']) && !empty($_POST['pro_qty']) &&
    isset($_POST['pro_price']) && !empty($_POST['pro_price']) &&
    isset($_POST['berand']) && !empty($_POST['berand'])
) {

    $pro_name = $_POST['pro_name'];
    $berand = $_POST['berand'];
    $pro_qty = $_POST['pro_qty'];
    $pro_price = $_POST['pro_price'];
    $pro_img = $_FILES["pro_img"]["name"];
    $pro_detail = $_POST['pro_detail'];
} else {
    exit("برخی فیلد ها مقدار دهی نشده است");
}
$link = mysqli_connect("localhost", "root", "", "web");

if (mysqli_connect_errno()) {
    exit("خطا با شرح زیر :" . mysqli_connect_error());
}

if (isset($_GET['action'])) {
    $id = $_GET['id'];

    switch ($_GET['action']) {
        case 'EDIT':
            $query = "UPDATE product SET pro_name='$pro_name',berand='$berand',pro_qty='$pro_qty',pro_price='$pro_price',pro_image='$pro_image',pro_detail='$pro_detail' WHERE pro_code='$id'";
            if (mysqli_query($link, $query) === true) {
                echo ("محصول انتخاب شده با موفقیت ویرایش شد");
            } else {
                echo ("خطایی هنگام ویرایش رخ داد");
            }
            break;
    }
    exit();
}


$target_dir = "images/products/";
$target_file = $target_dir . $_FILES["pro_img"]["name"];
$uploadok = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

$check = getimagesize($_FILES['pro_img']['tmp_name']);
if ($check !== false) {
    echo "پرونده انتخابی یک تصویر از نوع -" . $check["mime"] . "است <br/>";
    $uploadok = 1;
} else {
    echo "فایل انتخاب شده یک تصویر نیست <br/>";
    $uploadok = 0;
}

if (file_exists($target_file)) {
    echo "فایلی با همین نام در سرویس دهنده وجود دارد <br/>";
    $uploadok = 0;
}

if ($_FILES["pro_img"]["size"] > (500 * 1024)) {
    echo "اندازه ی فایل مورد نظر بیش از 500 کیلوبایت است <br/>";
    $uploadok = 0;
}

$imageFileType != Strtolower($imageFileType);
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "فقط پسوند های JPG,PNG,JPEG,GIF برای فایل مجاز است <br/>";
}

if ($uploadok == 0) {
    echo "فایل انتخاب شده به سرویس دهنده ارسال نشد <br/>";
} else {
    if (move_uploaded_file($_FILES["pro_img"]["tmp_name"], $target_file)) {

        echo "با موفقیت به سرویس دهنده ارسال شد <br/>";
    }
}
if ($uploadok == 1) {

    $query = "INSERT INTO product
    (pro_name,
    berand,
    pro_qty,
    pro_price,
    pro_image,
    pro_detail) VALUES
    ('$pro_name',
    '$berand',
    '$pro_qty',
    '$pro_price',
    '$pro_img',
    '$pro_detail')";

    if (mysqli_query($link, $query) === true) {
        echo "<p style='color:green;'><b>کالا با موفقیت به انبار اضافه شد</b></p>";
    } else {
        echo "<p style='color:red;'><b>خطا در ثبت مشخصات کالا در انبار</b></p>";
    }
}
mysqli_close($link);



?>
<br>
<?php
include("include/footer.php");
?>