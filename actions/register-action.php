<?php
require_once "../require/mysql.php";


if (isset($_POST["name"]) && isset($_POST["job"])) {
    $name = htmlspecialchars($_POST["name"]);
    $job = htmlspecialchars($_POST["job"]);

    $sql = "INSERT INTO members (id, name, job) VALUES ('', '".$name."', '".$job."')";

    $mysqli->query($sql) or die($mysqli->error);
    if (!($_SESSION['authACP'] == 1)) {
        header("Location: ../acp.php");
    } else {
        header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
}