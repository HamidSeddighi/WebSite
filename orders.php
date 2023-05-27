<?php
include("include/header.php");
if (!isset($_SESSION["state_login"])) {
    header("location:http://localhost/web/index.php");
}
$email = $_SESSION["email"];
?>

<?php

$link = mysqli_connect("localhost", "root", "", "web");
if (mysqli_connect_errno()) {
    exit("خطا با شرح زیر :" . mysqli_connect_error());
}

$quary = "SELECT * FROM orders WHERE email = '$email'";
$result = mysqli_query($link, $quary);
?>

<table border="1px" style="width:100%">
    <tr>
        <th>کد محصول</th>
        <th>نام محصول</th>
        <th>تعداد</th>
        <th>قیمت پایه</th>
        <th>شناسه ی خرید</th>
        <th>وضعیت خرید</th>
        <th>قیمت کل</th>
        <th>مدیریت</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_array($result)) {
        $pro_code2 = $row['pro_code'];

    ?>
        <tr>
            <td><?php echo ($row['pro_code']) ?></td>
            <?php
            $quary2 = "SELECT * FROM product WHERE pro_code = '$pro_code2'";
            $result2 = mysqli_query($link, $quary2);
            $row2 = mysqli_fetch_array($result2);
            ?>
            <td><?php echo ($row2['pro_name']) ?></td>
            <?php


            ?>

            <td><?php echo ($row['pro_qty']) ?></td>
            <td><?php echo ($row['pro_price']) ?></td>
            <td><?php echo ($row['id']) ?></td>
            <?php
            switch ($row['state']) {
                case '0':
            ?>
                    <td><?php echo ("تحت بررسی") ?></td>
                <?php
                    break;
                case '1':
                ?>
                    <td><?php echo ("آماده برای ارسال") ?></td>
                <?php
                    break;
                case '2':
                ?>
                    <td><?php echo ("ارسال شده") ?></td>
                <?php
                    break;
                case '3':
                ?>
                    <td><?php echo ("لغو شده") ?></td>
            <?php
                    break;
                default:
                    break;
            }
            ?>
            <?php
            $price = $row['pro_qty'] * $row['pro_price'];
            ?>
            <td><?php echo ($price) ?></td>
            <?php
            switch ($row['state']) {
                case '0':
            ?>
                    <td><a href="http://localhost/web/cancel.php?id=<?php echo ($row['id']) ?>">لغو شود؟؟</a></td>
            <?php
                    break;
                default:
                    break;
            }
            ?>
        </tr>
    <?php
    }
    ?>
</table>