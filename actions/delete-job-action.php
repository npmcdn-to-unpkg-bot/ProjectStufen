<?php
echo $_POST["job"];

if (isset($_SESSION['authACP'])) {
    if ($_SESSION['authACP'] == 1) {

        require_once "../require/mysql.php";


        if (!isset($_GET["job"])) {#
            header("Location: ../index.php");
            return;
        }
        $job = $_GET["job"];

        $sql = "DELETE FROM jobs WHERE name = '$job'";

        $mysqli->query($sql) or die($mysqli->error);
        header("Location: ../acp.php");

    } else {
        header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
}