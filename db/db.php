<?php
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db["db_pass"] = "";
$db["db_name"] = "cbs";

foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());

}

?>