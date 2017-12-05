<?php

function connection()
{
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

    return $conn;
}


function run_query($query)
{
    $conn = connection();

    if (!mysqli_multi_query($conn, $query)) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


function updateBalance($amount, $acno)
{
    $query = "UPDATE account SET amount='$amount' WHERE id='$acno'";

    return run_query($query);
}


function getCustomerByAcNo($acno)
{
    $query = "SELECT * FROM account WHERE id='$acno'";

    $result = mysqli_fetch_assoc(mysqli_query(connection(), $query));


    if (!$result) {
        die("Error: Account not found! Please check account number again!");
    }

    return $result;
}


function searchCustomer($word)
{
    $query = "SELECT * FROM account WHERE customername LIKE '%$word%'";

    return mysqli_fetch_all(mysqli_query(connection(), $query));
}

function getAllCustomers()
{
    $query = "SELECT * FROM account";

    return mysqli_fetch_all(mysqli_query(connection(), $query));
}



if (isset($_POST['sub'])) {
    $amount= $_POST['amt'];
    $acno = $_POST['name'];


    // var_dump($result);
    //

    if (!$result) {
        $customer = getCustomerByAcNo($acno);
        $balance = $customer['amount'] + $amount;

        updateBalance($balance, $acno);


    } else {
        die("Error: Account not found! Please check account number again!");
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
            $customers = getAllCustomers();



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
                <?php foreach ($customers as $customer) { ?>
                <tr>
                    <td> <?php echo $customer['1'] ?> </td>
                    <td> <?php echo $customer['0'] ?></td>
                    <td> <?php echo $customer['2'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php mysqli_close(connection()); ?>
