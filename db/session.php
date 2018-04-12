<?php
include('db.php');
session_start();

if (isset($_SESSION['login_user_email'])) {
    $user_check = $_SESSION['login_user_email'];

    $sqlQuery = "select email, name, role, status from user where email = '$user_check' ";

    if ($result = mysqli_query($connection, $sqlQuery)) {
        while ($row = mysqli_fetch_array($result)) {
            $login_session_Email = $row['email'];
            $login_session_User = $row['name'];
            $login_session_role = $row['role'];
            $login_session_status = $row['status'];
        }
        // Free result set
        mysqli_free_result($result);
    }



} else {
    header("location: login.php");
}

?>