<?php
include "connect-database.php";
session_start();

function fetch_database($username, $password)
{
    global $conn;

    $sql = "SELECT * FROM Users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);
    return $result;
}

function go_dashboard()
{
    header("Location: ../dashboard.php");
}

function go_login()
{
    header("Location: ../register/login.php");
}

function validate_form($username, $password)
{
    if ($username == "" || $password == "") {
        $_SESSION['errors'] = "Please fill the empty fields.";
        go_login();
        return true;
    }
    return false;
}

function handle_form()
{
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = fetch_database($username, $password);

        if (validate_form($username, $password)) return;

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['user'] = $user['first_name'] . " " . $user['last_name'];
            $_SESSION['errors'] = "";

            go_dashboard();
        } else {
            $_SESSION['errors'] = "Username and password do not match.";
            go_login();
        }
    }
}

handle_form();


$conn->close();

