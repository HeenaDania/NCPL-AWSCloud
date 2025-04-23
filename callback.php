<?php
ini_set('display_errors', 1);
include 'cognitoConfig.php';
session_start();

// Enable detailed error logging
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL);

error_log("\n\n=== Starting Cognito callback processing ===");

// Validate state first to prevent unnecessary processing
if (!isset($_GET['state']) || !isset($_SESSION['state']) || $_SESSION['state'] !== $_GET['state']) {
    error_log("State validation failed");
    error_log("Session state: " . ($_SESSION['state'] ?? 'NOT SET'));
    error_log("Received state: " . ($_GET['state'] ?? 'NOT SET'));
    header("HTTP/1.1 403 Forbidden");
    die("Invalid state parameter");
}

// Validate authorization code
if (!isset($_GET['code'])) {
    error_log("Missing authorization code");
    header("HTTP/1.1 400 Bad Request");
    die("Missing authorization code");
}

$code = $_GET['code'];
error_log("Received authorization code: " . substr($code, 0, 6) . "...");

// Configure token request
$token_url = $cognito_domain . "/oauth2/token";
$params = [
    'grant_type' => 'authorization_code',
    'client_id' => $client_id,
    'code' => $code,
    'redirect_uri' => $redirect_uri
];

// Add client secret if configured
$auth_header = "Basic " . base64_encode("$client_id:$client_secret");
$headers = [
    "Content-Type: application/x-www-form-urlencoded",
    "Authorization: $auth_header"
];

// Configure cURL for token request
$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $token_url,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query($params),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_TIMEOUT => 10,
    CURLOPT_SSL_VERIFYPEER => true,
    CURLOPT_VERBOSE => false
]);

error_log("Requesting token from: $token_url");
$token_response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if (curl_errno($ch)) {
    error_log("cURL error: " . curl_error($ch));
    header("HTTP/1.1 502 Bad Gateway");
    die("Connection error with Cognito service");
}

curl_close($ch);

// Process token response
error_log("Token response HTTP code: $http_code");
$token_data = json_decode($token_response, true);

if (!$token_data || isset($token_data['error'])) {
    error_log("Token error: " . ($token_data['error'] ?? 'Invalid JSON response'));
    error_log("Raw response: " . $token_response);
    header("HTTP/1.1 401 Unauthorized");
    die("Failed to obtain access token");
}

// Get user info
$user_info_url = $cognito_domain . "/oauth2/userInfo";
$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $user_info_url,
    CURLOPT_HTTPHEADER => ["Authorization: Bearer " . $token_data['access_token']],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 10,
    CURLOPT_SSL_VERIFYPEER => true
]);

error_log("Requesting user info from: $user_info_url");
$user_response = curl_exec($ch);
$user_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if (curl_errno($ch)) {
    error_log("User info cURL error: " . curl_error($ch));
    header("HTTP/1.1 502 Bad Gateway");
    die("Connection error with Cognito service");
}

curl_close($ch);

// Process user info
error_log("User info HTTP code: $user_http_code");
$user_data = json_decode($user_response, true);

if (!$user_data || !isset($user_data['email'])) {
    error_log("User info error: " . ($user_data['error'] ?? 'Invalid user data'));
    header("HTTP/1.1 401 Unauthorized");
    die("Failed to retrieve user information");
}

// Successful authentication
$_SESSION['emailaddress'] = $user_data['email'];
error_log("Successful login for: " . $user_data['email']);

// Redirect to application home page
header("Location: /");
exit();
?>
