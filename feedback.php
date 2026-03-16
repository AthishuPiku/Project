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
    $email=$_POST['email'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO feedback(email,comment) VALUE ('$email','$comment')";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "new record created successfully!";
    }else{
        echo "error" . $sql . "<br>" . $conn->error;
    }

    }
    $conn->close();
?>