<?php
//INSERT TO DATABASE 
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
        
$sql = "INSERT INTO plant(name,category, price, code, country)
        VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssiss",
                       $name,
                       $category,
                       $price,
                       $code,
                       $country);

mysqli_stmt_execute($stmt);

echo "Record saved.";