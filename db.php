<?php

$dsn = "mysql: host=localhost; dbname=duan1_nhom; charset=utf8";
$username = "root";
$password = "";

try {
	$conn = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
	throw $e;
}