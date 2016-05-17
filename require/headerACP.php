<?php
session_start();
// check if user is verified for the normal zone (excluding acp)
if (!isset($_SESSION['authACP'])) {
    header("Location: acpLogin.php");
    die();
} else if (!($_SESSION['authACP'] == 1)) {
    header("Location: acpLogin.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

    <title></title>

    <link href="https://cdn.jsdelivr.net/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css" rel="stylesheet">
</head>
<body>
<!-- Navigation -->

<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Project Stufen: Admin</a>
        </div>
    </div>
</nav>