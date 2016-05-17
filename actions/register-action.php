<?php
require_once "../require/mysql.php";


if (isset($_POST["name"]) && isset($_POST["job"])) {
    $name = $_POST["name"];
    $job = $_POST["job"];

    $sql = "INSERT INTO members (id, name, job) VALUES ('', '".$name."', '".$job."')";

    $mysqli->query($sql) or die($mysqli->error);
    header("Location: ../index.php");
    //Bug, wenn man von ACP kommt landet man in der index.php
} else {
    header("Location: ../index.php");
}