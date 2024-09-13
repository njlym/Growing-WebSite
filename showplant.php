<?php
$host = "localhost";
$dbname = "Growing";
$username = "root";
$password = "";

// Establish database connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch all products from the database
$result = mysqli_query($conn, "SELECT * FROM plant");
$minPrice = PHP_INT_MAX; // Initialize minPrice to a very large value

// Handle search if the search parameter is provided
if (isset($_GET['search'])) {
    $search_code = $_GET['search'];
    $query = "SELECT * FROM plant WHERE code = '$search_code'";
    $result = mysqli_query($conn, $query);
}

// Display products information in a table
echo "<!DOCTYPE html>
      <html>
      <head>
          <meta charset='UTF-8'>
          <title>SHOW PLANTS</title>
          <link rel='stylesheet' href='css/Style.css'>
      </head>
      <body>
          <div class='base'>
              <nav>
                  <img src='img/Logo.png' alt='our logo' class='logo'>
                  <ul>
                      <li><a href='HomePage.html'><b>Home</b></a></li>
                      <li><a href='about us.html'><b>About Us</b></a></li>
                      <li><a href='contactus.html'><b> Contact Us</b> </a></li>
                      <li><a href='profile.html'><b>Profile</b></a></li>
                      <li>
                          <nav>
                              <ul>
                                  <li class='dropdown'>
                                      <a href='#' class='dropbtn'><b>Categories</b> </a>
                                      <div class='dropdown-content'>
                                          <a href='indoor.html'>Indoor plants</a>
                                          <a href='outdoor.html'>Outdoor plants</a>
                                          <a href='flowers.html'>Flowers</a>
                                      </div>
                                  </li>
                              </ul>
                          </nav>
                      </li>
                  </ul>
                  <div class='top-bar'>
                      <button class='sign-in-button'>Sign In</button>
                      <button class='sign-up-button'>Sign Up</button>
                  </div>
              </nav>
              <section>
                  <form method='GET'>
                      <label for='search'>Search by Code:</label>
                      <input type='text' name='search' id='search-input'>
                      <input type='submit' value='Search'>
                  </form>
                  <table id='data-table'> 
                      <tr>
                          <th>Name</th>
                          <th>Category</th>
                          <th>Price</th>
                          <th>Code</th>
                          <th>Country</th>
                          <th>Update</th>
                      </tr>";

// Loop through each product and display its information in a table row
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['name']}</td>
            <td>{$row['category']}</td>
            <td>{$row['price']}</td>
            <td>{$row['code']}</td>
            <td>{$row['country']}</td>
            <td><a href='updateplant.php?id={$row['code']}'>Update</a></td>
          </tr>";
    
    // Update minPrice if the current product's price is lower
    $minPrice = min($minPrice, $row['price']);
}

echo "</table>";

// Display the minimum price
echo "<p>Minimum Price: $minPrice</p>";

echo "<script src='JS/shearch.js'></script>
      </body>
      </html>";

// Close the database connection
mysqli_close($conn);
?>

