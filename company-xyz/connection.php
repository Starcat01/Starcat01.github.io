<?php
function connection()
{
    $server_name = "localhost";
    $username = "root";
    $password = "atsuoiguchi";
    $db_name = "company_xyz";
    // create a connection to our database
    $conn = new mysqli($server_name, $username, $password, $db_name);
    // check if connection is successful
    if ($conn->connect_error) {
        die("Connection Failed. " . $conn->connect_error);
    } else {
        return $conn;
    }
}
