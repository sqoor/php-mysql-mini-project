<?php

if (isset($_POST['logout'])) {
    session_start();
    $_SESSION['user'] = "";
    $_SESSION['errors'] = "";
}