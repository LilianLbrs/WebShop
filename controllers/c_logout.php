<?php

$_SESSION['customer_id'] = 0;
$_SESSION['name'] = "";
$_SESSION['admin'] = false;
$_SESSION['connected'] = false;

header("Location: ./index.php?page=home");


