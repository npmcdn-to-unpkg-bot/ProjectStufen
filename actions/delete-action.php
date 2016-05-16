<?php

//AUTH-Detection!!!
require_once "require/mysql.php";


if (isset($_GET["job"]) && isset($_GET["name"])) {#
    $job = $_GET["job"];
    $name = $_GET["name"];

    $sql = "DELETE FROM members WHERE name = '$name' and job = '$job' LIMIT 1";

    echo $sql;

    $mysqli->query($sql) or die($mysqli->error);
    header("Location: ../acp.php");
} else {
    header("Location: ../index.php");
}
