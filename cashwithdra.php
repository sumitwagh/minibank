<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['sub'])) {
    $amount= $_POST['amt'];
    $acno = $_POST['name'];

    $sql = "UPDATE account SET amount='$amount' WHERE id='$acno'";
    
    if (mysqli_multi_query($conn, $sql)) {
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css.css" rel="stylesheet">

</head>
<body>

<div class="container">
  <h2>Account Details</h2>            
 <?php

     $sql = "SELECT id, customername, amount FROM account";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Account Holder Name</th>
      <th scope="col">Account Number</th>
	  <th scope="col">Balance</th>
    </tr>
  </thead>
  <tbody>
  	<tr>
     <td> <?php echo $row['customername'] ?> </td>
     <td> <?php echo $row['id'] ?></td>
     <td> <?php echo $row['amount'] ?></td>

 </tr>
  
  </tbody>
</table>
		<?php
        }
    } else {
        echo "0 results";
    }

    mysqli_close($conn);
    ?>
</div>
</div>
</body>
</html>