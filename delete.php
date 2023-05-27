<?php
include("include/header.php");
if (!($_SESSION['user_type'] == "admin" && $_SESSION["state_login"] === true )) {
    header("location:http://localhost/web/index.php");
}

$link = mysqli_connect("localhost", "root" , "" , "web");

    if (mysqli_connect_errno()) {
        exit("خطا با شرح زیر :" . mysqli_connect_error());
  
    }
    

        if (isset($_GET['action'])) {
            $id = $_GET['id'];

            $query = "SELECT * FROM product WHERE pro_code='$id'";
            $result = mysqli_query($link , $query);

$row = mysqli_fetch_array($result);
$img = $row['pro_image'];
            switch ($_GET['action']) {
                case 'DELETE':
$query = "DELETE FROM product WHERE pro_code = $id";
                    if (mysqli_query($link , $query) === true) {
                        echo("محصول انتخاب شده با موفقیت حذف شد");
                        $file= "http://localhost/web/images/products/$img";
                        if (unlink($file)) {
                            echo("خطا در حذف پرونده $file");
                        }else {
                            echo(" با موفقیت حذف شد $file پرونده");
                        }
                    }else {
                        echo("خطایی هنگام حذف رخ داد");
                    }
                }
            }
            ?>
            <br>
            <?php
include("include/footer.php");
            ?>