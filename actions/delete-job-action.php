<?php
session_start();
if (isset($_SESSION['authACP'])) {
    if ($_SESSION['authACP'] == 1) {

        require_once "../require/mysql.php";


        if (isset($_GET["job"])) {
            $job = $_GET["job"];

            $sql = "DELETE FROM jobs WHERE name = '$job'";

            echo $sql;

            $mysqli->query($sql) or die($mysqli->error);
            header("Location: ../acp.php");
        } else {
            header("Location: ../acp.php");
        }

    } else {
        header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
}