function y() {
    var value =  document.getElementById('product2').value;

    switch (value) {
     case "samsung":
            location.replace("http://localhost/web/product/samsung/samsung.php");
         break;
     case "xiaomi":
             location.replace("http://localhost/web/product/xiaomi/xiaomi.php");
         break;
     case "nokia":
        location.replace("http://localhost/web/product/nokia/nokia.php");
         break;
     case "apple":
        location.replace("http://localhost/web/product/apple/apple.php");
         break;
     case "huawei":
        location.replace("http://localhost/web/product/huawei/huawei.php");
         break;

     default:
         break;
    }
}