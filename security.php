<?php
// Start a session
session_start();

// Create a Cross-Site Request Forgery Token if it doesn't exist
if (!isset($_SESSION['csrfToken'])) {
    $csrfToken = bin2hex(openssl_random_pseudo_bytes(32));
    $_SESSION['csrfToken'] = $csrfToken;
    $_SESSION['clientId'] = 0;
} else {
    $csrfToken = $_SESSION['csrfToken'];
}

// Generate random field names for security purposes
if (!isset($_SESSION['fieldNames'])) {
    $fieldNames = array(
        'username' => randomFieldName(),
        'password' => randomFieldName(),
        'csrfToken' => randomFieldName(),
        'action' => randomFieldName(),
    );

    $_SESSION['fieldNames'] = $fieldNames;
} else {
    $fieldNames = $_SESSION['fieldNames'];
}

// Generate a random field name
function randomFieldName() {
    return 'field_' . hash('sha256', bin2hex(openssl_random_pseudo_bytes(32)));
}