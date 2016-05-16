<?php
require_once "require/mysql.php";


if (isset($_POST["name"]) && isset($_POST["desc"]) && isset($_POST["quantity"])) {
    $name = $_POST["name"];
    $desc = $_POST["desc"];
    $quantity = $_POST["quantity"];

    $sql = "INSERT INTO jobs (id, name, needed, description) VALUES ('', '$name', '$quantity', '$desc')";

    $mysqli->query($sql) or die($mysqli->error);
    header("Location: ../acp.php");
} else {
    header("Location: ../index.php");
}

