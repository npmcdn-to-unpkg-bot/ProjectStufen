<?php
session_start();
// check if user is verified for the normal zone (excluding acp)
if (!isset($_SESSION['auth_stufen'])) {
    header("Location: login.php");
    die();
} else if (!($_SESSION['auth_stufen'] == 1)) {
    header("Location: login.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

    <title>Stufen</title>

    <link href="https://cdn.jsdelivr.net/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"
</head>
<body>