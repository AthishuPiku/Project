<?php
$servername="localhost";
$username="root";
$password="";
$dbname="hostelmm_project";

$conn= new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error){
    die("connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data   
    $admin_name = $_POST["admin_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "INSERT INTO admin(admin_name,email,password) VALUE ('$admin_name','$email','$password')";
    $result = $conn->query($sql);
    if ($result === TRUE) {
        echo "new record created successfully!";
    }else{
        echo "error" . $sql . "<br>" . $conn->error;
    }

    }
    $conn->close();
?>