<?php
$mysqli = new mysqli("host", "user", "pw", "database");
if ($mysqli->connect_errno) {
    die("MySQL-Error: " . $mysqli->connect_error);
}
$mysqli->set_charset("utf8");