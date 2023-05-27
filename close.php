<?php
include_once("include/header.php");
// include("include/header.php");
if (!isset($_SESSION["state_login"])) {
    header("location:http://localhost/web/login.php");
}

session_unset();

session_destroy();
?>
<script>
    location.replace("http://localhost/web/index.php");
</script>

<br>
<?php
include("include/footer.php");
?>