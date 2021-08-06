<?php

$host = "localhost";
$username = "lanayspc_root";
$password = "Lanaysps187597";
$db = "lanayspc_wablast";

$koneksi = mysqli_connect($host, $username, $password, $db) or die("GAGAL");

$base_url = "https://wablast.lanaysp.com";
date_default_timezone_set('Asia/Jakarta');
