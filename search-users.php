<?php
include("include/header.php");
if (!($_SESSION['user_type'] == "admin" && $_SESSION["state_login"] === true )) {
    header("location:http://localhost/web/index.php");
}
$link = mysqli_connect("localhost", "root", "", "web");
$search = $_GET['search_user'];
if (mysqli_connect_errno()) {
    exit("خطا با شرح زیر :" . mysqli_connect_error());
}
$query = "SELECT * FROM user WHERE name='$search' OR family = '$search' OR email = '$search' OR tell = '$search'";

$result = mysqli_query($link, $query);
$counter = 0;
    
    while ($row = mysqli_fetch_array($result)) {
        $counter++;
        $email = $row['email'];
    ?>  
        <div class="Pack_Users">
            <p>نام : <?php echo $row['name']; ?></p>
            <p>نام خانوادگی : <?php echo $row['family']; ?></p>
            <p>ایمیل :<a href='http://localhost/web/setting-user.php?email=<?php echo $email; ?>'> <?php echo $row['email']; ?></a></p>
            <p>شماره تماس : <?php echo $row['tell']; ?></p>
            <p> نوع کاربر : <?php if($row['type'] == 0){ echo "معمولی"; }else{ echo "ادمین"; } ?></p>
        </div>
        <?php
    }
  
