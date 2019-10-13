<?php
include "./connect-database.php";

$first_name = "";
$last_name = "";
$username = "";
$email = "";
$password = "";

function go_dashboard()
{
    header("Location: ../dashboard.php");
}

function go_signup()
{
    header("Location: ../register/sign-up.php");
}

function validate_form($first_name, $last_name, $username, $email, $password)
{
    if ($first_name = "" || $last_name = "" || $username = "" || $email = "" || $password == "") {
        $_SESSION['errors'] = "Please fill the empty fields.";
        go_signup();
        return false;
    }
    return true;
}

function save_database($first_name, $last_name, $username, $email, $password)
{
    global $conn;
    $sql = "INSERT INTO Users(first_name , last_name, email, username, password)
                    VALUES ('$first_name', '$last_name', '$email', '$username', '$password')";
    $result = $conn->query($sql);

    return $result;

    return "";
}


function handle_form()
{
    if (isset($_POST['signup'])) {
        session_start();

        global $conn;
        $first_name = $_POST['first-name'];
        $last_name = $_POST['last-name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        if (!validate_form($first_name, $last_name, $username, $email, $password)) return;

        $result = save_database($first_name, $last_name, $username, $email, $password);

        if ($result === TRUE) {
            echo "New record created successfully";
            $_SESSION['user'] = $first_name . " " . $last_name;
            go_dashboard();
        } else {
            echo "Error: " . $conn->error;
            go_signup();
        }
    }
}

handle_form();

$conn->close();
