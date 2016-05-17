<?php
if (isset($_POST["password"])) {
    $pw = $_POST["password"];
    if (strtolower($pw) == "gfsstufen") {
        session_start();
        $_SESSION['auth_stufen'] = 1;
        header("Location: ../index.php");
    } else if (strtolower($pw) == "stufenadmin") {
        session_start();
        $_SESSION['auth_stufen'] = 1;
        $_SESSION['authACP'] = 1;
        header("Location: ../acp.php");
    }
    else {
        header("Location: ../login.php");
        die();
    }
} else {
    header("Location: ../login.php");
    die();
}