<?php
require_once "../require/mysql.php";
require_once "../require/util.php“;


if (isset($_POST["name"]) && isset($_POST["job"])) {
    $name = htmlspecialchars($_POST["name"]);
    $job = htmlspecialchars($_POST["job"]);
    $ip = get_client_ip()

    $sql = "INSERT INTO members (id, name, job) VALUES ('', '".$name."', '".$job."')";
    $sql2 = „INSERT INTO logs (id, registered_for, registered_with, ip) VALUES
		(‚‘, '".$job.“‘, '".$name.“‘, '".$ip.“‘ 

    $mysqli->query($sql) or die($mysqli->error);
    if (!($_SESSION['authACP'] == 1)) {
        header("Location: ../acp.php");
    } else {
        header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
}