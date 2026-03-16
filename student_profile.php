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
    $stu_name = $_POST['stu_name'];
    $f_name = $_POST['f_name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $room = $_POST['Room'];

    $sql = "INSERT INTO Student_profile(stu_name,f_name,address,email,Course,Room) VALUE ('$stu_name','$f_name','$address','$email','$course','$room')";
    $result = $conn->query($sql);


    if ($result === TRUE) {
        echo "new record created successfully!";
    }else{
        echo "error" . $sql . "<br>" . $conn->error;
    }

    }
    $conn->close();
?>