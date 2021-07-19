<?php
$conn = mysqli_connect('localhost', 'guest', 'guest123', 'bank_system');
   
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO feedback(name, email, message) VALUES ('$name', '$email', '$message')";
if(mysqli_query($conn, $sql)){
    echo '<script> ';  
            echo '  if (confirm("!!Thanks For The Feedback!!")) {';  
            echo "    document.location = 'http://localhost/first/bank%20system/index.html';";  
            echo '  }';  
    echo '</script>';
}

mysqli_close($conn);
?>