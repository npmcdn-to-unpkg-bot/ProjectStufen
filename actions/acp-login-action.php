<?php
if (isset($_POST["password"])) {
    $pw = $_POST["password"];
    if (strtolower($pw) == "stufenadmin") {
        session_start();
        $_SESSION['authACP'] = 1;
        header("Location: ../acp.php");
    } else {
        header("Location: ../acpLogin.php");
        die();
    }
} else {
    header("Location: ../acpLogin.php");
    die();
}