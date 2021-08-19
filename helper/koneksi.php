<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "wa_blast";

$koneksi = mysqli_connect($host, $username, $password, $db) or die("GAGAL");

$base_url = "http://wablas.test/";
date_default_timezone_set('Asia/Jakarta');
