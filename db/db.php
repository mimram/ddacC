<?php
$db['db_host'] = "mddac.mysql.database.azure.com";
$db['db_user'] = "mddac@mddac";
$db["db_pass"] = "*marie123*";
$db["db_name"] = "cbs";

foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());

}

?>
