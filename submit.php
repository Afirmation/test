<?php
// Get the form data
$name = $_POST['name'];
$dob = $_POST['dob'];
$ssn = $_POST['ssn'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$availability = $_POST['availability'];

// Validate the form data
if (empty($name) || empty($dob) || empty($ssn) || empty($address) || empty($phone) || empty($availability)) {
  // If any required fields are empty, show an error message
  echo "Error: Please fill out all required fields.";
} else {
  // If all fields are filled out, store the data in a database
  $servername = "localhost";
  $username = "username";
  $password = "password";
  $dbname = "afirm_database";

  // Create a new database connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check if the connection was successful
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Insert the form data into the database
  $sql = "INSERT INTO job_applications (name, dob, ssn, address, phone, availability) VALUES ('$name', '$dob', '$ssn', '$address', '$phone', '$availability')";

  if ($conn->query($sql) === TRUE) {
    echo "Thank you for submitting your job application.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the database connection
  $conn->close();
}
?>
