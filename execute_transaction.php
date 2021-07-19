<?php
session_start();
$conn = mysqli_connect('localhost', 'guest', 'guest123', 'bank_system');
   
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

$_SESSION['s_name'] = $_GET['s_name'];
if (isset($_SESSION['s_name'])){
    $sender = $_SESSION['s_name'];
}


$recipient = $_POST['recipient'];   
$amount = $_POST['amount'];

$sql1 = "SELECT * from customers WHERE name='$sender'";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($result1);
$s_balance = $row1[3];
$s_id = $row1[0];

$sql2 = "SELECT * from customers WHERE name='$recipient'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($result2);
$r_id = $row2[0];

if ($s_balance < $amount){
    echo '<script> ';  
            echo '  if (confirm("Transaction Failed!!!Sender does not have enough balance")) {';  
            echo "    document.location = 'http://localhost/first/bank%20system/customers.php';";  
            echo '  }';  
    echo '</script>';
}
else{
    $sql3 = "UPDATE customers set balance=balance-$amount WHERE name='$sender'";
    $sql4 = "UPDATE customers set balance=balance+$amount WHERE name='$recipient'";
    $sql5 = "INSERT INTO history (s_id, sender, r_id, recipient, amount) VALUES ('$s_id', '$sender', '$r_id', '$recipient', '$amount')";
    mysqli_query($conn, $sql5);
    $sql6 = "SELECT * FROM history WHERE sr_no=(SELECT max(sr_no) FROM history)";
    $result6 = mysqli_query($conn, $sql6);
    $row6 = mysqli_fetch_array($result6);
    $history_id = $row6[0];
    if (mysqli_query($conn, $sql3) and mysqli_query($conn, $sql4)){
        echo '<script> ';  
                echo '  if (confirm("!!Transaction Successfull!!")) {';  
                echo "    document.location = 'http://localhost/first/bank%20system/summary.php?id=$history_id&message=no';";  
                echo '  }';  
        echo '</script>';
    }
    else{
        echo '<script> ';  
                echo '  if (confirm("Error!!!!")) {';  
                echo "    document.location = 'http://localhost/first/bank%20system/customers.php';";  
                echo '  }';  
        echo '</script>';
    }
}

    mysqli_close($conn);
?>