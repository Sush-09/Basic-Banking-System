<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">

    <title>Banking System</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="static/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="static/css/font-awesome.css">

    <link rel="stylesheet" href="static/css/templatemo-softy-pinko.css">

    <link rel="stylesheet" href="static/css/forms2.css">


    

    <style>
        table {
	border-collapse: collapse;
    
    
}
table td {
	padding: 15px;
}
table thead td {
	background-color: #54585d;
	color: #ffffff;
	font-weight: bold;
	font-size: 13px;
	border: 3px solid #54585d;
}
table tbody td {
	color: #636363;
	border: 1px solid #dddfe1;
}
table tbody tr {
	background-color: #dddfe1;
}
table tbody tr:nth-child(odd) {
	background-color: #ffffff;
}


table tr:first-child th:first-child {
  border-top-left-radius: 15px;
}


table tr:first-child th:last-child {
  border-top-right-radius: 15px;
}


table tr:last-child td:first-child {
  border-bottom-left-radius: 15px;
}


table tr:last-child td:last-child {
  border-bottom-right-radius: 15px;
}
    </style>

</head>
<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">
                            <img src="static/images/logo.png" alt="Bank" height="180px" width="180px" style="margin-top: -55px; margin-left:-50px;"/>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li style="margin-right:130px;"><h4><strong>Summary of Transaction</strong></h4></li>
                            <li><a href="index.html#welcome" >Home</a></li>
                            <li><a href="index.html#features">About</a></li>
                            <li><a href="index.html#contact-us">Feedback</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="welcome-area" ></div>

    

    <div class="header-text">
        <div class="container">
            <div class="row">
                <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 col-md-12 col-sm-12">
                <!--Sender's Account-->
                <center>
                    <h3>Sender's Account</h3>
                    <table  cellspacing="5" cellpadding="20" style="margin-bottom: 10px;" >
                    
                        <tr>
                            <th> <font face="Arial" color="black"><strong>Sr.No.</strong></font> </th>
                            <th> <font face="Arial" color="black"><strong>Name</strong></font> </th>
                            <th> <font face="Arial" color="black"><strong>Email</strong></font> </th>
                            <th> <font face="Arial" color="black"><strong>Balance</strong></font> </th>
                            
                        </tr>
    <?php
    session_start();
    $conn = mysqli_connect('localhost', 'guest', 'guest123', 'bank_system');
   
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $_SESSION['id'] = $_GET['id'];
    
    if (isset($_SESSION['id'])){
        $history_id = $_SESSION['id'];
        $sql1 = "SELECT * FROM history WHERE sr_no='$history_id'";
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_array($result1);
        $s_id = $row1[1];
        $r_id = $row1[3];
        $sql2 = "SELECT * FROM customers WHERE c_id='$s_id'";
        if ($result2 = mysqli_query($conn, $sql2)) {
            while ($row2 = $result2->fetch_assoc()) {
                $field1name = $row2["c_id"];
                $field2name = $row2["name"];
                $field3name = $row2["email"];
                $field4name = $row2["balance"];
    ?>   
        <tr> 
            <td> <font color="black"> <b> <?php echo $field1name; ?>  </b>  </td> 
            <td> <font color="black"> <b> <?php echo $field2name ;?>  </b>  </td> 
            <td> <font color="black"> <b> <?php echo $field3name; ?>  </b>  </td> 
            <td> <font color="black"> <b> <?php echo $field4name; ?>  </b>  </td> 
        </tr>       
        <?php 
            }
        }
    
        $result2->free();  ?>
                </table>
            </center>
            <!--Recipient,s Account--> 
            <center>
                <br>
                    <h3>Recipient's Account</h3>
                    <table  cellspacing="5" cellpadding="20" style="margin-bottom: 10px;" >
                    
                        <tr>
                            <th> <font face="Arial" color="black"><strong>Sr.No.</strong></font> </th>
                            <th> <font face="Arial" color="black"><strong>Name</strong></font> </th>
                            <th> <font face="Arial" color="black"><strong>Email</strong></font> </th>
                            <th> <font face="Arial" color="black"><strong>Balance</strong></font> </th>
                            
                        </tr>
    <?php
        $sql3 = "SELECT * FROM customers WHERE c_id='$r_id'";
        if ($result3 = mysqli_query($conn, $sql3)) {
            while ($row3 = $result3->fetch_assoc()) {
                $field1name1 = $row3["c_id"];
                $field2name1 = $row3["name"];
                $field3name1 = $row3["email"];
                $field4name1 = $row3["balance"];
    ?>   
        <tr> 
            <td> <font color="black"> <b> <?php echo $field1name1; ?>  </b>  </td> 
            <td> <font color="black"> <b> <?php echo $field2name1 ;?>  </b>  </td> 
            <td> <font color="black"> <b> <?php echo $field3name1; ?>  </b>  </td> 
            <td> <font color="black"> <b> <?php echo $field4name1; ?>  </b>  </td> 
        </tr>       
        <?php 
            }
        }
    }
        $result3->free();  ?>
                </table>
                <h3 style="background-color:#f5cfdf">Amount Transferred: Rs. <?php echo $row1[5]; ?></h3>
            </center>
                </div>
            </div>
        </div>
    </div>


    
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <ul class="social">
                        
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                <p class="copyright">Created By <b>Srushti Biwalkar</b> All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- jQuery -->
    <script src="static/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="static/js/popper.js"></script>
    <script src="static/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="static/js/scrollreveal.min.js"></script>
    <script src="static/js/waypoints.min.js"></script>
    <script src="static/js/jquery.counterup.min.js"></script>
    <script src="static/js/imgfix.min.js"></script> 
    
    <!-- Global Init -->
    <script src="static/js/custom.js"></script>

    <?php
    mysqli_close($conn);
    ?>

</body>
</html>