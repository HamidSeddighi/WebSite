<?php
include("include/header.php");

    if (isset($_POST["email"]) && !empty($_POST["email"]) &&
        isset($_POST["pass"]) && !empty($_POST["pass"])) {
        
               $email = $_POST["email"];
               $pass = $_POST["pass"]; 

    }else {
        exit("برخی فیلد ها مقدار دهی نشده اند");
    }

    $link = mysqli_connect("localhost" , "root" , "" , "web");
    if (mysqli_connect_errno()) 
        exit("خطایی با شرح زیر رخ داده است :" . mysqli_connect_error());
    
        $query= "SELECT * FROM user WHERE email='$email' AND password='$pass'";
        $result = mysqli_query($link , $query);
        $row = mysqli_fetch_array($result);

        if ($row) {
        $_SESSION['lock_web'] = false;
        $_SESSION["state_login"] = true;
        $_SESSION["name"] = $row['name'];
        $_SESSION["family"] = $row['family'];
        $_SESSION["tell"] = $row['tell'];
        $_SESSION["email"] = $row['email'];
        $_SESSION["type"] = $row['type'];

        if ($row["type"] == 1 AND  $row['type'] == 3) {
            $_SESSION["user_type"]= "admin";
            header("location:http://localhost/web/add-product.php");

        }elseif ($row["type"] == 0) {
            $_SESSION["user_type"]= "pablic";
        ?>
            <script>
                location.replace("http://localhost/web/profile.php");
            </script>
        <?php

        }else if ($row["type"] == 3) {
            $_SESSION["user_type"]= "admin";
            header("location:http://localhost/web/add-product.php");

        }
        ?>
        <script>
            
                var mess = window.confirm("شما با موفقیت وارد شدید"); 
                if (mess === true) {
                    location.replace("http://localhost/web/profile.php");
                }           
            
        
        </script>
<?php
    }else {
        ?>
        <script>
        var mess = window.confirm("ایمیل یا پسورد اشتباه میباشد"); 
                if (mess === true) {
                    location.replace("http://localhost/web/login.php");
                } 
                </script>
                <?php
    }

?>
            <br>
            <?php
include("include/footer.php");
            ?>