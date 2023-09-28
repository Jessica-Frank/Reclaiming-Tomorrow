<?php
$user = 'root';
$pass = '';
$db = 'verify_db';

$db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
?>