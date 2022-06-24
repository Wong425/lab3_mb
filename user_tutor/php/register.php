<?php
if (!isset($_POST)) {
    $response = array('status' => 'failed', 'data' => null);
    sendJsonResponse($response);
    die();
}
include_once("dbconnect.php");
    $username = addslashes($_POST['name']);
    $sueremail = addslashes($_POST['email']);
    $password = sha1($_POST['password']);
    $phoneNo = $_POST['phoneNo'];
    $address = $_POST['address'];
    // $base64image = $_POST['image'];
    
$sqlregister = "INSERT INTO `register_tbl`( `name`, `email`, `password`, 
    `phoneno`, `address`) 
    VALUES ('$username','$useremail','$password','$phoneNo',,'$address')";
// if ($conn->query($sqlinsert) === TRUE) {
//     $response = array('status' => 'success', 'data' => null);
//     $filename = mysqli_insert_id($conn);
//     $decoded_string = base64_decode($base64image1);
//     $path = '../assets/image/' . $filename . '.jpg';
//     $is_written = file_put_contents($path, $decoded_string);
//     sendJsonResponse($response);
// } else {
//     $response = array('status' => 'failed', 'data' => null);
//     sendJsonResponse($response);
// }
    
if ($conn->query($sqlregister) === TRUE) {
    $response = array('status' => 'success', 'data' => null);
    sendJsonResponse($response);
} else {
    $response = array('status' => 'failed', 'data' => null);
    sendJsonResponse($response);
}

function sendJsonResponse($sentArray)
{
    header('Content-Type: application/json');
    echo json_encode($sentArray);
}