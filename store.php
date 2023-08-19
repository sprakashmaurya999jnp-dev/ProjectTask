<?php
include 'db.php';
$errors = array();

// Function to sanitize and validate email address
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
// Function to sanitize and validate phone number
function validatePhoneNumber($number) {
    return preg_match('/^[0-9+\-() ]+$/', $number);
}
$local_ip = gethostbyname(gethostname());
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $number = trim($_POST["phone_number"]);
    $email = trim($_POST["email"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    // Validate name (non-empty)
    if (empty($name)) {
        $errors["name"] = "Name is required.";
    }

    // Validate email
    if (!validateEmail($email)) {
        $errors["email"] = " email address is required.";
    }

    // Validate phone number
    if (!validatePhoneNumber($number)) {
        $errors["phone_number"] = "phone number is required.";
    }

    // Validate subject (non-empty)
    if (empty($subject)) {
        $errors["subject"] = "Subject is required.";
    }

    // Validate message (non-empty)
    if (empty($message)) {
        $errors["message"] = "Message is required.";
    }
}

// If there are no errors, process the form data
if (empty($errors)) {
    $sql = "INSERT INTO `contact_form` (`name`, `phone_number`, `email`, `subject`, `message`, `ip_address`) VALUES ('$name', '$number', '$email', '$subject', '$message', '$local_ip')";
    $data = $conn->query($sql);
    
    if($data ){
        $success = 'data inserted successfully !';
        header("Location:contact.php?message=".$success);
    }
    else
    $success = "Data not submit";;
    header("Location:contact.php?message=".$success);
} else {
    $errorQueryString = http_build_query(array('errors' => $errors));
    header("Location:contact.php?$errorQueryString");
    exit();
}

$conn->close();
