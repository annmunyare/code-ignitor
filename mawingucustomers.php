<?php
$phone_number = $_GET['phone_number'];

    // Initialize connection variables.
    $host = "pg.net-service.cz";
    $database = "mawingu_production";
    $user = "mawingu_stat";
    $password = "Mawingu2891872";

    // Initialize connection object.
    $connection = pg_connect("host=$host dbname=$database user=$user password=$password") 
        or die("Failed to create connection to database: ". pg_last_error(). "<br/>");
    print "Successfully created connection to database.<br/>";

    $result = pg_query($connection, "SELECT * FROM customers WHERE username = '".$phone_number."'");
    if (!$result) {
        echo "Customer not found";
        exit;
    }

    while ($row = pg_fetch_row($result)) {
        echo json_encode($row);
    }

    // Closing connection
    pg_close($connection);
?>