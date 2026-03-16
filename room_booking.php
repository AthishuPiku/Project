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
    $room_number = $_POST['room_number'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $students = $_POST['students'];
    
    $sql = "INSERT INTO room_booking(room_number,check_in,check_out,students) VALUE ('$room_number','$check_in','$check_out','$students')";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "new record created successfully!";
    }else{
        echo "error" . $sql . "<br>" . $conn->error;
    }

    }
    $conn->close();
   
?>
