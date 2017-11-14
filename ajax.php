<?php
require('security.php');

$db = array();
$db['hostname'] = 'localhost';
$db['username'] = '';
$db['password'] = '';
$db['database'] = '';
$password_salt = '$#N%N#$LfLf3wEFfsrI(3(45$K67wfdsgTfM8fLKE(OK#@Dfesflrk';

$response = array('success' => 0, 'message' => 'Unknown error');

$action = isset($_POST[$fieldNames['action']]) ? $_POST[$fieldNames['action']] : '';

try {
    $db_con = new PDO("mysql:host={$db['hostname']};dbname={$db['database']}", $db['username'], $db['password']);
    $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}  catch(PDOException $e) {
    $response['message'] = $e->getMessage();
}

// Check the CSRF token for validity
if (isset($_POST[$fieldNames['csrfToken']]) && $_POST[$fieldNames['csrfToken']] === $csrfToken) {
    if ($action == 'login') {
        $username = trim($_POST[$fieldNames['username']]);
        $password = trim($_POST[$fieldNames['password']]);
        $password_hash = hash('sha256', md5($password) . $password_salt);

        try {
            $stmt = $db_con->prepare("SELECT * FROM inseego_users WHERE user_name=:username");
            $stmt->execute(array(":username" => $username));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $count = $stmt->rowCount();

            if ($count > 0 && $row['password_hash'] == $password_hash) {
                $response = array('success' => 1, 'message' => 'Login Success');
                $_SESSION['clientId'] = $row['client_id'];

                $stmt = $db_con->prepare("UPDATE inseego_users SET last_login = :lastlogin WHERE client_id=:clientid");
                $stmt->execute(array(
                    ":lastlogin" => date('Y-m-d H:i:s'),
                    ":clientid" => $_SESSION['clientId'],
                    ));
            } else {
                $response['message'] = "Username or password does not exist."; // wrong details
            }

        } catch (PDOException $e) {
            $response['message'] = $e->getMessage();
        }
    } elseif ($action == 'logout') {
        session_destroy();
        $response = array('success' => 1, 'message' => 'Logout Success');
    } else {
        $response['message'] = 'Unknown Action';
    }
} else {
    $response['message'] = 'Invalid CSRF Token';
}

echo json_encode($response);