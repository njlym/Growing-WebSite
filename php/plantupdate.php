<?php
//INSERT TO DATABASE
$code = $_POST["code"];
$name = $_POST["name"];
$category = $_POST ["category"];
$price = $_POST["price"];
$code = $_POST["code"];
$country = $_POST["country"];



 

$host = "localhost";
$dbname = "Growing";
$username = "root";
$password = "";
        
$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);
        
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}           
        
$sql = "UPDATE  plant SET name = '$name', category = '$category', price = '$price', country = '$country'  where code = '$code'";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
    die(mysqli_error($conn));
}

mysqli_stmt_execute($stmt);

echo "Record saved.";