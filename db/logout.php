<?php

session_start();


session_destroy();

header("Location: ../login.php"); /* Redirect browser */

/**
 * Created by PhpStorm.
 * User: LuNeR
 * Date: 9/16/2017
 * Time: 10:47 PM
 */